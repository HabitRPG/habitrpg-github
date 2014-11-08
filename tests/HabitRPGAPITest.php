<?php
/*
 * This file is part of HabitRPG-GitHub.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace tests;

/**
 * This class tests the HabitRPGAPI class.
 *
 * To run:
 * phpunit --bootstrap tests/bootstrap.php tests/HabitRPGAPITest
 *
 * @author Bradley Wogsland <bradley@wogsland.org>
 */
class HabitRPGAPITest
extends \PHPUnit_Framework_TestCase
{
  /**
   * Tests the class constructor.
   */
  public function test_constructor () {
    $test_name = 'user'.rand();
    $test_token = 'api'.rand();
    $test = new \HabitRPGAPI($test_name, $test_token);
    $this->assertEquals($test_name, $test->userId);
    $this->assertEquals($test_token, $test->apiToken);
    $this->assertEquals('https://habitrpg.com/api/v2/', $test->apiURL);
  }
}
