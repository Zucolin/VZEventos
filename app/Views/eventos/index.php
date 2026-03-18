<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--spacing-lg);">
    <h1>Eventos</h1>
    <!-- O botão "Novo Evento" já existe na barra de navegação. -->
</div>

<div class="table-wrapper">
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
                <td data-label="Nome"><?php echo htmlspecialchars($row['nome']); ?></td>
                <td data-label="Data"><?php echo date("d/m/Y", strtotime($row['data'])); ?></td>
                <td data-label="Local"><?php echo htmlspecialchars($row['local']); ?></td>
                <td data-label="Capacidade"><?php echo htmlspecialchars($row['max_participantes']); ?></td>
                <td data-label="Ações" class="actions">
                    <a href="<?= BASE_URL ?>/eventos/edit/<?= $row['id'] ?>" class="edit">Editar</a>
                    <a href="<?= BASE_URL ?>/inscricoes/listByEvent/<?= $row['id'] ?>" class="info">Inscritos</a>
                    <a href="<?= BASE_URL ?>/eventos/delete/<?= $row['id'] ?>" class="delete" onclick="return confirm('Tem certeza que deseja excluir este evento?');">Excluir</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>