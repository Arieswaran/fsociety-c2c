<?php
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
$query='select count(*) as c,avg(level),landmark,max(garbage),max(drainage_water),max(others) from complaints group by landmark order by c desc;'; // create a query to take a list
$result=mysqli_query($conn,$query);
echo "<body style='height:150%;width:100%;color:gold;background-image:url(bg7.jpg);overflow:auto'>";
echo "<div style='position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);'><center>";
echo "<table border=1><tr><th>Number of complaints</th><th>Level of garbage</th><th>landmark</th><th>Issues</th><th>Images</th></tr>";
while($row=mysqli_fetch_array($result,MYSQLI_NUM))
{
	$issues='(';
	if($row[3]==1)
	$issues.='Garbages ';
	if($row[4]==1)
	$issues.='Drainage ';
	if($row[5]==1)
	$issues.='others	';
	$issues.=')';
	echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$issues</td><td><a>view</a></td></tr>";
}
echo "</table></center></div></body>";
?>
