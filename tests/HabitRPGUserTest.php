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
   */
  public function test_newTask () {
    $test = new \HabitRPGUser(UserID, APIToken);

    // setup the parameters
    $type = 'todo';
    $text = 'API Task Creation Test '.rand();
    //$attribute = 'str';
    //$priority = '1';
    $task = array('type'=>$type,
                  //'title'=>$title,
                  //'attribute'=>$attribute,
                  //'priority'=>$priority,
                  'text'=>$text
                  );

    // create it
    $result = $test->newTask($task);
    //print_r($result);

    $this->assertEquals(1, $result['result']);
    $this->assertEquals($type, $result['habitRPGData']['type']);
    $this->assertEquals($text, $result['habitRPGData']['text']);

    // clean up
    $scoringParams = array('taskId'=>$result['habitRPGData']['_id'], 'direction'=>'up');
    $score = $test->taskScoring($scoringParams);
    $this->assertEquals(1, $score['result']);
  }

  /**
   * Tests the taskScoring function.
   */
  public function test_taskScoring () {
    $test = new \HabitRPGUser(UserID, APIToken);

    // create task
    $type = 'todo';
    $text = 'API Task Scoring Test '.rand();
    $task = array('type'=>$type,
                  'text'=>$text
                  );
    $result = $test->newTask($task);
    $taskId = $result['habitRPGData']['_id'];

    // score it
    $scoringParams = array('taskId'=>$taskId, 'direction'=>'up');
    $score = $test->taskScoring($scoringParams);
    //print_r($score);

    $this->assertEquals(1, $score['result']);
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
    $this->assertEquals(UserID, $tasks['habitRPGData']['_id']);
    $this->assertTrue(is_array($tasks['habitRPGData']['rewards']));
    $this->assertTrue(is_array($tasks['habitRPGData']['todos']));
    $this->assertTrue(is_array($tasks['habitRPGData']['habits']));
    $this->assertTrue(is_array($tasks['habitRPGData']['dailys']));
    //print_r($tasks);
  }

  /**
   * Tests the userGetTask function.
   */
  public function test_userGetTask () {
    $test = new \HabitRPGUser(UserID, APIToken);

    // create task
    $type = 'todo';
    $text = 'API Task Getting Test '.rand();
    $task = array('type'=>$type,
                  'text'=>$text
                  );
    $result = $test->newTask($task);
    $taskId = $result['habitRPGData']['_id'];

    // get it
    $get = $test->userGetTask($taskId);
    //print_r($get);

    $this->assertEquals(1, $get['result']);
    $this->assertEquals($type, $get['habitRPGData']['type']);
    $this->assertEquals($text, $get['habitRPGData']['text']);

    // clean up
    $scoringParams = array('taskId'=>$taskId, 'direction'=>'up');
    $score = $test->taskScoring($scoringParams);
    $this->assertEquals(1, $score['result']);
  }

  /**
   * Tests the updateTask function.
   */
  public function test_updateTask () {
    $test = new \HabitRPGUser(UserID, APIToken);

    $this->markTestIncomplete('incomplete');
  }
}
