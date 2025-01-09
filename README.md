# SAé CHU 3.01
## Auteurs :
* PEYRELONGUE Côme
* RAYAUME Hugo
* DUPONT Enzo
* LINDEN Thomas
* PAZZE Thomas
## Installation / Configuration :
* Cloner le dépôt git distant via :

    ```git clone https://iut-info.univ-reims.fr/gitlab/peyr0018/sae-chu-3.01.git```
* Installer Composer en suivant le tutoriel :
    
    http://cutrona/installation-configuration/composer/
* Installer Symfony :
  * Linux : ``wget https://get.symfony.com/cli/installer -O - | bash``
  * ou windows :
    * Installer d'abord scoop via un invite de commande Powershell : ``Set-ExecutionPolicy -ExecutionPolicy RemoteSigned -Scope CurrentUser
      Invoke-RestMethod -Uri https://get.scoop.sh | Invoke-Expression``
    * Puis installer Symfony : ``scoop install symfony-cli``

Au démarrage dans PHPStorm, commencer par installer composer dans le projet : ``Composer install``
Puis tester si le serveur et le projet Symfony fonctionnent : ``composer start``
Copier le fichier .env en .env.local, puis remplacer la ligne décommenter par : 
**DATABASE_URL="mysql://votreLogin:votreMotDePasse@mysql:3306/votreLogin_CHU?serverVersion=mariadb-10.2.25&charset=utf8mb4"**

* Installer PHP CS FIXER via :

  http://cutrona/installation-configuration/phpstorm/#configuration-de-phpstorm-analyse-statique-tests-statiques-de-code-php
* Puis Twig CS FIXER via :

  https://github.com/VincentLanglet/Twig-CS-Fixer

## Exécution des tests

### Pré-requis
- Installer les dépendances avec Composer : `composer install`
- Configurer une base de données de test dans le fichier `.env.test`

### Lancer les tests
Utilisez le script suivant pour exécuter les tests :
``composer test:codeception``

### Scripts composer

* Lancer le serveur : ``composer start``
* Création de la BD, application des migrations et génération des données fictives: ``composer db``
* Lancemment des tests du code PHP CS Fixer + Twig CS Fixer  : ``composer test``
* Correction du code PHP CS Fixer + Twig CS Fixer : ``composer fix``

**Vous êtes désormais prêt à travailler sur le projet !**

### comptes de test : 

| Nom               | Login   | Roles      | Password |
|-------------------|---------|------------|----------|
| PEYRELONGUE       | Come    | ROLE_ADMIN | test     |
| RAYAUME           | Hugo    | ROLE_ADMIN | test     |
| DUPONT            | Enzo    | ROLE_ADMIN | test     |
| LINDEN            | ThomasL | ROLE_ADMIN | test     |
| PAZZE             | ThomasP | ROLE_ADMIN | test     |
| voir ID 11 dans BD | user    | ROLE_USER  | test     |
| voir ID 6 dans BD | pro     | ROLE_PRO   | test     |

