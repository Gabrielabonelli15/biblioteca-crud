<?php
require_once '../config/db.php';
$tipo = $_GET['tipo'] ?? 'ativos';
if ($tipo === 'ativos') {
    $sql = 'SELECT e.*, l.titulo, r.nome as leitor FROM emprestimos e JOIN livros l ON e.id_livro=l.id_livro JOIN leitores r ON e.id_leitor=r.id_leitor WHERE e.data_devolucao IS NULL';
} else {
    $sql = 'SELECT e.*, l.titulo, r.nome as leitor FROM emprestimos e JOIN livros l ON e.id_livro=l.id_livro JOIN leitores r ON e.id_leitor=r.id_leitor WHERE e.data_devolucao IS NOT NULL';
}
$stmt = $pdo->query($sql);
$emprestimos = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
<title>Empréstimos</title>
<style>
body { font-family: Arial, sans-serif; background: #f4f4f4; }
h1 { color: #333; text-align: center; }
table { margin: 20px auto; border-collapse: collapse; width: 80%; background: #fff; box-shadow: 0 2px 8px #ccc; }
th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
th { background: #007bff; color: #fff; }
tr:nth-child(even) { background: #f9f9f9; }
a { color: #007bff; text-decoration: none; margin: 0 5px; }
a:hover { text-decoration: underline; }
</style>
</head>
<body>
<h1>Empréstimos <?= $tipo === 'ativos' ? 'Ativos' : 'Concluídos' ?></h1>
<a href="create.php">Novo Empréstimo</a> |
<a href="?tipo=ativos">Ativos</a> |
<a href="?tipo=concluidos">Concluídos</a>
<table border="1">
<tr><th>ID</th><th>Livro</th><th>Leitor</th><th>Data Empréstimo</th><th>Data Devolução</th><th>Ações</th></tr>
<?php foreach ($emprestimos as $e): ?>
<tr>
<td><?= $e['id_emprestimo'] ?></td>
<td><?= $e['titulo'] ?></td>
<td><?= $e['leitor'] ?></td>
<td><?= $e['data_emprestimo'] ?></td>
<td><?= $e['data_devolucao'] ?></td>
<td>
<a href="edit.php?id=<?= $e['id_emprestimo'] ?>">Editar</a> |
<a href="delete.php?id=<?= $e['id_emprestimo'] ?>">Excluir</a>
</td>
</tr>
<?php endforeach; ?>
</table>
</body>
</html>