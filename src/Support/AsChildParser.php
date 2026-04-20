<?php

declare(strict_types=1);

namespace AiluraCode\Bladcn\Support;

use function count;

final class AsChildParser
{
    private static array $cache = [];

    private static int $cacheLimit = 500;

    public static function parse(string $slotHtml, array $parentAttrs): ?array
    {
        $html = self::cleanBladeComments(mb_trim($slotHtml));
        if ($html === '') {
            return null;
        }

        if (isset(self::$cache[$html])) {
            $cached = self::$cache[$html];

            return self::mergeResult($cached['tag'], $cached['attrs'], $cached['innerHtml'], $parentAttrs);
        }

        if (preg_match('/^<([\w-]+)((?:\s+[\w\-:@]+(?:="[^"]*"|=\'[^\']*\'|=\S+)?)*)\s*\/>\s*$/s', $html, $m)) {
            $tag = mb_strtolower($m[1]);
            $attrs = self::parseAttrString($m[2] ?? '');

            self::cacheResult($html, $tag, $attrs, '');

            return self::mergeResult($tag, $attrs, '', $parentAttrs);
        }

        if (! preg_match('/^<([\w-]+)((?:\s+[\w\-:@]+(?:="[^"]*"|=\'[^\']*\'|=\S+)?)*)\s*>(.*?)<\/\1>\s*$/s', $html, $m)) {
            return null;
        }

        $tag = mb_strtolower($m[1]);
        $inner = mb_trim($m[3]);
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
            $html = preg_replace($pattern, '', (string) $html);
        }

        $html = preg_replace('/^(\s*<!--[\s\S]*?-->\s*)+/', '', (string) $html);
        $html = preg_replace('/(\s*<!--[\s\S]*?-->\s*)+$/', '', (string) $html);

        $html = preg_replace('/\s+/', ' ', (string) $html);

        return mb_trim($html);
    }

    private static function parseAttrString(string $attrString): array
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

    private static function cacheResult(string $html, string $tag, array $attrs, string $inner): void
    {
        if (count(self::$cache) >= self::$cacheLimit) {
            unset(self::$cache[array_key_first(self::$cache)]);
        }

        self::$cache[$html] = ['tag' => $tag, 'attrs' => $attrs, 'innerHtml' => $inner];
    }

    private static function mergeResult(string $tag, array $childAttrs, string $innerHtml, array $parentAttrs): array
    {
        $merged = [];

        foreach ($childAttrs as $key => $value) {
            if ($key === 'class') {
                $merged[$key] = mb_trim(($parentAttrs[$key] ?? '').' '.$value);
            } elseif ($key === 'style') {
                $merged[$key] = mb_trim(($parentAttrs[$key] ?? '').'; '.$value);
            } elseif (! isset($parentAttrs[$key])) {
                $merged[$key] = $value;
            }
        }

        foreach ($parentAttrs as $key => $value) {
            if (! isset($merged[$key])) {
                $merged[$key] = $value;
            }
        }

        return ['tag' => $tag, 'attrs' => $merged, 'innerHtml' => $innerHtml];
    }
}
