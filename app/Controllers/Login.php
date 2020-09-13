<?php namespace App\Controllers;

class Login extends BaseController
{
    public function __construct()
    {
            $this->session = session();
            $this->request = service('request');
    }
	public function index()
	{
        if($this->session->has("sessKey")){
            return redirect()->to(base_url('users'));
        }
        return view('login');
    }
    
    public function process(){
        
        $data = $this->request->getPost();
        $authentication = $this->authenticateUser($data['email'],$data['password']);
        if($authentication->status->code === 200){
            $sessKey = $authentication->result->tokenId;
            $this->session->set(['sessKey'=>$sessKey]);
            return redirect()->to(base_url());
        }else{
            return redirect()->to(base_url('login'));
        }
    }

    public function logout(){
        $this->session->destroy();
        return redirect()->to(base_url('login'));
    }

    private function authenticateUser($email,$password){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://45.153.56.144:8080/authenticate",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>"{\"email\":\"$email\",\"password\":\"$password\"}",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json"
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }
}