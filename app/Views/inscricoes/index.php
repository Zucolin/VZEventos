    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--spacing-lg);">
        <h1>Inscrições</h1>
        <a href="<?php echo BASE_URL; ?>/inscricoes/create" class="btn">Nova Inscrição</a>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Evento</th>
                    <th>Participante</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td data-label="Evento"><?php echo htmlspecialchars($row['evento']); ?></td>
                    <td data-label="Participante"><?php echo htmlspecialchars($row['participante']); ?></td>
                    <td data-label="Ações" class="actions">
                        <a href="<?php echo BASE_URL; ?>/inscricoes/delete/<?php echo $row['id']; ?>" class="delete">Cancelar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
