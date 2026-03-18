    <h1>Criar Inscrição</h1>
    <form method="post" action="<?php echo BASE_URL; ?>/inscricoes/create">
        <div class="form-group">
            <label for="evento_id">Evento</label>
            <select name="evento_id" id="evento_id" required>
                <option value="" disabled selected>Selecione um evento...</option>
                <?php while ($event = $stmt_eventos->fetch(PDO::FETCH_ASSOC)): ?>
                    <option value="<?php echo $event['id']; ?>"><?php echo htmlspecialchars($event['nome']); ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="participante_id">Participante</label>
            <select name="participante_id" id="participante_id" required>
                <option value="" disabled selected>Selecione um participante...</option>
                <?php while ($part = $stmt_participantes->fetch(PDO::FETCH_ASSOC)): ?>
                    <option value="<?php echo $part['id']; ?>"><?php echo htmlspecialchars($part['nome']); ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <button type="submit" class="btn">Salvar Inscrição</button>
    </form>