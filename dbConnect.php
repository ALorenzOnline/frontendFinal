<?php

$profileConnect("localhost","root","password","profile");
if (!mysqli_ping($profileConnect)) 
			{
		    		echo 'Lost connection, exiting after query #1';
		    		exit;
			}



?>
