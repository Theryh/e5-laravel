Le système d'envoi de mails post-formulaire est opérationnel pour terminal, avec des composants partiellement fonctionnels. Les tests couvrent actuellement 50%, mais des problèmes sont apparues suite à des modifications dans Tinker, impactant aisni la stabilité du site.
J'ai ajouté et fais quoi depuis le dernier push de l'évalutation 2 ?
- Ajouter les requests
- Ajouter 1 repositories
- J'ai creer 3 composants, ne voulant pas en répeter pour les boutons submit...
- J'ai fais de nombreux tests, ceux des controllers et auth. (50% est atteint avec succès.)
- J'ai fait le mail pour terminal, que je n'ai pas répeter suite à un problème sur ce bouton pour essayer.
=======

## Voici toutes les informations à savoir sur ce projet
## Installation d'un Projet Laravel - Documentation Technique
Étape 1 :

PHP installé Composer installé Un serveur web (ex. Apache, Nginx) configuré Une base de données (ex. MySQL) installée et configurée

Étape 2 :

Ouvrez un terminal. Naviguez vers le répertoire où vous souhaitez installer le projet. Clonez le dépôt Git du projet Laravel à partir de votre référentiel distant avec la commande :
```bash
- git clone <URL_du_projet>
```
Étape 3 :

Naviguez dans le répertoire du projet Laravel cloné : cd nom_du_projet Exécutez la commande Composer pour installer les dépendances Laravel :
```bash
- composer install
```
Étape 4 :

Dupliquez le fichier .env.example en tant que .env. Configurez les informations de la base de données dans le fichier .env.

Étape 5 : Exécutez les migrations pour créer les tables de base de données :
```bash
- php artisan migrate
```
## Rôles et Autorisations
Admin
L'administrateur a un accès complet à toutes les ressources de l'application, y compris les Halls, les Portes d'Embarquement et les Terminaux.

L'administrateur peut effectuer des opérations de création, modification et suppression sur toutes ces ressources.

## Opérateur
L'opérateur a accès uniquement aux ressources de Portes d'Embarquement.

L'opérateur peut effectuer des opérations de création, modification et suppression sur les Portes d'Embarquement.

## Attribution d'Opérateur (par défaut)
Lorsqu'un nouvel utilisateur s'inscrit, il se voit attribuer le rôle d'operateur par défaut.

## Comment Modifier le Rôle (Admin ou Opérateur) pour un Nouvel Utilisateur
Si vous souhaitez que les nouveaux utilisateurs soient automatiquement attribués au rôle d'administrateur, vous pouvez suivre ces étapes :

Ouvrez le fichier User.php dans le dossier app de votre application Laravel.

Localisez la méthode boot dans le modèle User. Vous pouvez la trouver vers la ligne 96 du fichier User.php.

À l'intérieur de la méthode boot, recherchez la ligne suivante :
```bash
$bouncer->assign('operateur')->to($user);
```
Modifiez 'operateur' en 'admin' :
```bash
$bouncer->assign('admin')->to($user);
```
Cela signifie que chaque nouvel utilisateur inscrit sera automatiquement attribué au rôle d'administrateur. Si vous souhaitez l'attribution inverse (par défaut, tous les nouveaux utilisateurs sont des administrateurs), vous pouvez effectuer l'inversion de ces étapes.
