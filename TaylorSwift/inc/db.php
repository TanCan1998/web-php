<?php

$config = array(
	'db'	=> array(
		'host'		=> '127.0.0.1',
		'user'		=> 'root',
		'pass'		=> 'root',
		'db'		=> 'iSwiftie',
		'dns'       => 'mysql:dbname=iSwiftie;host=127.0.0.1;charset=utf8'
	)
);

try {
    $dbb = new PDO($config['db']['dns'], $config['db']['user'], $config['db']['pass']);
    $dbb->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
	exit;
}

$db = mysqli_connect('127.0.0.1', 'root', 'root', 'iSwiftie');
if (mysqli_connect_errno($db)) {
    echo "连接 MySql 失败:" . mysqli_connect_error();
    exit;
}
mysqli_query($db, "SET NAMES utf8");

?>