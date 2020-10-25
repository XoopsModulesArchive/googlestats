<?php

/***************************************************************************
 * GoogleStats
 *
 * Author: Olivier Duffez, WebRankInfo ( http://www.webrankinfo.com )
 * Version: 2.0
 * Date: 2004-02-23
 * Homepage: http://www.googlestats.com
 ***************************************************************************/
// ---------------------------------------------------------------------------
// Affichage des robots
// ---------------------------------------------------------------------------
function afficherListeRobots()
{
    global $LANG, $LANGUE, $TABLE_ROBOTS;

    $sql = 'SELECT *';

    $sql .= ' FROM ' . $TABLE_ROBOTS;

    $sql .= ' ORDER BY nom ASC';

    $res = $GLOBALS['xoopsDB']->queryF($sql) or erreurServeurMySQL($sql);

    $enr = $GLOBALS['xoopsDB']->fetchBoth($res);

    if (!$enr) {
        echo "<center><a class='erreur'>&nbsp;" . $LANG['NoRobotDefined'] . '&nbsp;</a><br></p>';
    } else {
        $descr = 'descr_' . $LANGUE;

        echo "<table border='1' cellspacing='0' cellpadding='10' width='100%'>\n";

        echo "<tr width='100%' bgcolor='#DDF5FF'>\n";

        echo "<td class='moyen-centre'><b>" . $LANG['Admin'] . '</b></td>';

        echo "<td class='moyen-centre'><b>" . $LANG['RobotName'] . '</b></td>';

        echo "<td class='moyen-centre'><b>" . $LANG['RobotActive'] . '</b></td>';

        echo "<td class='moyen-centre'><b>" . $LANG['RobotUserAgent'] . '</b></td>';

        echo "<td class='moyen-centre'><b>" . $LANG['RobotIP1'] . '</b></td>';

        echo "<td class='moyen-centre'><b>" . $LANG['RobotIP2'] . '</b></td>';

        echo "<td class='moyen-centre'><b>" . $LANG['RobotMode'] . '</b></td>';

        echo "<td class='moyen-centre'><b>" . $LANG['RobotDesc'] . '</b></td>';

        echo "</tr>\n";

        $num_robot = 0;

        do {
            $num_robot++;

            (0 == ($num_robot % 2)) ? $bgcolor = '#DDF5FF' : $bgcolor = '#E0F0FF';

            echo "<tr width='100%' bgcolor='" . $bgcolor . "'>\n";

            echo "<td class='moyen-centre'><a href='robots.php?rub=suppr&robot=" . $enr['id'] . "'>" . $LANG['Delete'] . '</a>&nbsp;/&nbsp;';

            echo "<a href='robots.php?rub=modif&robot=" . $enr['id'] . "'>" . $LANG['Modify'] . '</a></td>';

            echo "<td class='moyen-centre'>" . $enr['nom'] . '</td>';

            echo "<td class='moyen-centre'>" . ((1 == $enr['actif']) ? $LANG['YES'] : "<span class='erreur'><b>" . $LANG['NO'] . '</b></span>') . '</td>';

            echo "<td class='moyen-centre'><a href='" . $enr['url'] . "' target='_blank' title='" . $LANG['RobotURLInfo'] . "'>" . $enr['user_agent'] . '</a></td>';

            echo "<td class='fixe-centre'> " . $enr['ip1'] . '</td>';

            echo "<td class='fixe-centre'> " . $enr['ip2'] . '</td>';

            echo "<td class='moyen-centre'>" . $LANG[$enr['detection']] . '</td>';

            echo "<td class='moyen'>" . $enr[$descr] . '</td>';
        } while (false !== ($enr = $GLOBALS['xoopsDB']->fetchBoth($res)));

        echo "</table>\n";

        echo "</td></tr>\n";

        echo '</table>';
    }
}
// ---------------------------------------------------------------------------
// formulaire d'ajout ou de modification d'un robot
// ---------------------------------------------------------------------------
function formulaireRobot($robot)
{
    global $LANG, $LANGUE, $TABLE_ROBOTS, $DETECTION_USER_AGENT, $DETECTION_IP;

    if (-1 != $robot) {
        $title = $LANG['ModifyRobot'];

        $sql = 'SELECT *';

        $sql .= ' FROM ' . $TABLE_ROBOTS;

        $sql .= ' WHERE id=' . $robot;

        $res = $GLOBALS['xoopsDB']->queryF($sql) or erreurServeurMySQL($sql);

        $enr = $GLOBALS['xoopsDB']->fetchBoth($res);

        $rub = 'modif';

        $actif = $enr['actif'];
    } else {
        $title = $LANG['AddRobot'];

        $rub = 'ajouter';

        $actif = 1;
    }

    // begin of form

    echo '<h2>' . $title . '</h2>';

    echo "<table border='0' cellspacing='0' cellpadding='2'>";

    echo "<form method='post' action='robots.php?rub=ajouter'>\n";

    echo "<input type='hidden' name='robot' value='" . $robot . "'>\n";

    // robot's name

    echo "<tr><td class='normal'><b>" . $LANG['RobotName'] . '</b></td>';

    echo "<td><input name='nom' type='text' size='80' class='normal' value='" . $enr['nom'] . "'></td></tr>";

    // robot is active?

    echo "<tr><td class='normal'><b>" . $LANG['RobotActive'] . '</b></td>';

    echo "<td><select name='actif' size='1'>";

    echo "<option class='normal' value='1'";

    echo((1 == $actif) ? ' selected' : ' ');

    echo '>' . $LANG['YES'];

    echo "<option class='normal' value='0'";

    echo((0 == $actif) ? ' selected' : ' ');

    echo '>' . $LANG['NO'];

    echo '</select></td></tr>';

    // robot's user agent

    echo "<tr><td class='normal'><b>" . $LANG['RobotUserAgent'] . '</b></td>';

    echo "<td><input name='user_agent' type='text' size='80' class='normal' value='" . $enr['user_agent'] . "'></td></tr>";

    // robot's address IP #1

    echo "<tr><td class='normal'><b>" . $LANG['RobotIP1'] . '</b></td>';

    echo "<td><input name='ip1' type='text' size='80' class='normal' value='" . $enr['ip1'] . "'></td></tr>";

    // robot's address IP #2

    echo "<tr><td class='normal'><b>" . $LANG['RobotIP2'] . '</b></td>';

    echo "<td><input name='ip2' type='text' size='80' class='normal' value='" . $enr['ip2'] . "'></td></tr>";

    // detection mode

    echo "<tr><td class='normal'><b>" . $LANG['RobotMode'] . '</b></td>';

    echo "<td><select name='detection' size='1'>";

    echo "<option class='normal' value='" . $DETECTION_USER_AGENT . "'";

    echo(($enr['detection'] == $DETECTION_USER_AGENT) ? ' selected' : ' ');

    echo '>' . $LANG[$DETECTION_USER_AGENT];

    echo "<option class='normal' value='" . $DETECTION_IP . "'";

    echo(($enr['detection'] == $DETECTION_IP) ? ' selected' : ' ');

    echo '>' . $LANG[$DETECTION_IP];

    echo '</select></td></tr>';

    // robot's description in francais

    echo "<tr><td class='normal'><b>" . $LANG['RobotDesc'] . '</b></td>';

    echo "<td><textarea name='descr_fr' rows='7' cols='80' class='normal'>" . $enr['descr_fr'] . '</textarea></td></tr>';

    // robot's description in english

    echo "<tr><td class='normal'><b>" . $LANG['RobotDesc'] . '</b></td>';

    echo "<td><textarea name='descr_en' rows='7' cols='80' class='normal'>" . $enr['descr_en'] . '</textarea></td></tr>';

    // robot's user agent

    echo "<tr><td class='normal'><b>" . $LANG['RobotURL'] . '</b></td>';

    echo "<td><input name='url' type='text' size='80' class='normal' value='" . $enr['url'] . "'></td></tr>";

    // submit button

    echo "<tr><td colspan='2' align='center' class='normal'><center><input type='submit' class='bouton' value='" . $LANG['OK'] . "'></center></td></tr>";

    // end of form

    echo "</form>\n";

    echo "</table>\n";

    echo '</td>';

    echo '</tr>';

    echo "</table>\n";
}
// ---------------------------------------------------------------------------
// Ajoute ou met à jour un robot dans la base
// ---------------------------------------------------------------------------
function updateDataBase($robot, $nom, $actif, $user_agent, $ip1, $ip2, $detection, $descr_fr, $descr_en, $url)
{
    global $LANG, $LANGUE, $TABLE_ROBOTS, $DETECTION_USER_AGENT, $DETECTION_IP;

    // dans tous les cas :

    echo "<p class='normal'><a class='erreur'>&nbsp;";

    $msg = '';

    // test du nom

    if ('' == $nom) {
        $msg = $LANG['BadRobotName'];
    }

    // test selon le mode de detection

    if ($detection == $DETECTION_USER_AGENT) {
        if ('' == $user_agent) {
            $msg = $LANG['BadUserAgent'];
        }
    } else {
        if ($detection == $DETECTION_IP) {
            if (('' == $ip1) && ('' == $ip2)) {
                $msg = $LANG['IPNotSpecified'];
            }
        } else {
            $msg = $LANG['BadDetectionMode'];
        }
    }

    if ('' != $msg) {
        echo $msg;
    } else {
        $liste_champs = 'nom, actif, user_agent, ip1, ip2, detection, descr_fr, descr_en, url';

        $liste_valeurs = "'$nom', '$actif', '$user_agent', '$ip1', '$ip2', '$detection', '$descr_fr', '$descr_en', '$url'";

        if ($robot > 0) { // cas d'une modification et non d'un ajout
            $liste_champs .= ', id';

            $liste_valeurs .= ", '$robot'";

            $sql = 'REPLACE INTO ' . $TABLE_ROBOTS . " ($liste_champs) VALUES ($liste_valeurs)";

            $res = $GLOBALS['xoopsDB']->queryF($sql) or erreurServeurMySQL($sql);

            echo $LANG['RobotUpdated'];
        } else {
            $sql = 'INSERT INTO ' . $TABLE_ROBOTS . " ($liste_champs) VALUES ($liste_valeurs)";

            $res = $GLOBALS['xoopsDB']->queryF($sql) or erreurServeurMySQL($sql);

            echo $LANG['RobotAdded'];
        }
    }

    echo "&nbsp;</a><br><a href='robots.php?robot=" . $robot . "'>" . $LANG['BackToRobotsAdmin'] . '</a></p>';
}
