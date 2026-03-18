<h2>Criar Evento</h2>
<form method="post" action="<?php echo BASE_URL; ?>/eventos/create">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" required placeholder="Nome do Evento">
    </div>

    <div class="form-group">
        <label for="descricao">Descrição</label>
        <textarea id="descricao" name="descricao" rows="4" required placeholder="Descreva os detalhes do evento..."></textarea>
    </div>

    <div class="form-group">
        <label for="data">Data</label>
        <input type="date" id="data" name="data" required>
    </div>

    <div class="form-group">
        <label for="horario">Horário</label>
        <input type="time" id="horario" name="horario" required>
    </div>

    <div class="form-group">
        <label for="local">Local</label>
        <input type="text" id="local" name="local" required placeholder="Endereço ou link do evento">
    </div>

    <div class="form-group">
        <label for="max_participantes">Máx. Participantes</label>
        <input type="number" id="max_participantes" name="max_participantes" required placeholder="Ex: 100">
    </div>

    <button type="submit" class="btn">Salvar</button>
</form>