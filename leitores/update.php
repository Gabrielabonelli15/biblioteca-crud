<?php
require_once '../config/db.php';
$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM leitores WHERE id_leitor = ?');
$stmt->execute([$id]);
$leitor = $stmt->fetch();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $stmt = $pdo->prepare('UPDATE leitores SET nome=?, email=?, telefone=? WHERE id_leitor=?');
    $stmt->execute([$nome, $email, $telefone, $id]);
    header('Location: index.php');
    exit;
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
    Nome: <input name="nome" value="<?= $leitor['nome'] ?>" required><br>
    Email: <input name="email" type="email" value="<?= $leitor['email'] ?>" required><br>
    Telefone: <input name="telefone" value="<?= $leitor['telefone'] ?>"><br>
<button type="submit">Salvar</button>

</form>
</body>
</html>
