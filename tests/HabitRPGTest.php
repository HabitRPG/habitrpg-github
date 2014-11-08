<?php
/*
 * This file is part of HabitRPG-GitHub.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace tests;

/**
 * This class tests the HabitRPG class.
 *
 * To run:
 * phpunit --bootstrap tests/bootstrap.php tests/HabitRPGTest
 *
 * @author Bradley Wogsland <bradley@wogsland.org>
 */
class HabitRPGTest
extends \PHPUnit_Framework_TestCase
{
  /**
   * Tests the class constructor.
   */
  public function test_constructor () {
    $test_name = 'user'.rand();
    $test_token = 'api'.rand();
    $test = new \HabitRPG($test_name, $test_token);
    $this->assertEquals($test_name, $test->userId);
    $this->assertEquals($test_token, $test->apiToken);
    $this->assertEquals('https://habitrpg.com/api/v2/user', $test->apiURL);
  }

  /**
   * Tests the newTask function.
   */
  public function test_newTask () {
    $test = new \HabitRPG(UserID, APIToken);

    // setup the parameters
    $type = 'To-Dos';
    $title = 'API Task Creation '.rand();
    $text = 'Create a task using the API';
    $task = array('type'=>$type, 'title'=>$title, 'text'=>$text);

    $this->markTestIncomplete('incomplete');
    // create it
    //$test->newTask($task);
  }

  /**
   * Tests the userStats function.
   */
  public function test_userStats () {
    $test = new \HabitRPG(UserID, APIToken);

    $stats = $test->userStats();
    $this->assertEquals(UserID, $stats['habitRPGData']['_id']);
    //print_r($stats);
  }
}
