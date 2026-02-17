<?php 

	$conn = new mysqli("localhost", "root", "", "bank");

	function findUser($email){
		
		global $conn;
		
		$lekerdezes = "SELECT * FROM users WHERE email='$email'";
		$talalt = $conn->query($lekerdezes);
		
		// Vizsgálat hogy van-e talált fiók
		// Ha nincs -> 0 a visszaadott érték
		// Ha van -> a listává felbontott felhasználót adjuk visssza
		if(mysqli_num_rows($talalt) == 0){
			return 0;
		}
		else{
			$fiok = $talalt->fetch_assoc();
			return $fiok;
		}
		
	}
	
	function Message($text){
		echo "<script>alert('$text')</script>";
	}

?>