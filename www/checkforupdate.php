<?php
if(!isset($_GET['id']) || !isset($_GET['version'])){
	echo '&c[Updater] Error: Malformed request!';
	exit;
}
require 'config.php';
$sql = $bdd->prepare("SELECT * FROM projects WHERE id = ?");
$sql->execute(array($_GET['id']));
$dn = $sql->fetch();
if(!$dn){
	echo '&c[Updater] Unknown project '.$_GET['id'].'!';
	exit;
}else{
	if($_GET['version'] != $dn['version']){
		echo '&6'.$dn['name'].' v.'.$dn['version'].' is now available!
&e'.$url.'project/'.$dn['id'];
	}
}
?>
