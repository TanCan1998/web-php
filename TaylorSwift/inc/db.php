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

?>