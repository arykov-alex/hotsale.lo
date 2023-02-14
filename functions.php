<?php
function addLog($log)
{
	file_put_contents(LOG_FILE, $log.PHP_EOL, FILE_APPEND);
}

function checkCapcha($token)
{
	return false;
}

function checkPassword($password)
{
	if (strlen($password)<6)
		return true;
	return false;
}

function checkEmail($email)
{
	$items = explode('@',$email);
	if (!$items || count($items)!=2 || !$items[0] || !$items[1] || !(strpos($items[1],'.')>0))
		return true;
	return false;
}

// Шифруем пароль
function hashPassword($password)
{
	$salt = '$2a$10$'.substr(str_replace('+','.',base64_encode(pack('N4',mt_rand(),mt_rand(),mt_rand(),mt_rand()))),0,22).'$';
	return crypt($password,$salt);
}

?>