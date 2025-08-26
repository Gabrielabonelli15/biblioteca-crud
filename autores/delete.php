<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php
// delete.php - Excluir autor
$conn = new mysqli("localhost", "root", "", "biblioteca");
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
if (isset($_GET['id_autor'])) {
    $id = $_GET['id_autor'];
    $stmt = $conn->prepare("DELETE FROM autores WHERE id_autor=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}
header("Location: index.php");
exit;
?>