<?php
session_start();
if(!isset($_SESSION['username'])){
	echo'loggedout';
}else{
	echo'logged';
}
 




?>