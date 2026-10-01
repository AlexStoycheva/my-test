<?php
// CSRF token for the form
$_SESSION['csrf'] ??= bin2hex(random_bytes(16));

$errors = [];
$sent = false;
$values = ['name' => '', 'email' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($values as $key => $_) {
        $values[$key] = trim((string) ($_POST[$key] ?? ''));
    }

    if (!hash_equals($_SESSION['csrf'], (string) ($_POST['csrf'] ?? ''))) {
        $errors[] = 'Your session expired. Please try again.';
    }
    if ($values['name'] === '') {
        $errors[] = 'Please enter your name.';
    }
    if (!filter_var($values['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }
    if (mb_strlen($values['message']) < 10) {
        $errors[] = 'Your message should be at least 10 characters.';
    }

    if (!$errors) {
        // Test site: append to a local log instead of sending email.
        $line = sprintf("[%s] %s <%s>: %s\n", date('c'), $values['name'], $values['email'],
            str_replace(["\r", "\n"], ' ', $values['message']));
        @mkdir(__DIR__ . '/../storage', 0775, true);
        file_put_contents(__DIR__ . '/../storage/messages.log', $line, FILE_APPEND | LOCK_EX);

        $sent = true;
        $values = ['name' => '', 'email' => '', 'message' => ''];
    }
}
?>
<section class="prose">
    <h1>Contact</h1>

    <?php if ($sent): ?>
        <div class="alert success">Thanks! Your message was saved to <code>storage/messages.log</code>.</div>
    <?php endif; ?>

    <?php if ($errors): ?>
        <div class="alert error">
            <ul><?php foreach ($errors as $err): ?><li><?= e($err) ?></li><?php endforeach; ?></ul>
        </div>
    <?php endif; ?>

    <form method="post" action="index.php?page=contact" class="form">
        <input type="hidden" name="csrf" value="<?= e($_SESSION['csrf']) ?>">
        <label>Name
            <input type="text" name="name" value="<?= e($values['name']) ?>" required>
        </label>
        <label>Email
            <input type="email" name="email" value="<?= e($values['email']) ?>" required>
        </label>
        <label>Message
            <textarea name="message" rows="5" required><?= e($values['message']) ?></textarea>
        </label>
        <button class="button" type="submit">Send</button>
    </form>
</section>
