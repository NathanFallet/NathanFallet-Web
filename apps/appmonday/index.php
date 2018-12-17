<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require_once '../../../config/config.php';

$data = json_decode(file_get_contents('php://input'), true);
$bdd = new PDO('mysql:host='.getDBHost().';dbname=nathanfallet', getDBUsername(), getDBPassword(), array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

if($data['method'] == 'Web:submitApp()'){
	$data['name'] = trim($data['name']);
	$data['user'] = trim($data['user']);
	$data['link'] = trim($data['link']);
	$data['description'] = trim($data['description']);
	if(!empty($data['name']) && !empty($data['user']) && !empty($data['link']) && !empty($data['description'])){
		$sql = $bdd->prepare("SELECT * FROM appmonday WHERE name = ? OR link = ?");
		$sql->execute(array($data['name'], $data['link']));
		$dn = $sql->fetch();
		if(!$dn){
			$sql2 = $bdd->prepare("INSERT INTO appmonday (name, submit, user, link, description) VALUES(?, NOW(), ?, ?, ?)");
			if($sql2->execute(array($data['name'], $data['user'], $data['link'], $data['description']))){
				echo json_encode(array('success' => 'success'));
			}else{
				echo json_encode(array('error' => 'error_unknown'));
			}
		}else{
			echo json_encode(array('error' => 'error_name_or_link_already_taken'));
		}
	}else{
    echo json_encode(array('error' => 'error_all_fields_required'));
  }
}else if($data['method'] == 'Web:getApps()'){
	// TO BE CONTINUED (START, LIMIT, SEARCH, ETC...)
	$sql = $bdd->query("SELECT * FROM appmonday WHERE publish != NULL");
	$response = $sql->fetchAll();
	$response['success'] = true;
	echo json_encode($response);
}
