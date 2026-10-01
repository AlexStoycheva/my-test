# My Test Site

A minimal, dependency-free PHP test website.

## Run it locally

Requires PHP 8.0+ (`php -v` to check; on macOS: `brew install php`).

```bash
php -S localhost:8000
```

Then open http://localhost:8000.

## Structure

```
index.php          Front controller / router (?page=home|about|contact)
config.php         Site settings, nav items, e() escaping helper
includes/          Shared header and footer
pages/             One file per page
assets/css/        Stylesheet (light + dark mode)
storage/           Contact form log (created on first submit, git-ignored)
```

## Add a page

1. Create `pages/services.php`.
2. Add `'services' => 'Services'` to `NAV_ITEMS` in `config.php`.
