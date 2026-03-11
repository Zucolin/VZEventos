<?php
ob_start();
?>

<h2>Inscritos no Evento</h2>
<a href="<?php echo BASE_URL; ?>/eventos">Voltar aos eventos</a>
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
            <td><?php echo htmlspecialchars($row['participante_nome']); ?></td>
            <td><?php echo htmlspecialchars($row['participante_email']); ?></td>
            <td><?php echo htmlspecialchars($row['participante_telefone']); ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>