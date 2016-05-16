<?php

/**
*	easy for http get&post    
*/

namespace Monkey92;

class HttpUtil{
    
    private static $httpUtil = null;
    
    private function __construct(){}
    
    public static function getInstance(){
        if(self::$httpUtil == null){
            self::$httpUtil = new static();
        }
        return self::$httpUtil;        
    }
    
    

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



	public function setCookie($cookie){
	  $this->cookie = $cookie;
      return $this;
	}

	public function getCookie(){
	  return $this->cookie;
	}

	public function setRefer($refer){
	  $this->refer = $refer;
      return $this;
	}

	public function setRequestHeaders($requestHeaders){
	  $this->requestHeaders = $requestHeaders;
      return $this;
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

	
	public function getRedirectUrl($url){
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($ch,CURLOPT_HEADER,true);
		curl_setopt($ch,CURLOPT_NOBODY,true);
		$ret = curl_exec($ch);
		curl_close($ch);
		$matched = preg_match('/Location: (\S+)/',$ret,$matchs);
		if($matched === 0){
			return '';
		}
		return $matchs[1];
	}
	




}






