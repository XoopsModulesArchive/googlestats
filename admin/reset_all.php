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
// suppression de toutes les données
$sql = 'DELETE FROM ' . $TABLE_LOG;
$res = $GLOBALS['xoopsDB']->queryF($sql) or erreurServeurMySQL($sql);
$html = "<P class='normal'>" . $LANG['ResetAllOK'] . "</p>\n";
echo $html;
CloseTable();
xoops_cp_footer();
?>
