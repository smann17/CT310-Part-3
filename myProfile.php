<?php
	$title = "Profile Page";
	
	
	$profile = isset($_POST['profile']) ? $_POST['profile'] : "";

	include("inc/header.php");
	include("lib/files.php");
	include("lib/userOperations.php");
	//include("user.php");
	include("userInfo.php");
	include("database.php");
	if(isset($_SESSION["userName"])){
	$userName = $_SESSION["userName"];
	}else{
		$userName = "guest";
	}
	if ($_SESSION["firstName"]=="Guest"){
		header("Location: login.php");
	}

	$util = new util();
?>

	<div class="leftContent">
		<?php
		if(isset($_SESSION["userName"])){
		//print_r($userName);
		$db = new MyDB();
		$databaseContents = $db->readUsersInfo();
		//print_r($databaseContents);
		$count=0;
		/*if(isset($_SESSION["userName"])){*/
		foreach ($databaseContents as $db){
			if(isset($_SESSION["userName"]))
			if ($db->name == $_SESSION["userName"]){
				/*echo "we made it inside the loop YAAAAYYYY <br>";*/
				$userInfo = $databaseContents[$count];
				break;
			}
			$count = $count + 1;

		}
		$_SESSION['userNumber'] = $userInfo->id;
		//echo "USER num is " . $userInfo->id;
		//}
		//print_r($userInfo);	
		//$fileContents = $file->readFile();
		//print_r($fileContents);
		//$userInfo = $databaseContents[$userName-1];

			//print_r($userInfo);

		echo '<h2>' . $userInfo->firstName . ' ' . $userInfo->lastName . '</h2>';
		echo '<img class="profile-pic" src="uploads/'. $userInfo->picName . '" alt="' . $userInfo->firstName . '\'s image profile">';
		//echo '<img src="assets/img/profile'. $count . '.jpg" alt="' . $userInfo->firstName . '\'s image profile">';					
		echo '<p>Gender: ' . $userInfo->gender . '</p>';
		echo '<p>Mobile Number: ' . $userInfo->mobileNumber . '</p>';
		echo '<p>Email: ' . $userInfo->email . '</p>';
		echo '<p> Description:</p><br><p> '.$userInfo->info.'</p>';
				//$description = $op->getDescription();

				// foreach($description as $value) {
				// 	echo '<p>' . $value . '</p><br/>';
				// }	



		/*if ($userName == "") {
			echo '<h2>Profile not found!</h2>';
		} else {
					
			if ($file->exists()) {
				//$op = new userOperations($file);
				$fileContents = $file->readFile();
				//print_r($fileContents);
				$userInfo = $fileContents[$userName-1];


				echo '<h2>' . $userInfo[1] . ' ' . $userInfo[2] . '</h2>';
				echo '<img class="profile-pic" src="assets/img/profile'. $userName . '.jpg" alt="' . $fileContents[0][2] . '\'s image profile">';					
				//$description = $op->getDescription();

				// foreach($description as $value) {
				// 	echo '<p>' . $value . '</p><br/>';
						// }
				echo '<p>' . $userInfo[3] . '</p>';

			} else {
						echo '<h2>Profile not found!</h2>';
			}
		}*/}
		?>

				
		<hr/>
		<?php
		if(isset($_SESSION["userName"])){
			if($util->isIpValid()){
				echo '<p><a href="edit.php?user=' . $userName . '">Edit information</a></p>';
			}}
			else{
				echo'<p> you must be logged in to view this page</p>';
			}
			echo "<hr/> <p>Friend Requests: <br></p>";
		$db2 = new MyDB();
		$userNumber = $_SESSION["userNumber"];
		$requestNumbers = $db2->getRequests($userNumber);
		//print_r($requestNumbers);
		foreach($requestNumbers as $r){
				$db2->readUserRequests($r);
				echo '<form action="myProfile.php" method="post">
					<input type="submit" name="friendAccept" value="Accept"/>
				</form><br>';
				if (isset($_POST["friendAccept"])){
					$db2->acceptFriendRequests($_SESSION["userNumber"], $r);
				}
			}
		?>
		<hr/>

		<?php
			//$db3 = new MyDB();
			//print_r($_SESSION);
			//$userNumber = $_SESSION["userNumber"];
			$friendNumbers = $db2->getUserFriends($userNumber);
			echo '<p>Friends List! <br>';
			//echo "The friends that he has is " . $friendNumbers;
			foreach($friendNumbers as $f){
				$db2->readUserFriends($f);
				echo "<br>";
			}
		
		?>
	</div>
			
	<?php
		include_once("inc/rightContent.php")
	?>

<?php
	include("inc/footer.php")
?>