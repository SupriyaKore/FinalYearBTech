<?php
    require 'database.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $name = $_POST['name'];
		$id = $_POST['id'];
		$carnumber = $_POST['carnumber'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $dateandtime = $_POST['dateandtime'];
         
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE table_nodemcu_rfidrc522_mysql  set name = ?, carnumber =?, email =?, mobile =?,dateandtime =? WHERE id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($name,$carnumber,$email,$mobile,$dateandtime,$id));
		Database::disconnect();
		header("Location: user data.php");
    }
?>