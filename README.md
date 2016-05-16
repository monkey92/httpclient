## easy for http get and post with php

## download 

```sh
	composer require monkey92/httpclient
```

## how to use

```php
	$httpUtil = Httputil::getInstance();
	//get
	$get_ret = $httpUtil->doGet('http://www.domain.com/user?id=1');
	//post
	$post_ret = $httpUtil->doPost('http://www.domain.com/save_user',['name'=>'Tom','age'=>100]);
	
```

