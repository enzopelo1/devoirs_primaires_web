# les-devoirs-de-primaire
Site permettant aux enfants en primaire de faire des exercices de maths/français et peut être plus par la suite.

## Installation

1. Téléchargez le code.
2. Transférez-le sur un hébergement avec PHP et MySQL.
3. Importez le fichier SQL (`creation_db.sql`) pour créer les utilisateurs et les résultats d'exercices.
4. Configurez la base de données dans le fichier `config.php`.
5. Changez les droits en 777 pour les sous-répertoires `logs`, `resultats` et `supprime` dans les répertoires `addition`, `conjugaison_phrase`, `conjugaison_verbe`, `dictee`, `multiplication` et `soustraction`.

## Fonctionnalités

### 1. Système de connexion avec profil

- **Inscription** : Les utilisateurs peuvent s'inscrire en fournissant un nom d'utilisateur, un mot de passe, un rôle (enfant, parent, enseignant) et une classe.
- **Connexion** : Les utilisateurs peuvent se connecter en utilisant leur nom d'utilisateur et leur mot de passe.
- **Profil** : Les utilisateurs peuvent voir leurs statistiques d'exercices sur leur profil.

### 1.5. Ajout de rôle aux utilisateurs

- **Enfant** : Peut faire des exercices.
- **Parent** : Peut voir les résultats de ses enfants.
- **Enseignant** : Peut voir les résultats de ses élèves et configurer les exercices pour les enfants de sa classe.

### 3. Utilisation d'une base de données

- Les utilisateurs et les résultats des exercices sont stockés dans une base de données MySQL.

### 4. Amélioration du système d'affichage des résultats

- Les résultats des exercices sont affichés sur le profil des utilisateurs avec des statistiques détaillées.

### 5. Configuration des exercices

- Les enseignants peuvent configurer les exercices pour les enfants de leur classe.
- Les bornes des nombres pour les exercices de calcul sont ajustées en fonction de la classe de l'enfant :
  - CP : nombres entre 0 et 100
  - CE1 : nombres entre 0 et 1000
  - CE2, CM1, CM2 : nombres entre 1000 et 9999

## Structure du projet

``` 
addition/
    affiche_resultat.php
    correction.php
    fin.php
    images/
    index.php
    logs/
    question.php
    raz.php
    resultats/
    supprime/
    supprimer_resultat.php
    utils.php
config.php
confirm_logout.php
conjugaison_phrase/
    affiche_resultat.php
    ...
conjugaison_verbe/
    ...
dictee/
footer.php
header.php
images/
index.php
SQL/
LICENSE
login.php
logout.php
multiplication/
profile.php
README.md
register.php
soustraction/
```



## Manuel utilisateur

### Inscription

1. Accédez à la page d'inscription (`register.php`).
2. Remplissez le formulaire d'inscription avec votre nom d'utilisateur, mot de passe, rôle et classe.
3. Cliquez sur "S'inscrire".

### Connexion

1. Accédez à la page de connexion (`login.php`).
2. Entrez votre nom d'utilisateur et mot de passe.
3. Cliquez sur "Se connecter".

### Profil

1. Après la connexion, accédez à votre profil (`profile.php`).
2. Consultez vos statistiques d'exercices.

### Configuration des exercices (Enseignant)

1. Connectez-vous en tant qu'enseignant.
2. Accédez à la page d'accueil (`index.php`).
3. Configurez les exercices pour les enfants de votre classe en utilisant les options disponibles.

## Manuel du développeur

### Configuration de la base de données

1. Ouvrez le fichier `config.php`.
2. Configurez les paramètres de connexion à la base de données MySQL.

### Structure de la base de données

- **users** : Stocke les informations des utilisateurs (id, username, password, role, class).
- **exercise_results** : Stocke les résultats des exercices (id, user_id, exercise_type, score, date).
- **exercices_floutes** : Stocke les exercices floutés par classe (id, classe, exercice).

### Points d'entrée principaux

- `index.php` : Page d'accueil.
- `register.php` : Page d'inscription.
- `login.php` : Page de connexion.
- `profile.php` : Page de profil utilisateur.
- `addition`, `conjugaison_phrase`, `conjugaison_verbe`, `dictee`, `multiplication`, `soustraction` : Répertoires contenant les exercices.

### Commentaires dans le code

Le code est commenté pour expliquer les différentes parties et leur fonctionnement. Assurez-vous de lire les commentaires pour comprendre le flux de l'application.

## Aide à l'installation

1. Téléchargez le code.
2. Transférez-le sur un hébergement avec PHP et MySQL.
3. Importez les fichiers SQL pour créer les utilisateurs et les résultats d'exercices `creation_db.sql`.
4. Configurez la base de données dans le fichier `config.php`.
5. Changez les droits en 777 pour les sous-répertoires `logs`, `resultats` et `supprime`.
6. Accédez à la page d'inscription pour créer un compte et commencer à utiliser le site.

Bonjour Monsieur,

J'ai une petite question, j'ai déjà fini l'application web elle est 100% fonctionnelle.
Etant donné que je fais mon stage à Lille j'aurais bien aimé profiter du vendredi pour pouvoir emménager là-bas. Est ce que ça serait possible de faire la soutenance jeudi matin avec vous s'il vous plait ?

Enzo :)