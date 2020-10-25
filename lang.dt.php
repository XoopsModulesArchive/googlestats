<?php

/***************************************************************************
* GoogleStats
*
* Author: Olivier Duffez, WebRankInfo ( http://www.webrankinfo.com/ )
* Version: 1.01
* Date: 2002-11-02
* Übersetzt von Prof. Guido Kühn ( http://fh-zine.fhsh.de/ )
* Datum: 2004-01-01
***************************************************************************/
$LANG = [];
$LANG['YES'] = 'Ja';
$LANG['NO'] = 'Nein';
$LANG['Delete'] = 'Löschen';
$LANG['Modify'] = 'Ändern';
$LANG['On'] = 'An';
$LANG['Of'] = 'Aus';
$LANG['CloseWindow'] = 'Fenster schließen';
$LANG['BackHome'] = 'zur Homepage';
$LANG['OK'] = 'OK';
// ---------------------------------------------------------------------------
// error handling
// ---------------------------------------------------------------------------
$LANG['MySQLErrorSubject'] = 'Error im GoogleStats';
$LANG['MySQLErrorBody1'] = "Die folgende MySQL Abfrage war fehlerhaft:\n";
$LANG['MySQLErrorBody2'] = '';
// ---------------------------------------------------------------------------
// alertes par mail
// ---------------------------------------------------------------------------
$LANG['FullCrawlBeginSubject'] = 'GoogleStats: der Crawler hat begonnen!';
$t = "Hi,\n";
$t .= "This is an alert sent by GoogleStats, the tool installed on your site.\n";
$t .= "The Full Crawl may have begun: a bot GoogleBot whose IP address begins \n";
$t .= "with 216. has just visited your site.\n\n";
$t .= "Für mehr Informationen, schaue ins Forum bei WebRankInfo:\n";
$t .= "http://www.webrankinfo.com/forums/\n";
$LANG['FullCrawlBeginBody'] = $t;
// ---------------------------------------------------------------------------
// calendar
// ---------------------------------------------------------------------------
$LANG['Error'] = 'Fehler';
$LANG['Visites'] = 'Besuche';
$LANG['Pages'] = 'Seiten';
$LANG['VisitsPerDay'] = 'Zugriffe / Tag';
$LANG['URL'] = 'URL';
$LANG['Hour'] = 'Stunde';
$LANG['NbOfVisits'] = 'Zugriffe';
$LANG['NoData'] = 'Keine Daten';
$LANG['Summary'] = 'Zusammenfassung';
$LANG['Pages'] = 'Seiten';
$LANG['Graph'] = 'Grafik';
$LANG['Monday1'] = 'Mo';
$LANG['Tuesday1'] = 'Di';
$LANG['Wednesday1'] = 'Mi';
$LANG['Thursday1'] = 'Do';
$LANG['Friday1'] = 'Fr';
$LANG['Saturday1'] = 'Sa';
$LANG['Sunday1'] = 'So';
$LANG['PreviousDay'] = 'Tag zuvor';
$LANG['PreviousMonth'] = 'Monat zuvor';
$LANG['NextDay'] = 'Nächster Tag';
$LANG['NextMonth'] = 'Nächster Monat';
$LANG['Week'] = 'Woche';
// ---------------------------------------------------------------------------
// graph
// ---------------------------------------------------------------------------
$LANG['GraphAlt'] = 'Grafik der Besuche von ';
$LANG['Graph1'] = 'Wählen Sie eine Grafik:';
$LANG['Month_1'] = '1 Monat';
$LANG['Month_3'] = '3 Monate';
$LANG['Month_6'] = '6 Monate';
$LANG['Month_12'] = '1 Jahr';
$LANG['InactiveCalendar'] = 'Inactive Calendar';
// ---------------------------------------------------------------------------
// robots
// ---------------------------------------------------------------------------
$LANG['RobotsAvailable'] = ' bekannter Robot:';
$LANG['NoRobotDefined'] = 'Kein Robot definiert!!!';
$LANG['SelectedRobot'] = 'Robot auswählen';
$LANG['RobotDescription'] = "Robot's Beschreibung";
$LANG['UndefinedRobot'] = 'Undefinierter Robot!';
$LANG['RobotName'] = 'Name';
$LANG['RobotActive'] = 'Aktivieren?';
$LANG['ActiveRobots'] = 'Aktiviere Robots';
$LANG['NonActiveRobots'] = 'Deaktivieren Robots';
$LANG['RobotUserAgent'] = 'User Agent';
$LANG['RobotIP1'] = 'IP Address #1';
$LANG['RobotIP2'] = 'IP Address #2';
$LANG['RobotMode'] = 'Detektion Mode';
$LANG['RobotDesc'] = 'Beschreibung';
$LANG[$DETECTION_USER_AGENT] = 'Nach User Agent';
$LANG[$DETECTION_IP] = 'Nach IP Addressen';
$LANG['RobotURL'] = 'URL';
$LANG['RobotURLInfo'] = 'Offizielle Homepage des Robot';
$LANG['ListeRobotsVenus'] = 'Liste der Robots die in dieser Periode kamen';
// ---------------------------------------------------------------------------
// Index page
// ---------------------------------------------------------------------------
$LANG['TitleIndex'] = 'GoogleStats: Analyse der Googlezugriffe';
$LANG['IPAddresses'] = 'IP Adressen';
// ---------------------------------------------------------------------------
// footer
// ---------------------------------------------------------------------------
$LANG['GS_Line1'] = ': Echtzeitanalyse von Google Zugriffen auf Ihre Seite';
$LANG['GS_Line2'] = 'Frei verfügbare Open Source Anwendung, entwickelt von';
$LANG['GS_desc'] = 'Google Search Engine Optimization Specialist';
$LANG['Info'] = 'Für weitere Informationen gehen Sie zu:';
// ---------------------------------------------------------------------------
// installation
// ---------------------------------------------------------------------------
$LANG['Install OK'] = "Der Installationsvorgang ist abgeschlossen. Vergessen Sie nicht die Datei 'install.php' zu löschen. Bitte <A HREF='index.php'>hier</A>klicken Um zur Homepage zurück zu kommen.";
$LANG['UpdateOK'] = 'Der Updateprozess ist beendet.';
// ---------------------------------------------------------------------------
// admin
// ---------------------------------------------------------------------------
$LANG['Admin'] = 'Administration';
$LANG['TitleAdmin'] = 'Administration Bereich';
$LANG['AdminTestVersion'] = 'Check letztet Version';
$LANG['AdminNothing'] = 'Sie sind in der Administration. Klicken Sie eine Auswahl an.';
$LANG['AdminReset'] = 'Reset (löschen der Einträge)';
$LANG['AdminResetExplanations'] = 'Dieses Tool erlaubt Ihnen, einige der Aufzeichnungen zu löschen, die in der MySQL Datenbank gespeichert sind, (Besuche von GoogleBot). Sie können einen Monat oder die ganzen Daten löschen.';
$LANG['ResetMonths'] = 'Reset einen Monat';
$LANG['ResetAll'] = 'Reset alle';
$LANG['ResetAllLink'] = 'Klick hier ';
$LANG['ResetNoData'] = 'Keine Daten!';
$LANG['ResetMonthsOK'] = 'Die Daten dieses Monats sind Resettet.';
$LANG['ResetMonthsNOK'] = 'Falscher Parameter: Reset des Monats nicht möglich';
$LANG['ResetAllOK'] = 'Alle Daten sind Resettet';
$LANG['AdminVersionTitle'] = 'Check die letzte Version von GoogleStats';
$LANG['AdminVersionLink'] = 'Klick hier zu Check.';
$LANG['AdminRobots'] = 'Robots Management';
$LANG['ModifyRobot'] = 'Ändern Robot';
$LANG['AddRobot'] = 'Neuen Robot hinzufügen';
$LANG['RobotDeleted'] = 'Der Robots wurde gelöscht.';
$LANG['BackToRobotsAdmin'] = 'Zurück zum Robots Management.';
$LANG['RobotAdded'] = 'Robot hinzugefügt!';
$LANG['RobotUpdated'] = 'Robot geändert!';
$LANG['RobotDeleted'] = 'Robot gelöscht!';
$LANG['BadRobotName'] = 'Falscher Robot Name!';
$LANG['BadUserAgent'] = 'Falscher User Agent!';
$LANG['IPNotSpecified'] = 'Keine IP Addresse definiert für diesen Robot!';
$LANG['BadDetectionMode'] = 'Falscher Detektionmode!';
// ---------------------------------------------------------------------------
// other
// ---------------------------------------------------------------------------
$TAB_MONTHS = [ '', 'Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli',
'August', 'September', 'Oktober', 'November', 'Dezember',
];
$TAB_JOURS = ['Sonntag', 'Montag', 'Dienstag', 'Mitwoch', 'Donnerstag', 'Freitag', 'Samstag'];
