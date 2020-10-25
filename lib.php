<?php

/***************************************************************************
* GoogleStats
*
* Author: Olivier Duffez, WebRankInfo ( http://www.webrankinfo.com )
* Version: 2.0
* Date: 2004-02-23
* Homepage: http://www.googlestats.com
***************************************************************************/
require_once(XOOPS_ROOT_PATH . '/modules/googlestats/calendrier.php');
function debug($x)
{
    echo "|$x|<br>";
}
// ---------------------------------------------------------------------------
// retourne une variable globale
// ---------------------------------------------------------------------------
function getVar($var)
{
    global $_GET;

    if (!isset($_GET)) {
        $_GET = $_GET;
    }

    return $_GET[$var] ?? '';
}
// ---------------------------------------------------------------------------
// gestion des erreurs MySQL
// ---------------------------------------------------------------------------
function erreurServeurMySQL($sql)
{
    global $LANG, $xoopsDB, $xoopsConfig;

    die("<span class='erreur'>&nbsp;" . $LANG['Error'] . ":&nbsp;</span><span class='fixe-gauche'>" . $sql . ' ' . $GLOBALS['xoopsDB']->error() . '</span>');
}
// ------------------------------------------------------------------------
// retourne le champ
// ------------------------------------------------------------------------
function donneChamp($table, $champ_affiche, $champ_cible, $valeur)
{
    global $xoopsDB;

    $sql = 'SELECT ' . $champ_affiche;

    $sql .= ' FROM ' . $table;

    $sql .= ' WHERE ' . $champ_cible . "='" . $valeur . "'";

    $res = $xoopsDB->query($sql) or erreurServeurMySQL($sql);

    $enr = $GLOBALS['xoopsDB']->fetchObject($res);

    return $enr->$champ_affiche;
}
// ---------------------------------------------------------------------------
// renvoie le nombre d'enregistrements d'une table
// ---------------------------------------------------------------------------
function nbEnr($table)
{
    global $xoopsDB;

    $sql = 'SELECT id';

    $sql .= ' FROM ' . $table;

    $res = $xoopsDB->query($sql) or erreurServeurMySQL($sql);

    return $xoopsDB->getRowsNum($res);
}
// ---------------------------------------------------------------------------
// affichage du début du tableau principal
// ---------------------------------------------------------------------------
function afficherDebutTableau($rub, $lien)
{
    global $LANG;

    $table_width = 700;

    $left_width = 200;

    echo "<table width='$table_width' border='0' cellspacing='5' cellpadding='0' align='center'>";

    echo '<tr>';

    echo "<td width='$left_width'>&nbsp;</td>";

    $tab_rub = [
'bilan' => $LANG['Summary'],
'pages' => $LANG['Pages'],
];

    //, "graph" => $LANG["Graph"]

    $width = (int)(($table_width - $left_width) / count($tab_rub));

    foreach ($tab_rub as $rubrique => $nom_rub) {
        $onglet = ($rubrique == $rub) ? 'actif' : 'inactif';

        echo "<td align='center' class='onglet-" . $onglet . "' width='" . $width . "'>";

        echo "<a href='index.php?rub=" . $rubrique . $lien . "'>" . $nom_rub . '</a></td>';
    }

    echo '</tr>';

    echo '<tr>';

    echo "<td width='$left_width' valign='top' align='center'>";
}
// ---------------------------------------------------------------------------
// affichage de la liste des robots avec celui qui est sélectionné
// ---------------------------------------------------------------------------
function afficherRobots($robot)
{
    global $LANG, $TABLE_ROBOTS, $xoopsDB;

    $TABLE_ROBOTS = $xoopsDB->prefix('gs_robots');

    $nbRobots = nbEnr($TABLE_ROBOTS);

    if (0 == $nbRobots) {
        echo "<p align='justify'>" . $LANG['NoRobotDefined'] . '<p>';
    } else {
        $ordre = getVar('ordre');

        $sens = getVar('sens');

        $d = getVar('d');

        $m = getVar('m');

        $s = getVar('s');

        $rub = getVar('rub');

        $lien = '&d=' . $d . '&s=' . $s . '&m=' . $m . '&ordre=' . $ordre . '&sens=' . $sens;

        // robots activés

        $sql = 'SELECT id, nom';

        $sql .= ' FROM ' . $xoopsDB->prefix('gs_robots');

        $sql .= ' WHERE actif=1';

        $sql .= ' ORDER BY nom ASC';

        $res = $xoopsDB->query($sql) or erreurServeurMySQL($sql);

        echo '<p>' . $LANG['ActiveRobots'] . ':';

        echo "<div align='left'><ul>";

        while (false !== ($enr = $xoopsDB->fetchArray($res))) {
            echo "<li><a href='index.php?rub=" . $rub . '&robot=' . $enr['id'] . $lien . "'>";

            if ($enr['id'] == $robot) {
                echo "<img src='img/d.gif' alt='" . $LANG['SelectedRobot'] . "' width='13' height='13' border='0'>&nbsp;<b><u>" . $enr['nom'] . '</u></b>';
            } else {
                echo $enr['nom'];
            }

            echo '</a>&nbsp;<a href="#" class="petit" onClick="window.open(\'info-robot.php?robot=' . $enr['id'] . '\',\'\',\'width=400,height=500,resize=1,toolbar=0\');">[info]</a></li>';
        }

        echo '</ul></div></p>';

        // robots désactivés

        $sql = 'SELECT id, nom';

        $sql .= ' FROM ' . $xoopsDB->prefix('gs_robots');

        $sql .= ' WHERE actif=0';

        $sql .= ' ORDER BY nom ASC';

        $res = $xoopsDB->query($sql) or erreurServeurMySQL($sql);

        echo '<p>' . $LANG['NonActiveRobots'] . ':';

        echo "<div align='left'><ul>";

        while (false !== ($enr = $xoopsDB->fetchArray($res))) {
            echo "<li><a href='index.php?rub=" . $rub . '&robot=' . $enr['id'] . $lien . "'>";

            if ($enr['id'] == $robot) {
                echo "<img src='img/d.gif' alt='" . $LANG['SelectedRobot'] . "' width='13' height='13' border='0'>&nbsp;<b><u>" . $enr['nom'] . '</u></b>';
            } else {
                echo $enr['nom'];
            }

            echo '</a>&nbsp;<a href="#" onClick="window.open(\'info-robot.php?robot=' . $enr['id'] . '\',\'\',\'width=400,height=500,resize=1,toolbar=0\');">[info]</a></li>';
        }

        echo '</ul></div></p>';
    }
}
// ---------------------------------------------------------------------------
// renvoie le nombre de visites de Googlebot entre 2 dates
// ---------------------------------------------------------------------------
function nbVisites($robot)
{
    global $TABLE_LOG, $xoopsDB;

    $d = getVar('d');

    $m = getVar('m');

    $s = getVar('s');

    if ('' == $d) {
        $today = getdate();

        $a = $today['year'];
    } else {
        $a = mb_substr($d, 0, 4);
    }

    // choix des dates pour la requete...

    if ('' != $s) {
        // cas d'une semaine

        $sql_date = '(WEEK(date,1) = ' . $s . ') AND (YEAR(date) = ' . $a . ')';
    } else {
        if ('' != $m) {
            // cas d'un mois

            $sql_date = '(MONTH(date) = ' . $m . ') AND (YEAR(date) = ' . $a . ')';
        } else {
            // cas d'un jour

            if ('' == $d) {
                $today = getdate();

                $year = $today['year'];

                $month = $today['mon'];

                $day = $today['mday'];

                $d = sprintf("$year%02d%02d", $month, $day);
            } else {
                $month = mb_substr($d, 4, 2);

                $day = mb_substr($d, 6, 2);

                $year = mb_substr($d, 0, 4);
            }

            $sql_date = "TO_DAYS(date) = TO_DAYS('" . $year . '-' . $month . '-' . $day . "')";
        }
    }

    $sql = 'SELECT id';

    $sql .= ' FROM ' . $xoopsDB->prefix('gs_log');

    $sql .= ' WHERE ' . $sql_date;

    $sql .= ' AND robot=' . $robot;

    $res = $xoopsDB->query($sql) or erreurServeurMySQL($sql);

    return $xoopsDB->getRowsNum($res);
}
// ---------------------------------------------------------------------------
// liste des robots activés ayant visité le site dans la période considérée
// ---------------------------------------------------------------------------
function listeVisitesRobots()
{
    global $TABLE_ROBOTS, $LANG, $xoopsDB;

    $ordre = getVar('ordre');

    $sens = getVar('sens');

    $d = getVar('d');

    $m = getVar('m');

    $s = getVar('s');

    $rub = getVar('rub');

    $lien = 'index.php?rub=' . $rub . '&d=' . $d . '&s=' . $s . '&m=' . $m . '&ordre=' . $ordre . '&sens=' . $sens;

    // pour chaque robot (sauf ceux qui sont désactivés)

    $sql = 'SELECT id, nom';

    $sql .= ' FROM ' . $xoopsDB->prefix('gs_robots');

    $sql .= ' WHERE actif=1';

    $res = $xoopsDB->query($sql) or sendErrorMySQL($sql);

    $html = "<span class='moyen-gauche'>" . $LANG['ListeRobotsVenus'] . '<br>';

    while (false !== ($enr = $xoopsDB->fetchArray($res))) {
        if (nbVisites($enr['id']) > 0) {
            $html .= "- <a href='" . $lien . '&robot=' . $enr['id'] . "'>" . $enr['nom'] . '</a><br>';
        }
    }

    $html .= '<br></span>';

    return $html;
}
// ---------------------------------------------------------------------------
// renvoie le nombre de pages différentes vues par Googlebot
// ---------------------------------------------------------------------------
function nbPagesDifferentes($robot)
{
    global $TABLE_LOG, $xoopsDB;

    $d = getVar('d');

    $m = getVar('m');

    $s = getVar('s');

    if ('' == $d) {
        $today = getdate();

        $a = $today['year'];
    } else {
        $a = mb_substr($d, 0, 4);
    }

    // choix des dates pour la requete...

    if ('' != $s) {
        // cas d'une semaine

        $sql_date = '(WEEK(date,1) = ' . $s . ') AND (YEAR(date) = ' . $a . ')';
    } else {
        if ('' != $m) {
            // cas d'un mois

            $sql_date = '(MONTH(date) = ' . $m . ') AND (YEAR(date) = ' . $a . ')';
        } else {
            // cas d'un jour

            if ('' == $d) {
                $today = getdate();

                $year = $today['year'];

                $month = $today['mon'];

                $day = $today['mday'];

                $d = sprintf("$year%02d%02d", $month, $day);
            } else {
                $month = mb_substr($d, 4, 2);

                $day = mb_substr($d, 6, 2);

                $year = mb_substr($d, 0, 4);
            }

            $sql_date = "TO_DAYS(date) = TO_DAYS('" . $year . '-' . $month . '-' . $day . "')";
        }
    }

    $sql = 'SELECT id';

    $sql .= ' FROM ' . $xoopsDB->prefix('gs_log');

    $sql .= ' WHERE ' . $sql_date;

    $sql .= ' AND robot=' . $robot;

    $sql .= ' GROUP BY url';

    $res = $xoopsDB->query($sql) or erreurServeurMySQL($sql);

    return $xoopsDB->getRowsNum($res);
}
// ---------------------------------------------------------------------------
// renvoie les différentes adresses IP utilisees par Googlebot
// ---------------------------------------------------------------------------
function adressesIP($robot)
{
    global $TABLE_LOG, $xoopsDB;

    $d = getVar('d');

    $m = getVar('m');

    $s = getVar('s');

    if ('' == $d) {
        $today = getdate();

        $a = $today['year'];
    } else {
        $a = mb_substr($d, 0, 4);
    }

    // choix des dates pour la requete...

    if ('' != $s) {
        // cas d'une semaine

        $sql_date = '(WEEK(date,1) = ' . $s . ') AND (YEAR(date) = ' . $a . ')';
    } else {
        if ('' != $m) {
            // cas d'un mois

            $sql_date = '(MONTH(date) = ' . $m . ') AND (YEAR(date) = ' . $a . ')';
        } else {
            // cas d'un jour

            if ('' == $d) {
                $today = getdate();

                $year = $today['year'];

                $month = $today['mon'];

                $day = $today['mday'];

                $d = sprintf("$year%02d%02d", $month, $day);
            } else {
                $month = mb_substr($d, 4, 2);

                $day = mb_substr($d, 6, 2);

                $year = mb_substr($d, 0, 4);
            }

            $sql_date = "TO_DAYS(date) = TO_DAYS('" . $year . '-' . $month . '-' . $day . "')";
        }
    }

    $sql = 'SELECT ip';

    $sql .= ' FROM ' . $xoopsDB->prefix('gs_log');

    $sql .= ' WHERE ' . $sql_date;

    $sql .= ' AND robot=' . $robot;

    $sql .= ' GROUP BY ip ASC';

    $res = $xoopsDB->query($sql) or erreurServeurMySQL($sql);

    $html = '';

    while (false !== ($enr = $xoopsDB->fetchArray($res))) {
        $html .= '&nbsp;&nbsp;' . $enr['ip'] . '<br>';
    }

    return $html;
}
// ---------------------------------------------------------------------------
// renvoie le nombre de jours sur lequel porte l'analyse
// ---------------------------------------------------------------------------
function nbJours()
{
    global $TABLE_LOG, $xoopsDB;

    $d = getVar('d');

    $m = getVar('m');

    $s = getVar('s');

    // choix des dates pour la requete...

    if (0 != $s) {
        return 7;
    }

    if (0 != $m) {
        $month = mb_substr($d, 4, 2);

        $day = mb_substr($d, 6, 2);

        $year = mb_substr($d, 0, 4);

        $timestamp = mktime(0, 0, 0, $month, $day, $year);

        return date('t', $timestamp);
    }

    return 1;
}
// ---------------------------------------------------------------------------
// affiche un commentaire sur la période analysée
// ---------------------------------------------------------------------------
function afficherPeriodeAnalysee()
{
    global $TAB_MONTHS, $TAB_DAYS;

    $d = getVar('d');

    $m = getVar('m');

    $s = getVar('s');

    $html = '<p><b><u>';

    if ('' != $s) {
        // cas d'une semaine

        $html .= $LANG['Week'] . ' ' . $s;
    } else {
        if ('' != $m) {
            // cas d'un mois

            (version_compare(phpversion(), '4.2.0') >= 0)
? @settype($m, 'int')
: @settype($m, 'integer');

            $html .= $TAB_MONTHS[$m];
        } else {
            // cas d'un jour

            if ('' == $d) {
                $today = getdate();

                $year = $today['year'];

                $month = $today['mon'];

                $day = $today['mday'];
            } else {
                $month = mb_substr($d, 4, 2);

                $day = mb_substr($d, 6, 2);

                $year = mb_substr($d, 0, 4);

                $timestamp = mktime(0, 0, 0, $month, $day, $year);

                $today = getdate($timestamp);
            }
(version_compare(phpversion(), '4.2.0') >= 0)
? @settype($month, 'int')
: @settype($month, 'integer');

            $nom_jour = $TAB_DAYS[$today['wday']];

            $html .= $nom_jour . ' ' . $day . ' ' . $TAB_MONTHS[$month] . ' ' . $year;
        }
    }

    $html .= "</u></b></p>\n";

    echo $html;
}
// ---------------------------------------------------------------------------
// affichage de la partie bilan
// ---------------------------------------------------------------------------
function afficherBilan($robot)
{
    global $LANG, $TABLE_ROBOTS, $xoopsDB;

    $TABLE_ROBOTS = $xoopsDB->prefix('gs_robots');

    // nom du robot

    $nom_robot = donneChamp($TABLE_ROBOTS, 'nom', 'id', $robot);

    $html = "<table align='LEFT' border='1' bordercolor='#55AAFF' cellspacing='0' cellpadding='5'>\n";

    $html .= '<tr><td>';

    // rappel du nom du robot

    $html .= '<span><b>' . $nom_robot . ' :</b></span><br>';

    // nombre total de visites

    $nbVisites = nbVisites($robot);

    $html .= $LANG['Visites'] . ': ' . $nbVisites . '<br>';

    // nombre de pages différentes

    $nbPagesDifferentes = nbPagesDifferentes($robot);

    $html .= $LANG['Pages'] . ': ' . $nbPagesDifferentes . '<br>';

    // nombre de pages vues / jour

    if ($nbVisites > 0) {
        $moyenne = sprintf('%.1f', $nbVisites / nbJours());
    } else {
        $moyenne = '-';
    }

    $html .= $LANG['VisitsPerDay'] . ': ' . $moyenne . '<br>';

    // liste des robots activés ayant visité le site dans la période considérée

    $html .= listeVisitesRobots();

    if ($nbVisites > 0) {
        // adresses IP

        $html .= $LANG['IPAddresses'] . $LANG['Of'] . ' ' . $nom_robot . ' :<br>';

        $html .= adressesIP($robot);
    }

    $html .= '</td></tr></table>';

    echo $html;
}
// ---------------------------------------------------------------------------
// affichage de la partie pages
// ---------------------------------------------------------------------------
function afficherPages()
{
    global $TABLE_LOG, $LANG, $xoopsDB;

    $ordre = getVar('ordre');

    $sens = getVar('sens');

    $d = getVar('d');

    $m = getVar('m');

    $s = getVar('s');

    $robot = getVar('robot');

    $lien = 'index.php?rub=pages&robot=' . $robot . '&d=' . $d . '&s=' . $s . '&m=' . $m;

    if ('' == $d) {
        $today = getdate();

        $a = $today['year'];
    } else {
        $a = mb_substr($d, 0, 4);
    }

    // sens par défaut

    if ('' == $sens) {
        $sens = 'ASC';
    }

    // sens inverse

    if ('ASC' == $sens) {
        $sens2 = 'DESC';
    } else {
        $sens2 = 'ASC';
    }

    // sens par defaut de chaque colonne

    $sens_url = $sens;

    $sens_date = $sens;

    $sens_ip = $sens;

    $sens_dns = $sens;

    $sens_occurrence = $sens;

    // gestion du tri

    switch ($ordre) {
case 'url':
$tri = 'url ' . $sens . ', lastdate ASC, occurrence DESC, ip ASC, dns ASC';
$sens_url = $sens2;
break;
case 'date':
$tri = 'lastdate ' . $sens . ', url ASC, occurrence DESC, ip ASC, dns ASC';
$sens_date = $sens2;
break;
case 'occurrence':
$tri = 'occurrence ' . $sens . ', url ASC, lastdate ASC, ip ASC, dns ASC';
$sens_occurrence = $sens2;
break;
case 'ip':
$tri = 'ip ' . $sens . ', url ASC, lastdate ASC, occurrence DESC, dns ASC';
$sens_ip = $sens2;
break;
case 'dns':
$tri = 'dns ' . $sens . ', url ASC, lastdate ASC, occurrence DESC, ip ASC';
$sens_dns = $sens2;
break;
default:
$tri = 'url ASC, lastdate ASC, occurrence DESC, ip ASC, dns ASC';
break;
}

    // choix des dates pour la requete...

    if ('' != $s) {
        // cas d'une semaine

        $sql_date = '(WEEK(date, 1) = ' . $s . ') AND (YEAR(date) = ' . $a . ')';
    } else {
        if ('' != $m) {
            // cas d'un mois

            $sql_date = '(MONTH(date) = ' . $m . ') AND (YEAR(date) = ' . $a . ')';
        } else {
            // cas d'un jour

            if ('' == $d) {
                $today = getdate();

                $year = $today['year'];

                $month = $today['mon'];

                $day = $today['mday'];

                $d = sprintf("$year%02d%02d", $month, $day);
            } else {
                $month = mb_substr($d, 4, 2);

                $day = mb_substr($d, 6, 2);

                $year = mb_substr($d, 0, 4);
            }

            $sql_date = "TO_DAYS(date) = TO_DAYS('" . $year . '-' . $month . '-' . $day . "')";

            $analyse_jour = true;
        }
    }

    // tableau de sortie

    $html = "<table align='center' border='1' bordercolor='#55AAFF' cellspacing='0' cellpadding='1' width='100%'>\n";

    $html .= '<tr><td>';

    $html .= "<p><table border='0' cellspacing='2' cellpadding='5' width='100%'>\n";

    $html .= "<tr class='ligneB'>";

    $html .= "<td width='20' class='normal-centre'><b>n°</b></td>\n";

    $html .= "<td class='normal-gauche'><b>";

    $html .= "<a href='" . $lien . '&ordre=url&sens=' . $sens_url . "'>" . $LANG['URL'] . "</a></b></td>\n";

    $html .= "<td class='normal-gauche'><b>";

    $html .= "<a href='" . $lien . '&ordre=date&sens=' . $sens_date . "'>" . $LANG['Hour'] . "</a></b></td>\n";

    $html .= "<td class='normal-centre'><b>";

    $html .= "<a href='" . $lien . '&ordre=occurrence&sens=' . $sens_occurrence . "'>" . $LANG['NbOfVisits'] . "</a></b></td>\n";

    $html .= "<td class='normal-centre'><b>";

    $html .= "<a href='" . $lien . '&ordre=ip&sens=' . $sens_ip . "'>@ IP</a></b></td>\n";

    $html .= "<td class='normal-centre'><b>";

    $html .= "<a href='" . $lien . '&ordre=dns&sens=' . $sens_dns . "'>DNS</a></b></td>\n";

    $html .= "</tr>\n";

    $sql = "SELECT url, max(date) AS 'lastdate', count(id) AS 'occurrence', ip, dns";

    $sql .= ' FROM ' . $xoopsDB->prefix('gs_log');

    $sql .= ' WHERE ' . $sql_date;

    $sql .= ' AND robot=' . $robot;

    $sql .= ' GROUP BY url';

    $sql .= ' ORDER BY ' . $tri;

    $res = $xoopsDB->query($sql) or erreurServeurMySQL($sql);

    if (0 == $xoopsDB->getRowsNum($res)) {
        $html = '<p>' . $LANG['NoData'] . '.</p>';
    } else {
        $n = 0;

        while ($enr = $xoopsDB->fetchArray($res)) {
            (0 == ($n % 2)) ? $type_ligne = 'A' : $type_ligne = 'B';

            $n++;

            $html .= "<tr class='ligne" . $type_ligne . "'>\n";

            $html .= "<td class='moyen-centre'>" . $n . "</b></a></td>\n";

            $html .= "<td align='left'>";

            $html .= "<a href='" . $enr['url'] . "' target='_blank'>" . $enr['url'] . "</a></td>\n";

            $html .= "<td class='moyen-centre'>" . mb_substr($enr['lastdate'], 10, 8) . "</td>\n";

            $html .= "<td class='moyen-centre'>" . $enr['occurrence'] . "</td>\n";

            $html .= "<td align='center'>" . $enr['ip'] . "</td>\n";

            $html .= "<td align='left'>" . $enr['dns'] . "</td>\n";

            $html .= "</tr>\n";
        }

        $html .= "</table>\n";

        $html .= '</td></tr></table>';
    }

    echo $html;
}
// ---------------------------------------------------------------------------
// affichage du texte de bas de page
// ---------------------------------------------------------------------------
function footer()
{
    global $LANG, $VERSION_GS;

    echo '<p>&nbsp;</p>';

    echo "<p align='center'><I>GoogleStats " . $VERSION_GS . $LANG['GS_Line1'] . '<br>';

    echo $LANG['GS_Line2'] . " <a href='http://www.webrankinfo.com/' target='_blank'>WebrankInfo, " . $LANG['GS_desc'] . '</a><br>';

    echo $LANG['Info'] . " <a href='http://www.googlestats.com/' target='_blank' title='GoogleStats.com'>www.googlestats.com</a></I></p>";
}
// ---------------------------------------------------------------------------
// affichage de la page "BILAN"
// ---------------------------------------------------------------------------
function bilan()
{
    global $LANG;

    $rub = 'bilan';

    $ordre = getVar('ordre');

    $sens = getVar('sens');

    $d = getVar('d');

    $m = getVar('m');

    $s = getVar('s');

    $robot = getVar('robot');

    if (0 == (int)$robot) {
        $robot = 1;
    }

    $lien = '&robot=' . $robot . '&d=' . $d . '&s=' . $s . '&m=' . $m . '&ordre=' . $ordre . '&sens=' . $sens;

    // tableau

    afficherDebutTableau($rub, $lien);

    // calendrier

    afficherCalendrier($robot);

    // robots

    afficherRobots($robot);

    echo '</td>';

    echo "<td colspan='3' valign='top' align='left'>";

    afficherPeriodeAnalysee();

    // contenu

    afficherBilan($robot);

    echo '</td>';

    echo '</tr>';

    echo '</table>';
}
// ---------------------------------------------------------------------------
// affichage de la page "PAGES"
// ---------------------------------------------------------------------------
function pages()
{
    global $LANG;

    $rub = 'pages';

    $ordre = getVar('ordre');

    $sens = getVar('sens');

    $d = getVar('d');

    $m = getVar('m');

    $s = getVar('s');

    $robot = getVar('robot');

    if (0 == (int)$robot) {
        $robot = 1;
    }

    $lien = '&robot=' . $robot . '&d=' . $d . '&s=' . $s . '&m=' . $m . '&ordre=' . $ordre . '&sens=' . $sens;

    // tableau

    afficherDebutTableau($rub, $lien);

    // calendrier

    afficherCalendrier($robot);

    // robots

    afficherRobots($robot);

    echo '</td>';

    echo "<td colspan='3' valign='top' align='center'>";

    afficherPeriodeAnalysee();

    // contenu

    afficherPages($robot);

    echo '</td>';

    echo '</tr>';

    echo '</table>';
}
// ---------------------------------------------------------------------------
// affichage de la page "GRAPHIQUE"
// ---------------------------------------------------------------------------
/*function graph()
{
global $LANG, $TABLE_ROBOTS, $xoopsDB;
$TABLE_ROBOTS = $xoopsDB->prefix("gs_robots");
$rub = "graph";
$ordre = getVar("ordre");
$sens = getVar("sens");
$d = getVar("d");
$m = getVar("m");
$s = getVar("s");
$robot = getVar("robot");
$nbm = getVar("nbm");
if (intval($robot) == 0)
$robot = 1;
$lien = "&robot=".$robot."&d=".$d."&s=".$s."&m=".$m."&ordre=".$ordre."&sens=".$sens;
// nb of months displayed on the graph
if ($nbm == 0)
$nbm = 1;
// table
afficherDebutTableau($rub, $lien);
// calendar
echo "<p class='normal-gauche'><i>".$LANG["InactiveCalendar"]."</i></p>";
// robots
afficherRobots($robot);
echo "</td>";
echo "<td colspan='3' valign='top' align='center'>";
// content
echo "<p align='justify'>".$LANG["Graph1"]."<ul>";
echo "<li align='justify'>";
echo "<a href='index.php?rub=graph".$lien."&nbm=1'>".$LANG["Month_1"]."</a></li>";
echo "<li align='justify'>";
echo "<a href='index.php?rub=graph".$lien."&nbm=3'>".$LANG["Month_3"]."</a></li>";
echo "<li align='justify'>";
echo "<a href='index.php?rub=graph".$lien."&nbm=6'>".$LANG["Month_6"]."</a></li>";
echo "<li align='justify'>";
echo "<a href='index.php?rub=graph".$lien."&nbm=12'>".$LANG["Month_12"]."</a></li>";
echo "</ul></p>";
$m_range = "Month_".$nbm;
echo "<p align='justify'>".$LANG["GraphAlt"].donneChamp($TABLE_ROBOTS, "nom", "id", $robot);
echo " ".$LANG["On"]." ".$LANG[$m_range].":<br>";
echo "<img src='graph.php?robot=".$robot."&nbm=".$nbm."' border='0' alt='";
echo $LANG["GraphAlt"].donneChamp($TABLE_ROBOTS, "nom", "id", $robot);
echo " ".$LANG["On"]." ".$LANG[$m_range]."'></p>";
echo "</td>";
echo "</tr>";
echo "</table>";
}
*/
