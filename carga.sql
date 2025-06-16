USE ecoescambo;

--Inserir usuários
INSERT INTO usuarios (nome, email, senha) VALUES
('Marcio Belo', 'mbelo@teste.com.br', '$2y$10$0c736RA9Xxs0Tob/Zjxua.2v.Qw/gE713i.0bTNfG.8aVipQNIyMa'),
('Jamile Silva', 'jamile@teste.com.br', '$2y$10$aWbYpAzk8SgrFfz1VIMMIeIw4.6So8vGRqgzx1KbmCQy2TaqW6F9C');

--Inserir produtos para Marcio Belo (id 1)
INSERT INTO produtos (nome, descricao, usuario_id) VALUES
('Livro A', 'Livro em ótimo estado', 1),
('Bola de Futebol', 'Bola oficial usada poucas vezes', 1),
('Violão', 'Violão seminovo, pouco usado', 1),
('Jaqueta Jeans', 'Jaqueta jeans tamanho M', 1),
('Tênis Nike', 'Tênis bem usado, número 39', 1);

-- Inserir produtos para Jamile Silva (id 2)
INSERT INTO produtos (nome, descricao, usuario_id) VALUES
('Cordão', 'Acessório usado', 2),
('Mochila', 'Mochila resistente usada', 2),
('Fone de Ouvido', 'Fone bluetooth funcionando', 2),
('Teclado USB', 'Teclado novo na caixa', 2),
('Livro B', 'Livro bem conservado', 2);
