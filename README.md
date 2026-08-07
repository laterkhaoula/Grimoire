# 📚 Grimoire

## Description

**Grimoire** est une application web développée avec **Laravel** permettant de gérer les projets de recherche d'un laboratoire universitaire.

Le laboratoire gérait auparavant ses projets à l'aide de tableurs et d'échanges d'e-mails, ce qui rendait difficile le suivi des projets, la gestion des membres et la répartition des responsabilités.

L'objectif de Grimoire est de centraliser la gestion des projets, des membres et des rôles tout en automatisant certaines tâches grâce au traitement asynchrone de Laravel.

---

# 🎯 Objectifs

* Centraliser les projets de recherche.
* Gérer les membres d'un projet.
* Attribuer des rôles spécifiques aux utilisateurs.
* Sécuriser les accès selon les autorisations.
* Automatiser les notifications et les rapports de clôture.
* Archiver les projets terminés.

---

# 🚀 Fonctionnalités

## Authentification

* Inscription
* Connexion
* Déconnexion
* Protection des routes avec le middleware `auth`

---

## Gestion des projets

* Création d'un projet
* Modification d'un projet
* Consultation des projets
* Mise à jour de l'avancement
* Clôture d'un projet
* Archivage (Soft Delete)
* Restauration d'un projet archivé

---

## Gestion des membres

* Ajouter un membre à un projet
* Supprimer un membre d'un projet
* Attribution d'un rôle :

  * Responsable
  * Chercheur
  * Étudiant assistant

---

## Gestion des rôles

### Responsable

* Créer un projet
* Modifier un projet
* Ajouter un membre
* Supprimer un membre
* Clôturer un projet
* Archiver un projet

### Chercheur

* Consulter les projets
* Mettre à jour l'avancement

### Étudiant assistant

* Consultation uniquement

---

## Notifications

Lorsqu'un membre est ajouté à un projet :

* création d'un Event
* exécution d'un Listener
* notification envoyée de manière asynchrone grâce aux Queues Laravel

---

## Clôture d'un projet

Lorsqu'un projet est clôturé :

* génération d'un rapport de synthèse
* traitement asynchrone avec Queue

---

# 🛠 Technologies utilisées

* Laravel 13
* PHP 8.3
* MySQL
* Blade
* Tailwind CSS
* Laravel Breeze
* Laravel Policies
* Laravel Events
* Laravel Listeners
* Laravel Queues
* Soft Deletes
* Eloquent ORM

---

# 📁 Arborescence principale

```text
app/
 ├── Events/
 ├── Http/
 │    ├── Controllers/
 │    ├── Requests/
 │    └── Middleware/
 ├── Listeners/
 ├── Models/
 ├── Notifications/
 └── Policies/

database/
 ├── migrations/
 └── seeders/

resources/
 └── views/
      ├── dashboard.blade.php
      ├── projects/
      ├── members/
      └── layouts/

routes/
 └── web.php
```

---

# ⚙ Installation

Cloner le projet :

```bash
git clone <url-du-repository>
```

Entrer dans le projet :

```bash
cd Grimoire
```

Installer les dépendances :

```bash
composer install
```

Installer les dépendances front-end :

```bash
npm install
```

Créer le fichier d'environnement :

```bash
cp .env.example .env
```

Générer la clé d'application :

```bash
php artisan key:generate
```

Configurer la base de données dans le fichier `.env`.

Exécuter les migrations :

```bash
php artisan migrate
```

Lancer le serveur :

```bash
php artisan serve
```

Compiler les assets :

```bash
npm run dev
```

Lancer le worker des files d'attente :

```bash
php artisan queue:work
```

---

# 🔒 Sécurité

Le projet utilise :

* Middleware `auth`
* Laravel Breeze
* Policies
* Autorisations par rôle
* Protection CSRF
* Validation avec Form Requests

---

# ⚡ Optimisations

* Utilisation de `with()` pour éviter les requêtes N+1.
* Traitement asynchrone avec les Queues Laravel.
* Archivage avec Soft Deletes.

---

# 📜 Licence

Ce projet est réalisé dans un but pédagogique dans le cadre d'un projet académique.
