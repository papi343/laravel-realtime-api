# 🚀 Laravel Realtime API

Une application API et Backend en temps réel basée sur le framework **Laravel 13** et **PHP 8.3+**. Ce projet fournit la structure idéale pour le développement d'APIs modernes, réactives et intégrant la diffusion d'événements en temps réel (WebSocket / Event Broadcasting).

---

## 📋 Sommaire

- [À propos du projet](#-à-propos-du-projet)
- [Prérequis](#-prérequis)
- [Installation et Configuration](#-installation-et-configuration)
- [Lancement en Développement](#-lancement-en-développement)
- [Commandes Utiles](#-commandes-utiles)
- [Architecture du Projet](#-architecture-du-projet)
- [Configuration du Temps Réel (Broadcasting)](#-configuration-du-temps-réel-broadcasting)
- [Tests](#-tests)
- [Licence](#-licence)

---

## 💡 À propos du projet

`laravel-realtime-api` sert de socle pour créer des applications web et mobile interactives nécessitant :
- Une **API REST / JSON** rapide et sécurisée.
- L'**Event Broadcasting** en temps réel via des serveurs WebSockets (Laravel Reverb, Pusher, Soketi).
- Un système de file d'attente (**Queue Workers**) pour le traitement asynchrone des tâches.
- Une intégration prête à l'emploi avec les outils modernes de l'écosystème Laravel.

---

## 🛠️ Prérequis

Avant de commencer, assurez-vous d'avoir installé sur votre machine :

- **PHP** : `>= 8.3` (avec extensions `pdo`, `mbstring`, `openssl`, `tokenizer`, `xml`)
- **Composer** : `>= 2.x`
- **Node.js** : `>= 18.x` & **NPM**
- **Base de données** : SQLite (par défaut en dev) ou MySQL / PostgreSQL
- **Laragon**, **WampServer** ou **Docker** (recommandé sous Windows)

---

## ⚙️ Installation et Configuration

1. **Cloner ou accéder au projet** :
   ```bash
   cd c:\laragon\www\laravel\laravel-realtime-api
   ```

2. **Installer les dépendances PHP** :
   ```bash
   composer install
   ```

3. **Installer les dépendances JavaScript** :
   ```bash
   npm install
   ```

4. **Configurer l'environnement** :
   Copiez le fichier d'exemple pour créer votre fichier `.env` :
   ```bash
   cp .env.example .env
   ```

5. **Générer la clé d'application** :
   ```bash
   php artisan key:generate
   ```

6. **Exécuter les migrations** :
   ```bash
   php artisan migrate
   ```

---

## 🏃 Lancement en Développement

Le projet inclut une commande interactive `dev` dans `composer.json` basée sur **Concurrently** pour démarrer simultanément le serveur web, le traitement des queues, les logs Pail et Vite.

Exécutez simplement :

```bash
composer run dev
```

Cette commande démarre :
- 🌐 **Serveur HTTP** : `http://127.0.0.1:8000`
- ⚡ **Vite Dev Server** : Pour le bundling des assets frontend
- 🔄 **Queue Listener** : Traitement en direct des jobs asynchrones
- 📜 **Laravel Pail** : Suivi interactif des logs de l'application

---

## 🛠️ Commandes Utiles

| Commande | Description |
| :--- | :--- |
| `composer run dev` | Lance l'environnement complet de dev (Server + Queue + Vite + Pail) |
| `composer run test` | Exécute la suite de tests automatisés |
| `php artisan serve` | Lance uniquement le serveur de développement PHP |
| `php artisan migrate` | Exécute les migrations de la base de données |
| `php artisan queue:listen` | Écoute et exécute les jobs en file d'attente |
| `php artisan tinker` | Console interactive pour tester du code PHP/Laravel |

---

## 📂 Architecture du Projet

```text
laravel-realtime-api/
├── app/
│   ├── Http/          # Contrôleurs, Middleware, Requêtes API
│   ├── Models/        # Modèles Eloquent (ex: User)
│   └── Providers/     # Service Providers de l'application
├── config/            # Fichiers de configuration (broadcasting, database, etc.)
├── database/          # Migrations, Facteurs (Factories) et Seeders
├── public/            # Point d'entrée web et assets publics
├── resources/         # Vues, JavaScript, CSS / SCSS
├── routes/            # Routes d'API, Web et Console
│   ├── web.php        # Routes web
│   └── console.php    # Commandes Artisan personnalisées
└── tests/             # Tests Unitaires et de Fonctionnalités (PHPUnit / Pest)
```

---

## 📡 Configuration du Temps Réel (Broadcasting)

Pour activer la diffusion d'événements en temps réel :

1. **Installer Laravel Reverb (ou Pusher/Soketi)** :
   ```bash
   php artisan install:broadcasting
   ```
2. **Configurer les variables `.env`** pour le broadcasting :
   ```env
   BROADCAST_CONNECTION=reverb
   ```
3. **Diffuser des événements** :
   Créez des événements implémentant `ShouldBroadcast` ou `ShouldBroadcastNow` pour émettre des messages vers les canaux WebSocket clients.

---

## 🧪 Tests

Pour exécuter les tests de l'application :

```bash
composer run test
```

---

## 📄 Licence

Ce projet est sous licence [MIT](LICENSE).

