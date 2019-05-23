<?php
require 'db-con.php';
require 'class-helpers.php';

$connection = new DBCConnection("127.0.0.1", "pond", "root", "");

$helpers = new Helpers;

$server_path = Helpers::get_path();
$server_basepath = Helpers::get_basepath();
$server_path_arrays = Helpers::get_path_arrays();

function server_path($url) {
    return Helpers::server_path($url);
}