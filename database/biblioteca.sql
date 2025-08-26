CREATE TABLE autores (
    id_autor INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    nacionalidade VARCHAR(50),
    ano_nascimento INT
);

CREATE TABLE livros (
    id_livro INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    genero VARCHAR(50),
    ano_publicacao INT,
    id_autor INT NOT NULL,
    FOREIGN KEY (id_autor) REFERENCES autores(id_autor)
);

CREATE TABLE leitores (
    id_leitor INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE,
    telefone VARCHAR(15)
);

CREATE TABLE emprestimos (
    id_emprestimo INT AUTO_INCREMENT PRIMARY KEY,
    id_livro INT NOT NULL,
    id_leitor INT NOT NULL,
    data_emprestimo DATE NOT NULL,
    data_devolucao DATE,
    FOREIGN KEY (id_livro) REFERENCES livros(id_livro),
    FOREIGN KEY (id_leitor) REFERENCES leitores(id_leitor)
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
