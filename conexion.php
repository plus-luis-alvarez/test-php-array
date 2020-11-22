<?php
define("HOSTNAME","92.249.44.1");
define("USERNAME","u392595467_test");
define("PASSWORD","w^1c7QGsICW");
define("DATABASE","u392595467_test");

define("CONNECTIONSTRING","mysql:host=".HOSTNAME.";dbname=".DATABASE.";charset=utf8");

$cn = new PDO(CONNECTIONSTRING,USERNAME,PASSWORD);
