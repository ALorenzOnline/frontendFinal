<?php
function getGames($sid1)
	{
		/* 
		@@Gets a list of the games a player owns
		@@then organizes them into an array
		@@lowest to Highest		
		*/
		$apikey1="238E8D6B70BF7499EE36312EF39F91AA";
		$pushFriends= "http://api.steampowered.com/IPlayerService/GetOwnedGames/v0001/?key=238E8D6B70BF7499EE36312EF39F91AA&steamid=$sid1&format=json";
		//echo "addFriends initialized";
		//echo $apikey1;
		$jsonList=file_get_contents($pushFriends);
		$json_decode=json_decode($jsonList);
		//var_dump($json_decode);
		/*
		#When not requesting for a different file format
		#steam will output its data in a JSON.here I am 
		#taking the decoded JSON file and reading through 
		#for particular information;		
		*/
		
		$appidArray1=array();
		$appidArray2=array();
		//echo $json_decode->response->games[0]->appid;
		//echo $json_decode->response->games[0]->playtime_forever;
		$hold;		
		foreach($json_decode->response->games as $gameid)
		{
			
			array_push($appidArray1,$gameid->appid);
			 
			//retrieveUserInfo($friendID);
		}
		
		sort($appidArray1);
		//var_dump($appidArray1);
		return $appidArray1;
	}//end addFriendsToUsers


function compareGames($sid1,$sid2)
{
	$array1=getGames($sid1);
	//var_dump($array1);
	echo "<br>";
	echo "<br>";
	$array2=getGames($sid2);
	//var_dump($array2);
	$difference=array_intersect($array1,$array2);
	echo "<br>";
	echo "<br>";
	//var_dump($difference);
	return count($difference);
	
}
?>
