<?php
/*

*	File:			showRecipes.php
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
		
			$tRecipe_SQLselect = "SELECT * ";
			$tRecipe_SQLselect .= "FROM ";
			$tRecipe_SQLselect .= "tRecipe ";

			
			$tRecipe_SQLselect_Query = mysql_query($tRecipe_SQLselect);	
			
			while ($row = mysql_fetch_array($tRecipe_SQLselect_Query, MYSQL_ASSOC)) {
				
				$recipeArray[$indx]['ID'] = $row['ID'];
				$recipeArray[$indx]['Name'] = $row['Name'];
				$indx++;			 
			}

			$numRecipe = sizeof($recipeArray);
					
			mysql_free_result($tRecipe_SQLselect_Query);			
	}
		
	for($indx =0;$indx < $numRecipe; $indx++){
		echo $recipeArray[$indx]['ID'] ." " . $recipeArray[$indx]['Name'] . "<br/>";
	}
}
else {
		echo "Could not connect to the database <br/>";
}
	
echo "<footer><a href = 'index.php'> Back </a></footer> ";	
?>