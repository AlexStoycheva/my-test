<?php
// Site-wide settings
declare(strict_types=1);

const SITE_NAME = 'My Test Site';
const SITE_TAGLINE = 'A small PHP test website';

// Navigation: slug => label
const NAV_ITEMS = [
    'home'    => 'Home',
    'about'   => 'About',
    'contact' => 'Contact',
];

/** Escape output for safe HTML rendering. */
function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}
