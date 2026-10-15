<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e(config('app_name')) ?></title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<header>
    <div class="container">
        <a class="brand" href="/tasks"><?= e(config('app_name')) ?></a>
    </div>
</header>
<main class="container">
    <?= $content ?>
</main>
</body>
</html>