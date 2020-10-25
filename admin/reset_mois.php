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
require_once 'admin_header.php';
xoops_cp_header();
OpenTable();
?>
<H1><?php echo $LANG['AdminReset']; ?></H1>
<?php
if ((!isset($a)) || ($a < 2002)) {
    // mauvaise annee

    $html = $LANG['ResetMonthsNOK'];
} else {
    if ((!isset($m)) || ($m < 0) || ($m > 12)) {
        // mauvais mois

        $html = $LANG['ResetMonthsNOK'];
    } else {
        // suppression des données du mois $m de l'année $a

        $sql = 'DELETE FROM ' . $TABLE_LOG;

        $sql .= ' WHERE (MONTH(date) = ' . $m . ') AND (YEAR(date) = ' . $a . ')';

        $res = $GLOBALS['xoopsDB']->queryF($sql) or erreurServeurMySQL($sql);

        $html = "<P class='normal'>" . $TAB_MONTHS[$m] . ' ' . $a . ' : ' . $LANG['ResetMonthsOK'] . "</p>\n";
    }
}
echo $html;
CloseTable();
xoops_cp_footer();
?>
