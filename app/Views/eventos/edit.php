<h2>Editar Evento</h2>
<form method="post" action="<?php echo BASE_URL; ?>/eventos/edit/<?php echo $evento->id; ?>">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($evento->nome); ?>" required>
    </div>

    <div class="form-group">
        <label for="descricao">Descrição</label>
        <textarea id="descricao" name="descricao" rows="4" required><?php echo htmlspecialchars($evento->descricao); ?></textarea>
    </div>

    <div class="form-group">
        <label for="data">Data</label>
        <input type="date" id="data" name="data" value="<?php echo htmlspecialchars($evento->data); ?>" required>
    </div>

    <div class="form-group">
        <label for="horario">Horário</label>
        <input type="time" id="horario" name="horario" value="<?php echo htmlspecialchars($evento->horario); ?>" required>
    </div>

    <div class="form-group">
        <label for="local">Local</label>
        <input type="text" id="local" name="local" value="<?php echo htmlspecialchars($evento->local); ?>" required>
    </div>

    <div class="form-group">
        <label for="max_participantes">Máx. Participantes</label>
        <input type="number" id="max_participantes" name="max_participantes" value="<?php echo htmlspecialchars($evento->max_participantes); ?>" required>
    </div>

    <button type="submit" class="btn">Atualizar</button>
</form>