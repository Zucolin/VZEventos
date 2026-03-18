<?php
// app/views/layout/header.php
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VZ Eventos - Gestão Futurista</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/style.css">
</head>
<body>

<nav class="navbar">
    <div class="nav-logo">
        <a href="<?= BASE_URL ?>/eventos">VZ Eventos</a>
    </div>
    <div class="nav-links">
        <a href="<?= BASE_URL ?>/eventos">Eventos</a>
        <a href="<?= BASE_URL ?>/participantes">Participantes</a>
        <a href="<?= BASE_URL ?>/inscricoes">Inscrições</a>
    </div>
    <a href="<?= BASE_URL ?>/eventos/create" class="btn">Novo Evento</a>
</nav>

<!-- O container principal que envolve o conteúdo de cada página -->
<main class="container">