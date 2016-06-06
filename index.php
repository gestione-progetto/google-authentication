<?php

require_once 'app/init.php';

$db = new DB;
$query = $db->query("INSERT INTO google_users (google_id, email) values ('123', 'antonio@gmail.com')");

var_dump($query);
