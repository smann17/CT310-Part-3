<?php
	$title = "Profile Page";
	
	$userName = isset($_GET['user']) ? $_GET['user'] : "";
	$profile = isset($_POST['profile']) ? $_POST['profile'] : "";
	/*printf($userName);*/
	include("inc/header.php");
	include("lib/files.php");
	include("lib/userOperations.php");
	//include("user.php");
	include("userInfo.php");
	include("database.php");

	$util = new util();
	/*echo"works til here";*/
?>

			<div class="leftContent">
				<?php
				//print_r($userName);
				$db = new MyDB();
				$databaseContents = $db->readUsersInfo();
		//print_r($databaseContents);
				$count=0;
		/*if(isset($_SESSION["userName"])){*/
				foreach ($databaseContents as $db){
					//printf(trim($db->firstName));
					if (trim($db->firstName) == $userName){
						//echo "we made it inside the loop YAAAAYYYY <br>";
						$userInfo = $databaseContents[$count];
						break;
						}
					$count = $count + 1;
				}
				

				//print_r($userInfo);

				echo '<h2>' . $userInfo->firstName . ' ' . $userInfo->lastName . '</h2>';
				if(isset($userInfo->picName))
				echo '<img class="profile-pic" src="uploads/'. $userInfo->picName .'" alt="' . $userInfo->firstName . '\'s image profile">';					
				echo '<p>Gender: ' . $userInfo->gender . '</p>';
				echo '<p>Mobile Number: ' . $userInfo->mobileNumber . '</p>';
				echo '<p>Email: ' . $userInfo->email . '</p>';
				if(isset($_SESSION["userName"])&& isset($userInfo->info)){
					echo '<p> Description:</p><br><p> '.$userInfo->info.'</p>';
				
			
				$db2 = new MyDB();
		if (isset($_POST["friendRequest"])){
			$db2->sendRequest($_SESSION["userNumber"], $userInfo->id);
		}
		}				
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
				}*/
				?>

				
				<hr/>

				<?php
				if(isset($_SESSION["userName"])){
					
					echo '<form action="profile.php?user=' . $userName . '" method="post">
					<input type="submit" name="friendRequest" value="Send Friend Request"/>
				</form>';}
				?>
			</div>
			
			<?php
				include_once("inc/rightContent.php")
			?>

<?php
	include("inc/footer.php")
?>