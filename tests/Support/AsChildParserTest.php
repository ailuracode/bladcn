<?php

use AiluraCode\Bladcn\Support\AsChildParser;

test('parse self-closing tag without attributes', function () {
    $result = AsChildParser::parse('<br />', []);

    expect($result)->not->toBeNull()
        ->and($result['tag'])->toBe('br')
        ->and($result['attrs'])->toBe([])
        ->and($result['innerHtml'])->toBe('');
});

test('parse self-closing tag with attributes', function () {
    $result = AsChildParser::parse('<x-icon class="foo" data-slot="icon" />', ['class' => 'parent']);

    expect($result)->not->toBeNull()
        ->and($result['tag'])->toBe('x-icon')
        ->and($result['attrs']['class'])->toBe('parent foo')
        ->and($result['attrs']['data-slot'])->toBe('icon')
        ->and($result['innerHtml'])->toBe('');
});

test('parse self-closing tag with single quoted attributes', function () {
    $result = AsChildParser::parse("<x-icon class='bar' />", []);

    expect($result)->not->toBeNull()
        ->and($result['tag'])->toBe('x-icon')
        ->and($result['attrs']['class'])->toBe('bar');
});

test('parse self-closing tag with boolean attribute', function () {
    $result = AsChildParser::parse('<x-icon disabled />', []);

    expect($result)->not->toBeNull()
        ->and($result['tag'])->toBe('x-icon')
        ->and($result['attrs']['disabled'])->toBeNull();
});

test('parse normal tag regression', function () {
    $result = AsChildParser::parse('<div class="x">hello</div>', []);

    expect($result)->not->toBeNull()
        ->and($result['tag'])->toBe('div')
        ->and($result['attrs']['class'])->toBe('x')
        ->and($result['innerHtml'])->toBe('hello');
});

test('parse preserves mid-content html comment', function () {
    $result = AsChildParser::parse('<div><!-- legit comment --></div>', []);

    expect($result)->not->toBeNull()
        ->and($result['tag'])->toBe('div')
        ->and($result['innerHtml'])->toContain('<!-- legit comment -->');
});

test('clean strips leading and trailing comments', function () {
    $result = AsChildParser::cleanBladeComments('<!-- c --><span>hi</span><!-- c -->');

    expect($result)->toBe('<span>hi</span>');
});

test('clean strips multiple leading trailing comments', function () {
    $result = AsChildParser::cleanBladeComments('<!-- c1 --><!-- c2 --><span>hi</span><!-- c3 -->');

    expect($result)->toBe('<span>hi</span>');
});

test('clean preserves comment inside tag', function () {
    $result = AsChildParser::cleanBladeComments('<div><!-- inside --></div>');

    expect($result)->toBe('<div><!-- inside --></div>');
});

test('clean only comments returns null after parse', function () {
    $result = AsChildParser::parse('<!-- c --><!-- c2 -->', []);

    expect($result)->toBeNull();
});

test('clean strips blade conditional comment markers', function () {
    $html = '<!--[if BLOCK]><![endif]--><div><!--[if BLOCK]><![endif]-->Text<!--[if BLOCK]><![endif]--></div><!--[if ENDBLOCK]><![endif]-->';
    $result = AsChildParser::parse($html, []);

    expect($result)->not->toBeNull()
        ->and($result['tag'])->toBe('div');
});

test('parse merges class from parent', function () {
    $result = AsChildParser::parse('<span class="child-class">text</span>', ['class' => 'parent-class']);

    expect($result['attrs']['class'])->toBe('parent-class child-class');
});

test('parse merges style from parent', function () {
    $result = AsChildParser::parse('<span style="color: red">text</span>', ['style' => 'font-size: 14px']);

    expect($result['attrs']['style'])->toBe('font-size: 14px; color: red');
});

test('parse parent attrs override child on conflict', function () {
    $result = AsChildParser::parse('<span id="child-id">text</span>', ['id' => 'parent-id']);

    expect($result['attrs']['id'])->toBe('parent-id');
});

test('parse adds parent only attrs', function () {
    $result = AsChildParser::parse('<span>text</span>', ['data-slot' => 'test']);

    expect($result['attrs']['data-slot'])->toBe('test');
});

test('parse returns null for plain text', function () {
    $result = AsChildParser::parse('just plain text', []);

    expect($result)->toBeNull();
});

test('parse returns null for empty string', function () {
    $result = AsChildParser::parse('', []);

    expect($result)->toBeNull();
});

test('parse caches results', function () {
    $result1 = AsChildParser::parse('<div>cached</div>', []);
    $result2 = AsChildParser::parse('<div>cached</div>', []);

    expect($result1)->toBe($result2);
});
