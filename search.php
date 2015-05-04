<?php
	$title = "Search Users";
	$userName = isset($_GET['user']) ? $_GET['user'] : "";

	include("inc/header.php");
	include("lib/files.php");
		include_once("userInfo.php");
	include_once("database.php");
	header('Conent-Type: image/jpeg');
?>
<div class= "white"></div>
 			<div class="leftContent">
				<h2>Userlist</h2>				
				<hr>

				<div id="search-list">
					<?php


			$db = new MyDB();
			$databaseContents = $db->readUsersInfo();
			echo '<div class="user-list">';
			$count = 1;
			
			foreach ($databaseContents as $db){
				
					echo "<div class=\"profile-thumb\">
						<a href=\"profile.php?user= $db->firstName \">";
						if(isset($db->picName))
							echo"<img src= \"uploads/$db->picName\" alt=\" $db->picName \"/>";
						else{
							echo"<img src= \"uploads/shadow.jpg\" alt=\" $db->picName \"/>";
						}
								echo "<span>$db->firstName </span>
						</a>
					</div>";
				$count=$count+1;
			}
			echo '</div>';
				
					?>
				</div>

				<!-- <div id="search-list">
					<div class="profile-thumb">
						<a href="user.php?user=leonardovolpatto">
							<img src="assets/img/profile5.jpg" alt="Profile 5's photo" />
							<span>Stephen Hizzle</span>
						</a>
					</div>	

					<div class="profile-thumb">

						<a href="user.php?user=leonardovolpatto">
							<img src="assets/img/profile4.jpg" alt="Profile 4's photo" />
							<span>B. Gizzle</span>
						</a>
					</div>
					
					<div class="profile-thumb">
						<a href="user.php">
							<img src="assets/img/profile3.jpg" alt="Profile 3's photo" />
							<span>Chuck Nizzle</span>
						</a>
					</div>	
					
					<div class="profile-thumb">
						<a href="user.php">
							<img src="assets/img/profile2.jpg" alt="Profile 2's photo" />
							<span>Stock Phizzle</span>
						</a>
					</div>	

					<div class="profile-thumb">
						<a href="user.php">
							<img src="assets/img/profile1.jpg" alt="Profile 1's photo" />
							<span>Name</span>
						</a>
					</div>	
				</div> -->

			</div>
			
			<div class="rightContent">
				<?php 
				if(isset($_SESSION["userName"])){
				echo '<h2>title of stuff</h2><br>
			<p> this is content you can see if you are logged in</p>';
		}
		?>
			</div>

<?php
	include("inc/footer.php");
?>