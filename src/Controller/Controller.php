<?php
namespace Src\Controller;

class Controller {
	private $requestMethod;

	public function __construct($requestMethod) {
		$this->requestMethod = $requestMethod;
	}
	
	public function processRequest() {
		switch ($this->requestMethod) {
			case 'GET':
				// TODO
				break;
			case 'POST':
				// TODO
				break;
			default:
				$response = $this->notFoundResponse();
				break;
		}

		header($response['status_code_header']);
		if ($response['body']) {
			echo $response['body'];
		}
	}

	public function getSupervisors() {
		// GET supervisors from https://609aae2c0f5a13001721bb02.mockapi.io/lightfeather/managers
	}

	public function postInfo() {
		// accept POST request here
	}

	public function notFoundResponse() {
		$reqponse['status_code_header'] = 'HTTP/1.1 404 Not Found'
		$response['body'] = null;
		return $response;
	}
}