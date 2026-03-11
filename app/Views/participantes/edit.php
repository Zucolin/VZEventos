<?php
ob_start();
?>

<h2>Editar Participante</h2>
<form method="post" action="<?php echo BASE_URL; ?>/participantes/edit/<?php echo $participante->id; ?>">
    <label>Nome</label>
    <input type="text" name="nome" value="<?php echo htmlspecialchars($participante->nome); ?>" required>
    <label>Email</label>
    <input type="email" name="email" value="<?php echo htmlspecialchars($participante->email); ?>" required>
    <label>Telefone</label>
    <input type="text" name="telefone" value="<?php echo htmlspecialchars($participante->telefone); ?>" required>
    <button type="submit">Atualizar</button>
</form>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>