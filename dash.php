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
    <title>Painel Administrativo</title>
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
            <th>Ações</th>
        </tr>
        <?php while ($usuario = mysqli_fetch_assoc($resultado)) { ?>
        <tr>
            <td><?php echo $usuario['id']; ?></td>
            <td><?php echo $usuario['nome']; ?></td>
            <td><?php echo $usuario['email']; ?></td>
            <td><?php echo $usuario['perfil'] == 1 ? 'Admin' : 'Visitante'; ?></td>
            <td>
                <a href="acao_usuario.php?id=<?php echo $usuario['id']; ?>">Editar</a>
                <form action="acao_usuario.php" method="POST" style="display: inline-block;">
                    <input type="hidden" name="delete_id" value="<?php echo $usuario['id']; ?>">
                    <button type="submit" style="background: none; border: none; color: red; cursor: pointer;">Deletar</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
    <a href="sair.php">Sair</a>
</body>
</html>
