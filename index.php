<?php
	$title = "Home";
	include("inc/header.php");
	include("lib/files.php");
		include("userInfo.php");
	include("database.php");
	
	$userName = isset($_GET['user']) ? $_GET['user'] : "";
	
	$util = new util();
	//var_dump($util->isIpValid());
?>
<div class= "white"></div>
			<div class="leftContent">
				<h2> This is a roster of all the websites </h2>
				<p id="demo">This is the only thing here right now</p>
					<script>
					var vurl = 'roster.php';
					var http = false;
					http = new XMLHttpRequest();
					http.open("POST", vurl, true);
					http.onreadystatechange=function()
  					{
 						if (http.readyState==4)//&& xmlhttp.status==200)
  							{
  								roster = JSON.parse(http.responseText);
  								var string = roster[0].name;
  								var result = string.link(roster[0].url);
  								document.getElementById("demo").innerHTML = "This name of the site is " + 
  					 				roster[0].name + " and the url is " + result;
  					 			/*$(".roster").text("This name of the site is " + 
  					 				roster[0].name + " and the url is " + result);*/

   							}
  						}
					
					http.send(null);

					</script>
				<hr/>
				<h2>Welcome to Group 4 Social Network</h2>
				<p>This social network... Suspendisse sodales accumsan erat a luctus. 
					Nulla interdum elit vitae ultricies commodo. Suspendisse dignissim dolor 
					vel accumsan hendrerit. Cras pharetra suscipit odio, quis pharetra nunc 
					dignissim ultrices. Integer consectetur gravida fermentum. Ut tempus sem
					 vel libero mollis, tincidunt vulputate leo fringilla. Proin ut orci 
					 vulputate, condimentum orci eu, convallis dolor. Quisque mattis, 
					 diam vitae elementum rutrum, turpis orci rutrum orci, vel maximus 
					 felis sapien sit amet nisl. Aliquam lacinia nisl eu pulvinar accumsan. 
					 Proin quis nisl sed nisi placerat molestie. In sagittis rhoncus mauris 
					 et hendrerit. Nunc vitae augue nec ante fermentum rutrum. In hac habitasse 
					 platea dictumst. Ut sit amet quam nulla.</p>
				
				<hr/>
				
				<h2>Feed</h2>
				<p>X is now friend of Y... Suspendisse sodales accumsan erat a luctus. 
					Nulla interdum elit vitae ultricies commodo. Suspendisse dignissim
					 dolor vel accumsan hendrerit. Cras pharetra suscipit odio, 
					 quis pharetra nunc dignissim ultrices. Integer consectetur 
					 gravida fermentum. Ut tempus sem vel libero mollis, tincidunt 
					 vulputate leo fringilla. Proin ut orci vulputate, condimentum orci 
					 eu, convallis dolor. Quisque mattis, diam vitae elementum rutrum, 
					 turpis orci rutrum orci, vel maximus felis sapien sit amet nisl. 
					 Aliquam lacinia nisl eu pulvinar accumsan. Proin quis nisl sed nisi 
					 placerat molestie. In sagittis rhoncus mauris et hendrerit. 
					 Nunc vitae augue nec ante fermentum rutrum. In hac habitasse 
					 platea dictumst. Ut sit amet quam nulla.</p>
				
				<hr/>
				<?php 
					if (isset($_SESSION['userName'])){
						echo '<h2> Member news</h2>
						<p>heres some random stuff that you really dont need to know about but it is here because you pretty kewl</p><br>';
					}
					if ($_SESSION["firstName"]!="Guest"){
						$db = new MyDB();
						if(isset($_SESSION["userNumber"])){
						$admin = $db->isAdmin($_SESSION["userNumber"]);
						if ($admin==1){
							echo '<p>FOR ADMINS: <a href="admin.php">New User Registration</a>';
						}
					}
					}	

				?>

			</div>

<?php
	include_once("inc/rightContent.php");
	include("inc/footer.php");
?>