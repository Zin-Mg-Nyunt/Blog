<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<link rel="stylesheet" href="css/style.css">
<body>
    <?php foreach ($blogs as $blog): ?>
    <?= $blog;?>
    <?php endforeach; ?>
</body>
</html>