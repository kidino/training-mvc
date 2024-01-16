<?php
use Doctrine\DBAL\DriverManager;
session_start();
$config = require 'config.php';

$db_conn = DriverManager::getConnection($config['db_connection']);