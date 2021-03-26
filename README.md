# pmb-docker
test de PMB Version 7.3.1 sous Docker pour les bibliothèques.

**Ce qui marche :**

-  Le serveur web nginx
-  php 7 en fast CGI : http://SERVEUR/infos.php
-  le portail Wordpress
-  phpmydmin

le user est admin, le mot de passe admin pour toutes les authentifications

**Ce qui ne marche pas :**

- PMB 7.3.1 ne démarre pas (compatibilité PHP7?)
  - index.php ne fonctionne pas
  - ./tables/install.php ne s'execute pas mais se télécharge.


**Ce qui reste à faire :**

- Mettre à jour les anciens connecteurs PMB/Wordpress (ils ne sont pas encore sur le github)
