<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--spacing-lg);">
    <h1>Participantes</h1>
    <a href="<?php echo BASE_URL; ?>/participantes/create" class="btn">Novo Participante</a>
</div>

<div class="table-wrapper">
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
                <td data-label="Nome"><?php echo htmlspecialchars($row['nome']); ?></td>
                <td data-label="Email"><?php echo htmlspecialchars($row['email']); ?></td>
                <td data-label="Telefone"><?php echo htmlspecialchars($row['telefone']); ?></td>
                <td data-label="Ações" class="actions">
                    <a href="<?= BASE_URL ?>/participantes/edit/<?= $row['id'] ?>" class="edit">Editar</a>
                    <a href="<?= BASE_URL ?>/participantes/delete/<?= $row['id'] ?>" class="delete" onclick="return confirm('Tem certeza que deseja excluir este participante?');">Excluir</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>