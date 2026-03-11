<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <title>VZ Eventos</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1><a href="<?php echo BASE_URL; ?>/eventos">VZ Eventos</a></h1>
            <nav>
                <ul>
                    <li><a href="<?php echo BASE_URL; ?>/eventos">Eventos</a></li>
                    <li><a href="<?php echo BASE_URL; ?>/participantes">Participantes</a></li>
                    <li><a href="<?php echo BASE_URL; ?>/inscricoes">Inscrições</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="container">
            <?php echo $content; ?>
        </div>
    </main>
    <footer>
        <div class="container">
        </div>
    </footer>
</body>
</html>