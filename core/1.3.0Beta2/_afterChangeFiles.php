<?php

logg("Began of _afterChangeFiles", "INFO");

// After SEO change config file
$pluginsManager->installPlugin('seo', true);

logg("End of _afterChangeFiles", "INFO");
return true;