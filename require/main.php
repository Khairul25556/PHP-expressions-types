<?php

require_once 'config.php';
echo "Database $dbHost:$dbUser";

//secure file must be use 'require' because whatever error happend it closes the script
//but if we use include it will work too but it runs the whole script and shows error