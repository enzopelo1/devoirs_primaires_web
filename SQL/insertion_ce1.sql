-- Crée 10 utilisateurs enfants en CE1
INSERT INTO users (username, password, role, class) VALUES
('alice_ce1', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CE1'),
('benjamin_ce1', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CE1'),
('chloe_ce1', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CE1'),
('david_ce1', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CE1'),
('emma_ce1', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CE1'),
('florian_ce1', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CE1'),
('gabrielle_ce1', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CE1'),
('hugo_ce1', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CE1'),
('isabelle_ce1', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CE1'),
('julien_ce1', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CE1');

-- Crée des résultats d'exercices pour chaque utilisateur
INSERT INTO exercise_results (user_id, exercise_type, score, date) VALUES
((SELECT id FROM users WHERE username = 'alice_ce1'), 'addition', 8, '2025-03-01'),
((SELECT id FROM users WHERE username = 'alice_ce1'), 'soustraction', 9, '2025-03-02'),
((SELECT id FROM users WHERE username = 'alice_ce1'), 'multiplication', 7, '2025-03-03'),
((SELECT id FROM users WHERE username = 'alice_ce1'), 'dictee', 8, '2025-03-04'),
((SELECT id FROM users WHERE username = 'alice_ce1'), 'conjugaison_phrase', 9, '2025-03-05'),
((SELECT id FROM users WHERE username = 'alice_ce1'), 'conjugaison_verbe', 8, '2025-03-06'),

((SELECT id FROM users WHERE username = 'benjamin_ce1'), 'addition', 7, '2025-03-01'),
((SELECT id FROM users WHERE username = 'benjamin_ce1'), 'soustraction', 8, '2025-03-02'),
((SELECT id FROM users WHERE username = 'benjamin_ce1'), 'multiplication', 6, '2025-03-03'),
((SELECT id FROM users WHERE username = 'benjamin_ce1'), 'dictee', 7, '2025-03-04'),
((SELECT id FROM users WHERE username = 'benjamin_ce1'), 'conjugaison_phrase', 8, '2025-03-05'),
((SELECT id FROM users WHERE username = 'benjamin_ce1'), 'conjugaison_verbe', 7, '2025-03-06'),

((SELECT id FROM users WHERE username = 'chloe_ce1'), 'addition', 8, '2025-03-01'),
((SELECT id FROM users WHERE username = 'chloe_ce1'), 'soustraction', 9, '2025-03-02'),
((SELECT id FROM users WHERE username = 'chloe_ce1'), 'multiplication', 7, '2025-03-03'),
((SELECT id FROM users WHERE username = 'chloe_ce1'), 'dictee', 8, '2025-03-04'),
((SELECT id FROM users WHERE username = 'chloe_ce1'), 'conjugaison_phrase', 9, '2025-03-05'),
((SELECT id FROM users WHERE username = 'chloe_ce1'), 'conjugaison_verbe', 8, '2025-03-06'),

((SELECT id FROM users WHERE username = 'david_ce1'), 'addition', 7, '2025-03-01'),
((SELECT id FROM users WHERE username = 'david_ce1'), 'soustraction', 8, '2025-03-02'),
((SELECT id FROM users WHERE username = 'david_ce1'), 'multiplication', 6, '2025-03-03'),
((SELECT id FROM users WHERE username = 'david_ce1'), 'dictee', 7, '2025-03-04'),
((SELECT id FROM users WHERE username = 'david_ce1'), 'conjugaison_phrase', 8, '2025-03-05'),
((SELECT id FROM users WHERE username = 'david_ce1'), 'conjugaison_verbe', 7, '2025-03-06'),

((SELECT id FROM users WHERE username = 'emma_ce1'), 'addition', 8, '2025-03-01'),
((SELECT id FROM users WHERE username = 'emma_ce1'), 'soustraction', 9, '2025-03-02'),
((SELECT id FROM users WHERE username = 'emma_ce1'), 'multiplication', 7, '2025-03-03'),
((SELECT id FROM users WHERE username = 'emma_ce1'), 'dictee', 8, '2025-03-04'),
((SELECT id FROM users WHERE username = 'emma_ce1'), 'conjugaison_phrase', 9, '2025-03-05'),
((SELECT id FROM users WHERE username = 'emma_ce1'), 'conjugaison_verbe', 8, '2025-03-06'),

((SELECT id FROM users WHERE username = 'florian_ce1'), 'addition', 7, '2025-03-01'),
((SELECT id FROM users WHERE username = 'florian_ce1'), 'soustraction', 8, '2025-03-02'),
((SELECT id FROM users WHERE username = 'florian_ce1'), 'multiplication', 6, '2025-03-03'),
((SELECT id FROM users WHERE username = 'florian_ce1'), 'dictee', 7, '2025-03-04'),
((SELECT id FROM users WHERE username = 'florian_ce1'), 'conjugaison_phrase', 8, '2025-03-05'),
((SELECT id FROM users WHERE username = 'florian_ce1'), 'conjugaison_verbe', 7, '2025-03-06'),

((SELECT id FROM users WHERE username = 'gabrielle_ce1'), 'addition', 8, '2025-03-01'),
((SELECT id FROM users WHERE username = 'gabrielle_ce1'), 'soustraction', 9, '2025-03-02'),
((SELECT id FROM users WHERE username = 'gabrielle_ce1'), 'multiplication', 7, '2025-03-03'),
((SELECT id FROM users WHERE username = 'gabrielle_ce1'), 'dictee', 8, '2025-03-04'),
((SELECT id FROM users WHERE username = 'gabrielle_ce1'), 'conjugaison_phrase', 9, '2025-03-05'),
((SELECT id FROM users WHERE username = 'gabrielle_ce1'), 'conjugaison_verbe', 8, '2025-03-06'),

((SELECT id FROM users WHERE username = 'hugo_ce1'), 'addition', 7, '2025-03-01'),
((SELECT id FROM users WHERE username = 'hugo_ce1'), 'soustraction', 8, '2025-03-02'),
((SELECT id FROM users WHERE username = 'hugo_ce1'), 'multiplication', 6, '2025-03-03'),
((SELECT id FROM users WHERE username = 'hugo_ce1'), 'dictee', 7, '2025-03-04'),
((SELECT id FROM users WHERE username = 'hugo_ce1'), 'conjugaison_phrase', 8, '2025-03-05'),
((SELECT id FROM users WHERE username = 'hugo_ce1'), 'conjugaison_verbe', 7, '2025-03-06'),

((SELECT id FROM users WHERE username = 'isabelle_ce1'), 'addition', 8, '2025-03-01'),
((SELECT id FROM users WHERE username = 'isabelle_ce1'), 'soustraction', 9, '2025-03-02'),
((SELECT id FROM users WHERE username = 'isabelle_ce1'), 'multiplication', 7, '2025-03-03'),
((SELECT id FROM users WHERE username = 'isabelle_ce1'), 'dictee', 8, '2025-03-04'),
((SELECT id FROM users WHERE username = 'isabelle_ce1'), 'conjugaison_phrase', 9, '2025-03-05'),
((SELECT id FROM users WHERE username = 'isabelle_ce1'), 'conjugaison_verbe', 8, '2025-03-06'),

((SELECT id FROM users WHERE username = 'julien_ce1'), 'addition', 7, '2025-03-01'),
((SELECT id FROM users WHERE username = 'julien_ce1'), 'soustraction', 8, '2025-03-02'),
((SELECT id FROM users WHERE username = 'julien_ce1'), 'multiplication', 6, '2025-03-03'),
((SELECT id FROM users WHERE username = 'julien_ce1'), 'dictee', 7, '2025-03-04'),
((SELECT id FROM users WHERE username = 'julien_ce1'), 'conjugaison_phrase', 8, '2025-03-05'),
((SELECT id FROM users WHERE username = 'julien_ce1'), 'conjugaison_verbe', 7, '2025-03-06');