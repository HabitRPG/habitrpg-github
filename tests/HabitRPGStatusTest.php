<?php
/*
 * This file is part of HabitRPG-GitHub.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace tests;

/**
 * This class tests the HabitRPGStatus class.
 *
 * To run:
 * phpunit --bootstrap tests/bootstrap.php tests/HabitRPGStatusTest
 *
 * @author Bradley Wogsland <bradley@wogsland.org>
 */
class HabitRPGStatusTest
extends \PHPUnit_Framework_TestCase
{
  /**
   * Tests the class constructor.
   */
  public function test_constructor () {
    $test_name = 'user'.rand();
    $test_token = 'api'.rand();
    $test = new \HabitRPGStatus($test_name, $test_token);
    $this->assertEquals($test_name, $test->userId);
    $this->assertEquals($test_token, $test->apiToken);
    $this->assertEquals('https://habitrpg.com/api/v2/status', $test->apiURL);
  }

  /**
   * Tests the current function.
   */
  public function test_current () {
    // test with real credentials
    $test = new \HabitRPGStatus(UserID, APIToken);
    $current = $test->current();
    //print_r($current);
    $this->assertEquals('up', $current['habitRPGData']['status']);

    // test without real credentials
    $test = new \HabitRPGStatus('', '');
    $current = $test->current();
    //print_r($current);
    $this->assertEquals('up', $current['habitRPGData']['status']);
  }

  /**
   * Tests the up function.
   */
  public function test_up () {
    // test with real credentials
    $test = new \HabitRPGStatus(UserID, APIToken);
    $this->assertTrue($test->up());

    // test without real credentials
    $test = new \HabitRPGStatus('', '');
    $this->assertTrue($test->up());
  }
}
