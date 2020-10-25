<?php

include '../../mainfile.php';
require XOOPS_ROOT_PATH . '/modules/googlestats/cache/config.php';
if (file_exists(XOOPS_ROOT_PATH . '/modules/googlestats/language/' . $xoopsConfig['language'] . '/main.php')) {
    require_once XOOPS_ROOT_PATH . '/modules/googlestats/language/' . $xoopsConfig['language'] . '/main.php';
} else {
    require_once '../language/english/main.php';
}
