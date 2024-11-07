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
Puis tester si le serveur et le projet Symfony fonctionnent : ``symfony serve``

* Installer PHP CS FIXER via :

  http://cutrona/installation-configuration/phpstorm/#configuration-de-phpstorm-analyse-statique-tests-statiques-de-code-php
* Puis Twig CS FIXER via :

  https://github.com/VincentLanglet/Twig-CS-Fixer

**Vous êtes désormais prêt à travailler sur le projet !**

