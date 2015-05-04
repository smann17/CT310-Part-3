<?php
	$title = "Login Part 2";
	
	include("inc/header.php");
	include("lib/files.php");
	include 'database.php';
	require_once("user.php");
	if (! isset ( $_SESSION ['authenticate'])) {
		header("Location: login.php");
	}
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

		$login2User = $_SESSION['userName'];
		$dbh2 = new MyDB();
		$question = $dbh2->readQuestion($login2User);
		$usersAnswers = $dbh2->readUsersAnswer();

		if (isset ($_POST ['fav_color'])) {
			$color = trim(strip_tags($_POST ['fav_color'],''));
			//echo "password is " . md5($color) . "\n";
			$name = $_SESSION ['userName'];
			//echo "The txt password is ". userHashByName($users, $name) . "\n" ;
			if (trim(userHashByName($usersAnswers, $name)) == md5($color)) {
				$_SESSION ['startTime'] = time ();
				$_SESSION ['authenticate2'] = 1;
				$_SESSION ['error2']=NULL;
				//echo "This is cool";
				header("Location: myProfile.php");
			}
			else $_SESSION['error2']=true;
		}
?>
<div class="white"></div>
			<div class="leftContent">
				<p>Your Security question: <br><h3><?php print $question;?></p></p>
				<form action="login2.php" method="post">
					<input type="password" name="fav_color" />
					<input type="submit" />
				</form>
				<?php
					if (isset($_SESSION ['error2'])){
						print "<font color='red'>Invalid color</font>";
					}
				?>
			</div>

<?php
	include_once("inc/rightContent.php");
	include("inc/footer.php");
?>