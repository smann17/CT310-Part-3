<?php
//Constructed using examples from CTLecture11
include("user.php");
class MyDB extends PDO {

	public function __construct(){
	parent::__construct("sqlite:" . __DIR__ . "/users.db");
	//echo "The directory is " . __DIR__;
	}

	function readUsers(){
		$sql = "SELECT username, password, first_name FROM user";
		$result = $this->query($sql);
		foreach ($result as $r){
			//print_r($r);
			$users[] = new User($r['username'], $r['password'], $r['first_name']);
			//print_r($users);
			//print "The user name is " . $r['username'] . " and the password is " . $r['password'];
		}
		return $users;
	}

	function readUsersAnswer(){
		$sql = "SELECT username, question_answer, first_name FROM user";
		$result = $this->query($sql);
		//$string = $result->fetchArray();
		foreach ($result as $r){
			$users[] = new User($r['username'], $r['question_answer'], $r['first_name']);
			//print_r($users);
			//print "The user name is " . $r['username'] . " and the answer is " . $r['question_answer'];
		}
		return $users;
	}

	function readQuestion($username){
		$sql = "SELECT question_id FROM user WHERE username='$username'";
		$result = $this->query($sql);
		//$string = $result->fetchArray();
		
		//echo "The question number is " . $result['question_id'];
		
		foreach ($result as $r){
			//print_r($users);
			$sql2 = "SELECT question FROM question WHERE ID='$r[0]'";
			$result2 = $this->query($sql2);
			foreach ($result2 as $r2){
				$question = $r2[0];//Could be error with more questions 
				//print "The question is " . $r2[0];
			}
			//print_r($r);
			//print "The question_id is " . $r['question_id'];
		}
		return $question;
	}

	function readAllQuestions(){
		$sql = "SELECT question FROM question";
		$result = $this->query($sql);

		$count = 1;
		foreach($result as $r){
			//print_r($r);
			$questions[]=new Question($count, $r['question']);
			//print "The id is " . $count . " and the question is " . $r['question'];
			$count= $count+1;
		}

		return $questions;
	}

	function changeQuestion($username, $question_id, $question_answer){
		$qa = md5($question_answer);
		$sql = "UPDATE user SET question_id=$question_id WHERE username='$username'";
		$sql2 = "UPDATE user SET question_answer='$qa' WHERE username='$username'";
		$result = $this->query($sql);
		$result2 = $this->query($sql2);
		//print_r($result);
		//print "Got here!";

	}
	function changeImg($username,$picture){
		$sql = "UPDATE user SET picName = '$picture' WHERE username = '$username'";
		$result=$this->query($sql);
	}

	function numberOfUsers(){
		$count = 0;
		$sql = "SELECT username, password, first_name FROM user";
		$result = $this->query($sql);
		foreach ($result as $r){
			//print_r($r);
			$count = $count + 1;
			$users[] = new User($r['username'], $r['password'], $r['first_name']);
			//print "The count is " . $count;
			//print_r($users);
			//print "The user name is " . $r['username'] . " and the password is " . $r['password'];
		}
		return $count;
	}
	function editUser($userame,$first,$last,$number,$email,$info){
		//echo "username is " . $userame;
		$sql = "UPDATE user SET first_name = '$first', last_name = '$last', mobileNumber = '$number', email = '$email', info = '$info' WHERE username ='$userame'";
		$result=$this->query($sql);
		//print_r($result);
	}

	function makeUser($count, $username, $first_name, $last_name, $password, $question_id, $question_answer){
		$newID = $count + 1;
		$hashPwd = md5($password);
		$hashQa = md5($question_answer);
		$sql = "INSERT INTO user VALUES($newID, '$username', '$first_name', 
			'$last_name', '$password', $question_id, '$question_answer')";
		$result = $this->query($sql);	
	}
	//Reads in ALL of the users info for a profile page
	function readUsersInfo(){
	$sql = "SELECT id, username, first_name, last_name, password, question_answer, 
	gender, mobileNumber, email, info, picName FROM user";
	$result = $this->query($sql);
	foreach ($result as $r){
		//print_r($r);
		$users[] = new userInfo($r['ID'],$r['username'], $r['password'], $r['first_name'], 
			$r['last_name'], $r['question_answer'], $r['gender'], 
			$r['mobileNumber'], $r['email'], $r['info'], $r['picName']);
		//print_r($users);
		//print "The user name is " . $r['username'] . " and the password is " . $r['password'];
	}
	return $users;
	}
	function getUserFriends($userNumber){
		$sql = "SELECT user1 FROM friends WHERE user2=$userNumber";
		$result = $this->query($sql);
		//print_r($result);
		$friendNumbers = array();
		foreach ($result as $r){
			//echo "The friend is number " . $r['user1'];
			$friendNumbers[] = $r['user1'];
		}
		//print_r($friendNumbers);
		return $friendNumbers;
	}

	function readUserFriends($friendNumber){
		$sql = "SELECT first_name FROM user WHERE ID=$friendNumber";
		$result = $this->query($sql);
		//print_r($result);
		foreach ($result as $r){
			echo "They are friends with " . $r['first_name'];
				//$friendNumbers = $r['user1'];
		}
		//return $friendNumbers;
	}
	function sendRequest($fromUser, $toUser){
		$sql = "INSERT INTO requests (userFrom, userTo) 
			VALUES ($fromUser, $toUser)";
		$result = $this->query($sql);
	}

	function getRequests($userNumber){
		//echo "It got here<br>";
		//echo "The user number is " . $userNumber;
		$sql = "SELECT userFROM FROM requests WHERE userTO=$userNumber";
		$result = $this->query($sql);
		$friendNumbers = array();
		foreach ($result as $r){
			//echo "Friend request from " . $r['userFrom'];
			$friendNumbers[] = $r['userFrom'];
			//$friendNumbers = $r['user1'];
		}
		return $friendNumbers;
	}

	function readUserRequests($friendNumber){
		$sql = "SELECT first_name FROM user WHERE ID=$friendNumber";
		$result = $this->query($sql);
		//print_r($result);
		foreach ($result as $r){
			echo "Friend request from " . $r['first_name'];
				//$friendNumbers = $r['user1'];
		}
		//return $friendNumbers;
	}

	function acceptFriendRequests($user1, $user2){
		
		$sql = "INSERT INTO friends (user1, user2) VALUES($user1, $user2)";
		$sql2 = "INSERT INTO friends (user1, user2) VALUES($user2, $user1)";
		$sql3 = "DELETE FROM requests WHERE userTo=$user1";
		$result = $this->query($sql);
		$result2 = $this->query($sql2);
		$result3 = $this->query($sql3);
	}

	function isAdmin($userNumber){
		$sql = "SELECT ID, admin FROM user";
		$result = $this->query($sql);
		//print_r(expression)
		foreach ($result as $r) {
			if ($r['ID']==$userNumber){
				return $r['admin'];
			}
		}
	}
}
?>