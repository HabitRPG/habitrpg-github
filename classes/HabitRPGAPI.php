<?php
/**
 * This file is part of HabitRPG-GitHub.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This class represents a HabitRPG user.
 *
 * @author Rudd Fawcett <rudd.fawcett@gmail.com> (from http://github.com/ruddfawcett/HabitRPG_PHP)
 */

class HabitRPGAPI {
	public $userId;
	public $apiToken;
	public $apiURL;

	/**
	 * Creates a new HabitRPGAPI instance
	 */
	public function __construct ($userId, $apiToken) {

		$this->userId = $userId;
		$this->apiToken = $apiToken;
		$this->apiURL = 'https://habitrpg.com/api/v2/';

		if(!extension_loaded('cURL')) {
			throw new Exception('This HabitRPG PHP API class requires cURL in order to work.');
		}
	}

	/**
	 * Performs all cURLs that are initated in each function, private function
	 * @param string $endpoint is the URL of the cURL
	 * @param string $curlType is the type of the cURL for the switch, e.g. PUT, POST, GET, etc.
	 * @param array $postBody is the data that is posted to $endpoint in JSON
	 */
	protected function curl($endpoint,$curlType,$postBody) {
		$curl = curl_init();
		$curlArray = array(
							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_HEADER => false,
							CURLOPT_ENCODING => "gzip",
							CURLOPT_HTTPHEADER => array(
														"Content-type: application/json",
														"x-api-user:".$this->userId,
														"x-api-key:".$this->apiToken),
							CURLOPT_URL => $endpoint);
		switch($curlType) {
			case "POST":
				$curlArray[CURLOPT_POSTFIELDS] = $postBody;
				$curlArray[CURLOPT_POST] = true;
				curl_setopt_array($curl, $curlArray);
				break;
			case "GET":
				curl_setopt_array($curl, $curlArray);
				break;
			case "PUT":
				$curlArray[CURLOPT_CUSTOMREQUEST] = "PUT";
				$curlArray[CURLOPT_POSTFIELDS] = $postBody;
				curl_setopt_array($curl, $curlArray);
				break;
			case "DELETE":
				break;
			default:
				throw new Exception("Please use a valid method as the cURL type.");
		}

		$habitRPGResponse = curl_exec($curl);
		$habitRPGHTTPCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

		curl_close($curl);

		if ($habitRPGHTTPCode == 200) {
			return array("result"=>true,"habitRPGData"=>json_decode($habitRPGResponse,true));
		}
		else {
		$habitRPGResponse = json_decode($habitRPGResponse,true);
			return array("error"=>$habitRPGResponse['err'],"details"=>array("httpCode"=>$habitRPGHTTPCode,"endpoint"=>$endpoint,"dataSent"=>json_decode($postBody,true)));
		}
	}
}
?>
