<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // create.php - Criar empréstimo
    $conn = new mysqli("localhost", "root", "", "biblioteca");
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }
    if (isset($_POST['criar'])) {
        $id_livro = $_POST['id_livro'];
        $id_leitor = $_POST['id_leitor'];
        $data_emprestimo = $_POST['data_emprestimo'];
        // Regra: livro só pode ser emprestado se não houver outro empréstimo ativo
        $verifica = $conn->query("SELECT * FROM emprestimos WHERE id_livro=$id_livro AND data_devolucao IS NULL");
        if ($verifica->num_rows > 0) {
            echo "Livro já está emprestado!";
            exit;
        }
        // Regra: leitor pode ter no máximo 3 empréstimos ativos
        $verifica_leitor = $conn->query("SELECT COUNT(*) as total FROM emprestimos WHERE id_leitor=$id_leitor AND data_devolucao IS NULL");
        $row = $verifica_leitor->fetch_assoc();
        if ($row['total'] >= 3) {
            echo "Leitor já possui 3 empréstimos ativos!";
            exit;
        }
        $stmt = $conn->prepare("INSERT INTO emprestimos (id_livro, id_leitor, data_emprestimo) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $id_livro, $id_leitor, $data_emprestimo);
        $stmt->execute();
    }
    header("Location: ../emprestimo/");
    exit;
    ?>
</body>
</html>
