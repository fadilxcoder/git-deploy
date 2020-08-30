<?php

echo '<pre>';

# Change below settings according to project
$path = '/home/ubuntu/environment';
$php = 'php7.2';
# EOF settings


# Pull from master branch
var_dump(shell_exec("cd $path;/usr/bin/git pull origin master 2>&1"));

echo '</pre>';

?>