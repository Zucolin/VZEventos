<h2>Editar Evento</h2>
<form method="post" action="<?php echo BASE_URL; ?>/eventos/edit/<?php echo $evento->id; ?>">
    <label>Nome</label>
    <input type="text" name="nome" value="<?php echo htmlspecialchars($evento->nome); ?>" required>

    <label>Descrição</label>
    <textarea name="descricao" rows="4" required><?php echo htmlspecialchars($evento->descricao); ?></textarea>

    <label>Data</label>
    <input type="date" name="data" value="<?php echo htmlspecialchars($evento->data); ?>" required>

    <label>Horário</label>
    <input type="time" name="horario" value="<?php echo htmlspecialchars($evento->horario); ?>" required>

    <label>Local</label>
    <input type="text" name="local" value="<?php echo htmlspecialchars($evento->local); ?>" required>

    <label>Máx. Participantes</label>
    <input type="number" name="max_participantes" value="<?php echo htmlspecialchars($evento->max_participantes); ?>" required>

    <button type="submit" class="btn">Atualizar</button>
</form>