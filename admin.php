<?php
	$title = "Administrative page";
	
	include("inc/header.php");
	include("lib/files.php");
	include("database.php");
	if ($_SESSION['firstName']!='Admin'){
		header("Location: index.php");
	}
	$util = new util();
	//var_dump($util->isIpValid());
	$db = new MyDB();
	//$count = $db->numberOfUsers();

	if (isset ($_POST ["submit"])) {
		echo "Got here!";
		$db->makeUser($_POST['username'],$_POST['first_name'],$_POST['last_name'],
			$_POST['entered'],$_POST['formQuestion'], $_POST['your_answer'], $_POST['admin'],
			$_POST['gender'], $_POST['mobile'], $_POST['email']);
		} 

	
?>
<div class="white"></div>
			<div class="leftContent">
				<h2>This is the Administrative page</h2>
				<p>You best not be trying to hack into here</p>
				
				<hr/>
				
				<h2>Register</h2>
				<p>You have the exclusive right to register user you sly dog</p>
				<form action="admin.php" method="post">
					Username:
					<input type="text" name="username" /><br>
					First name:
					<input type="text" name="first_name" /><br>
					Last name:
					<input type="text" name="last_name" /><br>
					Password:
					<input type="password" name="entered" /><br>
					Security Question:
					<select name="formQuestion">
						<option value="">Select</option>
						<option value="1">Q1</option>
						<option value="2">Q2</option>
					</select><br>
					Security Question Answer:
					<input type="text" name="your_answer" /><br>
					
					Are They An Admin?:
					<select name="admin">
						<option value="">Select</option>
						<option value="0">NO</option>
						<option value="1">YES</option>
					</select><br>
					What is their gender?
					<select name="gender">
						<option value="">Select</option>
						<option value="M">Male</option>
						<option value="F">Female</option>
					</select><br>
					What is their cell phone number?
					<input type="text" name="mobile" /><br>
					What is their email?
					<input type="text" name="email" /><br>
					<input type="submit" name="submit"/>
				</form>
				

			</div>

<?php
	include_once("inc/rightContent.php");
	include("inc/footer.php");
?>