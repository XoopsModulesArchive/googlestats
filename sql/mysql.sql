#
# Structure de la table `gs_log`
#
CREATE TABLE gs_log (
    id    INT(10) UNSIGNED     NOT NULL AUTO_INCREMENT,
    robot SMALLINT(7) UNSIGNED NOT NULL DEFAULT '0',
    url   VARCHAR(255)         NOT NULL DEFAULT '',
    date  DATETIME             NOT NULL DEFAULT '0000-00-00 00:00:00',
    ip    VARCHAR(16)          NOT NULL DEFAULT '',
    dns   VARCHAR(120)         NOT NULL DEFAULT '',
    PRIMARY KEY (id),
    KEY id (id)
)
    ENGINE = ISAM;
#
# Contenu de la table `gs_log`
#
# --------------------------------------------------------
#
# Structure de la table `gs_robots`
#
CREATE TABLE gs_robots (
    id         SMALLINT(7) UNSIGNED                         NOT NULL AUTO_INCREMENT,
    actif      SMALLINT(1) UNSIGNED                         NOT NULL DEFAULT '1',
    user_agent VARCHAR(255)                                 NOT NULL DEFAULT '',
    ip1        VARCHAR(16)                                  NOT NULL DEFAULT '',
    ip2        VARCHAR(16)                                  NOT NULL DEFAULT '',
    nom        VARCHAR(255)                                 NOT NULL DEFAULT '',
    detection  ENUM ('detection_user_agent','detection_ip') NOT NULL DEFAULT 'detection_user_agent',
    descr_fr   TEXT,
    descr_en   TEXT,
    url        VARCHAR(120)                                 NOT NULL DEFAULT '',
    PRIMARY KEY (id),
    KEY id (id)
)
    ENGINE = ISAM;
#
# Contenu de la table `gs_robots`
#
INSERT INTO gs_robots
VALUES (1, 1, 'Googlebot/2.1 (+http://www.googlebot.com/bot.html)', '216.239.46.', '64.68.82.', 'GoogleBot', 'detection_ip',
        'GoogleBot est le nom du robot d\'indexation de Google. Ce robot est programmé pour fonctionner sur des centaines de machines à la fois, avec des adresses IP différentes.<br />\r\nNéanmoins il en existe deux sortes : le <b>Fresh Crawler</b>, dont l\'adresse IP commence par 64.68.82., correspond au robot qui indexe les nouvelles pages trouvées par Google ; une fois visitées par ce robot, les pages apparaissent dans Google seulement quelques jours. Le <b>Deep Crawler</b> (ou <b>Full Crawler</b>), dont l\'adresse IP commence par 216.239.46., correspond au robot qui effectue une indexation massive de tous les documents connus de Google, en général pendant environ une semaine, juste après la Google Dance.',
        'GoogleBot is the name of the crawler of Google. This robot is programmed to run on hundreds of machines simultaneously with different IP addresses.<br />Nevertheless there are two types of GoogleBot robots: the <b>Fresh Crawler</b>, whose IP address begins with 64.68.82., is the robot indexing the fresh pages recently found by Google; once visited by this robot, the pages are in the Google\'s index only for a few days. The <b>Deep Crawler</b> (or <b>Full Crawler</b>), whose IP address begins with 216.239.46., is the robot massively indexing all the documents within the Google\'s index, during around one week, just after the Google Dance.',
        'http://www.googlebot.com/bot.html');
INSERT INTO gs_robots
VALUES (2, 0, 'test', '.', '.', 'test', 'detection_ip', 'Ceci n\'est pas un robot à proprement parler, il est utilisé pour tester si GoogleStats est bien installé sur votre site.<br />Une fois que l\'installation est validée, pensez à désactiver ce robot.',
        'This is not really a robot... it is used to test if GoogleStats is correctly installed on your site.<br />Once you have tested it, de-activate it.', '');
INSERT INTO gs_robots
VALUES (3, 1, 'Pompos', '212.27.33.', '', 'Pompos', 'detection_user_agent', 'Pompos est un outil puissant d\'analyse de documents à des fins d\'indexation et de classement du Web. Le but du robot Pompos est de collecter le plus de documents possible sur le web, et ce pour le moteur dir.com.<br />',
        'Pompos est un outil puissant d\'analyse de documents à des fins d\'indexation et de classement du Web. Le but du robot Pompos est de collecter le plus de documents possible sur le web, et ce pour le moteur dir.com.<br />', 'http://dir.com/pompos.html');
