# Generate Data API

Une API simple construite avec **Symfony 7.4** qui génère des données fictives de personnes au format JSON en utilisant la bibliothèque **Faker**.

## Description

Ce projet fournit un endpoint REST qui génère des données de personne aléatoires (noms, prénoms, emails, adresses, etc.) en français. Idéal pour les tests, les démos ou le remplissage de bases de données avec des données fictives.

## Fonctionnalités

- Génération de données fictives en français
- Endpoint JSON simple et rapide
- Données générées incluent:
  - Informations personnelles (nom, prénom, genre)
  - Données de contact (email, téléphone, adresse)
  - Dates (naissance, création, dernier accès)
  - Autres informations (mot de passe, langue, fuseau horaire, pays)

## Prérequis

- PHP >= 8.2
- Composer
- Symfony CLI (optionnel mais recommandé)

## Installation

1. **Cloner le repository**
```bash
git clone <repository-url>
cd generate_data
```

2. **Installer les dépendances**
```bash
composer install
```

3. **Démarrer le serveur Symfony**
```bash
symfony serve
```

Ou avec PHP directement :
```bash
php -S localhost:8000 -t public
```

## Utilisation

### Endpoint de génération

**GET** `/generate`

Retourne un objet JSON contenant les données fictives générées.

**Exemple de réponse :**
```json
{
  "nom": "Martin",
  "prénom": "Sophie",
  "age": 35,
  "email": "sophie.martin@example.com",
  "adresse": "123 Rue de la Paix, 75000 Paris",
  "rue": "Rue de la Paix",
  "date_naissance": "1989-03-15",
  "date_creation": "2024-01-20T10:30:45+00:00",
  "ddernier_connection": "2025-12-05T14:22:10+00:00",
  "description": "Lorem ipsum dolor sit amet...",
  "telephone": "+33 1 23 45 67 89",
  "ville": "Paris",
  "code_postal": "75000",
  "pays": "France",
  "genre": "female",
  "langue": "fr",
  "timezone": "Europe/Paris",
  "mot_de_passe": "aB3$cDeFgH"
}
```

### Redirection racine

**GET** `/`

Redirige automatiquement vers `/generate`

## Structure du projet

```
generate_data/
├── src/
│   ├── Controller/
│   │   └── GenerateController.php    # Contrôleur principal
│   ├── Entity/                        # Entités Doctrine
│   ├── Repository/                    # Repositories
│   └── Kernel.php                     # Configuration Symfony
├── config/
│   ├── bundles.php                    # Bundles Symfony
│   ├── services.yaml                  # Configuration des services
│   └── routes.yaml                    # Routes de l'application
├── public/
│   └── index.php                      # Point d'entrée
├── templates/                         # Templates Twig
├── migrations/                        # Migrations Doctrine
├── tests/                             # Tests unitaires
├── composer.json                      # Dépendances du projet
└── README.md                          # Ce fichier
```

## Dépendances principales

- **Symfony 7.4** - Framework PHP
- **Doctrine ORM** - ORM pour la gestion de la base de données
- **Faker** - Générateur de données fictives
- **Twig** - Moteur de templates
- **Monolog** - Logging

## Configuration

Les fichiers de configuration principaux se trouvent dans le répertoire `config/` :

- `config/services.yaml` - Configuration des services
- `config/routes.yaml` - Définition des routes
- `config/packages/` - Configuration des bundles

## Développement

### Lancer les tests

```bash
php bin/phpunit
```

### Activer le Web Profiler (développement)

Le Web Profiler est automatiquement activé en environnement `dev`. Accédez à la barre d'outils Symfony en haut de la page.

### Commandes disponibles

```bash
# Vider le cache
php bin/console cache:clear

# Créer une nouvelle entité
php bin/console make:entity

# Générer une migration Doctrine
php bin/console make:migration
```

## Variables d'environnement

Créez un fichier `.env.local` pour les variables d'environnement locales :

```env
APP_ENV=dev
APP_DEBUG=true
DATABASE_URL="sqlite:///%kernel.project_dir%/var/app.db"
```

## Docker

Le projet inclut des fichiers `compose.yaml` pour faciliter le déploiement en conteneurs :

```bash
docker-compose up -d
```

## Production

Pour déployer en production :

1. Définir les variables d'environnement appropriées
2. Exécuter les migrations Doctrine
3. Vider le cache avec l'environnement `prod`

```bash
APP_ENV=prod php bin/console cache:clear
```

## Contributeurs

- **antonio150** - Propriétaire du repository

## Licence

Propriétaire - Tous droits réservés

## Support

Pour toute question ou problème, veuillez créer une issue sur le repository GitHub.
