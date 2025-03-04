-- Crée 10 utilisateurs enfants en CM2
INSERT INTO users (username, password, role, class) VALUES
('alice_cm2', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CM2'),
('benjamin_cm2', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CM2'),
('chloe_cm2', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CM2'),
('david_cm2', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CM2'),
('emma_cm2', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CM2'),
('florian_cm2', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CM2'),
('gabrielle_cm2', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CM2'),
('hugo_cm2', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CM2'),
('isabelle_cm2', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CM2'),
('julien_cm2', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CM2');

-- Crée des résultats d'exercices pour chaque utilisateur
INSERT INTO exercise_results (user_id, exercise_type, score, date) VALUES
((SELECT id FROM users WHERE username = 'alice_cm2'), 'addition', 8, '2025-03-01'),
((SELECT id FROM users WHERE username = 'alice_cm2'), 'soustraction', 9, '2025-03-02'),
((SELECT id FROM users WHERE username = 'alice_cm2'), 'multiplication', 7, '2025-03-03'),
((SELECT id FROM users WHERE username = 'alice_cm2'), 'dictee', 8, '2025-03-04'),
((SELECT id FROM users WHERE username = 'alice_cm2'), 'conjugaison_phrase', 9, '2025-03-05'),
((SELECT id FROM users WHERE username = 'alice_cm2'), 'conjugaison_verbe', 8, '2025-03-06'),

((SELECT id FROM users WHERE username = 'benjamin_cm2'), 'addition', 7, '2025-03-01'),
((SELECT id FROM users WHERE username = 'benjamin_cm2'), 'soustraction', 8, '2025-03-02'),
((SELECT id FROM users WHERE username = 'benjamin_cm2'), 'multiplication', 6, '2025-03-03'),
((SELECT id FROM users WHERE username = 'benjamin_cm2'), 'dictee', 7, '2025-03-04'),
((SELECT id FROM users WHERE username = 'benjamin_cm2'), 'conjugaison_phrase', 8, '2025-03-05'),
((SELECT id FROM users WHERE username = 'benjamin_cm2'), 'conjugaison_verbe', 7, '2025-03-06'),

((SELECT id FROM users WHERE username = 'chloe_cm2'), 'addition', 8, '2025-03-01'),
((SELECT id FROM users WHERE username = 'chloe_cm2'), 'soustraction', 9, '2025-03-02'),
((SELECT id FROM users WHERE username = 'chloe_cm2'), 'multiplication', 7, '2025-03-03'),
((SELECT id FROM users WHERE username = 'chloe_cm2'), 'dictee', 8, '2025-03-04'),
((SELECT id FROM users WHERE username = 'chloe_cm2'), 'conjugaison_phrase', 9, '2025-03-05'),
((SELECT id FROM users WHERE username = 'chloe_cm2'), 'conjugaison_verbe', 8, '2025-03-06'),

((SELECT id FROM users WHERE username = 'david_cm2'), 'addition', 7, '2025-03-01'),
((SELECT id FROM users WHERE username = 'david_cm2'), 'soustraction', 8, '2025-03-02'),
((SELECT id FROM users WHERE username = 'david_cm2'), 'multiplication', 6, '2025-03-03'),
((SELECT id FROM users WHERE username = 'david_cm2'), 'dictee', 7, '2025-03-04'),
((SELECT id FROM users WHERE username = 'david_cm2'), 'conjugaison_phrase', 8, '2025-03-05'),
((SELECT id FROM users WHERE username = 'david_cm2'), 'conjugaison_verbe', 7, '2025-03-06'),

((SELECT id FROM users WHERE username = 'emma_cm2'), 'addition', 8, '2025-03-01'),
((SELECT id FROM users WHERE username = 'emma_cm2'), 'soustraction', 9, '2025-03-02'),
((SELECT id FROM users WHERE username = 'emma_cm2'), 'multiplication', 7, '2025-03-03'),
((SELECT id FROM users WHERE username = 'emma_cm2'), 'dictee', 8, '2025-03-04'),
((SELECT id FROM users WHERE username = 'emma_cm2'), 'conjugaison_phrase', 9, '2025-03-05'),
((SELECT id FROM users WHERE username = 'emma_cm2'), 'conjugaison_verbe', 8, '2025-03-06'),

((SELECT id FROM users WHERE username = 'florian_cm2'), 'addition', 7, '2025-03-01'),
((SELECT id FROM users WHERE username = 'florian_cm2'), 'soustraction', 8, '2025-03-02'),
((SELECT id FROM users WHERE username = 'florian_cm2'), 'multiplication', 6, '2025-03-03'),
((SELECT id FROM users WHERE username = 'florian_cm2'), 'dictee', 7, '2025-03-04'),
((SELECT id FROM users WHERE username = 'florian_cm2'), 'conjugaison_phrase', 8, '2025-03-05'),
((SELECT id FROM users WHERE username = 'florian_cm2'), 'conjugaison_verbe', 7, '2025-03-06'),

((SELECT id FROM users WHERE username = 'gabrielle_cm2'), 'addition', 8, '2025-03-01'),
((SELECT id FROM users WHERE username = 'gabrielle_cm2'), 'soustraction', 9, '2025-03-02'),
((SELECT id FROM users WHERE username = 'gabrielle_cm2'), 'multiplication', 7, '2025-03-03'),
((SELECT id FROM users WHERE username = 'gabrielle_cm2'), 'dictee', 8, '2025-03-04'),
((SELECT id FROM users WHERE username = 'gabrielle_cm2'), 'conjugaison_phrase', 9, '2025-03-05'),
((SELECT id FROM users WHERE username = 'gabrielle_cm2'), 'conjugaison_verbe', 8, '2025-03-06'),

((SELECT id FROM users WHERE username = 'hugo_cm2'), 'addition', 7, '2025-03-01'),
((SELECT id FROM users WHERE username = 'hugo_cm2'), 'soustraction', 8, '2025-03-02'),
((SELECT id FROM users WHERE username = 'hugo_cm2'), 'multiplication', 6, '2025-03-03'),
((SELECT id FROM users WHERE username = 'hugo_cm2'), 'dictee', 7, '2025-03-04'),
((SELECT id FROM users WHERE username = 'hugo_cm2'), 'conjugaison_phrase', 8, '2025-03-05'),
((SELECT id FROM users WHERE username = 'hugo_cm2'), 'conjugaison_verbe', 7, '2025-03-06'),

((SELECT id FROM users WHERE username = 'isabelle_cm2'), 'addition', 8, '2025-03-01'),
((SELECT id FROM users WHERE username = 'isabelle_cm2'), 'soustraction', 9, '2025-03-02'),
((SELECT id FROM users WHERE username = 'isabelle_cm2'), 'multiplication', 7, '2025-03-03'),
((SELECT id FROM users WHERE username = 'isabelle_cm2'), 'dictee', 8, '2025-03-04'),
((SELECT id FROM users WHERE username = 'isabelle_cm2'), 'conjugaison_phrase', 9, '2025-03-05'),
((SELECT id FROM users WHERE username = 'isabelle_cm2'), 'conjugaison_verbe', 8, '2025-03-06'),

((SELECT id FROM users WHERE username = 'julien_cm2'), 'addition', 7, '2025-03-01'),
((SELECT id FROM users WHERE username = 'julien_cm2'), 'soustraction', 8, '2025-03-02'),
((SELECT id FROM users WHERE username = 'julien_cm2'), 'multiplication', 6, '2025-03-03'),
((SELECT id FROM users WHERE username = 'julien_cm2'), 'dictee', 7, '2025-03-04'),
((SELECT id FROM users WHERE username = 'julien_cm2'), 'conjugaison_phrase', 8, '2025-03-05'),
((SELECT id FROM users WHERE username = 'julien_cm2'), 'conjugaison_verbe', 7, '2025-03-06');