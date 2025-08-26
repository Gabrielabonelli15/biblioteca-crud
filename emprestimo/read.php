<?php
// read.php - Listar empréstimos
$conn = new mysqli("localhost", "root", "", "biblioteca");
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
$emprestimos_ativos = [];
$emprestimos_concluidos = [];
// Ativos
$result = $conn->query("SELECT * FROM emprestimos WHERE data_devolucao IS NULL");
if ($result && $result->num_rows > 0) {
    while($emp = $result->fetch_assoc()) {
        $emprestimos_ativos[] = $emp;
    }
}
// Concluídos
$result2 = $conn->query("SELECT * FROM emprestimos WHERE data_devolucao IS NOT NULL");
if ($result2 && $result2->num_rows > 0) {
    while($emp = $result2->fetch_assoc()) {
        $emprestimos_concluidos[] = $emp;
    }
}
