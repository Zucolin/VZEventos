<h2>Inscritos no Evento</h2>
<a href="<?php echo BASE_URL; ?>/eventos">Voltar aos eventos</a>
<div class="table-wrapper">
<table>
    <thead>
        <tr>
            <th>Participante</th>
            <th>Email</th>
            <th>Telefone</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['nome']); ?></td>
            <td><?php echo htmlspecialchars($row['email']); ?></td>
            <td><?php echo htmlspecialchars($row['telefone']); ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
</div>