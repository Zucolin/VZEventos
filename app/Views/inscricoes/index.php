<?php
ob_start();
?>

<h2>Inscrições</h2>
<a href="<?php echo BASE_URL; ?>/inscricoes/create" class="btn">Nova Inscrição</a>
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
            <td><?php echo $row['evento_nome']; ?></td>
            <td><?php echo $row['participante_nome']; ?></td>
            <td>
                <a href="<?php echo BASE_URL; ?>/inscricoes/delete/<?php echo $row['id']; ?>">Cancelar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>