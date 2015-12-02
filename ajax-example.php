<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "natsul123";
$dbname = "frestan";
	
//Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpass);
	
//Select Database
mysql_select_db($dbname) or die(mysql_error());
	
// Retrieve data from Query String
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$company = $_POST['company'];
$subject = $_POST['subject'];
$message = $_POST['message'];	



// Escape User Input to help prevent SQL Injection
$name = mysql_real_escape_string($name);
$email = mysql_real_escape_string($email);
$phone = mysql_real_escape_string($phone);
$company = mysql_real_escape_string($company);
$subject = mysql_real_escape_string($subject);
$message = mysql_real_escape_string($message);
/*$age = mysql_real_escape_string($age);
$sex = mysql_real_escape_string($sex);
$wpm = mysql_real_escape_string($wpm);
	*/



//build query
	$name = addslashes($name);
	$email = addslashes($email);
	$phone = addslashes($phone);
	$company = addslashes($company);
	$subject = addslashes($subject);
	$message = addslashes($message);

		$sql = "INSERT INTO ATO(name, email, phone, company, subject, message)
						VALUES ('$name', '$email', '$phone', '$company', '$subject', '$message')";
	
		$result = mysql_query($sql) or die(mysql_error());
	;	
			
		/*if($result){
			
			include("index.html");	
		}
		else{
			echo"sorry cannot be done";
			die(mysql_error());
	
		}
	
//$query = "SELECT * FROM ajax_example WHERE sex = '$sex'";
*/
$query = "SELECT * FROM ato_message";

include("index.html");	
//use of the condition in query
/*if(is_numeric($age))
   $query .= " AND age <= $age";

if(is_numeric($wpm))
   $query .= " AND wpm <= $wpm";
	
//Execute query
$qry_result = mysql_query($query) or die(mysql_error());

//Build Result String
$display_string = "<table>";
$display_string .= "<tr>";
$display_string .= "<th>Name</th>";
$display_string .= "<th>email</th>";
$display_string .= "<th>phone no.</th>";
$display_string .= "<th>company name</th>";
$display_string .= "<th>subject</th>";
$display_string .= "<th>Message</th>";
$display_string .= "</tr>";

// Insert a new row in the table for each person returned
while($row = mysql_fetch_array($qry_result)){
   $display_string .= "<tr>";
   $display_string .= "<td>$row[name]</td>";
   $display_string .= "<td>$row[email]</td>";
   $display_string .= "<td>$row[phone]</td>";
    $display_string .= "<td>$row[company]</td>";
   $display_string .= "<td>$row[subject]</td>";
   $display_string .= "<td>$row[message]</td>";
   $display_string .= "</tr>";
}

echo "Query: " . $query . "<br />";
$display_string .= "</table>";

echo $display_string;
?>
