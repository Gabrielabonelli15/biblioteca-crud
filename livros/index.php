<?php
// Listar livros
include 'read.php';
$livros = isset($livros) ? $livros : [];
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Livros</title>
</head>
<body>
    <h1>Livros</h1>
    <form method="post" action="create.php">
        <input type="text" name="titulo" placeholder="Título" required>
        <input type="text" name="genero" placeholder="Gênero">
        <input type="number" name="ano_publicacao" placeholder="Ano de publicação" min="1501" max="2025" required>
        <input type="number" name="id_autor" placeholder="ID Autor" required>
        <button type="submit" name="criar">Criar</button>
    </form>
    <form method="get" style="margin-top:10px;">
        <input type="text" name="filtro_genero" placeholder="Filtrar por gênero">
        <input type="number" name="filtro_autor" placeholder="Filtrar por autor (ID)">
        <input type="number" name="filtro_ano" placeholder="Filtrar por ano">
        <button type="submit">Filtrar</button>
    </form>
    <table border="1">
        <tr>
            <th>ID</th><th>Título</th><th>Gênero</th><th>Ano Publicação</th><th>ID Autor</th><th>Ações</th>
        </tr>
        <?php if ($livros && count($livros) > 0): ?>
            <?php foreach($livros as $livro): ?>
                <tr>
                    <form method="post" action="update.php">
                        <td><?= $livro['id_livro'] ?></td>
                        <td><input type="text" name="titulo" value="<?= $livro['titulo'] ?>"></td>
                        <td><input type="text" name="genero" value="<?= $livro['genero'] ?>"></td>
                        <td><input type="number" name="ano_publicacao" value="<?= $livro['ano_publicacao'] ?>" min="1501" max="2025"></td>
                        <td><input type="number" name="id_autor" value="<?= $livro['id_autor'] ?>"></td>
                        <td>
                            <input type="hidden" name="id_livro" value="<?= $livro['id_livro'] ?>">
                            <button type="submit" name="atualizar">Atualizar</button>
                            <a href="delete.php?id_livro=<?= $livro['id_livro'] ?>" onclick="return confirm('Excluir?')">Excluir</a>
                        </td>
                    </form>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="6">Nenhum livro cadastrado.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>
