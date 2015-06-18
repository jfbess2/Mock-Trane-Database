<?php

    $username = "jfbess2";
    $password = "u0515239"; 

    // Connecting to the SQL server at cs.uky.edu.
    $link = mysqli_connect( 'mastelottoplan.backups.uky.edu', $username, $password, $username);
    if ($link->connect_error) {
        echo "It could not connect";
        die('Connect Error (' . $link->connect_errno . ') '
                . $link->connect_error);
    }

#takes a user ID and the connection
#returns a boolean whether the given user ID is listed in the USER table
#TRUE: exists
    #FALSE: doesn't exist
    function checkEmpolyeeLogin($userID, $link)
    {
        $validId = false;
        $userID = mysql_real_escape_string($userID);
        echo "this is being called";
        
        $sql = "SELECT uID FROM User WHERE uID='$userID'";
        $result = mysqli_query($link, $sql);
        
        if(mysqli_num_rows($result))
		{$validID = true;}
        else{echo "Error in validating customer ID";}
        
        return $validID;
    }


#takes a full array of product information and a connection
#returns a boolean whether the given product information was valid
#TRUE: succesfully registered product
#FALSE: unsuccessful registration
function registerProject($projectINFO, $link){
    $validProduct = false;
    
    
    
    if(count($projectINFO)==17)
    {	

	  $uProjectName = $projectINFO[0];
	  $uDesignProto = $projectINFO[1];
  	  $uTechnicalData = $projectINFO[2];
   	  $uDesignWork = $projectINFO[3];
       	  $uECNs = $projectINFO[4];
    	  $uMDP = $projectINFO[5];
    	  $uSchematic = $projectINFO[6];
    	  $uFormulationRules = $projectINFO[7];
    	  $uControlsGen = $projectINFO[8];
    	  $uPaperProto = $projectINFO[9];
    	  $uMFGProto = $projectINFO[10];
    	  $uG4meeting = $projectINFO[11];
          $uSystemEffect = $projectINFO[12];
    	  $uTOPSS = $projectINFO[13];
    	  $uNOGO = $projectINFO[14];
    	  $uFieldRelease = $projectINFO[15];
    	  $uOrderToFloor = $projectINFO[16];


        $sql = "INSERT INTO Product ( uProjectName,  uDesignProto, uTechnicalData, uDesignWork, uECNs, uMDP, uSchematic, uFormulationRules, uControlsGen, uPaperProto, uMFGProto, uG4meeting, uSystemEffect, uTOPSS, uNOGO, uFieldRelease, uOrderToFloor) VALUES 
               ('$uProjectName', '$uDesignProto', $uTechnicalData, $uDesignWork, $uECNs, $uMDP, $uSchematic, $uFormulationRules, $uControlsGen, $uPaperProto, $uMFGProto, $uG4meeting, $uSystemEffect, $uTOPSS, $uNOGO, $uFieldRelease, $uOrderToFloor)";
        $result = mysqli_query($link, $sql);
        if (!$result) {
            echo "Incorrect product format. (name, type, or brand are too long or others contain non-numeric characters)";
        }
        else{
            $validUser = true;
        }
    }
    else{
        echo "Invalid product format. (not enough/too many fields)";
    }
    
    return $validProduct;
}


#takes the connection
#returns a random user ID between 1 and 999999
function newUserID()
{
    $notValid = True;
       $random = rand(0,999999);
    
    return $random;
}



?>
