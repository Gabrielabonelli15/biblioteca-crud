<?php
require_once '../config/db.php';
$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM emprestimos WHERE id_emprestimo = ?');
$stmt->execute([$id]);
$emp = $stmt->fetch();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data_devolucao = $_POST['data_devolucao'];
    if ($data_devolucao < $emp['data_emprestimo']) {
        echo 'Data de devolução não pode ser anterior à data de empréstimo!';
        exit;
    }
    $stmt = $pdo->prepare('UPDATE emprestimos SET data_devolucao=? WHERE id_emprestimo=?');
    $stmt->execute([$data_devolucao, $id]);
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
    Data de devolução: <input name="data_devolucao" type="date" value="<?= $emp['data_devolucao'] ?>" required><br>
<button type="submit">Salvar</button>

</form>
</body>
</html>

