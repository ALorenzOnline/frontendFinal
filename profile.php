<?php
    include 'session.php';
    include 'testRabbitMQClient.php';
?>
<!DOCTYPE html>
<html>
<head>

<title>Your Home Page</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
    <body>
        <div id="profile">
            <b id="welcome">Welcome!<i></i></b>
            <b id="logout"><a href="logout.php">Log Out</a></b>
             
            <div style="overflow:auto; height:400px ">
             
            <?php
            // Create connection
                $conn = new mysqli("localhost", "root", "password", "profile");
                // Check connection
                if ($conn->connect_error) 
		{
                    die("Connection failed: hello" . $conn->connect_error);
                } 
 		
                $sql = "SELECT * FROM tbluser where email = '" . $_SESSION['login_user'] . "'";
                $result = $conn->query($sql);
		$name=$_SESSION['login_user'] ;
		
		$checkKey = "SELECT name FROM sessionCheck where name = '$name'";
		$checkStamp = "SELECT stamp FROM sessionCheck where name = '$name'";
 		$result2 = mysqli_query($conn,$checkKey);
		$key= mysqli_fetch_assoc($result2);
		$result2 = mysqli_query($conn,$checkStamp);
		$date=mysqli_fetch_assoc($result2);
		echo $date['stamp'];
		$currentDate=date(i);
		echo  $key['name'];
                if($_SESSION['login_user']==$key['name'] && $date['stamp']+10<=date(i) || $date['stamp']-10>=date(i))
		{
			if ($result->num_rows > 0) 
                	{
                	    // output data of each row
                	    $row = $result->fetch_assoc() ;
                	    $sid= $row["steamid"];	
				echo "<b>First Name: </b>" . $row["firstname"];
				echo "<br> <b>Steam ID: </b>" . $row["steamid"];
                	        echo "<br> <b>Email: </b>" . $row["email"];
				echo "<br> <br> <b>Here is your friends list</b> <br>";
				//echo $sid;
				echo "<br>";
				send("showFriends",$sid);
                	         
                	        echo '<b id="logout"><a href="edit.php?id='. $row["idUser"] .'">Edit Profile</a></b>';
                	} 
                	else
                	{
                    	echo "0 results";
                	}
                	$conn->close();
		}                
		?>
		
            </div>
             
             
        </div>
    </body>
</html>
