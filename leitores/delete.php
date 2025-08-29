<?php
require_once '../config/db.php';
$id = $_GET['id'];
$stmt = $pdo->prepare('DELETE FROM leitores WHERE id_leitor = ?');
$stmt->execute([$id]);
header('Location: index.php');
exit;
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>