<?php

/*** Blade extensions ***/

Blade::extend(function($view, $compiler) {
    $pattern = $compiler->createMatcher('ifSectionFilled');
    return preg_replace($pattern, '$1<?php if (array_key_exists($2, View::getSections())): ?>', $view);
});

