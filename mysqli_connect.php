<?php
// Connects to the database 

$dbc = mysqli_connect('localhost', 'web_user', 'webpassword', 'fanclub');

if(!$dbc) 
{
   trigger_error ('Could not connect to MySQL: ' . mysqli_connect_error() );
} 
else 
{ 
   mysqli_set_charset($dbc, 'utf8');
}

?>