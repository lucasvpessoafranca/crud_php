<?php
require('./config.php');
$lista = [];
$sql =  $pdo->query("SELECT * FROM usuarios");

if ($sql->rowCount() > 0) {
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>


<a href="adicionar.php">Adicionar usuário</a>
<hr>

<table border="1" width="100%">

    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>ACTION</th>
    </tr>

    <?php
    if ($sql->rowCount() > 0) {
        foreach ($lista as $usuario) : ?>
        <tr>
            <td><?php echo $usuario['id']?></td>
            <td><?php echo $usuario['nome']?></td>
            <td><?php echo $usuario['email']?></td>
            <td>
                
<a href="editar.php?id=<?php echo $usuario['id']; ?>">[ Editar ]</a>
<a onclick="return confirm('Confirme a exclusão')"  href="deletar.php?id=<?php echo $usuario['id']; ?>">[ Excluir ]</a>
            </td>
        </tr>
    <?php endforeach;
    }
    ?>
</table>