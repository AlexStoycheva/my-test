<section class="hero">
    <h1>Welcome to <?= e(SITE_NAME) ?></h1>
    <p><?= e(SITE_TAGLINE) ?>. If you can read this, PHP is working.</p>
    <a class="button" href="index.php?page=contact">Get in touch</a>
</section>

<section class="cards">
    <article class="card">
        <h2>Server time</h2>
        <p><?= e(date('l, j F Y · H:i:s')) ?></p>
    </article>
    <article class="card">
        <h2>PHP version</h2>
        <p><?= e(PHP_VERSION) ?></p>
    </article>
    <article class="card">
        <h2>Your visits</h2>
        <?php $_SESSION['visits'] = ($_SESSION['visits'] ?? 0) + 1; ?>
        <p>You've loaded the home page <?= (int) $_SESSION['visits'] ?> time(s) this session.</p>
    </article>
</section>
