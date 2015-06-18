<html>

    <?php


    // Database for Trane Project
    $username = "jfbess2";
    $password = "u0515239"; 

    // Connecting to the SQL server at cs.uky.edu.
    $link = mysqli_connect( 'mastelottoplan.backups.uky.edu', $username, $password, $username);
    if ($link->connect_error) {
        echo "It could not connect";
        die('Connect Error (' . $link->connect_errno . ') '
                . $link->connect_error);
    }

    ///////////////////////////
    //Drop all tables
    ///////////////////////////
    $sql = "DROP TABLE IF EXISTS User";
    mysqli_query($link, $sql); 
    $sql = "DROP TABLE IF EXISTS Project";
    mysqli_query($link, $sql); 


    ///////////////////////////
    // next, create the tables
    ///////////////////////////
 
    //This is a mock table for the database. It simply contains a Name of the user and an ID which is created for him.
    //The real database would include everything from priorities, which will be added when the website is created.
    //Create user table.
    $sql = "CREATE TABLE User (
    uID INT NOT NULL, 
    uName VARCHAR(30),
    PRIMARY KEY(uID)
    )";
    $result = mysqli_query($link, $sql);
    if (!$result) {
       echo "It could not create the User table";
       die("Failed to create employee table: " . msql_error());
    }


    //Creates the Project based on the labels on the card (if the card changes these need to change with.
    //The dates need to be in the format MMDDYYYY.
    //Create project table.
    $sql = "CREATE TABLE Project (
    uProjectName VARCHAR(50),
    uProjectLeader VARCHAR (50),
    uDesignProto INT,
    uTechnicalData INT,
    uDesignWork INT,
    uECNs INT,
    uMDP INT,
    uSchematic INT,
    uFormulationRules INT,
    uControlsGen INT,
    uPaperProto INT,
    uMFGProto INT,
    uG4meeting INT,
    uSystemEffect INT,
    uTOPSS INT,
    uNOGO INT,
    uFieldRelease INT,
    uOrderToFloor INT,

    PRIMARY KEY(uProjectName)
    )";
   
    $result = mysqli_query($link, $sql);
    if (!$result) {
       echo "It could not create the User table";
       die("Failed to create employee table: " . msql_error());
    }

    //test($link);
    include 'test.php';
    
    ?>

</html>
