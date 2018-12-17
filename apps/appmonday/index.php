<?php
require_once '../../../config/config.php';

$data = json_decode(file_get_contents('php://input'), true);
$bdd = new PDO('mysql:host='.getDBHost().';dbname=nathanfallet', getDBUsername(), getDBPassword(), array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

if($data['method'] == 'Web:submitApp()'){
	$data['name'] = trim($data['name']);
	$data['user'] = trim($data['user']);
	$data['link'] = trim($data['link']);
	if(!empty($data['name']) && !empty($data['user']) && !empty($data['link'])){
		$sql = $bdd->prepare("INSERT INTO appmonday (name, submit, user, link) VALUES(?, NOW(), ?, ?)");
		if($sql->execute(array($data['name'], $data['user'], $data['link']))){
			echo json_encode(array('success' => 'success'));
		}else{
			echo json_encode(array('error' => 'error_unknown'));
		}
	}else{
    echo json_encode(array('error' => 'error_all_fields_required'));
  }
}
