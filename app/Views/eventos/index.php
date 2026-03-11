<?php
ob_start();
?>

<h2>Eventos</h2>
<a href="<?php echo BASE_URL; ?>/eventos/create" class="btn">Novo Evento</a>
<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Data</th>
            <th>Local</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?php echo $row['nome']; ?></td>
            <td><?php echo date("d/m/Y", strtotime($row['data'])); ?></td>
            <td><?php echo $row['local']; ?></td>
            <td>
                <a href="<?php echo BASE_URL; ?>/eventos/edit/<?php echo $row['id']; ?>">Editar</a>
                <a href="<?php echo BASE_URL; ?>/eventos/delete/<?php echo $row['id']; ?>">Excluir</a>
                <a href="<?php echo BASE_URL; ?>/inscricoes/listByEvent/<?php echo $row['id']; ?>">Ver Inscritos</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>