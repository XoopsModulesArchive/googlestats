<?php

/***************************************************************************
* GoogleStats
*
* Author: Olivier Duffez, WebRankInfo ( http://www.webrankinfo.com )
* Version: 2.0
* Date: 2004-02-23
* Homepage: http://www.googlestats.com
***************************************************************************/
$LANG = [];
$LANG['YES'] = 'Yes';
$LANG['NO'] = 'No';
$LANG['Delete'] = 'Delete';
$LANG['Modify'] = 'Modify';
$LANG['On'] = 'on';
$LANG['Of'] = 'of';
$LANG['CloseWindow'] = 'Close Window';
$LANG['BackHome'] = 'Back to homepage';
$LANG['OK'] = 'OK';
// ---------------------------------------------------------------------------
// error handling
// ---------------------------------------------------------------------------
$LANG['MySQLErrorSubject'] = 'Error with GoogleStats';
$LANG['MySQLErrorBody1'] = "The following MySQL request has failed:\n";
$LANG['MySQLErrorBody2'] = '';
// ---------------------------------------------------------------------------
// alertes par mail
// ---------------------------------------------------------------------------
$LANG['FullCrawlBeginSubject'] = 'GoogleStats: the Full Crawl has begun!';
$t = "Hi,\n";
$t .= "This is an alert sent by GoogleStats, the tool installed on your site.\n";
$t .= "The Full Crawl may have begun: a bot GoogleBot whose IP address begins \n";
$t .= "with 216. has just visited your site.\n\n";
$t .= "For more information, please go to the forum of WebRankInfo at:\n";
$t .= "http://www.webrankinfo.com/forums/\n";
$LANG['FullCrawlBeginBody'] = $t;
// ---------------------------------------------------------------------------
// calendar
// ---------------------------------------------------------------------------
$LANG['Error'] = 'Error';
$LANG['Visites'] = 'Visits';
$LANG['Pages'] = 'Pages';
$LANG['VisitsPerDay'] = 'Visits / Day';
$LANG['URL'] = 'URL';
$LANG['Hour'] = 'Hour';
$LANG['NbOfVisits'] = '#Visits';
$LANG['NoData'] = 'No data';
$LANG['Summary'] = 'Summary';
$LANG['Pages'] = 'Pages';
$LANG['Graph'] = 'Graph';
$LANG['Monday1'] = 'M';
$LANG['Tuesday1'] = 'T';
$LANG['Wednesday1'] = 'W';
$LANG['Thursday1'] = 'T';
$LANG['Friday1'] = 'F';
$LANG['Saturday1'] = 'S';
$LANG['Sunday1'] = 'S';
$LANG['PreviousDay'] = 'Previous Day';
$LANG['PreviousMonth'] = 'Previous Month';
$LANG['NextDay'] = 'Next Day';
$LANG['NextMonth'] = 'Next Month';
$LANG['Week'] = 'Semaine';
// ---------------------------------------------------------------------------
// graph
// ---------------------------------------------------------------------------
$LANG['GraphAlt'] = 'Graph of the visits of ';
$LANG['Graph1'] = 'Choose the graph to display:';
$LANG['Month_1'] = '1 month';
$LANG['Month_3'] = '3 months';
$LANG['Month_6'] = '6 months';
$LANG['Month_12'] = '1 year';
$LANG['InactiveCalendar'] = 'Inactive Calendar';
// ---------------------------------------------------------------------------
// robots
// ---------------------------------------------------------------------------
$LANG['RobotsAvailable'] = ' known robot(s):';
$LANG['NoRobotDefined'] = 'No robot defined!!!';
$LANG['SelectedRobot'] = 'Selected Robot';
$LANG['RobotDescription'] = "Robot's Description";
$LANG['UndefinedRobot'] = 'Undefined Robot!';
$LANG['RobotName'] = 'Name';
$LANG['RobotActive'] = 'Active?';
$LANG['ActiveRobots'] = 'Activated Robots';
$LANG['NonActiveRobots'] = 'Desactivated Robots';
$LANG['RobotUserAgent'] = 'User Agent';
$LANG['RobotIP1'] = 'IP Address #1';
$LANG['RobotIP2'] = 'IP Address #2';
$LANG['RobotMode'] = 'Detection Mode';
$LANG['RobotDesc'] = 'Description';
$LANG[$DETECTION_USER_AGENT] = 'By the User Agent';
$LANG[$DETECTION_IP] = 'By the IP address';
$LANG['RobotURL'] = 'URL';
$LANG['RobotURLInfo'] = 'Official homepage of this robot';
$LANG['ListeRobotsVenus'] = 'List of robots that came in this period:';
// ---------------------------------------------------------------------------
// Index page
// ---------------------------------------------------------------------------
$LANG['TitleIndex'] = "GoogleStats: Google's visits analyzis";
$LANG['IPAddresses'] = 'IP addresses';
// ---------------------------------------------------------------------------
// footer
// ---------------------------------------------------------------------------
$LANG['GS_Line1'] = ": real time analysis of Google's visits on your website";
$LANG['GS_Line2'] = 'Free and Open Source Application, developped by';
$LANG['GS_desc'] = 'Google Search Engine Optimization Specialist';
$LANG['Info'] = 'For further information, go to';
// ---------------------------------------------------------------------------
// installation
// ---------------------------------------------------------------------------
$LANG['Install OK'] = "The install process is completed. Do not forget to delete the 'install.php' file from your server. Click <A HREF='index.php'>here</A> to come back to the homepage.";
$LANG['UpdateOK'] = 'The Update Process is finished.';
// ---------------------------------------------------------------------------
// admin
// ---------------------------------------------------------------------------
$LANG['Admin'] = 'Administration';
$LANG['TitleAdmin'] = 'Administration Area';
$LANG['AdminTestVersion'] = 'Check Latest Version';
$LANG['AdminNothing'] = 'You are in the Administration Area. Click on one item.';
$LANG['AdminReset'] = 'Reset (deletion of records)';
$LANG['AdminResetExplanations'] = 'This tool allows you to delete some of the records stored on the MySQL database (visits of GoogleBot). You can delete one month or the whole data.';
$LANG['ResetMonths'] = 'Reset one month';
$LANG['ResetAll'] = 'Reset all';
$LANG['ResetAllLink'] = 'Click here (be carefull, this operation cannot be cancelled)';
$LANG['ResetNoData'] = 'No data!';
$LANG['ResetMonthsOK'] = 'The data of this mon have been reseted.';
$LANG['ResetMonthsNOK'] = 'Wrong parameters: cannot reset this month';
$LANG['ResetAllOK'] = 'All the data have been reseted.';
$LANG['AdminVersionTitle'] = 'Check if you have the latest version of GoogleStats';
$LANG['AdminVersionLink'] = 'Click here to check.';
$LANG['AdminRobots'] = 'Robots Management';
$LANG['ModifyRobot'] = 'Modify a robot';
$LANG['AddRobot'] = 'Add a new robot';
$LANG['RobotDeleted'] = 'The robot has been deleted.';
$LANG['BackToRobotsAdmin'] = 'Back to the Robots Management.';
$LANG['RobotAdded'] = 'Robot added!';
$LANG['RobotUpdated'] = 'Robot updated!';
$LANG['RobotDeleted'] = 'Robot deleted!';
$LANG['BadRobotName'] = 'Bad robot name!';
$LANG['BadUserAgent'] = 'Bad user agent!';
$LANG['IPNotSpecified'] = 'No IP address has been defined for the robot!';
$LANG['BadDetectionMode'] = 'Bad detection mode!';
// ---------------------------------------------------------------------------
// other
// ---------------------------------------------------------------------------
$TAB_MONTHS = [ '","January","February","March","April","May","June","July',
'August","September","October","November","December',
];
$TAB_JOURS = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
