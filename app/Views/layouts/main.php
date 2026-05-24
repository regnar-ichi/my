<?php
$content = $content ?? '';
$title = $title ?? 'My';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/app.css">
    <title><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></title>
</head>
<body>
<div class="page">
    <header class="page-header">
        <a class="brand" href="/">My</a>
        <span class="tagline">Internal sandbox tools</span>
    </header>

    <main class="app-main">
        <?= $content ?>
    </main>
</div>
</body>
</html>
