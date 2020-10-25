<?php

include 'header.php';
if ($xoopsConfig['startpage'] == $xoopsModule->dirname()) {
    $xoopsOption['show_rblock'] = 1;

    require_once XOOPS_ROOT_PATH . '/header.php';

    if (empty($_GET['start'])) {
        make_cblock();

        echo '<br>';
    }
} else {
    $xoopsOption['show_rblock'] = 0;

    require_once XOOPS_ROOT_PATH . '/header.php';
}
OpenTable();
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
include 'cache/config.php';
include 'lib.php';
?>
<CENTER><B><Font size=+1>GoogleStats</font></b></CENTER>
<?php
// ---------------------------------------------------------------------------
// rubriques possibles :
// 'bilan' : bilan
// 'pages' : liste des pages
// 'graph' : graphique
// ---------------------------------------------------------------------------
// ---------------------------------------------------------------------------
// rubrique BILAN
// ---------------------------------------------------------------------------
if (('bilan' == getVar('rub')) || ('' == $rub)) {
    bilan();
}
// ---------------------------------------------------------------------------
// rubrique PAGES
// ---------------------------------------------------------------------------
else {
    if ('pages' == getVar('rub')) {
        pages();
    }
}
echo "<p align='center'><I>GoogleStats " . $VERSION_GS . $LANG['GS_Line1'] . '<br>';
echo $LANG['GS_Line2'] . " <a href='http://www.webrankinfo.com/' target='_blank'>WebrankInfo, " . $LANG['GS_desc'] . '</a><br>';
echo $LANG['Info'] . " <a href='http://www.googlestats.com/' target='_blank' title='GoogleStats.com'>www.googlestats.com</a></I><br>";
echo "Xoopsé par <a href='http://www.inconnueteam.net' target='_blank'>Inconnueteam 2004</a></p>";
CloseTable();
include 'footer.php';
?>
