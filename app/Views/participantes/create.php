<h2>Criar Participante</h2>
<form method="post" action="<?php echo BASE_URL; ?>/participantes/create">
    <label>Nome</label>
    <input type="text" name="nome" required placeholder="Nome completo do participante">
    <label>Email</label>
    <input type="email" name="email" required placeholder="exemplo@email.com">
    <label>Telefone</label>
    <input type="text" name="telefone" required placeholder="(99) 99999-9999">
    <button type="submit" class="btn">Salvar</button>
</form>