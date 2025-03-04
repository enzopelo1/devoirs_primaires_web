-- Crée 10 utilisateurs enfants en CM1
INSERT INTO users (username, password, role, class) VALUES
('alice_cm1', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CM1'),
('benjamin_cm1', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CM1'),
('chloe_cm1', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CM1'),
('david_cm1', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CM1'),
('emma_cm1', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CM1'),
('florian_cm1', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CM1'),
('gabrielle_cm1', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CM1'),
('hugo_cm1', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CM1'),
('isabelle_cm1', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CM1'),
('julien_cm1', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CM1');

-- Crée des résultats d'exercices pour chaque utilisateur
INSERT INTO exercise_results (user_id, exercise_type, score, date) VALUES
((SELECT id FROM users WHERE username = 'alice_cm1'), 'addition', 8, '2025-03-01'),
((SELECT id FROM users WHERE username = 'alice_cm1'), 'soustraction', 9, '2025-03-02'),
((SELECT id FROM users WHERE username = 'alice_cm1'), 'multiplication', 7, '2025-03-03'),
((SELECT id FROM users WHERE username = 'alice_cm1'), 'dictee', 8, '2025-03-04'),
((SELECT id FROM users WHERE username = 'alice_cm1'), 'conjugaison_phrase', 9, '2025-03-05'),
((SELECT id FROM users WHERE username = 'alice_cm1'), 'conjugaison_verbe', 8, '2025-03-06'),

((SELECT id FROM users WHERE username = 'benjamin_cm1'), 'addition', 7, '2025-03-01'),
((SELECT id FROM users WHERE username = 'benjamin_cm1'), 'soustraction', 8, '2025-03-02'),
((SELECT id FROM users WHERE username = 'benjamin_cm1'), 'multiplication', 6, '2025-03-03'),
((SELECT id FROM users WHERE username = 'benjamin_cm1'), 'dictee', 7, '2025-03-04'),
((SELECT id FROM users WHERE username = 'benjamin_cm1'), 'conjugaison_phrase', 8, '2025-03-05'),
((SELECT id FROM users WHERE username = 'benjamin_cm1'), 'conjugaison_verbe', 7, '2025-03-06'),

((SELECT id FROM users WHERE username = 'chloe_cm1'), 'addition', 8, '2025-03-01'),
((SELECT id FROM users WHERE username = 'chloe_cm1'), 'soustraction', 9, '2025-03-02'),
((SELECT id FROM users WHERE username = 'chloe_cm1'), 'multiplication', 7, '2025-03-03'),
((SELECT id FROM users WHERE username = 'chloe_cm1'), 'dictee', 8, '2025-03-04'),
((SELECT id FROM users WHERE username = 'chloe_cm1'), 'conjugaison_phrase', 9, '2025-03-05'),
((SELECT id FROM users WHERE username = 'chloe_cm1'), 'conjugaison_verbe', 8, '2025-03-06'),

((SELECT id FROM users WHERE username = 'david_cm1'), 'addition', 7, '2025-03-01'),
((SELECT id FROM users WHERE username = 'david_cm1'), 'soustraction', 8, '2025-03-02'),
((SELECT id FROM users WHERE username = 'david_cm1'), 'multiplication', 6, '2025-03-03'),
((SELECT id FROM users WHERE username = 'david_cm1'), 'dictee', 7, '2025-03-04'),
((SELECT id FROM users WHERE username = 'david_cm1'), 'conjugaison_phrase', 8, '2025-03-05'),
((SELECT id FROM users WHERE username = 'david_cm1'), 'conjugaison_verbe', 7, '2025-03-06'),

((SELECT id FROM users WHERE username = 'emma_cm1'), 'addition', 8, '2025-03-01'),
((SELECT id FROM users WHERE username = 'emma_cm1'), 'soustraction', 9, '2025-03-02'),
((SELECT id FROM users WHERE username = 'emma_cm1'), 'multiplication', 7, '2025-03-03'),
((SELECT id FROM users WHERE username = 'emma_cm1'), 'dictee', 8, '2025-03-04'),
((SELECT id FROM users WHERE username = 'emma_cm1'), 'conjugaison_phrase', 9, '2025-03-05'),
((SELECT id FROM users WHERE username = 'emma_cm1'), 'conjugaison_verbe', 8, '2025-03-06'),

((SELECT id FROM users WHERE username = 'florian_cm1'), 'addition', 7, '2025-03-01'),
((SELECT id FROM users WHERE username = 'florian_cm1'), 'soustraction', 8, '2025-03-02'),
((SELECT id FROM users WHERE username = 'florian_cm1'), 'multiplication', 6, '2025-03-03'),
((SELECT id FROM users WHERE username = 'florian_cm1'), 'dictee', 7, '2025-03-04'),
((SELECT id FROM users WHERE username = 'florian_cm1'), 'conjugaison_phrase', 8, '2025-03-05'),
((SELECT id FROM users WHERE username = 'florian_cm1'), 'conjugaison_verbe', 7, '2025-03-06'),

((SELECT id FROM users WHERE username = 'gabrielle_cm1'), 'addition', 8, '2025-03-01'),
((SELECT id FROM users WHERE username = 'gabrielle_cm1'), 'soustraction', 9, '2025-03-02'),
((SELECT id FROM users WHERE username = 'gabrielle_cm1'), 'multiplication', 7, '2025-03-03'),
((SELECT id FROM users WHERE username = 'gabrielle_cm1'), 'dictee', 8, '2025-03-04'),
((SELECT id FROM users WHERE username = 'gabrielle_cm1'), 'conjugaison_phrase', 9, '2025-03-05'),
((SELECT id FROM users WHERE username = 'gabrielle_cm1'), 'conjugaison_verbe', 8, '2025-03-06'),

((SELECT id FROM users WHERE username = 'hugo_cm1'), 'addition', 7, '2025-03-01'),
((SELECT id FROM users WHERE username = 'hugo_cm1'), 'soustraction', 8, '2025-03-02'),
((SELECT id FROM users WHERE username = 'hugo_cm1'), 'multiplication', 6, '2025-03-03'),
((SELECT id FROM users WHERE username = 'hugo_cm1'), 'dictee', 7, '2025-03-04'),
((SELECT id FROM users WHERE username = 'hugo_cm1'), 'conjugaison_phrase', 8, '2025-03-05'),
((SELECT id FROM users WHERE username = 'hugo_cm1'), 'conjugaison_verbe', 7, '2025-03-06'),

((SELECT id FROM users WHERE username = 'isabelle_cm1'), 'addition', 8, '2025-03-01'),
((SELECT id FROM users WHERE username = 'isabelle_cm1'), 'soustraction', 9, '2025-03-02'),
((SELECT id FROM users WHERE username = 'isabelle_cm1'), 'multiplication', 7, '2025-03-03'),
((SELECT id FROM users WHERE username = 'isabelle_cm1'), 'dictee', 8, '2025-03-04'),
((SELECT id FROM users WHERE username = 'isabelle_cm1'), 'conjugaison_phrase', 9, '2025-03-05'),
((SELECT id FROM users WHERE username = 'isabelle_cm1'), 'conjugaison_verbe', 8, '2025-03-06'),

((SELECT id FROM users WHERE username = 'julien_cm1'), 'addition', 7, '2025-03-01'),
((SELECT id FROM users WHERE username = 'julien_cm1'), 'soustraction', 8, '2025-03-02'),
((SELECT id FROM users WHERE username = 'julien_cm1'), 'multiplication', 6, '2025-03-03'),
((SELECT id FROM users WHERE username = 'julien_cm1'), 'dictee', 7, '2025-03-04'),
((SELECT id FROM users WHERE username = 'julien_cm1'), 'conjugaison_phrase', 8, '2025-03-05'),
((SELECT id FROM users WHERE username = 'julien_cm1'), 'conjugaison_verbe', 7, '2025-03-06');