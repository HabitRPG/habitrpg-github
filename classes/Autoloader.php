<?php
/**
 * This file is part of HabitRPG-GitHub.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This class handles loading the classes in this directory.
 */

class Autoloader
{
  /**
   * Register SPL autoloader.
   */
  public static function register()
  {
    spl_autoload_register(array(__CLASS__, 'autoload'));
  }

  /**
   * Autoloads the class.
   *
   * @param string - class name to load
   */
  public static function autoload($class)
  {
    $file = dirname(__FILE__).'/'.str_replace("\\","/", $class).'.php';
    if (is_file($file)) {
      require $file;
    }
  }
}
