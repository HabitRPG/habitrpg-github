<?php
/*
 * This file is part of HabitRPG-GitHub.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace tests;
require_once(__DIR__.'/../scripts/session.php');
require_once(__DIR__.'/../scripts/serviceFunctions.php');


/**
 * This class tests the HabitRPGAPI class.
 *
 * To run:
 * phpunit --bootstrap tests/bootstrap.php tests/serviceFunctionsTest
 *
 * @author Bradley Wogsland <bradley@wogsland.org>
 */
class serviceFunctionsTest
extends \PHPUnit_Framework_TestCase
{
  /**
   * Tests the newCommit function.
   */
  public function test_newCommit () {
    $repoName = 'wogsland/HabitRPG-GitHub';
    $user = 'wogsland';
    $count = 2;
    $token = 'cLFWwvNKC2exK';
    newCommit($repoName, $user, $count, $token);
    //$this->assertEquals($test_name, $test->userId);
    //$this->assertEquals($test_token, $test->apiToken);
    //$this->assertEquals('https://habitrpg.com/api/v2/', $test->apiURL);
  }
}
