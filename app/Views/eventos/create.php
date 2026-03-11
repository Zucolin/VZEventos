<?php
ob_start();
?>

<h2>Criar Evento</h2>
<form method="post" action="<?php echo BASE_URL; ?>/eventos/create">
    <label>Nome</label>
    <input type="text" name="nome" required>

    <label>Descrição</label>
    <textarea name="descricao" required></textarea>

    <label>Data</label>
    <input type="date" name="data" required>

    <label>Horário</label>
    <input type="time" name="horario" required>

    <label>Local</label>
    <input type="text" name="local" required>

    <label>Máx. Participantes</label>
    <input type="number" name="max_participantes" required>

    <button type="submit">Salvar</button>
</form>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>