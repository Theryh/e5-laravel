## Voici toutes les informations à savoir sur ce projet

## Installation d'un Projet Laravel - Documentation Technique 

 Étape 1 :

PHP installé
Composer installé
Un serveur web (ex. Apache, Nginx) configuré
Une base de données (ex. MySQL) installée et configurée

 Étape 2 :

Ouvrez un terminal.
Naviguez vers le répertoire où vous souhaitez installer le projet.
Clonez le dépôt Git du projet Laravel à partir de votre référentiel distant avec la commande :
- git clone <URL_du_projet>

 Étape 3 :

Naviguez dans le répertoire du projet Laravel cloné :
cd nom_du_projet
Exécutez la commande Composer pour installer les dépendances Laravel :
- composer install

Étape 4 :

Dupliquez le fichier .env.example en tant que .env.
Configurez les informations de la base de données dans le fichier .env.

 Étape 5 :
Exécutez les migrations pour créer les tables de base de données :
- php artisan migrate

## Rôles et Autorisations

## Admin

L'administrateur a un accès complet à toutes les ressources de l'application, y compris les Halls, les Portes d'Embarquement et les Terminaux.

L'administrateur peut effectuer des opérations de création, modification et suppression sur toutes ces ressources.

## Opérateur

L'opérateur a accès uniquement aux ressources de Portes d'Embarquement.

L'opérateur peut effectuer des opérations de création, modification et suppression sur les Portes d'Embarquement.

## Attribution d'Opérateur (par défaut)
Lorsqu'un nouvel utilisateur s'inscrit, il se voit attribuer le rôle d'opérateur par défaut.

## Comment Modifier le Rôle (Admin ou Opérateur) pour un Nouvel Utilisateur
Si vous souhaitez que les nouveaux utilisateurs soient automatiquement attribués au rôle d'administrateur, vous pouvez suivre ces étapes :

Ouvrez le fichier User.php dans le dossier app de votre application Laravel.

Localisez la méthode boot dans le modèle User. Vous pouvez la trouver vers la ligne 96 du fichier User.php.

À l'intérieur de la méthode boot, recherchez la ligne suivante :

$bouncer->assign('operateur')->to($user);

Modifiez 'operateur' en 'admin' :

$bouncer->assign('admin')->to($user);

Cela signifie que chaque nouvel utilisateur inscrit sera automatiquement attribué au rôle d'administrateur. Si vous souhaitez l'attribution inverse (par défaut, tous les nouveaux utilisateurs sont des administrateurs), vous pouvez effectuer l'inversion de ces étapes.
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
