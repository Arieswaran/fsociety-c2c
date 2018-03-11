<?php
$name=$_POST['name'];
$city=$_POST['city'];
$landmark=$_POST['landmark'];
$level=$_POST['level'];


if(isset($_POST['garbage']))
$garbage=1;
else
$garbage=0;

if(isset($_POST['drainage_water']))
$drainage_water=1;
else
$drainage_water=0;

if(isset($_POST['others']))
$others=1;
else
$others=0;


if($_FILES['fileupload']['error']==0)
{
	//echo "File uploaded".'<br>';
	$file_name=$_FILES['fileupload']['name'];
	$file_tmp=$_FILES['fileupload']['tmp_name'];
	move_uploaded_file($file_tmp,'images/'.$file_name);
	$photo='images/'.$file_name;
}
else
$photo='no';

//if(mysqli_query($conn,'CREATE table complaints(id int(6) auto_increment primary key,username varchar(30) not null,city varchar(20) not null,landmark varchar(50),level int(2),garbage bool,drainage_water bool,others bool,photo varchar(50))'))

//echo "Your report has been successfully stored";
$host='localhost';
$user='root';
$pwd='aj';
$db='c2c';
$table='complaints';
$conn=mysqli_connect($host,$user,$pwd);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_query($conn,'use c2c');
$res=file_get_contents("submit.html");
$query='insert into complaints(username,city,landmark,level,garbage,drainage_water,others,photo)'." values('$name','$city','$landmark','$level','$garbage','$drainage_water','$others','$photo')";
if(mysqli_query($conn,$query)) // give a reply
echo $res;
else
echo "Some error";
?>
