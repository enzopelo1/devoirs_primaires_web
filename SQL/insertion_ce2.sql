-- Crée 10 utilisateurs enfants en CE2
INSERT INTO users (username, password, role, class) VALUES
('alice_ce2', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CE2'),
('benjamin_ce2', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CE2'),
('chloe_ce2', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CE2'),
('david_ce2', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CE2'),
('emma_ce2', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CE2'),
('florian_ce2', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CE2'),
('gabrielle_ce2', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CE2'),
('hugo_ce2', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CE2'),
('isabelle_ce2', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CE2'),
('julien_ce2', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFupf8X1Z0K7c5J8K6FZ5e5J8K6FZ5e5', 'enfant', 'CE2');

-- Crée des résultats d'exercices pour chaque utilisateur
INSERT INTO exercise_results (user_id, exercise_type, score, date) VALUES
((SELECT id FROM users WHERE username = 'alice_ce2'), 'addition', 8, '2025-03-01'),
((SELECT id FROM users WHERE username = 'alice_ce2'), 'soustraction', 9, '2025-03-02'),
((SELECT id FROM users WHERE username = 'alice_ce2'), 'multiplication', 7, '2025-03-03'),
((SELECT id FROM users WHERE username = 'alice_ce2'), 'dictee', 8, '2025-03-04'),
((SELECT id FROM users WHERE username = 'alice_ce2'), 'conjugaison_phrase', 9, '2025-03-05'),
((SELECT id FROM users WHERE username = 'alice_ce2'), 'conjugaison_verbe', 8, '2025-03-06'),

((SELECT id FROM users WHERE username = 'benjamin_ce2'), 'addition', 7, '2025-03-01'),
((SELECT id FROM users WHERE username = 'benjamin_ce2'), 'soustraction', 8, '2025-03-02'),
((SELECT id FROM users WHERE username = 'benjamin_ce2'), 'multiplication', 6, '2025-03-03'),
((SELECT id FROM users WHERE username = 'benjamin_ce2'), 'dictee', 7, '2025-03-04'),
((SELECT id FROM users WHERE username = 'benjamin_ce2'), 'conjugaison_phrase', 8, '2025-03-05'),
((SELECT id FROM users WHERE username = 'benjamin_ce2'), 'conjugaison_verbe', 7, '2025-03-06'),

((SELECT id FROM users WHERE username = 'chloe_ce2'), 'addition', 8, '2025-03-01'),
((SELECT id FROM users WHERE username = 'chloe_ce2'), 'soustraction', 9, '2025-03-02'),
((SELECT id FROM users WHERE username = 'chloe_ce2'), 'multiplication', 7, '2025-03-03'),
((SELECT id FROM users WHERE username = 'chloe_ce2'), 'dictee', 8, '2025-03-04'),
((SELECT id FROM users WHERE username = 'chloe_ce2'), 'conjugaison_phrase', 9, '2025-03-05'),
((SELECT id FROM users WHERE username = 'chloe_ce2'), 'conjugaison_verbe', 8, '2025-03-06'),

((SELECT id FROM users WHERE username = 'david_ce2'), 'addition', 7, '2025-03-01'),
((SELECT id FROM users WHERE username = 'david_ce2'), 'soustraction', 8, '2025-03-02'),
((SELECT id FROM users WHERE username = 'david_ce2'), 'multiplication', 6, '2025-03-03'),
((SELECT id FROM users WHERE username = 'david_ce2'), 'dictee', 7, '2025-03-04'),
((SELECT id FROM users WHERE username = 'david_ce2'), 'conjugaison_phrase', 8, '2025-03-05'),
((SELECT id FROM users WHERE username = 'david_ce2'), 'conjugaison_verbe', 7, '2025-03-06'),

((SELECT id FROM users WHERE username = 'emma_ce2'), 'addition', 8, '2025-03-01'),
((SELECT id FROM users WHERE username = 'emma_ce2'), 'soustraction', 9, '2025-03-02'),
((SELECT id FROM users WHERE username = 'emma_ce2'), 'multiplication', 7, '2025-03-03'),
((SELECT id FROM users WHERE username = 'emma_ce2'), 'dictee', 8, '2025-03-04'),
((SELECT id FROM users WHERE username = 'emma_ce2'), 'conjugaison_phrase', 9, '2025-03-05'),
((SELECT id FROM users WHERE username = 'emma_ce2'), 'conjugaison_verbe', 8, '2025-03-06'),

((SELECT id FROM users WHERE username = 'florian_ce2'), 'addition', 7, '2025-03-01'),
((SELECT id FROM users WHERE username = 'florian_ce2'), 'soustraction', 8, '2025-03-02'),
((SELECT id FROM users WHERE username = 'florian_ce2'), 'multiplication', 6, '2025-03-03'),
((SELECT id FROM users WHERE username = 'florian_ce2'), 'dictee', 7, '2025-03-04'),
((SELECT id FROM users WHERE username = 'florian_ce2'), 'conjugaison_phrase', 8, '2025-03-05'),
((SELECT id FROM users WHERE username = 'florian_ce2'), 'conjugaison_verbe', 7, '2025-03-06'),

((SELECT id FROM users WHERE username = 'gabrielle_ce2'), 'addition', 8, '2025-03-01'),
((SELECT id FROM users WHERE username = 'gabrielle_ce2'), 'soustraction', 9, '2025-03-02'),
((SELECT id FROM users WHERE username = 'gabrielle_ce2'), 'multiplication', 7, '2025-03-03'),
((SELECT id FROM users WHERE username = 'gabrielle_ce2'), 'dictee', 8, '2025-03-04'),
((SELECT id FROM users WHERE username = 'gabrielle_ce2'), 'conjugaison_phrase', 9, '2025-03-05'),
((SELECT id FROM users WHERE username = 'gabrielle_ce2'), 'conjugaison_verbe', 8, '2025-03-06'),

((SELECT id FROM users WHERE username = 'hugo_ce2'), 'addition', 7, '2025-03-01'),
((SELECT id FROM users WHERE username = 'hugo_ce2'), 'soustraction', 8, '2025-03-02'),
((SELECT id FROM users WHERE username = 'hugo_ce2'), 'multiplication', 6, '2025-03-03'),
((SELECT id FROM users WHERE username = 'hugo_ce2'), 'dictee', 7, '2025-03-04'),
((SELECT id FROM users WHERE username = 'hugo_ce2'), 'conjugaison_phrase', 8, '2025-03-05'),
((SELECT id FROM users WHERE username = 'hugo_ce2'), 'conjugaison_verbe', 7, '2025-03-06'),

((SELECT id FROM users WHERE username = 'isabelle_ce2'), 'addition', 8, '2025-03-01'),
((SELECT id FROM users WHERE username = 'isabelle_ce2'), 'soustraction', 9, '2025-03-02'),
((SELECT id FROM users WHERE username = 'isabelle_ce2'), 'multiplication', 7, '2025-03-03'),
((SELECT id FROM users WHERE username = 'isabelle_ce2'), 'dictee', 8, '2025-03-04'),
((SELECT id FROM users WHERE username = 'isabelle_ce2'), 'conjugaison_phrase', 9, '2025-03-05'),
((SELECT id FROM users WHERE username = 'isabelle_ce2'), 'conjugaison_verbe', 8, '2025-03-06'),

((SELECT id FROM users WHERE username = 'julien_ce2'), 'addition', 7, '2025-03-01'),
((SELECT id FROM users WHERE username = 'julien_ce2'), 'soustraction', 8, '2025-03-02'),
((SELECT id FROM users WHERE username = 'julien_ce2'), 'multiplication', 6, '2025-03-03'),
((SELECT id FROM users WHERE username = 'julien_ce2'), 'dictee', 7, '2025-03-04'),
((SELECT id FROM users WHERE username = 'julien_ce2'), 'conjugaison_phrase', 8, '2025-03-05'),
((SELECT id FROM users WHERE username = 'julien_ce2'), 'conjugaison_verbe', 7, '2025-03-06');