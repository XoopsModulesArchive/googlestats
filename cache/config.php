<?php

/***************************************************************************
* GoogleStats
*
* Author: Olivier Duffez, WebRankInfo ( http://www.webrankinfo.com )
* Version: 2.0
* Date: 2004-02-23
* Homepage: http://www.googlestats.com
***************************************************************************/
global $LANG, $xoopsDB, $xoopsConfig;
if (!defined('gs_config')) {
    define('gs_config', 'gs_config_ok');

    // ---------------------------------------------------------------------------
// definition des variables pour les options
// ---------------------------------------------------------------------------
$URL_REWRITING = 'y'; // mettre "y" en cas d'URL rewriting ("y", "n")
$GRAPH_SCALE = 'lin'; // echelle lineaire ou logarithmique ("lin", "log")
$VALEURS_GRAPH = 'y'; // affichage des valeurs sur le graphique ("y", "n")
$SET_EXEC_TIME = 'y'; // reglage de la duree max du script graph ("y", "n")
$TEST_FULL_CRAWL = 'y'; // mettre "y" pour detecter le Full Crawl ("y", "n")
$SEND_ERROR_MYSQL = 'y'; // mettre "y" pour l'envoi d'email en cas d'erreur ("y", "n")
// ---------------------------------------------------------------------------
// definition des constantes A PERSONNALISER
// ---------------------------------------------------------------------------
$LANGUE = $xoopsConfig['language']; // langue d'affichage de GoogleStats ("fr", "en")
$ADRESSE_EMAIL = $xoopsConfig['adminmail']; // adresse email du webmaster
$TABLE_LOG = $xoopsDB->prefix('gs_log'); // nom de la table stockant les visites
$TABLE_ROBOTS = $xoopsDB->prefix('gs_robots'); // nom de la table definissant les robots
// pour la détection du Full Crawl : on génère une alerte donnant le début
// du Full Crawl dès qu'un robot du Full Crawl se présente et qu'aucune
// visite de robot de Full Crawl n'a été enregistrée dans les
// $NB_J_DET_FULL_CRAWL derniers jours
$NB_J_DET_FULL_CRAWL = 2;

    // ---------------------------------------------------------------------------

    // definition des constantes A NE PAS MODIFIER

    // ---------------------------------------------------------------------------

    $DETECTION_USER_AGENT = 'detection_user_agent';

    $DETECTION_IP = 'detection_ip';

    $FULL_CRAWL_IP = '216.239.46.';

    $VERSION_GS = 'v2.0';

    $DATE_VERSION = '2004-02-23';
}
