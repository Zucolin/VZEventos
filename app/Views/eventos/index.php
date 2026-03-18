<h2>Eventos</h2>
<!-- O botão "Novo Evento" já existe na barra de navegação. Este pode ser removido. -->
<!-- <a href="<?php echo BASE_URL; ?>/eventos/create" class="btn btn-primary">Novo Evento</a> -->
<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Data</th>
            <th>Local</th>
            <th>Capacidade</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['nome']); ?></td>
            <td><?php echo date("d/m/Y", strtotime($row['data'])); ?></td>
            <td><?php echo htmlspecialchars($row['local']); ?></td>
            <td><?php echo htmlspecialchars($row['max_participantes']); ?></td>
            <td>
                <a href="<?= BASE_URL ?>/eventos/edit/<?= $row['id'] ?>">Editar</a>
                <a href="<?= BASE_URL ?>/inscricoes/listByEvent/<?= $row['id'] ?>">Inscritos</a>
                <a href="<?= BASE_URL ?>/eventos/delete/<?= $row['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este evento?');">Excluir</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>