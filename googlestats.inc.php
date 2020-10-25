<?php

/***************************************************************************
* GoogleStats
*
* Author: Olivier Duffez, WebRankInfo ( http://www.webrankinfo.com )
* Version: 2.0
* Date: 2004-02-23
* Homepage: http://www.googlestats.com
***************************************************************************/
include '../../mainfile.php';
require XOOPS_ROOT_PATH . '/modules/googlestats/cache/config.php';
global $xoopsDB;
function debug1($x)
{
    // echo "|$x|<br>";
}
function sendErrorMySQL($sql)
{
    global $ADRESSE_EMAIL, $LANG;

    if ('y' == $SEND_ERROR_MYSQL) {
        @mail(
            $ADRESSE_EMAIL,
            $LANG['MySQLErrorSubject'],
            $LANG['MySQLErrorBody1'] . $sql . "\n" . $LANG['MySQLErrorBody2'],
            "From: $ADRESSE_EMAIL"
        );
    }
}
// pour compatibilité avec les anciennes versions de PHP
if (!isset($_SERVER)) {
    $_SERVER = $HTTP_SERVER_VARS;
}
// pour chaque robot (sauf ceux qui sont désactivés)
$sql = 'SELECT *';
$sql .= ' FROM ' . $xoopsDB->prefix('gs_robots');
$sql .= ' WHERE actif=1';
$res = $xoopsDB->query($sql) or sendErrorMySQL($sql);
while (false !== ($enr = $xoopsDB->fetchArray($res))) {
    // par defaut le robot n'est pas détecté

    $detecte = false;

    // selon le mode de détection du robot :

    if ($enr['detection'] == $DETECTION_USER_AGENT) {
        // on détecte le robot en regardant son User Agent

        $pos = mb_strpos(mb_strtolower($_SERVER['HTTP_USER_AGENT']), mb_strtolower($enr['user_agent']));

        // $detecte = (is_string($pos) && !$pos));

        $detecte = (false !== $pos);

    //echo "|".$enr["nom"]."|".$_SERVER["HTTP_USER_AGENT"]."|".$enr["user_agent"]."|".$pos."|".$detecte."|<br>";
    } else {
        if ($enr['detection'] == $DETECTION_IP) {
            // on détecte le robot par son adresse IP

            if (('' != $enr['ip1']) && ('' != $enr['ip2'])) {
                $detecte = ((false !== mb_strpos($_SERVER['REMOTE_ADDR'], $enr['ip1'])) ||
(false !== mb_strpos($_SERVER['REMOTE_ADDR'], $enr['ip2'])));
            }
        }
    }

    // si le robot a été détecté, on enregistre sa visite

    if ($detecte) {
        // date, adresse IP du robot et nom de domaine

        $robot_ = $enr['id'];

        $date_ = date('Y-m-d H:i');

        $ip_ = $_SERVER['REMOTE_ADDR'];

        $dns_ = @gethostbyaddr($ip_);

        // récupération de l'URL (située après le nom de domaine)

        if ('y' == $URL_REWRITING) {
            $url_ = $_SERVER['REQUEST_URI'];
        } else {
            $url_ = $_SERVER['SCRIPT_NAME'];

            if ('' != $_SERVER['QUERY_STRING']) {
                $url_ .= '?' . $_SERVER['QUERY_STRING'];
            }
        }

        // requete MySQL d'insertion de la visite

        $sql2 = 'INSERT INTO ' . $xoopsDB->prefix('gs_log');

        $sql2 .= " (robot, url, date, ip, dns) VALUES ('$robot_', '$url_', '$date_', '$ip_', '$dns_')";

        $res2 = $xoopsDB->query($sql2) or sendErrorMySQL($sql2);

        // test du debut du Full Crawl

        if ('y' == $TEST_FULL_CRAWL) {
            // si le robot est le GoogleBot Full Crawl

            if (false !== mb_strpos($_SERVER['REMOTE_ADDR'], $FULL_CRAWL_IP)) {
                // on va chercher s'il est déjà venu dans les $NB_J_DET_FULL_CRAWL

                // derniers jours

                $sql3 = 'SELECT id';

                $sql3 .= ' FROM ' . $xoopsDB->prefix('gs_log');

                $sql3 .= " WHERE ip LIKE '" . $FULL_CRAWL_IP . "%')";

                $sql3 .= " AND TO_DAYS(NOW()) - TO_DAYS(date)) < $NB_J_DET_FULL_CRAWL";

                $res3 = $xoopsDB->query($sql3) or sendErrorMySQL($sql3);

                // si la requete n'a donné aucun résultat, c'est sans doute le

                // début du Full Crawl : on envoie un mail

                if (0 == $xoopsDB->getRowsNum($res3)) {
                    @mail(
                        $ADRESSE_EMAIL,
                        $LANG['FullCrawlBeginSubject'],
                        $LANG['FullCrawlBeginBody'],
                        "From: $ADRESSE_EMAIL"
                    );
                }
            }
        } // fin du test sur le Full Crawl
    } // fin du cas où un robot a été détecté
} // fin de la boucle sur les robots
