<?PHP
function SendEmail($Recipient)
	{
		global $varForename, $varSurname;
		$mailHeaders  = 'MIME-Version: 1.0' . "\r\n";
		$mailHeaders .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		  
		$mailTo = $Recipient;
		$mailSubject = 'Mescore\'s Guestbook';
		$mailBody =  'Hello ' . $varForename . ' ' . $varSurname . ', <br><br> You have just signed the guestbook, <br><br> Thank You, Come Again.';
		  
		if(mail( $mailTo, $mailSubject, $mailBody, $mailHeaders,  '-fDoNotReply@test.com'))
			{
				if($Recipient != 'test@test.com')
					{
						echo ("Mail Sent!");
					}
			}
		else
			{
				echo ("Not Sent");
			}
	}

mysql_connect("sqlserver", "user", "password");
mysql_select_db("test") or die( "Unable to select database: " .  mysql_error());

if(isset($_POST['Submit1']))
	{
		$varForename = $_POST['Forename'];
		$varSurname = $_POST['Surname'];
		$varEmail = $_POST['Email'];

		mysql_query("INSERT INTO new_table(SignDate, Forename, Surname, Email) values(now(), '$varForename', '$varSurname', '$varEmail');");
	
		//SendEmail($varEmail);
		
	}
?>

<html>
<head>
<meta content="text/html; charset=us-ascii" http-equiv="content-type">
<title>Mescore GuestBook</title>
<style type="text/css">
.auto-style1 {
	border: 5px solid #333300;
	background-color: #FFFF99;
	margin: 4px;
}
</style>

</head>
<body style="background-color: #99CCFF">

<div style="text-align: left; font-family: Calibri;">

<H1>Welcome to Mescore's Guestbook</H1>
 
<form name="myform" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<table border="0" style="width: 250px">
	<tr>
		<td style="text-align: right;">
			<label>Firstname :&nbsp;</label>
		</td>
		<td>
			<input name="Forename" maxlength="50" size="13" >
		</td>
	</tr>
	<tr>
		<td style="text-align: right;">
			<label>Surname :&nbsp;</label>
		</td>
		<td>
			<input name="Surname" maxlength="50" size="13" >
		</td>
	</tr>
	<tr>
		<td style="text-align: right;">
			<label>Email :&nbsp;</label>
		</td>
		<td>
			<input name="Email" maxlength="50" size="13">
		</td>
	</tr>
	<tr>
		<td colspan="2" style="text-align: center;">
			<input name="Submit1" type="submit" value="Submit">
		</td>
	</tr>
</table>
 		 
</form>

<?php

$result = mysql_query("SELECT SignDate, Forename, Surname FROM new_table ORDER BY SignDate desc");

while ($row = mysql_fetch_array($result))
	{
		echo '<table style="width: 400px" cellpadding="2" cellspacing="2" class="auto-style1" > <tr> <td>';
		echo($row['SignDate'] . " - " . $row['Forename'] . " " . $row['Surname'] . "<br>");  
		echo "</td></tr> </table> ";
	}

mysql_close();

?>

</div>
</body>
</html>




