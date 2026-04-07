<?php

namespace AiluraCode\Bladcn\Support;

use function count;

class AsChildParser
{
    protected static array $cache = [];

    protected static int $cacheLimit = 500;

    public static function parse(string $slotHtml, array $parentAttrs): ?array
    {
        $html = self::cleanBladeComments(trim($slotHtml));
        if ($html === '') {
            return null;
        }

        if (isset(self::$cache[$html])) {
            $cached = self::$cache[$html];

            return self::mergeResult($cached['tag'], $cached['attrs'], $cached['innerHtml'], $parentAttrs);
        }

        // Self-closing tag: <tag attrs />
        if (preg_match('/^<([\w-]+)((?:\s+[\w\-:@]+(?:="[^"]*"|=\'[^\']*\'|=\S+)?)*)\s*\/>\s*$/s', $html, $m)) {
            $tag = strtolower($m[1]);
            $attrs = self::parseAttrString($m[2] ?? '');

            self::cacheResult($html, $tag, $attrs, '');

            return self::mergeResult($tag, $attrs, '', $parentAttrs);
        }

        // Normal tag: <tag attrs>content</tag>
        if (!preg_match('/^<([\w-]+)((?:\s+[\w\-:@]+(?:="[^"]*"|=\'[^\']*\'|=\S+)?)*)\s*>(.*?)<\/\1>\s*$/s', $html, $m)) {
            return null;
        }

        $tag = strtolower($m[1]);
        $inner = trim($m[3]);
        $attrs = self::parseAttrString($m[2] ?? '');

        self::cacheResult($html, $tag, $attrs, $inner);

        return self::mergeResult($tag, $attrs, $inner, $parentAttrs);
    }

    public static function cleanBladeComments(string $html): string
    {
        $patterns = [
            '/<!--\[if\s*BLOCK\]\s*><!\[endif\]-->/',
            '/<!--\[if\s*ENDBLOCK\]\s*><!\[endif\]-->/',
            '/<!--\[if\s*[^>]*\]><!\[endif\]-->/',
        ];

        foreach ($patterns as $pattern) {
            $html = preg_replace($pattern, '', $html);
        }

        // Strip only leading and trailing HTML comments (preserve mid-content comments)
        $html = preg_replace('/^(\s*<!--[\s\S]*?-->\s*)+/', '', $html);
        $html = preg_replace('/(\s*<!--[\s\S]*?-->\s*)+$/', '', $html);

        $html = preg_replace('/\s+/', ' ', $html);

        return trim($html);
    }

    protected static function parseAttrString(string $attrString): array
    {
        $attrs = [];
        if ($attrString === '') {
            return $attrs;
        }

        preg_match_all('/([\w\-:@]+)(?:=(?:"([^"]*)"|\'([^\']*)\'|(\S+)))?/', $attrString, $am, PREG_SET_ORDER);
        foreach ($am as $match) {
            $attrName = $match[1] ?? '';
            if ($attrName === '') {
                continue;
            }
            $value = $match[2] ?? '';
            if ($value === '') {
                $value = $match[3] ?? '';
            }
            if ($value === '' && isset($match[4])) {
                $value = $match[4];
            }
            $attrs[$attrName] = $value === '' ? null : $value;
        }

        return $attrs;
    }

    protected static function cacheResult(string $html, string $tag, array $attrs, string $inner): void
    {
        if (count(self::$cache) >= self::$cacheLimit) {
            unset(self::$cache[array_key_first(self::$cache)]);
        }
        self::$cache[$html] = ['tag' => $tag, 'attrs' => $attrs, 'innerHtml' => $inner];
    }

    protected static function mergeResult(string $tag, array $childAttrs, string $innerHtml, array $parentAttrs): array
    {
        $merged = [];

        foreach ($childAttrs as $key => $value) {
            if ($key === 'class') {
                $merged[$key] = trim(($parentAttrs[$key] ?? '') . ' ' . $value);
            } elseif ($key === 'style') {
                $merged[$key] = trim(($parentAttrs[$key] ?? '') . '; ' . $value);
            } elseif (!isset($parentAttrs[$key])) {
                $merged[$key] = $value;
            }
        }

        foreach ($parentAttrs as $key => $value) {
            if (!isset($merged[$key])) {
                $merged[$key] = $value;
            }
        }

        return ['tag' => $tag, 'attrs' => $merged, 'innerHtml' => $innerHtml];
    }
}
