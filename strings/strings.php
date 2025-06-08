<?php

$name = "Rick";
echo 'Hello, $name!\n';
echo "Hello, $name!\n";

//Multiple strings 

$heredoc = <<<EOD
Multi-line string
with variable $name!\n
EOD;

$nowdoc = <<< 'EOD'
Multi-line string
with variable $name!\n
EOD;

echo $heredoc;
echo $nowdoc;

