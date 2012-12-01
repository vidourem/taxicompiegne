<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur 
 * {@link http://codex.wordpress.org/Editing_wp-config.php Modifier
 * wp-config.php} (en anglais). C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'taxic208_wp');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'taxic208_wp');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'ehb5kidm');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '0>hMOQZNuPODJe.byW&#Qo$9q|:xY~$8|MYj!8#Cc=4gpHS*NjU]RdX*z`.y|{J`');
define('SECURE_AUTH_KEY',  ']|DIZJ.jzD+wwa-XO^g r&mHI-lsm>j0Po7PHyx-RQ[IRYxv_|hl|=-V+U}-:w]#');
define('LOGGED_IN_KEY',    'MulV+YN31/sm`%[!+$BXcrT@h1+3XW71Nn}ya=D,w(s<pu[yI?yD$&|9Juj+vG$q');
define('NONCE_KEY',        'OBx&D + 2 j.8Wm]AJJdX+a86)A6c1-3pNdho n9He?WISSWB!m J@ZA|P<->FBS');
define('AUTH_SALT',        'JH{VK+t]/h@aq7h 2xYCtTwe@9v} YBE)0VrDK/GsQlJXl^hv0L(S z[K_Kdybg[');
define('SECURE_AUTH_SALT', 'z9-xc!Y2Xcyp.Zbw$*ty+C2b-Byo8eBHBN6C9aMDd`vfy?1HS+]Qr;HJ%5|P2~P!');
define('LOGGED_IN_SALT',   '(^YjsFnYlM8XIbK*sl;3II+-))z_|rC{*S-#-T,qE+*z5e+h(d_de_&M[q_|8_b-');
define('NONCE_SALT',       'eg,=_||D=zJ_@(MK`Jp8Lu^F9R@28E,8_cp^{Hq-z6Ip{pR:Lhlt:F3=t@@nILg1');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'wp_';

/**
 * Langue de localisation de WordPress, par défaut en Anglais.
 *
 * Modifiez cette valeur pour localiser WordPress. Un fichier MO correspondant
 * au langage choisi doit être installé dans le dossier wp-content/languages.
 * Par exemple, pour mettre en place une traduction française, mettez le fichier
 * fr_FR.mo dans wp-content/languages, et réglez l'option ci-dessous à "fr_FR".
 */
define('WPLANG', 'fr_FR');

/** 
 * Pour les développeurs : le mode deboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 */ 
define('WP_DEBUG', false); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');