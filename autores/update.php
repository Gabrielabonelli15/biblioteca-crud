
<?php
require_once '../config/db.php';
$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM autores WHERE id_autor = ?');
$stmt->execute([$id]);
$autor = $stmt->fetch();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $nacionalidade = $_POST['nacionalidade'];
    $ano = $_POST['ano_nascimento'];
    $stmt = $pdo->prepare('UPDATE autores SET nome=?, nacionalidade=?, ano_nascimento=? WHERE id_autor=?');
    $stmt->execute([$nome, $nacionalidade, $ano, $id]);
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
Nome: <input name="nome" value="<?= $autor['nome'] ?>" required><br>
Nacionalidade: <input name="nacionalidade" value="<?= $autor['nacionalidade'] ?>"><br>
Ano de nascimento: <input name="ano_nascimento" type="number" value="<?= $autor['ano_nascimento'] ?>"><br>
<button type="submit">Salvar</button>
</form>
</body>
</html>