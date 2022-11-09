<?php

namespace App\Http\Helpers;

class HelperCurl
{
	const HTTP_OK = 200;
	
	static function get($url, $headers){
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => $headers,
		));
		$response 	= json_decode(curl_exec($curl));
		$code 		= curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        return [
			'response' 	=> $response,
			'status'  	=> $code
		];
	}

	static function post($url, $header, $data){
		$curl = curl_init();
        curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => $data,
			CURLOPT_HTTPHEADER => $header,
        ));
        $response 	= json_decode(curl_exec($curl));
		$code 		= curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        return [
			'response' 	=> $response,
			'status'  	=> $code
		];
	}

	static function patch($url, $header, $data){
		$curl = curl_init();
        curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'PATCH',
			CURLOPT_POSTFIELDS => $data,
			CURLOPT_HTTPHEADER => $header,
        ));
        $response 	= json_decode(curl_exec($curl));
		$code 		= curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        return [
			'response' 	=> $response,
			'status'  	=> $code
		];
	}
}
?>