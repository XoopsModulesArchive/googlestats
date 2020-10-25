<?php

/***************************************************************************
* GoogleStats
*
* Author: Olivier Duffez, WebRankInfo ( http://www.webrankinfo.com )
* Version: 2.0
* Date: 2004-02-23
* Homepage: http://www.googlestats.com
***************************************************************************/
require_once 'admin_header.php';
xoops_cp_header();
OpenTable();
include 'robots.lib.php';
echo '<h2>' . $LANG['AdminRobots'] . '</h2>';
echo "<p class='normal'><a href='robots.php?rub=nouveau'>" . $LANG['AddRobot'] . '</a></p>';
// ---------------------------------------------------------------------------
// Nouveau robot
// ---------------------------------------------------------------------------
if ('nouveau' == $rub) {
    formulaireRobot(-1);
}
// ---------------------------------------------------------------------------
// Modifier une URL
// ---------------------------------------------------------------------------
else {
    if ('modif' == $rub) {
        formulaireRobot($robot);
    }

    // ---------------------------------------------------------------------------

    // Supprimer un robot

    // ---------------------------------------------------------------------------

    else {
        if ('suppr' == $rub) {
            $sql = 'DELETE';

            $sql .= ' FROM ' . $TABLE_ROBOTS;

            $sql .= ' WHERE id=' . $robot;

            $res = $GLOBALS['xoopsDB']->queryF($sql) or erreurServeurMySQL($sql);

            echo "<p class='normal'><a class='erreur'>&nbsp;" . $LANG['RobotDeleted'] . '&nbsp;</a><br>';

            echo "<a href='robots.php'>" . $LANG['BackToRobotsAdmin'] . '</a></p>';
        }

        // ---------------------------------------------------------------------------

        // Ajouter ou mettre à jour un robot dans la base

        // ---------------------------------------------------------------------------

        else {
            if ('ajouter' == $rub) {
                updateDataBase($robot, $nom, $actif, $user_agent, $ip1, $ip2, $detection, $descr_fr, $descr_en, $url);
            }

            // ---------------------------------------------------------------------------

            // Affichage des robots

            // ---------------------------------------------------------------------------

            else {
                afficherListeRobots();
            }
        }
    }
}
CloseTable();
xoops_cp_footer();
