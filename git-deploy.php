<?php

echo '<pre>';

# Change below settings according to project
$path = '/home/ubuntu/environment';
$php = 'php7.2';
# EOF settings


# Pull from preprod branch
var_dump(shell_exec("cd $path;/usr/bin/git pull origin preprod 2>&1"));


# Install composer packages
var_dump(shell_exec("cd $path;export COMPOSER_HOME=$path./.config/composer;/usr/bin/$php $path/composer.phar install 2>&1"));


# SYMFONY - clear cache
var_dump(shell_exec("cd $path;export COMPOSER_HOME=$path./.config/composer;/usr/bin/$php $path/bin/console cache:clear --env=dev 2>&1"));


# SYMFONY - doctrine schema update
var_dump(shell_exec("cd $path;export COMPOSER_HOME=$path./.config/composer;/usr/bin/$php $path/bin/console d:s:u --force 2>&1"));


# SYMFONY - asset install
var_dump(shell_exec("cd $path;export COMPOSER_HOME=$path./.config/composer;/usr/bin/php $path/bin/console assets:install 2>&1"));


# SYMFONY / YARN
var_dump(shell_exec("cd $path;export COMPOSER_HOME=$path./.config/composer;/usr/bin/yarn install 2>&1"));


# SYMFONY / YARN - Compiling CSS / JS
var_dump(shell_exec("cd $path;export COMPOSER_HOME=$path./.config/composer;/usr/bin/yarn dev 2>&1"));

echo '</pre>';

?>