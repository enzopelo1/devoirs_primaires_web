-- Crée 10 utilisateurs enfants en CP
INSERT INTO users (username, password, role, class) VALUES
('alice_cp', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CP'),
('benjamin_cp', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CP'),
('chloe_cp', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CP'),
('david_cp', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CP'),
('emma_cp', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CP'),
('florian_cp', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CP'),
('gabrielle_cp', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CP'),
('hugo_cp', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CP'),
('isabelle_cp', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CP'),
('julien_cp', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CP');

-- Crée des résultats d'exercices pour chaque utilisateur
INSERT INTO exercise_results (user_id, exercise_type, score, date) VALUES
((SELECT id FROM users WHERE username = 'alice_cp'), 'addition', 8, '2025-03-01'),
((SELECT id FROM users WHERE username = 'alice_cp'), 'soustraction', 9, '2025-03-02'),
((SELECT id FROM users WHERE username = 'alice_cp'), 'multiplication', 7, '2025-03-03'),
((SELECT id FROM users WHERE username = 'alice_cp'), 'dictee', 8, '2025-03-04'),
((SELECT id FROM users WHERE username = 'alice_cp'), 'conjugaison_phrase', 9, '2025-03-05'),
((SELECT id FROM users WHERE username = 'alice_cp'), 'conjugaison_verbe', 8, '2025-03-06'),

((SELECT id FROM users WHERE username = 'benjamin_cp'), 'addition', 7, '2025-03-01'),
((SELECT id FROM users WHERE username = 'benjamin_cp'), 'soustraction', 8, '2025-03-02'),
((SELECT id FROM users WHERE username = 'benjamin_cp'), 'multiplication', 6, '2025-03-03'),
((SELECT id FROM users WHERE username = 'benjamin_cp'), 'dictee', 7, '2025-03-04'),
((SELECT id FROM users WHERE username = 'benjamin_cp'), 'conjugaison_phrase', 8, '2025-03-05'),
((SELECT id FROM users WHERE username = 'benjamin_cp'), 'conjugaison_verbe', 7, '2025-03-06'),

((SELECT id FROM users WHERE username = 'chloe_cp'), 'addition', 8, '2025-03-01'),
((SELECT id FROM users WHERE username = 'chloe_cp'), 'soustraction', 9, '2025-03-02'),
((SELECT id FROM users WHERE username = 'chloe_cp'), 'multiplication', 7, '2025-03-03'),
((SELECT id FROM users WHERE username = 'chloe_cp'), 'dictee', 8, '2025-03-04'),
((SELECT id FROM users WHERE username = 'chloe_cp'), 'conjugaison_phrase', 9, '2025-03-05'),
((SELECT id FROM users WHERE username = 'chloe_cp'), 'conjugaison_verbe', 8, '2025-03-06'),

((SELECT id FROM users WHERE username = 'david_cp'), 'addition', 7, '2025-03-01'),
((SELECT id FROM users WHERE username = 'david_cp'), 'soustraction', 8, '2025-03-02'),
((SELECT id FROM users WHERE username = 'david_cp'), 'multiplication', 6, '2025-03-03'),
((SELECT id FROM users WHERE username = 'david_cp'), 'dictee', 7, '2025-03-04'),
((SELECT id FROM users WHERE username = 'david_cp'), 'conjugaison_phrase', 8, '2025-03-05'),
((SELECT id FROM users WHERE username = 'david_cp'), 'conjugaison_verbe', 7, '2025-03-06'),

((SELECT id FROM users WHERE username = 'emma_cp'), 'addition', 8, '2025-03-01'),
((SELECT id FROM users WHERE username = 'emma_cp'), 'soustraction', 9, '2025-03-02'),
((SELECT id FROM users WHERE username = 'emma_cp'), 'multiplication', 7, '2025-03-03'),
((SELECT id FROM users WHERE username = 'emma_cp'), 'dictee', 8, '2025-03-04'),
((SELECT id FROM users WHERE username = 'emma_cp'), 'conjugaison_phrase', 9, '2025-03-05'),
((SELECT id FROM users WHERE username = 'emma_cp'), 'conjugaison_verbe', 8, '2025-03-06'),

((SELECT id FROM users WHERE username = 'florian_cp'), 'addition', 7, '2025-03-01'),
((SELECT id FROM users WHERE username = 'florian_cp'), 'soustraction', 8, '2025-03-02'),
((SELECT id FROM users WHERE username = 'florian_cp'), 'multiplication', 6, '2025-03-03'),
((SELECT id FROM users WHERE username = 'florian_cp'), 'dictee', 7, '2025-03-04'),
((SELECT id FROM users WHERE username = 'florian_cp'), 'conjugaison_phrase', 8, '2025-03-05'),
((SELECT id FROM users WHERE username = 'florian_cp'), 'conjugaison_verbe', 7, '2025-03-06'),

((SELECT id FROM users WHERE username = 'gabrielle_cp'), 'addition', 8, '2025-03-01'),
((SELECT id FROM users WHERE username = 'gabrielle_cp'), 'soustraction', 9, '2025-03-02'),
((SELECT id FROM users WHERE username = 'gabrielle_cp'), 'multiplication', 7, '2025-03-03'),
((SELECT id FROM users WHERE username = 'gabrielle_cp'), 'dictee', 8, '2025-03-04'),
((SELECT id FROM users WHERE username = 'gabrielle_cp'), 'conjugaison_phrase', 9, '2025-03-05'),
((SELECT id FROM users WHERE username = 'gabrielle_cp'), 'conjugaison_verbe', 8, '2025-03-06'),

((SELECT id FROM users WHERE username = 'hugo_cp'), 'addition', 7, '2025-03-01'),
((SELECT id FROM users WHERE username = 'hugo_cp'), 'soustraction', 8, '2025-03-02'),
((SELECT id FROM users WHERE username = 'hugo_cp'), 'multiplication', 6, '2025-03-03'),
((SELECT id FROM users WHERE username = 'hugo_cp'), 'dictee', 7, '2025-03-04'),
((SELECT id FROM users WHERE username = 'hugo_cp'), 'conjugaison_phrase', 8, '2025-03-05'),
((SELECT id FROM users WHERE username = 'hugo_cp'), 'conjugaison_verbe', 7, '2025-03-06'),

((SELECT id FROM users WHERE username = 'isabelle_cp'), 'addition', 8, '2025-03-01'),
((SELECT id FROM users WHERE username = 'isabelle_cp'), 'soustraction', 9, '2025-03-02'),
((SELECT id FROM users WHERE username = 'isabelle_cp'), 'multiplication', 7, '2025-03-03'),
((SELECT id FROM users WHERE username = 'isabelle_cp'), 'dictee', 8, '2025-03-04'),
((SELECT id FROM users WHERE username = 'isabelle_cp'), 'conjugaison_phrase', 9, '2025-03-05'),
((SELECT id FROM users WHERE username = 'isabelle_cp'), 'conjugaison_verbe', 8, '2025-03-06'),

((SELECT id FROM users WHERE username = 'julien_cp'), 'addition', 7, '2025-03-01'),
((SELECT id FROM users WHERE username = 'julien_cp'), 'soustraction', 8, '2025-03-02'),
((SELECT id FROM users WHERE username = 'julien_cp'), 'multiplication', 6, '2025-03-03'),
((SELECT id FROM users WHERE username = 'julien_cp'), 'dictee', 7, '2025-03-04'),
((SELECT id FROM users WHERE username = 'julien_cp'), 'conjugaison_phrase', 8, '2025-03-05'),
((SELECT id FROM users WHERE username = 'julien_cp'), 'conjugaison_verbe', 7, '2025-03-06');