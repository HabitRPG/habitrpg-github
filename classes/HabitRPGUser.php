<?php
/*
 * This file is part of HabitRPG-GitHub.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This class represents a HabitRPG user.
 *
 * @author Rudd Fawcett <rudd.fawcett@gmail.com> (from http://github.com/ruddfawcett/HabitRPG_PHP)
 */

class HabitRPGUser
extends HabitRPGAPI
{
	/**
	 * Creates a new HabitRPGUser instance
	 */
	public function __construct ($userId, $apiToken) {
		parent::__construct($userId, $apiToken);
		$this->apiURL .= 'user';
	}

	/**
	 * Creates a new task for the userId and apiToken HabitRPG is initiated with
	 * @param array $newTaskParams required keys: type, title and text
	 * @param array $newTaskParams optional keys: value and note
	 */
	public function newTask($newTaskParams) {
		if(is_array($newTaskParams)) {
			print_r($newTaskParams);
			if(!empty($newTaskParams['type'])
			//&& !empty($newTaskParams['title'])
			&& !empty($newTaskParams['text'])) {
				$newTaskParamsEndpoint=$this->apiURL."/task";
				$newTaskPostBody=array();
				$newTaskPostBody['type'] = $newTaskParams['type'];
				$newTaskPostBody['text'] = $newTaskParams['text'];
				if(!empty($newTaskParams['value'])) {
					$newTaskPostBody['value']=$newTaskParams['value'];
				}
				if(!empty($newTaskParams['note'])) {
					$newTaskPostBody['note']=$newTaskParams['note'];
				}

				$newTaskPostBody=json_encode($newTaskPostBody);

				return $this->curl($newTaskParamsEndpoint,"POST",$newTaskPostBody);
			}
			else {
				throw new Exception("Required keys of newTaskParams are null.");
			}
		}
		else {
			throw new Exception("newTask takes an array as it's parameter.");
		}
	}

	/**
	 * Up votes or down votes a task by taskId using apiToken and userId
	 * @param array $scoringParams required keys: taskId and direction
	 * @param array $scoringParams optional keys: title, service and icon
	 */
	public function taskScoring($scoringParams) {
		if(is_array($scoringParams)) {
			if(!empty($scoringParams['taskId']) && !empty($scoringParams['direction'])) {
				$scoringEndpoint="https://habitrpg.com/v1/users/".$this->userId."/tasks/".$scoringParams['taskId']."/".$scoringParams['direction'];
				$scoringPostBody=array();
				$scoringPostBody['apiToken']=$this->apiToken;
				if(!empty($scoringParams['title'])) {
					$scoringPostBody['title']=$scoringParams['title'];
				}
				if(!empty($scoringParams['service'])) {
					$scoringPostBody['service']=$scoringParams['service'];
				}
				if(!empty($scoringParams['icon'])) {
					$scoringPostBody['icon']=$scoringParams['icon'];
				}

				$scoringPostBody=json_encode($scoringPostBody);

				return $this->curl($scoringEndpoint,"POST",$scoringPostBody);
			}
			else {
				throw new Exception("Required keys of $scoringParams are null.");
			}
		}
		else {
			throw new Exception("taskScoring takes an array as it's parameter.");
		}
	}

	/**
	 * Grabs all a user's info using the apiToken and userId
	 * @function userStats() no parameter's required, uses userId and apiToken
	 */
	public function userStats() {
		return $this->curl($this->apiURL,"GET",NULL);
	}

	/**
	 * Gets a JSON feed of all of a users task using apiToken and userId
	 * @param string $userTasksType ex. habit,todo,daily (optional null value)
	 * @param string $userTasksType allows to output only certain type of task
	 */
	public function userTasks($userTasksType=NULL) {
		$userTasksEndpoint=$this->apiURL."/tasks";
		if($userTasksType != NULL) {
			$userTasksEndpoint=$this->apiURL."/tasks?type=".$userTasksType;
		}
			return $this->curl($userTasksEndpoint,"GET",NULL);
	}

	/**
	 * Get's info for a certain task only for the apiToken and userId passed
	 * @param string $taskId taskId for user task, which can be grabbed from userTasks()
	 */
	public function userGetTask($taskId) {
		if(!empty($taskId)) {
			$userGetTaskEndpoint=$this->apiURL."/task/".$taskId;

			return $this->curl($userGetTaskEndpoint,"GET");
		}
		else {
			throw new Exception("userGetTask needs a value as it's parameter.");
		}
	}

	/**
	 * Updates a task's for a userId and apiToken combo and a taskId
	 * @param array $updateParams required keys: taskId and text
	 */
	public function updateTask($updateParams) {
		if(is_array($updateParams)) {
			if(!empty($updateParams['taskId']) && !empty($updateParams['text'])) {
				$updateParamsEndpoint=$this->apiURL."/task/".$updateParams['taskId'];
				$updateTaskPostBody=array();
				$updateTaskPostBody['text'] = $updateParams['text'];

				$updateTaskPostBody=json_encode($updateTaskPostBody);

				return $this->curl($updateParamsEndpoint,"PUT",$updateTaskPostBody);
			}
			else {
				throw new Exception("Required keys of $updateParams are null.");
			}
		}
		else {
			throw new Exception("updateTask takes an array as it's parameter.");
		}
	}
}
?>
