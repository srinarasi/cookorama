<?php
/*

*	File:			showIngredients.php
*	By:			Anagha Jois
*	Date:		17/5/2015
*
*	This script is for ingredients connecting to github
*
*
*=====================================
*/

{ 		//	Secure Connection Script
		include('../../htconfig/cookingDBConfig.php'); 
		$dbSuccess = false;
		$dbConnected = mysql_connect($db['hostname'],$db['username'],$db['password']);
		
		if ($dbConnected) {		
			$dbSelected = mysql_select_db($db['database'],$dbConnected);
			if ($dbSelected) {
				$dbSuccess = true;
			} 	
		}
		//	END	Secure Connection Script
}

if ($dbSuccess) {
	
	{	//  Get the details of all associated Person records
		//		and store in array:  personArray  with key >$indx
		 
			$indx = 0;
		
			$tIngredient_SQLselect = "SELECT * ";
			$tIngredient_SQLselect .= "FROM ";
			$tIngredient_SQLselect .= "tIngredient ";

			
			$tIngredient_SQLselect_Query = mysql_query($tIngredient_SQLselect);	
			
			while ($row = mysql_fetch_array($tIngredient_SQLselect_Query, MYSQL_ASSOC)) {
				
				$ingredientArray[$indx]['ID'] = $row['ID'];
				$ingredientArray[$indx]['Name'] = $row['Name'];
				$indx++;			 
			}

			$numIngredients = sizeof($ingredientArray);
					
			mysql_free_result($tIngredient_SQLselect_Query);			
	}
		
	for($indx =0;$indx < $numIngredients; $indx++){
		echo $ingredientArray[$indx]['ID'] ." " . $ingredientArray[$indx]['Name'] . "<br/>";
	}
}
else {
		echo "Could not connect to the database <br/>";
}
	
echo "<footer><a href = 'index.php'> Back </a></footer> ";	
?>