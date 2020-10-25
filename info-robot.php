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
// inclusions
// ---------------------------------------------------------------------------
require_once 'header.php';
include 'lib.php';
$descr = 'descr_' . $LANGUE;
$sql = 'SELECT *';
$sql .= ' FROM ' . $TABLE_ROBOTS;
$sql .= ' WHERE id=' . $robot;
$res = $GLOBALS['xoopsDB']->queryF($sql) or erreurServeurMySQL($sql);
if ($enr = $GLOBALS['xoopsDB']->fetchBoth($res)) {
    $html = "<p class='normal-centre'>" . $LANG['RobotDescription'] . '</p>';

    $html .= '<h2><center>' . $enr['nom'] . '</center></h2>';

    $html .= "<p class='normal'>";

    $html .= '<b>' . $LANG['RobotName'] . '</b>: ' . $enr['nom'] . "<br>\n";

    $html .= '<b>' . $LANG['RobotUserAgent'] . '</b>: ' . $enr['user_agent'] . "<br>\n";

    $html .= '<b>' . $LANG['RobotIP1'] . '</b>: ' . $enr['ip1'] . "<br>\n";

    $html .= '<b>' . $LANG['RobotIP2'] . '</b>: ' . $enr['ip2'] . "<br>\n";

    $html .= '<b>' . $LANG['RobotActive'] . '</b> ' . ((1 == $enr['actif']) ? $LANG['YES'] : $LANG['NO']) . "<br>\n";

    $html .= '<b>' . $LANG['RobotMode'] . '</b>: ' . $LANG[$enr['detection']] . "<br>\n";

    $html .= '<b>' . $LANG['RobotDesc'] . '</b>: ' . $enr[$descr] . "<br>\n";

    $html .= '<b>' . $LANG['RobotURL'] . "</b>: <a href='" . $enr['url'] . "' target='_blank' title='" . $LANG['RobotURLInfo'] . "'>" . $enr['url'] . "</a><br>\n";
} else {
    $html = "<P CLASS='normal'><SPAN CLASS='erreur'>&nbsp;" . $LANG['UndefinedRobot'] . "&nbsp;</SPAN></P>\n";
}
$html .= "<P class='normal-centre'><a href='javascript:window.close()'>" . $LANG['CloseWindow'] . '</a></p>';
echo $html;
