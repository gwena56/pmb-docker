<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wpbiblio' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'admin' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'admin' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'k(}ZSa^U nE{RReb}zJ5_^&t-}[[z +8wxV0W$sJps-7(wj1!;2V/S++t:}_G@ld' );
define( 'SECURE_AUTH_KEY',  '>!;W`55M%{~zEfG0lu=N%,w[4y6f^qMc(JOAAR.}7{<CQ-N+jQ+*3QJ34!1!s*,8' );
define( 'LOGGED_IN_KEY',    '~~mi$kS0scM~9szKT 7pMQD0{5cR&VYv4Pdz3#afu2{Y2WITao$It~`!:,rOq`hM' );
define( 'NONCE_KEY',        '9F6b;-NNt9Lg=C@$,:xnv?6S})TLry6CXl2=?AFaY%K?lDu;l)KMdn,&<6lOiM.n' );
define( 'AUTH_SALT',        '6$ARZ80;Z!L=L(V]}x4U4Ux32>*DnBZK!=j1[pE!Y3o0Jwa lJ(2ZSOVN%L;uWsr' );
define( 'SECURE_AUTH_SALT', 'kZqyzlD*^vJWg*s uhuIbUE +]L5Lj0k)ZB/y_8UFxi*>U#pQ:vuP.E.OxVWNp#8' );
define( 'LOGGED_IN_SALT',   'SH6/ys8r8JpsS{CF3zzb`[lqDhm&Nka,,r`Z]Txd|DK!}+&sb9<yWk7?]W5%{7pH' );
define( 'NONCE_SALT',       ':MHtT-|=9}Hdm@zuHnz?P![Vce%VHK[#gAzjP;9wD=#*p$y@M(Z8D9}9><&/3$k^' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
