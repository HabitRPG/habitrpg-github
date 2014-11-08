<?php
/*
 * This file is part of HabitRPG-GitHub.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace tests;

/**
 * This class tests setup.
 *
   WARNING: Don't run this if you already have things set up. It will destroy them.
 *
 * To run:
 * phpunit tests/SetupTest
 *
 * @author Bradley Wogsland <bradley@wogsland.org>
 */
class SetupTest
extends \PHPUnit_Framework_TestCase
{
  /**
   * Tests DB setup.
   */
  public function testDBSetup () {
    require(__DIR__."/../scripts/setup.php");
    $columns = array("forUser","repoName","forEvery","current","direction","totalHabit","totalCommits","id");
    $result = $db->query("select column_name
                          from information_schema.columns
                          where table_schema = database()
                          and   table_name = '".MYSQL_PREFIX."userInfo'");
    $count = 0;
    while ($row = $result->fetch()) {
      $this->assertEquals($columns[$count],$row['column_name']);
      $count++;
    }
    $columns = array("forUser","repoName","forEvery","current","direction","totalHabit","totalCommits","id");
    $result = $db->query("select column_name
                          from information_schema.columns
                          where table_schema = database()
                          and   table_name = '".MYSQL_PREFIX."userInfo'");
    $count = 0;
    while ($row = $result->fetch()) {
      $this->assertEquals($columns[$count],$row['column_name']);
      $count++;
    }
    $db->query("DROP TABLE `".MYSQL_PREFIX."userInfo`");
    $db->query("DROP TABLE `".MYSQL_PREFIX."users`");
  }


}
