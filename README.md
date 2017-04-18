## php 使用curl扩展实现http请求

## download 

```sh
	composer require monkey92/httpclient
```

## how to use

```php
	use Monkey92\HttpClient;
	$httpUtil = HttpUtil::getInstance();
	//get
	$get_ret = $httpUtil->doGet('http://www.domain.com/user?id=1');
	//post
	$post_ret = $httpUtil->doPost('http://www.domain.com/save_user',['name'=>'Tom','age'=>100]);
	
```

