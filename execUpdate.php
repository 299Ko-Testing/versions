<?php

/**
 * @copyright (C) 2022, 299Ko, based on code (2010-2021) 99ko https://github.com/99kocms/
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @author Jonathan Coulet <j.coulet@gmail.com>
 * @author Maxence Cauderlier <mx.koder@gmail.com>
 * @author Frédéric Kaplon <frederic.kaplon@me.com>
 * @author Florent Fortat <florent.fortat@maxgun.fr>
 * 
 * @package 299Ko https://github.com/299Ko/299ko
 */

// need to be started in CLI, in versions folder
// php execUpdate.php

define('KOPATH', '../299ko/');
define('VERSIONSPATH', '../versions-testing/');

$version = '1.3.0Beta1';
$commitLastVersion = 'c2645998459836e4532a64f5af8ef6d1bba37859';
$commitFutureVersion = '610d52df0ced51e1a5072f35ff379d2a06e45665';

chdir(KOPATH);

$result = null;
exec('git diff --name-status ' . $commitLastVersion . ' ' . $commitFutureVersion, $result);

chdir(VERSIONSPATH);

$json = [];

foreach ($result as $r) {
    $line = explode("\t", $r);
    if (count($line) === 2) {
        $json[$line[0]][] = $line[1];
    }
}

if (!is_dir('core/' . $version)) {
    mkdir('core/' . $version, 0777, true);
}

file_put_contents('core/' . $version . '/files.json', json_encode($json, true));

