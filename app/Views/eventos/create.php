<h2>Criar Evento</h2>
<form method="post" action="<?php echo BASE_URL; ?>/eventos/create">
    <label>Nome</label>
    <input type="text" name="nome" required placeholder="Nome do Evento">

    <label>Descrição</label>
    <textarea name="descricao" rows="4" required placeholder="Descreva os detalhes do evento..."></textarea>

    <label>Data</label>
    <input type="date" name="data" required>

    <label>Horário</label>
    <input type="time" name="horario" required>

    <label>Local</label>
    <input type="text" name="local" required placeholder="Endereço ou link do evento">

    <label>Máx. Participantes</label>
    <input type="number" name="max_participantes" required placeholder="Ex: 100">

    <button type="submit" class="btn">Salvar</button>
</form>