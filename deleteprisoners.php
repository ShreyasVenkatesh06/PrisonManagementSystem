<html>
<head>
  <title>Delete prisoners</title>
  <link rel="stylesheet" media="screen" href="login.css" >
</head>
<body>
	<table align='center' border='0' bgcolor='black' width='100%' height='100%' cellpadding='8' cellspacing='0' height='200'>
        
          <tr>
            <td colspan="3" bgcolor='white' valign='top'>

<?php
ob_start();
$conn=mysqli_connect("localhost", "root","") or die(mysqli_error());
mysqli_select_db($conn,"prison");
$result=mysqli_query($conn,"select * from registration");
?>


<?php

//To delete:
if(isset($_POST["delete"])){
$id=$_POST["id"];
$delete=mysqli_query($conn,"delete from registration where id='$_POST[id]'");
if($delete){
print "<script language=\"javascript\">
	alert(\"Successfully deleted!...\")
	location.href=\"deleteprisoners.php\"
	</script>";
}
else{
print "<script language=\"javascript\">
	alert(\"Not deleted!...\")
	location.href=\"deleteprisoners.php\"
	</script>";
}
}
?>



<?php

print "<table width='100%' border='0' cellpadding='3' cellspacing='2' bgcolor='black'>
<caption><b><h3>DELETE PRISONER RECORD</h3></b></caption>
<tr bgcolor='white'>
<th width='3%'>Sl.No</th>
<th width='5%'>National id</th>
<th width='10%'>Full Name</th>
<th width='15%'>Date of Birth</th>
<th width='15%'>Address</th>
<th width='10%'>County</th>
<th width='10%'>Gender</th>
<th width='3%'>Education</th>
<th width='10%'>Status</th>
<th width='15%'>Offence</th>
<th width='10%'>Date in</th>
<th width='10%'>File Number</th>
<th width='2%'>Delete </th>


</tr>";
$i=1;
while($row=mysqli_fetch_array($result)){
print "<form method=POST>";
print"<tr bgcolor='white'>
<td>$i<input type=\"hidden\" name=\"id\" value=\"$row[id]\"></td>
<td>$row[id]</td>
<td>$row[Full_Name]</td>
<td>$row[DOB]</td>
<td>$row[Address]</td>
<td>$row[County]</td>
<td>$row[Gender]</td>
<td>$row[Education]</td>
<td>$row[Marital]</td>
<td>$row[Offence]</td>
<td>$row[Date_in]</td>
<td>$row[File_num]</td>


<td align='center'><input type=submit name=delete value=delete></td>
</tr>";
print "</form>";
$i++;
}
print"</table>";
?>

<br/>

			</td>
          </tr>
          <tr>
		  <td align="center" height='4%'>
			<a href="viewprisoners.php" target="_parent">Back<b></b></a>
			
		
          </tr>
           <tr>
            <td colspan='3' align='center' bgcolor='white' height='1'>
					&copy; <strong>
                YS2</strong></td>
          </tr>
	</table>
</body>
</head>
</html>

