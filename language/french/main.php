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
$LANG['YES'] = 'Oui';
$LANG['NO'] = 'Non';
$LANG['Delete'] = 'Supprimer';
$LANG['Modify'] = 'Modifier';
$LANG['On'] = 'sur';
$LANG['Of'] = 'de';
$LANG['CloseWindow'] = 'Fermer la fenêtre';
$LANG['BackHome'] = "Retour à la page d'accueil";
$LANG['OK'] = 'OK';
// ---------------------------------------------------------------------------
// gestion des erreurs
// ---------------------------------------------------------------------------
$LANG['MySQLErrorSubject'] = 'Erreur sur GoogleStats';
$LANG['MySQLErrorBody1'] = "La requête MySQL suivante a généré une erreur :\n";
$LANG['MySQLErrorBody2'] = "Consultez le forum GoogleStats ou la mail-list pour avoir de l'aide :\nhttp://www.webrankinfo.com/forums/forum_7_googlestats.htm \n ou http://fr.groups.yahoo.com/group/googlestats/";
// ---------------------------------------------------------------------------
// alertes par mail
// ---------------------------------------------------------------------------
$LANG['FullCrawlBeginSubject'] = 'GoogleStats : debut du Full Crawl';
$t = "Bonjour,\n";
$t .= "Ceci est une alerte générée par l'outil GoogleStats que vous avez installé\n";
$t .= "sur votre site, vous indiquant que le Full Crawl a sans doute commencé.\n";
$t .= "En effet un robot GoogleBot dont l'adresse IP commence par 216. \n";
$t .= "vient de visiter votre site.\n\n";
$t .= "Pour plus d'informations, consultez le forum de WebRankInfo sur :\n";
$t .= "http://www.webrankinfo.com/forums/\n";
$LANG['FullCrawlBeginBody'] = $t;
// ---------------------------------------------------------------------------
// calendar
// ---------------------------------------------------------------------------
$LANG['Error'] = 'Erreur';
$LANG['Visites'] = 'Visites ';
$LANG['Pages'] = 'Pages ';
$LANG['VisitsPerDay'] = 'Visites / jour ';
$LANG['URL'] = 'URL';
$LANG['Hour'] = 'Heure';
$LANG['NbOfVisits'] = 'Nb visites';
$LANG['NoData'] = 'Aucune donn&eacute;e';
$LANG['Summary'] = 'Bilan';
$LANG['Pages'] = 'Pages';
$LANG['Graph'] = 'Graphique';
$LANG['Monday1'] = 'L';
$LANG['Tuesday1'] = 'M';
$LANG['Wednesday1'] = 'M';
$LANG['Thursday1'] = 'J';
$LANG['Friday1'] = 'V';
$LANG['Saturday1'] = 'S';
$LANG['Sunday1'] = 'D';
$LANG['PreviousDay'] = 'Jour pr&eacute;c&eacute;dent';
$LANG['PreviousMonth'] = 'Mois pr&eacute;c&eacute;dent';
$LANG['NextDay'] = 'Jour suivant';
$LANG['NextMonth'] = 'Mois suivant';
$LANG['Week'] = 'Semaine';
// ---------------------------------------------------------------------------
// graph
// ---------------------------------------------------------------------------
$LANG['GraphAlt'] = 'Graphique des visites de ';
$LANG['Graph1'] = 'Choisissez le graphique à afficher en fonction de la durée :';
$LANG['Month_1'] = '1 mois';
$LANG['Month_3'] = '3 mois';
$LANG['Month_6'] = '6 mois';
$LANG['Month_12'] = '1 an';
$LANG['InactiveCalendar'] = 'Calendrier inactif ';
// ---------------------------------------------------------------------------
// robots
// ---------------------------------------------------------------------------
$LANG['RobotsAvailable'] = 'robot(s) configuré(s) :';
$LANG['NoRobotDefined'] = 'Aucun robot configuré !!!';
$LANG['SelectedRobot'] = 'Robot sélectionné';
$LANG['RobotDescription'] = 'Description du robot sélectionné';
$LANG['UndefinedRobot'] = 'Robot inconnu !';
$LANG['RobotName'] = 'Nom ';
$LANG['RobotActive'] = 'Activé ?';
$LANG['ActiveRobots'] = 'Robots activés ';
$LANG['NonActiveRobots'] = 'Robots désactivés ';
$LANG['RobotUserAgent'] = "Nom d'agent ";
$LANG['RobotIP1'] = 'Adresse IP #1 ';
$LANG['RobotIP2'] = 'Adresse IP #2 ';
$LANG['RobotMode'] = 'Mode de détection ';
$LANG['RobotDesc'] = 'Description ';
$LANG[$DETECTION_USER_AGENT] = "Par le nom d'agent";
$LANG[$DETECTION_IP] = "Par l'adresse IP";
$LANG['RobotURL'] = 'URL ';
$LANG['RobotURLInfo'] = 'Page officielle de ce robot';
$LANG['ListeRobotsVenus'] = 'Liste des robots venus dans cette période :';
// ---------------------------------------------------------------------------
// Index page
// ---------------------------------------------------------------------------
$LANG['TitleIndex'] = 'GoogleStats : analyse des visites de Google';
$LANG['IPAddresses'] = 'Adresses IP ';
// ---------------------------------------------------------------------------
// footer
// ---------------------------------------------------------------------------
$LANG['GS_Line1'] = ' : analyse temps r&eacute;el compl&egrave;te des visites de Google sur votre site';
$LANG['GS_Line2'] = ' Application gratuite et Open Source, d&eacute;velopp&eacute;e par';
$LANG['GS_desc'] = 'le sp&eacute;cialiste du r&eacute;f&eacute;rencement sur Google';
$LANG['Info'] = "Pour plus d'informations, allez sur";
// ---------------------------------------------------------------------------
// install
// ---------------------------------------------------------------------------
$LANG['Install OK'] = "L'installation est termin&eacute;e. Pensez &agrave; supprimer le fichier install.php de votre serveur. Cliquez <A HREF='index.php'>ici</A> pour revenir &agrave; l'accueil.";
$LANG['UpdateOK'] = 'La mise à jour est terminée.';
// ---------------------------------------------------------------------------
// admin
// ---------------------------------------------------------------------------
$LANG['Admin'] = 'Administration';
$LANG['TitleAdmin'] = "Zone d'administration";
$LANG['AdminTestVersion'] = 'Vérifier si une mise à jour existe';
$LANG['AdminNothing'] = "Vous êtes dans la zone d'administration. Cliquez sur un lien ci-dessus.";
$LANG['AdminReset'] = "Reset (supression d'enregistrements)";
$LANG['AdminResetExplanations'] = 'Cet outil vous permet de supprimer certains enregistrements stockés dans la base de données MySQL (les visites de GoogleBot). Vous pouvez supprimer un mois ou toutes les données.';
$LANG['ResetMonths'] = 'Supprimer un mois';
$LANG['ResetAll'] = 'Supprimer tout ';
$LANG['ResetAllLink'] = "Cliquez ici (attention, aucune confirmation n'est demandée)";
$LANG['ResetNoData'] = 'Aucune donnée !';
$LANG['ResetMonthsOK'] = 'Les données de ce mois ont été supprimées.';
$LANG['ResetMonthsNOK'] = 'Suppression impossible : mauvais paramètres de dates';
$LANG['ResetAllOK'] = 'Toutes les données ont été supprimées.';
$LANG['AdminVersionTitle'] = 'Vérifier si vous avez la dernière version de GoogleStats';
$LANG['AdminRobots'] = 'Gestion des robots ';
$LANG['ModifyRobot'] = 'Modifier un robot';
$LANG['AddRobot'] = 'Ajouter un nouveau robot';
$LANG['BackToRobotsAdmin'] = "Retour à l'administration des robots.";
$LANG['RobotAdded'] = 'Robot ajouté !';
$LANG['RobotUpdated'] = 'Robot mis à jour !';
$LANG['RobotDeleted'] = 'Robot supprimé !';
$LANG['BadRobotName'] = 'Mauvais nom de robot !';
$LANG['BadUserAgent'] = "Mauvais nom d'agent !";
$LANG['IPNotSpecified'] = "Aucune adresse IP du robot n'est définie !";
$LANG['BadDetectionMode'] = 'Mode de détection du robot inconnu !';
// ---------------------------------------------------------------------------
// other
// ---------------------------------------------------------------------------
$TAB_MONTHS = [ '', 'Janvier', 'F&eacute;vrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet',
'Ao&ucirc;t', 'Septembre', 'Octobre', 'Novembre', 'D&eacute;cembre',
];
$TAB_DAYS = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
