<?php
/*
 * This file is part of HabitRPG-GitHub.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This file is for bootstrapping the phpunit tests.
 */

// register credentials for database & test account
//require_once(__DIR__.'/../scripts/connect.php');
require_once(__DIR__.'/account.php');

// register Autoloader
require_once(__DIR__.'/../classes/Autoloader.php');
Autoloader::register();
