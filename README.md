# pmb-docker
test de PMB Version 7.3.1 sous Docker pour les bibliothèques.
ce test fait suite aux essais réalisés grace au travail sur https://github.com/jperon/pmb ...

----

**Ce qui marche :**

-  Le serveur web nginx
-  php 7 en fast CGI : http://SERVEUR/infos.php
-  le portail Wordpress
-  phpmyadmin
-  PMB 7 fonctionne 

le user est admin, le mot de passe admin pour toutes les authentifications

----

**Ce qui ne marche pas :**

 - indexation complete d'une ancienne base PMB 4.0.12

----

**Ce qui reste à faire :**

- Mettre à jour les anciens connecteurs PMB/Wordpress (ils ne sont pas encore sur le github)
