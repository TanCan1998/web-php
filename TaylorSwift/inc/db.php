<?php

$config = array(	
	'host'		=> '127.0.0.1',
	'user'		=> 'root',
	'pass'		=> 'root',
	'db'		=> 'iSwiftie',
	'dns'       => 'mysql:dbname=iSwiftie;host=127.0.0.1;charset=utf8'
);

try {
    $dbb = new PDO($config['dns'], $config['user'], $config['pass']);
    $dbb->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
	exit;
}

?>