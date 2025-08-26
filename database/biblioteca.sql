CREATE TABLE autores (
    id_autor INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    nacionalidade VARCHAR(100),
    ano_nascimento YEAR CHECK (ano_nascimento <= YEAR(CURDATE()))
);

CREATE TABLE livros (
    id_livro INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    genero VARCHAR(100),
    ano_publicacao YEAR CHECK (ano_publicacao > 1500 AND ano_publicacao <= YEAR(CURDATE())),
    id_autor INT,
    FOREIGN KEY (id_autor) REFERENCES autores(id_autor)
);

CREATE TABLE leitores (
    id_leitor INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    telefone VARCHAR(15)
);

CREATE TABLE emprestimos (
    id_emprestimo INT AUTO_INCREMENT PRIMARY KEY,
    id_livro INT,
    id_leitor INT,
    data_emprestimo DATE NOT NULL,
    data_devolucao DATE,
    FOREIGN KEY (id_livro) REFERENCES livros(id_livro),
    FOREIGN KEY (id_leitor) REFERENCES leitores(id_leitor),
    CHECK (data_devolucao IS NULL OR data_devolucao >= data_emprestimo
);

INSERT INTO autores (nome, nacionalidade, ano_nascimento) VALUES
('Autor 1', 'Nacionalidade 1', 1980),
('Autor 2', 'Nacionalidade 2', 1975);

INSERT INTO livros (titulo, genero, ano_publicacao, id_autor) VALUES
('Livro 1', 'Ficção', 2020, 1),
('Livro 2', 'Não-ficção', 2018, 2);

INSERT INTO leitores (nome, email, telefone) VALUES
('Leitor 1', 'leitor1@example.com', '123456789'),
('Leitor 2', 'leitor2@example.com', '987654321');

INSERT INTO emprestimos (id_livro, id_leitor, data_emprestimo, data_devolucao) VALUES
(1, 1, '2023-01-01', NULL),
(2, 2, '2023-02-01', '2023-02-15');