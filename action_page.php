<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track post values
        $name = $_POST['name'];
        $email = $_POST['email'];
		$gender = $_POST['gender'];
        $mobile = $_POST['mobile'];
        $psw = $_POST['psw'];
        $psw_repeat = $_POST['psw_repeat'];
        
		// insert data
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO table_registration (name,email,gender,mobile,psw,psw_repeat) values(?, ?, ?, ?, ?, ?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($name,$email,$gender,$mobile,$psw,$psw_repeat));
		Database::disconnect();
		header("Location: NodeMCU_RC522_Mysql/home.php");
    }
?>