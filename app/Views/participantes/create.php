<?php
ob_start();
?>

<h2>Criar Participante</h2>
<form method="post" action="<?php echo BASE_URL; ?>/participantes/create">
    <label>Nome</label>
    <input type="text" name="nome" required>
    <label>Email</label>
    <input type="email" name="email" required>
    <label>Telefone</label>
    <input type="text" name="telefone" required>
    <button type="submit">Salvar</button>
</form>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>