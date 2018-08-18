<?php
//NOTE ICOULD STILL DEVELOP THIS APP USING FRAME WORKS LIKE LARAVEL
//connecting to mysql database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "easymouau";
$date = date('m-d-Y');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//craeting my table if it doesnt exist

$querycheck="SELECT id FROM applicatnts";

$query_result=$conn->query($querycheck);

if ($query_result !== FALSE)
{
 // table exists
	echo "exists";
} else
{
            // sql to create table
// sql to create table
$sql = "CREATE TABLE applicants (
id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
f_name VARCHAR(60) NOT NULL,
s_name VARCHAR(60) NOT NULL,
phone VARCHAR(60) NOT NULL, 
email VARCHAR(60) NOT NULL,
c_letter VARCHAR(255) NOT NULL, 
p_url VARCHAR(255) NOT NULL,
r_url VARCHAR(255) NOT NULL,
reg_dateauto TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    //I could echo success message her
//I am inserting a  dummy detail in the data base just to make sure its not empty...just a style nothing serious
    $sql = "INSERT INTO applicants (f_name, s_name, phone, email, c_letter, p_url, r_url)
VALUES ('dummy', 'dummy', 'dummy', 'dummy', 'dummy','dummy', 'dummy')";

if ($conn->query($sql) === TRUE) {

}

} else {
   //I could print failure message here
}
}







if(isset($_POST['submit'])){
$sname=$_POST['s_name'];
$fname=$_POST['f_name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$cletter=$_POST['c_letter'];
$purl=$_POST['p_url'];
$rurl=$_POST['r_url'];


    $sql = "SELECT * FROM applicants Order by id DESC";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    
    $check = $row['id'];

    if( $check >=5){
echo'<script> alert("Application Closed!")</script>';
break;
exit();
    }else{
$sql = "INSERT INTO applicants (f_name, s_name, phone, email, c_letter, p_url, r_url)
VALUES ('$fname', '$sname', '$phone', '$email', '$cletter','testurl', 'testurl')";

if ($conn->query($sql) === TRUE) {

echo'<script> alert("Registeration Successful!")</script>';

}else{

echo'<script> alert("oops something went wrong!")</script>';

}
break;
    }
    
}

 


}
?>

<!-- 
creatin a simple form please not...I wount work on the UI since this is a test and based on backend PHP...Thank u!-->

<html>


<form action="" method="post">
<input name="f_name" placeholder="First name" type="text"><br>
<input name="s_name" placeholder="Surname" type="text"><br>
<input name="phone" placeholder="Phone" type="text"><br>
<input name="email" placeholder="Email" type="email"><br>
<textarea name="c_letter" cols="40" rows="5">Cover letter...</textarea><br>
<label>Passport</label><br>
<input name="p_url" type="file"><br>
<label>Resume</label><br>
<input name="r_url" type="file"><br><br>
<input name="submit" type="submit" value="submit">

</form>

