<?php
 require('config.php');
 $info = [];
 $id = filter_input(INPUT_GET, 'id');

 if($id) {
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount()>0) {
            $info = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location: index.php");
        exit();
    }

     
 } else {
    header("Location: index.php");
    exit();
 }

?>

<form action="editar_action.php" method="POST">
    <input type="hidden" name="id" value="<?=$info['id'];?>">

<div>
    <label for="">Nome:</label>
    <input type="text" name="nome" value="<?=$info['nome'];?>">
</div>

<div>
    <label for="">Email:</label>
    <input type="email" name="email" value="<?=$info['email']?>">
</div>

<div>
    <input type="submit" value="Editar">
</div>
</form>