<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require_once '../../../config/config.php';

$data = json_decode(file_get_contents('php://input'), true);
$bdd = new PDO('mysql:host='.getDBHost().';dbname=easygomoto', getDBUsername(), getDBPassword(), array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

if($data['method'] == 'registerUser'){
  $data['username'] = trim($data['username']);
  $data['mail'] = trim($data['mail']);
  if(!empty($data['username']) && !empty($data['mail']) && !empty($data['password'])){
    if(filter_var($data['mail'], FILTER_VALIDATE_EMAIL)){
      $sql = $bdd->prepare("SELECT * FROM users WHERE username = ?");
      $sql->execute(array($data['username']));
      $dn = $sql->fetch();
      if(!$dn){
        $sql2 = $bdd->prepare("SELECT * FROM users WHERE mail = ?");
        $sql2->execute(array($data['mail']));
        $dn2 = $sql2->fetch();
        if(!$dn2){
          $sql3 = $bdd->prepare("INSERT INTO users (username, mail, password) VALUES(?, ?, ?)");
          if($sql3->execute(array($data['username'], $data['mail'], password_hash($data['password'], PASSWORD_DEFAULT)))){
            sendMails(array($data['mail']), 'Nathan Fallet from EasyGoMoto', 'Inscription sur EasyGoMoto', '<p>Bienvenue '.$data['username'].' !</p>
            <p>Nous vous remercions pour votre inscription sur EasyGoMoto.</p>
            <p>Nous espérons que vous ferez bon voyage grâce à notre application.</p>
            <p>-Nathan Fallet, développeur d\'EasyGoMoto</p>');
            echo json_encode(array('success' => 'success'));
          }else{
            echo json_encode(array('error' => 'error_unknown'));
          }
        }else{
          echo json_encode(array('error' => 'error_mail_already_taken'));
        }
      }else{
        echo json_encode(array('error' => 'error_username_already_taken'));
      }
    }else{
      echo json_encode(array('error' => 'error_mail_regex'));
    }
  }else{
    echo json_encode(array('error' => 'error_all_fields_required'));
  }
}else if($data['method'] == 'loginUser'){
  $data['username'] = trim($data['username']);
  if(!empty($data['username']) && !empty($data['password'])){
    $sql = $bdd->prepare("SELECT * FROM users WHERE username = ?");
    $sql->execute(array($data['username']));
    $dn = $sql->fetch();
    if($dn){
      if(password_verify($data['password'], $dn['password'])){
        $sql2 = $bdd->prepare("SELECT * FROM tokens WHERE user = ?");
        $sql2->execute(array($dn['id']));
        $dn2 = $sql2->fetch();
        if($dn2){
          $token = $dn2['token'];
        }else{
          $skip = true;
    			while($skip){
    				$token = generateRandomString(255);
    				$sql4 = $bdd->prepare("SELECT * FROM tokens WHERE token = ?");
    				$sql4->execute(array($token));
    				$dn4 = $sql4->fetch();
    				if(!$dn4){
    					$skip = false;
    				}
    			}
    			$sql3 = $bdd->prepare("INSERT INTO tokens (token, user) VALUES(?, ?)");
    			$sql3->execute(array($token, $dn['id']));
        }
        echo json_encode(array('success' => 'success', 'token' => $token, 'username' => $dn['username']));
      }else{
        echo json_encode(array('error' => 'error_incorrect_credentials'));
      }
    }else{
      echo json_encode(array('error' => 'error_incorrect_credentials'));
    }
  }else{
    echo json_encode(array('error' => 'error_all_fields_required'));
  }
}else if($data['method'] == 'addPoint'){
	$data['name'] = trim($data['name']);
	$data['description'] = trim($data['description']);
	$data['type'] = trim($data['type']);
	if(!empty($data['token']) && !empty($data['name']) && !empty($data['description']) && !empty($data['type']) && !empty($data['latitude']) && !empty($data['longitude'])){
		$sql = $bdd->prepare("SELECT * FROM tokens WHERE token = ?");
		$sql->execute(array($data['token']));
		$dn = $sql->fetch();
		if($dn){
			$sql2 = $bdd->prepare("INSERT INTO points (name, description, type, latitude, longitude, user) VALUES(?, ?, ?, ?, ?, ?)");
			if($sql2->execute(array($data['name'], $data['description'], $data['type'], $data['latitude'], $data['longitude'], $dn['user']))){
				echo json_encode(array('success' => 'success'));
			}else{
				echo json_encode(array('error' => 'error_unknown'));
			}
		}else{
			echo json_encode(array('error' => 'error_invalid_token'));
		}
	}else{
    echo json_encode(array('error' => 'error_all_fields_required'));
  }
}else if($data['method'] == 'getPoints'){
	$sql = $bdd->query("SELECT * FROM points");
	$response = array();
	while($dn = $sql->fetch()){
		$response[] = array('id' => $dn['id'], 'name' => $dn['name'], 'description' => $dn['description'], 'type' => $dn['type'], 'latitude' => $dn['latitude'], 'longitude' => $dn['longitude']);
	}
	echo json_encode($response);
}else if($data['method'] == 'getPointDetail'){
	if(!empty($data['id'])){
		$sql = $bdd->prepare("SELECT * FROM points WHERE id = ?");
		$sql->execute(array($data['id']));
		if($dn = $sql->fetch()){
			$response = array('id' => $dn['id'], 'name' => $dn['name'], 'description' => $dn['description'], 'type' => $dn['type'], 'latitude' => $dn['latitude'], 'longitude' => $dn['longitude']);
			$sql2 = $bdd->prepare("SELECT * FROM images INNER JOIN users ON images.user = users.id WHERE point = ? ");
			$sql2->execute(array($dn['id']));
			$images = array();
			while($dn2 = $sql2->fetch()){
				$images[] = array('url' => $dn2['url'], 'author' => 'Le '.date('d/m/Y', strtotime($dn2['publish'])).' par '.$dn2['username']);
			}
			$response['images'] = $images;
			$sql3 = $bdd->prepare("SELECT * FROM comments INNER JOIN users ON comments.user = users.id WHERE point = ? ");
			$sql3->execute(array($dn['id']));
			$comments = array();
			while($dn3 = $sql3->fetch()){
				$comments[] = array('comment' => $dn3['comment'], 'author' => 'Le '.date('d/m/Y', strtotime($dn3['publish'])).' par '.$dn3['username']);
			}
			$response['comments'] = $comments;
			echo json_encode($response);
		}else{
			echo json_encode(array('error' => 'error_point_does_not_exist'));
		}
	}else{
    echo json_encode(array('error' => 'error_all_fields_required'));
  }
}else if($data['method'] == 'addComment'){
	$data['content'] = trim($data['content']);
	if(!empty($data['token']) && !empty($data['content']) && !empty($data['id'])){
		$sql = $bdd->prepare("SELECT * FROM tokens WHERE token = ?");
		$sql->execute(array($data['token']));
		$dn = $sql->fetch();
		if($dn){
			$sql2 = $bdd->prepare("INSERT INTO comments (comment, point, user, publish) VALUES(?, ?, ?, NOW())");
			if($sql2->execute(array($data['content'], $data['id'], $dn['user']))){
				echo json_encode(array('success' => 'success'));
			}else{
				echo json_encode(array('error' => 'error_unknown'));
			}
		}else{
			echo json_encode(array('error' => 'error_invalid_token'));
		}
	}else{
    echo json_encode(array('error' => 'error_all_fields_required'));
  }
}
