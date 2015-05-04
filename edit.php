<?php
	$title = "Edit Profile";
	
$refData = "";
$ref = "";
/*print_r($_SESSION);*/
if(isset($_SERVER['HTTP_REFERER'])){
$ref = $_SERVER['HTTP_REFERER'];
$refData = parse_url($ref);
}


	include_once("inc/header.php");

	include_once("lib/userOperations.php");
	include_once("userInfo.php");
	include_once("database.php");
	$db = new MyDB();
	if(isset($_SESSION["userName"]))
	$userName = $_SESSION["userName"];
	//printf($_SESSION["userName"]);
	if(isset($_POST["lastname"])){
	$last = $_POST["lastname"];}

	if(isset($_POST["firstname"])){
	$first = $_POST["firstname"];}
	if(isset($_POST["mobileNumber"]))
	$number = $_POST["mobileNumber"];
	if(isset($_POST["email"]))
	$email = $_POST["email"];
	if(isset($_POST['info']))
	$info = $_POST['info'];

	if(isset($_POST['button'])){

			/*print_r($_POST);*/
			$db->editUser($userName,$first,$last,$number,$email,$info);
			$didit="you have successfully updated you profile";
	}


?>
<div class= "white"></div>
			<div class="leftContent">
				<?php
		if(isset($_SESSION["userName"]))			
		if ($userName == "") {
			echo '<h2>Profile not found!</h2>';
		} else {
			/*$db = new MyDB();*/
			$databaseContents = $db->readUsersInfo();
			$count=0;
			foreach ($databaseContents as $db){
				if(isset($_SESSION["userName"]))
					if ($db->name == $_SESSION["userName"]){
						/*echo "we made it inside the loop YAAAAYYYY <br>";*/
						$userInfo = $databaseContents[$count];
						break;
				}
			$count = $count + 1;
			}

		echo '<div><form id="form1" name="form1" method="post" action="edit.php?user=' . $userName . '">';
		echo '<label for="first name">First Name: </label>';
		echo '<input type="text" id="firstname"  name="firstname" value="' . $userInfo->firstName . ' "/><br>';
		echo '<label for="last name">Last Name: </label>';
		echo '<input type="text" id="lastname"  name="lastname" value=" ' . $userInfo->lastName . '"/><br>';
				if(isset($userInfo->picName)){		
		/*printf($userInfo->picName);*/
		echo '<br><p>Profile picture: -------------------></p><img src= "uploads/'.$userInfo->picName.'" style="float:right; width:100px; height:100px;" alt ="'.$userInfo->picName.'">';
		}echo '<br><label for="mobileNumber">Phone number: </label>';
		echo '<input type="text" id="mobileNumber"  name="mobileNumber" value="' . $userInfo->mobileNumber . '"/>';
		
		echo '<br><br><label for="Email">Email: </label><br>';
		echo '<input type="text" id="email"  name="email" value="' . $userInfo->email . ' "/><br>';
		echo '<br><label for="info">Description:</label>';
		echo '<textarea name="info" id="info" rows="10" cols="50">';
		echo $userInfo->info;
		echo '</textarea>';
		echo '<br><input type="submit" name="button" id="button" value="Save"/>';
		echo '</form></div>';

		
		echo'<div><form id ="form2" action="upload.php" method="post" enctype="multipart/form-data">
   				Select image to upload: <br>
    		<input type="file" name="fileToUpload" id="fileToUpload">
    		<input type="submit" value="Upload Image" name="upload" id="upload">
			</form></div>';

			if(isset($_SESSION["img"])){
			/*printf($_SESSION["img"]);*/
			/*printf($up[$i-1]);*/
			
			if($_SESSION["img"]=="1"){
				unset($_SESSION["img"]);
				echo '<p>your picture has been uploaded</p><br>';
				
			}else if ($_SESSION["img"]=="0"){
				
				echo '<p> your image failed to upload</p><br>';

			}

			}
			if(isset($didit)){
				echo '<p>'.$didit.'</p>';
				/*print_r($_POST);*/
				unset($didit);
			}

			/*print_r($userInfo);*/


			
	
			
		
	}
?>

			</div>

<?php
	include_once("inc/rightContent.php");
	include("inc/footer.php");
?>