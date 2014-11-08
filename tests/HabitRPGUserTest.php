<?php
/*
 * This file is part of HabitRPG-GitHub.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace tests;

/**
 * This class tests the HabitRPGUser class.
 *
 * To run:
 * phpunit --bootstrap tests/bootstrap.php tests/HabitRPGUserTest
 *
 * @author Bradley Wogsland <bradley@wogsland.org>
 */
class HabitRPGUserTest
extends \PHPUnit_Framework_TestCase
{
  /**
   * Tests the class constructor.
   */
  public function test_constructor () {
    $test_name = 'user'.rand();
    $test_token = 'api'.rand();
    $test = new \HabitRPGUser($test_name, $test_token);
    $this->assertEquals($test_name, $test->userId);
    $this->assertEquals($test_token, $test->apiToken);
    $this->assertEquals('https://habitrpg.com/api/v2/user', $test->apiURL);
  }

  /**
   * Tests the newTask function.
   *
   * A task, for example,
   [83] => Array
                        (
                            [text] => :blue_book: Read a 1000 page book
                            [challenge] => Array
                                (
                                    [id] => 39ff426f-9328-4476-86cc-2525a1cf848e
                                )

                            [attribute] => int
                            [priority] => 2
                            [value] => -201.73988025947
                            [tags] => Array
                                (
                                    [39ff426f-9328-4476-86cc-2525a1cf848e] => 1
                                )

                            [notes] =>
                            [dateCreated] => 2014-08-26T13:55:09.371Z
                            [id] => 7b044529-869e-4247-9c58-23da84c2e217
                            [checklist] => Array
                                (
                                )

                            [collapseChecklist] =>
                            [completed] =>
                            [type] => todo
                        )
   */
  public function test_newTask () {
    $test = new \HabitRPGUser(UserID, APIToken);

    // setup the parameters
    $type = 'todo';
    $title = 'API Task Creation '.rand();
    $text = 'Create a task using the API';
    $task = array('type'=>$type,
                  //'title'=>$title,
                  'text'=>$text
                  );

    // create it
    $test->newTask($task);

    $this->markTestIncomplete('incomplete');
  }

  /**
   * Tests the taskScoring function.
   */
  public function test_taskScoring () {
    $test = new \HabitRPGUser(UserID, APIToken);

    $this->markTestIncomplete('incomplete');
  }

  /**
   * Tests the userStats function.
   */
  public function test_userStats () {
    $test = new \HabitRPGUser(UserID, APIToken);

    $stats = $test->userStats();
    $this->assertEquals(UserID, $stats['habitRPGData']['_id']);
    //print_r($stats);
  }

  /**
   * Tests the userTasks function.
   */
  public function test_userTasks () {
    $test = new \HabitRPGUser(UserID, APIToken);

    $tasks = $test->userStats();
    //$this->assertEquals(UserID, $tasks['habitRPGData']['_id']);
    //print_r($tasks);

    $this->markTestIncomplete('incomplete');
  }

  /**
   * Tests the userGetTask function.
   */
  public function test_userGetTask () {
    $test = new \HabitRPGUser(UserID, APIToken);

    $this->markTestIncomplete('incomplete');
  }

  /**
   * Tests the updateTask function.
   */
  public function test_updateTask () {
    $test = new \HabitRPGUser(UserID, APIToken);

    $this->markTestIncomplete('incomplete');
  }
}
