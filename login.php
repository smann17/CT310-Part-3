<?php
	$title = "Login";
	
	include("inc/header.php");
	include("lib/files.php");
	include 'database.php';
	require_once("user.php");
	$util = new util();
	//var_dump($util->isIpValid());
	function userHashByName($users, $n) {
			$res = '';
			foreach ($users as $u ) {
				if ($u->name == $n) {
					$res = $u->hash;
				}
			}
			return $res;
		}
		

		$dbh = new MyDB();
		$copyUsers = $dbh->readUsers();

		if (isset ($_POST ['your_name'])) {
			$new = strip_tags($_POST ['your_name'], '');
			$epw = strip_tags($_POST ['entered']);
			$old = $_SESSION ['userName'];
			if ($new != $old) {
				if (userHashByName($copyUsers, $new) == md5($epw)) {
					$_SESSION ['userName'] = $new;
					$_SESSION ['authenticate'] = 1;
					$_SESSION ['error']=NULL;
					foreach ($copyUsers as $c){
						if ($c->name == $new){
							$_SESSION['firstName']=$c->firstName;
						}
					}
					header("Location: login2.php");
				}
				else $_SESSION ['error'] = true;
			}
			else echo "You are already logged in!";
		} 
?>
<div class="white"></div>
			<div class="leftContent" style= "color :white;">
				<p style="font-size:20px;">Insert your username and password please:</p><br>
				<form action="login.php" method="post">
					Username:<br>
					<input type="text" name="your_name" /><br>
					Password:<br>
					<input type="password" name="entered" />
					<input type="submit" />
				</form>

				<?php
					if (isset($_SESSION ['error'])){
						print "<font color='red'>Invalid username or password</font>";
					}
				?>
			</div>

<?php
	include_once("inc/rightContent.php");
	include("inc/footer.php");
?>