<?php include_once('inc/header.php');
include_once('database.php');
include_once('userInfo.php');?>
			<div class="rightContent">
				<h2>Users</h2>
				
				
				<?php

			$db = new MyDB();
			$databaseContents = $db->readUsersInfo();
			echo '<div class="user-list">';
			$count = 1;

			foreach ($databaseContents as $db){
				
				if(strlen($db->picName)>1 ){
				$img = "uploads/".$db->picName;
				}else{
				$img ="uploads/shadow.jpg";
				}
				
					echo '<div class="profile-thumb">
						<a href="profile.php?user=' . $db->firstName . '">
							<img src="'.$img.'" alt="' . $db->picName . '"/>
								<span>' . $db->firstName . '</span>
						</a>
					</div>';
				$count=$count+1;
			}
			echo '</div>';
				
				
				
/*
				foreach($userlist as $user) {
					echo '<div class="profile-thumb">
									<a href="profile.php?user=' . $i . '">
										<img src="uploads/' . $userInfo->picName . '" alt="profile"/>
										<span>' . $user[1] . '</span>
									</a>
							</div>';
							
							//if ($i == 3) break; // Just 2 profiles per page
				}
*/
				

				?>			
			</div>