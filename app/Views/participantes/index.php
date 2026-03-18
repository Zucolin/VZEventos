<h2>Participantes</h2>
<a href="<?php echo BASE_URL; ?>/participantes/create" class="btn">Novo Participante</a>
<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['nome']); ?></td>
            <td><?php echo htmlspecialchars($row['email']); ?></td>
            <td><?php echo htmlspecialchars($row['telefone']); ?></td>
            <td>
                <a href="<?= BASE_URL ?>/participantes/edit/<?= $row['id'] ?>">Editar</a>
                <a href="<?= BASE_URL ?>/participantes/delete/<?= $row['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este participante?');">Excluir</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>