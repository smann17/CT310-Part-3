<?php
$refData = "";
$ref = "";
/*print_r($_SESSION);*/
if(isset($_SERVER['HTTP_REFERER'])){
$ref = $_SERVER['HTTP_REFERER'];
}
include_once('inc/header.php');
include_once('database.php');
include_once('userInfo.php');
$userName = $_SESSION['userName'];
/*if(isset($_SESSION["img"])){
unset($_SESSION["img"]);}*/


       $db = new MyDB();
        $databaseContents = $db->readUsersInfo();
        $count=0;
        foreach ($databaseContents as $db){
            if(isset($_SESSION["userName"]))
                if ($db->name == $_SESSION["userName"]){
                     
                    $userInfo = $databaseContents[$count];
                     break;
            }else{
                echo "you must login to see this information";
             }
        $count = $count + 1;
         }
         


$target_dir = "uploads/";

$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);

$weGood = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($_FILES["fileToUpload"]["size"] > 1000000) {
    echo "Sorry, your file is too large.";
    $weGood = 0;
}
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $weGood = 1;
    } else {
        echo "File is not an image.";
        $weGood = 0;
    }
}
$db2 = new MyDB();
if ($weGood == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
        echo "The file ". basename( $_FILES['fileToUpload']['name']). " has been uploaded.";
        $db2->changeImg($userName, basename( $_FILES['fileToUpload']['name']));
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
/*$_SESSION["img"] = $weGood;
unset($weGood);*/

header('Location: '.$ref.'');

?>
