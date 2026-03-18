<h2>Editar Participante</h2>
<form method="post" action="<?php echo BASE_URL; ?>/participantes/edit/<?php echo $participante->id; ?>">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($participante->nome); ?>" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($participante->email); ?>" required>
    </div>

    <div class="form-group">
        <label for="telefone">Telefone</label>
        <input type="text" id="telefone" name="telefone" value="<?php echo htmlspecialchars($participante->telefone); ?>" required>
    </div>

    <button type="submit" class="btn">Atualizar</button>
</form>