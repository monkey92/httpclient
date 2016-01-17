<?php

/**
*	easy for http get&post    
*/

namespace Monkey92;

class HttpClient{

	//requestHeaders
	private $requestHeaders = [
		'Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
		'User-Agent:Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.157 Safari/537.36',
		'Accept-Language: zh-CN,zh;q=0.8,en;q=0.6,zh-TW;q=0.4,it;q=0.2'
	];
	//cookie
	private $cookie = '';

	//refer
	private $refer = '';



	public function __construct($requestHeaders=[],$cookie=''){
		$this->requestHeaders = $requestHeaders;
		$this->cookie = $cookie;
	}

	public function setCookie($cookie){
	  $this->cookie = $cookie;
	}

	public function getCookie(){
	  return $this->cookie;
	}

	public function setRefer($refer){
	  $this->refer = $refer;
	}

	public function setRequestHeaders($requestHeaders){
	  $this->requestHeaders = $requestHeaders;
	}



	public  function doGet($url){
	  	$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);//在执行curl_exec()的时候把结果保存在返回值里面
		curl_setopt($ch, CURLOPT_HEADER,false);//是否允许获取响应头
		curl_setopt($ch, CURLOPT_HTTPHEADER,$this->requestHeaders);//设置请求头
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//允许https的请求
	  	curl_setopt($ch, CURLOPT_COOKIE, $this->cookie);
	  	$out = curl_exec($ch);
	 	curl_close($ch);
	  	return $out;
	}




	public  function doPost($url,$data){
	  $ch = curl_init();
	  curl_setopt($ch, CURLOPT_URL, $url);
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);//在执行curl_exec()的时候把结果保存在返回值里面
	  curl_setopt($ch, CURLOPT_HEADER,false);//是否允许获取响应头
	  curl_setopt($ch, CURLOPT_HTTPHEADER,$this->requestHeaders);//设置请求头
	  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//允许https的请求
	  curl_setopt($ch, CURLOPT_COOKIE, $this->cookie);
	  curl_setopt($ch, CURLOPT_POST, true);
	  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	  $out = curl_exec($ch);
	  curl_close($ch);
	  return $out;
	}



}






