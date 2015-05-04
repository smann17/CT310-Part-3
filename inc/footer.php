		</main>     
		<footer>
			<p>2015 © Copyright Group KEWL</p>
			<!-- <a button href = "logout.php"/> -->
			<form action = "./logout.php">

		<input type="submit" value = "Log Out" name="logout">
		</form><br>
		<?php
				if (!(isset($_SESSION["userName"]))){
		echo"<form action = \"./login.php\">

		<input type=\"submit\" value = \"Login\" name=\"logout\">
		</form>";
		}
		?>	
		<p align="center">User <?php echo $_SESSION['firstName'] ?> 
     		logged in for
     		<?php echo time() - $_SESSION['startTime']?> seconds. </p>
			
		</footer>
		<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://www.cs.colostate.edu/~ct310/yr2015sp/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>