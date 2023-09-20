<?php

logg("Began of _beforeChangeFiles", "INFO");

$minPHPVersion = 7.4;
$errorPHP = !((float) substr(phpversion(), 0, 3) >= $minPHPVersion);

if ($errorPHP) {
    show::msg(Lang::get('install-php-version-error', (float) substr(phpversion(), 0, 3), $minPHPVersion), 'error');
    logg("End of _beforeChangeFiles", "INFO");
    logg(Lang::get('install-php-version-error', (float) substr(phpversion(), 0, 3), $minPHPVersion), 'ERROR');
    return false;    
}
logg("End of _beforeChangeFiles", "INFO");
return true;
