<?php
require_once '../config/db.php';
$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM livros WHERE id_livro = ?');
$stmt->execute([$id]);
$livro = $stmt->fetch();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $genero = $_POST['genero'];
    $ano = $_POST['ano_publicacao'];
    $id_autor = $_POST['id_autor'];
    $ano_atual = date('Y');
    if ($ano > 1500 && $ano <= $ano_atual) {
        $stmt = $pdo->prepare('UPDATE livros SET titulo=?, genero=?, ano_publicacao=?, id_autor=? WHERE id_livro=?');
        $stmt->execute([$titulo, $genero, $ano, $id_autor, $id]);
        header('Location: index.php');
        exit;
    } else {
        echo "Ano de publicação inválido.";
    }
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
    Título: <input name="titulo" value="<?= $livro['titulo'] ?>" required><br>
    Gênero: <input name="genero" value="<?= $livro['genero'] ?>"><br>
    Ano de publicação: <input name="ano_publicacao" type="number" value="<?= $livro['ano_publicacao'] ?>" required><br>
    Autor (ID): <input name="id_autor" type="number" value="<?= $livro['id_autor'] ?>" required><br>
<button type="submit">Salvar</button>

</form>
</body>
</html>