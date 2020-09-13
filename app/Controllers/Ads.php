<?php namespace App\Controllers;

class Ads extends BaseController
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
		$ads = $this->getPendingAds();
		if($ads->status->code===200){
			$ads = $ads->result->ads;
		}else{
			$ads = [];
		}
		return view('theme',['file'=>'ads','ads'=>$ads]);
	}

	public function approve($adId){
		if(!$this->session->has("sessKey")){
			return redirect()->to(base_url('login'));
		}
        $data = $this->manageAd($adId,"approve");
		$this->session->setFlashdata('success_message', 'Ad has been approved');
		return redirect()->to(base_url('ads'));
	}

	public function decline($adId){
		if(!$this->session->has("sessKey")){
			return redirect()->to(base_url('login'));
		}
		$this->manageAd($adId,"decline");
		$this->session->setFlashdata('success_message', 'Ad has been declined');
		return redirect()->to(base_url('ads'));
	}

	private function getPendingAds(){
		$bearerToken = $this->session->get('sessKey');
		$curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://45.153.56.144:8080/getpendingads/",
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
		return json_decode($response);
	}

	private function manageAd($adId,$action){
		$bearerToken = $this->session->get('sessKey');
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => "http://45.153.56.144:8080/manageads/",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS =>"{\"adId\":$adId,\"action\":\"$action\"}",
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
