<?php
/**
 * This file is part of HabitRPG-GitHub.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This class represents a HabitRPG status.
 *
 * @author Bradley Wogsland <bradley@wogsland.org>
 */

class HabitRPGStatus
extends HabitRPGAPI
{
	/**
	 * Creates a new HabitRPGUser instance
	 */

	public function __construct ($userId, $apiToken) {
		parent::__construct($userId, $apiToken);
		$this->apiURL .= 'status';
	}

	/**
	 * Grabs HabitRPG's current status
	 * @function userStats() no parameter's required, uses userId and apiToken
	 */
	public function current() {
		return $this->curl($this->apiURL,"GET",NULL);
	}

}
?>
