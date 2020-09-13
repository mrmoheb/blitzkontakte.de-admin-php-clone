<?php namespace App\Controllers;

class Users extends BaseController
{
	public function __construct()
    {
            $this->session = session();
			$this->request = service('request');
	}
	
	public function index()
	{
		if(!$this->session->has("sessKey")){
			return redirect()->to(base_url('login'));
		}
		//$session->setFlashdata('success_message', 'Thank you for loading this page');
		//$session->setFlashdata('error_message', 'Oh no this is an error message');
		$users = $this->getPendingUsers();
		$users = json_decode($users);
		if($users->status->code===200){
			$users = $users->result->users;
		}else{
			$users = [];
		}
		return view('theme',['file'=>'users','users'=>$users]);
	}

	public function approve($userId){
		if(!$this->session->has("sessKey")){
			return redirect()->to(base_url('login'));
		}
		$manageUser = $this->manageUser($userId,"approve");
		$this->session->setFlashdata('success_message', 'User has been approved');
		return redirect()->to(base_url('users'));
	}

	public function decline($userId){
		if(!$this->session->has("sessKey")){
			return redirect()->to(base_url('login'));
		}
		$manageUser = $this->manageUser($userId,"decline");
		$this->session->setFlashdata('success_message', 'User has been declined');
		return redirect()->to(base_url('users'));
	}

	private function getPendingUsers(){
		$bearerToken = $this->session->get('sessKey');
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => "http://45.153.56.144:8080/getpendingusers/",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"Authorization: Bearer $bearerToken"
		),
		));
		$response = curl_exec($curl);

		curl_close($curl);
		return $response;
	}

	private function manageUser($userId,$action){
		$bearerToken = $this->session->get('sessKey');
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => "http://45.153.56.144:8080/manageuser/",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS =>"{\"userId\":$userId,\"action\":\"$action\"}",
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"Authorization: Bearer $bearerToken"
		),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return json_decode($response);
	}
}
