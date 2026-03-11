<?php
ob_start();
?>

<h2>Criar Inscrição</h2>
<form method="post" action="<?php echo BASE_URL; ?>/inscricoes/create">
    <label>Evento</label>
    <select name="evento_id" required>
        <?php while ($event = $stmt_eventos->fetch(PDO::FETCH_ASSOC)): ?>
            <option value="<?php echo $event['id']; ?>"><?php echo htmlspecialchars($event['nome']); ?></option>
        <?php endwhile; ?>
    </select>

    <label>Participante</label>
    <select name="participante_id" required>
        <?php while ($part = $stmt_participantes->fetch(PDO::FETCH_ASSOC)): ?>
            <option value="<?php echo $part['id']; ?>"><?php echo htmlspecialchars($part['nome']); ?></option>
        <?php endwhile; ?>
    </select>

    <button type="submit">Salvar inscrição</button>
</form>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>