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
// read.php - Listar autores
$conn = new mysqli("localhost", "root", "", "biblioteca");
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
$autores = [];
$result = $conn->query("SELECT * FROM autores");
if ($result && $result->num_rows > 0) {
    while($autor = $result->fetch_assoc()) {
        $autores[] = $autor;
    }
}