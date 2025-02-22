<?php
require_once("seguranca.php");
verificarAutenticacao();
require_once("conexao.php");

$query = "SELECT * FROM usuarios";
$resultado = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Visitante</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Lista de Usuários</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Perfil</th>
        </tr>
        <?php while ($usuario = mysqli_fetch_assoc($resultado)) { ?>
        <tr>
            <td><?php echo $usuario['id']; ?></td>
            <td><?php echo $usuario['nome']; ?></td>
            <td><?php echo $usuario['email']; ?></td>
            <td><?php echo $usuario['perfil'] == 1 ? 'Admin' : 'Visitante'; ?></td>
        </tr>
        <?php } ?>
    </table>
    <a href="sair.php">Sair</a>
</body>
</html>
