<?php
$NAME=filter_input(INPUT_POST,'username');
$PASSWORD = filter_input(INPUT_POST, 'password');
$email=filter_input(INPUT_POST,'emailaddress');
$ADDRESS=filter_input(INPUT_POST,'address');
$dob=filter_input(INPUT_POST,'bday');
$PHONE_NO=filter_input(INPUT_POST,'phoneno');
$GENDER=filter_input(INPUT_POST,'gender');
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "test";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO customers (email,PASSWORD,ADDRESS,dob,PHONE_NO,GENDER,NAME)
values ('$email','$PASSWORD','$ADDRESS','$dob','$PHONE_NO','$GENDER','$NAME')";
if ($conn->query($sql)){
echo "New record is inserted sucessfully";
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}

?>
