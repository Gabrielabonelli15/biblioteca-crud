<?php
// update.php - Atualizar empréstimo (devolução)
$conn = new mysqli("localhost", "root", "", "biblioteca");
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
if (isset($_POST['atualizar'])) {
    $id = $_POST['id_emprestimo'];
    $data_devolucao = $_POST['data_devolucao'];
    // Regra: data de devolução não pode ser anterior à data de empréstimo
    $result = $conn->query("SELECT data_emprestimo FROM emprestimos WHERE id_emprestimo=$id");
    $row = $result->fetch_assoc();
    if ($data_devolucao < $row['data_emprestimo']) {
        echo "Data de devolução não pode ser anterior à data de empréstimo!";
        exit;
    }
    $stmt = $conn->prepare("UPDATE emprestimos SET data_devolucao=? WHERE id_emprestimo=?");
    $stmt->bind_param("si", $data_devolucao, $id);
    $stmt->execute();
}
header("Location: ../emprestimo/");
exit;
