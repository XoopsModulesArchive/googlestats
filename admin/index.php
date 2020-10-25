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
?>
<DIV ALIGN="center">
<A HREF="reset.php"><?php echo $LANG['AdminReset']; ?></A><br>
<A HREF="robots.php" TARGET="main"><?php echo $LANG['AdminRobots']; ?></A>
</DIV>
<?php
echo "<p align='center'><I>GoogleStats " . $VERSION_GS . $LANG['GS_Line1'] . '<br>';
echo $LANG['GS_Line2'] . " <a href='http://www.webrankinfo.com/' target='_blank'>WebrankInfo, " . $LANG['GS_desc'] . '</a><br>';
echo $LANG['Info'] . " <a href='http://www.googlestats.com/' target='_blank' title='GoogleStats.com'>www.googlestats.com</a></I><br>";
echo "Xoopsé par <a href='http://www.inconnueteam.net' target='_blank'>InconnueTeam 2004</a></p>";
CloseTable();
xoops_cp_footer();
?>
