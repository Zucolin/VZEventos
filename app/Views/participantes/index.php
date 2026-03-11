<?php
ob_start();
?>

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
            <td><?php echo $row['nome']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['telefone']; ?></td>
            <td>
                <a href="<?php echo BASE_URL; ?>/participantes/edit/<?php echo $row['id']; ?>">Editar</a>
                <a href="<?php echo BASE_URL; ?>/participantes/delete/<?php echo $row['id']; ?>">Excluir</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>