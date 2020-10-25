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
<P class='normal'><?php echo $LANG['AdminResetExplanations']; ?></P>
<P class='normal'><?php echo $LANG['ResetAll']; ?>: <a href="reset_all.php"><?php echo $LANG['ResetAllLink']; ?></a></P>
<P class='normal'><?php echo $LANG['ResetMonths']; ?>
<blockquote>
<?php
// liste des mois a supprimer
$sql = 'SELECT date';
$sql .= ' FROM ' . $TABLE_LOG;
$sql .= ' ORDER BY date ASC';
$res = $GLOBALS['xoopsDB']->queryF($sql) or erreurServeurMySQL($sql);
if (0 == $GLOBALS['xoopsDB']->getRowsNum($res)) {
    // aucune donnee n'est stockee

    $html = $LANG['ResetNoData'];
} else {
    // on va lister les mois supprimables

    $enr = $GLOBALS['xoopsDB']->fetchBoth($res);

    $date_init = $enr['date'];

    $an_init = mb_substr($date_init, 0, 4);

    $mois_init = mb_substr($date_init, 5, 2);

    $today = getdate();

    $an_courant = $today['year'];

    $mois_courant = $today['mon'];

    $html = '';

    for ($an = $an_init; $an <= $an_courant; $an++) {
        ($an == $an_init) ? $mois1 = $mois_init : $mois1 = 1;

        ($an == $an_courant) ? $mois2 = $mois_courant : $mois2 = 12;

        for ($mois = $mois1; $mois <= $mois2; $mois++) {
            $html .= "<a href='reset_mois.php?a=" . $an . '&m=' . $mois . "'>" . $TAB_MONTHS[$mois] . ' ' . $an . "</a><br>\n";
        }
    }
}
echo $html;
?>
</blockquote>
</p>
<?php
CloseTable();
xoops_cp_footer();
?>
