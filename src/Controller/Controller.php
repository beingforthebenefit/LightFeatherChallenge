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
				$response = $this->getSupervisors();
				break;
			case 'POST':
				$response = $this->submit();
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
		$result = file_get_contents('https://609aae2c0f5a13001721bb02.mockapi.io/lightfeather/managers');

		$response['status_code_header'] = 'HTTP/1.1 200 OK';
		$response['body'] = json_decode($result);

		return $response;
	}

	public function submit() {
		$input = [
			'first_name' => $_POST['first_name'],
			'last_name' => $_POST['last_name'],
			'email' => $_POST['email'],
			'phone' => $_POST['phone'],
			'supervisor' => $_POST['supervisor']
		];

		$response['status_code_header'] = 'HTTP/1.1 201 Created';
		$response['body'] = null;

		// log to console
		\Src\Utils::console_log($input);

		return $response;
	}

	public function notFoundResponse() {
		$response['status_code_header'] = 'HTTP/1.1 404 Not Found';
		$response['body'] = null;
		return $response;
;	}
}