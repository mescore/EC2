<?PHP
 echo ("Top of page.<br><br>");
 
 
 // To send HTML mail, the Content-type header must be set
$mailHeaders  = 'MIME-Version: 1.0' . "\r\n";
$mailHeaders .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  
 $mailTo = 'test@test.com';
 $mailSubject = 'Mescore\'s Guestbook';
 $mailBody =  'Hello Name, <br><br> You have just signed the guestbook, <br><br> Thank You, Come Again.';
  
if(mail( $mailTo, $mailSubject, $mailBody, $mailHeaders,  '-fDoNotReply@test.com'))
	{
	echo ("Mail Sent!");
	}
else
	{
	echo ("Not Sent");
	}
 

?>
