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
    include_once("../config.php");

    $id_autor = $_GET['id_autor'];

    $result = mysqli_query($conexao, "SELECT * FROM autores WHERE id_autor='$id_autor'");

    while($autor_data = mysqli_fetch_array($result)) {
        $nome = $autor_data['nome'];
        $nacionalidade = $autor_data['nacionalidade'];
        $ano_nascimento = $autor_data['ano_nascimento'];
    }

$conn = new mysqli("localhost", "root", "", "biblioteca");
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
if (isset($_POST['atualizar'])) {
    $id = $_POST['id_autor'];
    $nome = $_POST['nome'];
    $nacionalidade = $_POST['nacionalidade'];
    $ano = $_POST['ano_nascimento'];
    $stmt = $conn->prepare("UPDATE autores SET nome=?, nacionalidade=?, ano_nascimento=? WHERE id_autor=?");
    $stmt->bind_param("ssii", $nome, $nacionalidade, $ano, $id);
    $stmt->execute();
}
header("Location: index.php");
exit;