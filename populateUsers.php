<?php
/*This will run with a cronjob, which will grab users friends lists and add them to
@@the users table;
*/
include "dbConnect.php";
include "functions.php";


while(true){
	$date= date('m-d-y');
	$db1=mysqli_connect("localhost","root","password","profile");
	$getLastDate=mysqli_query($db1,'select * from users; '));
	/*echo $getLastDate['lastUpdated'];
	if($getLastDate['lastUpdated']==$date){
		echo 'dates match';	
	}*/
	if($getLastDate!=null){
		if($getLastDate['lastUpdated'] != $date){
			echo 'dates dont match';
			$getLastIdEntry='select steamid from tbluser order by steamid desc limit 1;';
			$sendquery=mysqli_query($db1,$getLastIdEntry);
			$id=mysqli_fetch_assoc($sendquery);
			$steamid = $id["steamid"];
			$newDate = "UPDATE tbluser SET lastUpdated='$date' WHERE steamid='$steamid'";
			$sendquery=mysqli_query($db1,$newDate);

			addFriendsToUsers($steamid);
		}
	}
}
?>