INSERT INTO gs_robots
VALUES (4, 1, 'FAST-WebCrawler', '66.77.73.', '', 'Fast', 'detection_ip', 'Le robot de Fast / AlTheWeb', 'Used for http://www.alltheweb.com and other search engines', '');
INSERT INTO gs_robots
VALUES (5, 1, 'ia_archiver', '66.28.250.', '209.237.238.', 'Alexa', 'detection_user_agent', 'Le robot d\'Alexa.', 'Used for http://www.alexa.com and http://www.archive.org internet archive', 'http://pages.alexa.com/help/webmasters/index.html');
INSERT INTO gs_robots
VALUES (6, 1, 'Mercator', '204.123.28.', '', 'Mercator', 'detection_user_agent', 'Robot d\'Altavista', 'Altavista search indexing spider', '');
INSERT INTO gs_robots
VALUES (7, 1, 'Slurp', '216.35.116.', '', 'Slurp', 'detection_ip', 'Robot utilisé par Inktomi', 'Spider for http://www.inktomi.com partner sites', '');
INSERT INTO gs_robots
VALUES (8, 1, 'Openfind', '66.237.60.', '', 'Openfind', 'detection_ip', 'Openfind data gatherer, Openbot/3.0+(robot-response@openfind.com.tw)<br />Used for http://www.openfind.com.tw/ search engine (Taiwan)',
        'Openfind data gatherer, Openbot/3.0+(robot-response@openfind.com.tw;)<br />Used for http://www.openfind.com.tw/ search engine (Taiwan)', 'http://www.openfind.com.tw/robot.html');
INSERT INTO gs_robots
VALUES (9, 1, 'Scooter', '64.152.75.114', '209.73.162.54', 'Scooter', 'detection_user_agent', 'Robot d\'Altavista', 'http://www.altavista.com web crawler', '');
INSERT INTO gs_robots
VALUES (10, 1, 'SlySearch/1.2', '64.140.48.30', '', 'SlySearch', 'detection_user_agent', 'Robot de recherche de plagiat (www.plagiarism.com)', 'Robot searching for plagiarism (www.plagiarism.org)', 'http://www.plagiarism.org/crawler/robotinfo.html');
INSERT INTO gs_robots
VALUES (11, 1, 'ASPseek/1.2.10', '198.169.127.', '', 'ASP seek', 'detection_user_agent', '', '', '');
INSERT INTO gs_robots
VALUES (12, 1, 'http://www.almaden.ibm.com/cs/crawler', '66.147.154.3', '', 'Almaden', 'detection_user_agent', 'Almaden est le laboratoire de recherche d\'IBM...', '', 'http://www.almaden.ibm.com/cs/crawler');
INSERT INTO gs_robots
VALUES (13, 1, 'Mozilla/2.0 (compatible; Ask Jeeves)', '65.214.36.150', '', 'Ask Jeeves', 'detection_user_agent', '', '', '');
INSERT INTO gs_robots
VALUES (14, 1, 'Googlebot-Image/1.0 (+http://www.googlebot.com/bot.html)', '64.68.84.', '', 'Googlebot-Image 1.0', 'detection_user_agent', 'Robot d\'indexation des images de Google', 'Image Google crawler', 'http://www.googlebot.com/bot.html');
INSERT INTO gs_robots
VALUES (15, 1, 'TurnitinBot', '64.140.48.', '', 'Turnitin', 'detection_user_agent', '', '', 'http://www.turnitin.com/robot/crawlerinfo.html');
INSERT INTO gs_robots
VALUES (16, 1, 'Mozilla/4.0 (compatible; MSIE 5.0; Windows 95) VoilaBot; 1.6', '195.101.94.209', '', 'VoilaBot', 'detection_user_agent', 'Le robot de Voila', 'Voila search engine robot', '');
INSERT INTO gs_robots
VALUES (17, 1, 'Mozilla/4.0 compatible ZyBorg/1.0 (ZyBorg@WISEnutbot.com; http://www.WISEnutbot.com)', '209.249.66', '209.249.67', 'ZyBorg', 'detection_user_agent', 'Robot de WiseNut', 'WiseNut\'s robot', 'http://www.wisenutbot.com/');
INSERT INTO gs_robots
VALUES (18, 1, 'DeepIndex', '', '', 'DeepIndex', 'detection_user_agent',
        'DeepIndex est le principal robot d\'indexation de DeepIndex le moteur de recherche. Ce robot fonctionne sur plusieurs machines et alimente la base de recherche principale du moteur en permanence. Il respecte les normes W3C en matière de robot d\'indexation et suit les indications du fichier robots.txt et/ou du meta-tag robots. Il est programmé pour ne pas saturer les serveurs.',
        'DeepIndex is the name of the searchengine bot of DeepIndex european searchengine. The bot works on several computers to feed the DeepIndex main base. The bot does follow robots.txt and/or meta-tag robots and respects the W3C recommandations for indexing robots. The bot is programmed to be polite with your server.',
        'http://www.webrankinfo.com/deepindex/');
