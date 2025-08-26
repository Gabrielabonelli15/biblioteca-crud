<?php
// delete.php - Excluir empréstimo
$conn = new mysqli("localhost", "root", "", "biblioteca");
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
if (isset($_GET['id_emprestimo'])) {
    $id = $_GET['id_emprestimo'];
    $stmt = $conn->prepare("DELETE FROM emprestimos WHERE id_emprestimo=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}
header("Location: ../emprestimo/");
exit;
