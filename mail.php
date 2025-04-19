<?php

error_reporting(E_ALL);

require_once('class.phpmailer.php');

include("class.smtp.php");

     /* for lead  Add Adarsh Yadav 13-10-2022-- closed 25-12-2023*/
/*
        include('leadsquared.php');

        define('LSQ_NAME', 'nexgen');

        define('LSQ_ACCESSKEY', 'u$r5bd4ba836950c37691fe55b3e673f493');

        define('LSQ_SECRETKEY', 'e9f02ad6e003c30b4307c7a2bf22003c46e659a0');

        $leadsquared = new Leadsquared_Api();
		*/

        // $Website= "https://www.aafmindia.co.in/cwm-course-in-india";

        $Source= "https://www.aafmindia.co.in/cwm-course-in-india";

        

             /* for lead */

$Source=getenv('HTTP_REFERER');



if(isset($_REQUEST['MasterInner_submit']))

{

	$utmSource = isset($_GET['utm_source']) ? $_GET['utm_source'] : '';
    $utmMedium = isset($_GET['utm_medium']) ? $_GET['utm_medium'] : '';
    $utmCampaign = isset($_GET['utm_campaign']) ? $_GET['utm_campaign'] : '';
    $utmTerm = isset($_GET['utm_term']) ? $_GET['utm_term'] : '';
    $utmContent = isset($_GET['utm_content']) ? $_GET['utm_content'] : '';

	$name 	= $_REQUEST["MasterInner_txtName"];

	$phone 	= $_REQUEST["MasterInner_txtMobile"];

	

	$message 	= $_REQUEST["MasterInner_message"];

	$email	= $_REQUEST["MasterInner_txtEmail"]; 

	$subject = $name." has Submitted request in cwm-course-in-india";

	$body="<html><head><title>Flabindia Form</title></head><body>

		<table width='450'border='1' rules='none' frame='box'>

		<tr bgcolor='#b0e1c6'><td align='center' colspan='2'>cwm-course-in-india</td></tr>

		<tr><td>Name</td><td>".$name."</td></tr>

		<tr><td>Email</td><td>".$email."</td></tr>

		<tr><td>Contact No</td><td>".$phone."</td></tr>

		<tr><td>message</td><td>".$message."</td></tr>

		

		<tr><td>From URL</td><td>".$Source."</td></tr>
		<tr><td>utmSource</td><td>".$utmSource ."</td></tr>
		<tr><td>utmMedium </td><td>".$utmMedium."</td></tr>
		<tr><td>utmCampaign</td><td>".$utmCampaign."</td></tr>
		<tr><td>utmConteny</td><td>".$utmContent."</td></tr>
		<tr><td>utmTerm</td><td>".$utmTerm."</td></tr>

		<tr bgcolor='#b0e1c6'><td colspan='2' align='center'>Thanks</td></tr>

		</table></body></html>";





	//$msg='<div class="alert_success" >Thanks for your queries, our team will get back to you.</div>';

	

	$mail = new PHPMailer;

	$mail->isSMTP();

	$mail->SMTPDebug = 0;



	$mail->Host = 'smtp.gmail.com';

	$mail->Port = 587;

	$mail->SMTPSecure = '';

	$mail->SMTPAuth = true;

	$mail->Username = "feedback@aafmindia.co.in";

	$mail->Password = "admin_123456";

	$mail->setFrom('feedback@aafmindia.co.in');

	

	$mail->addAddress('info@aafmindia.co.in', 'Deepak.'); 	

  $mail->addCC('dimple@aafmindia.co.in','Dimple');

   //$mail->addCC('sarvesh@aafm.co.in','Sarvesh');

   //$mail->AddCC('memberships@aafm.club');

    //$mail->addAddress('technicalsupport1@aafmindia.co.in');

      //$mail->addAddress('yadavadarshkumar@gmail.com');



	$mail->Subject = $name." has Submitted request in cwm-course-in-india";

	$mail->Body = $body;



	//$mail->Send();

	//if (!$mail->send()) {echo "Mailer Error: " . $mail->ErrorInfo;}

	//else {echo $msg;}

	if ($mail->send()) {//echo $msg; 

		
		header("location:Thank-You.html");

/*
	    $lead_data = '{

"FirstName":"'.$name.'",

"EmailAddress":"'.$email.'",

"Phone":"'.$phone.'",

"Website":"'.$Website.'",

"Source":"'.$Source.'"

}';

$res= $leadsquared->capture_lead($lead_data);

*/

$apiUrl = 'https://thirdpartyapi.extraaedge.com/api/SaveRequest';
$apiKey = 'AAFMINDIASALES-25-07-2023'; // Replace with your actual API key

// Prepare JSON data to send to the API

$postData = [
    'AuthToken'     => $apiKey,
    "Source"        => "aafmindiasales",
    'FirstName'     => $name,
    'Email'         => $email,
    'MobileNumber'  => $phone,
    "leadSource"    => "cwmindia.com",
    "leadCampaign"  => $utmCampaign,
    "leadChannel"   => $utmMedium,
    "field9"        => $utmTerm,
    "field10"       => $utmContent,
    "field15"       => $utmSource,
    "EducationalQualification" => $Source

];

// Initialize cURL session
$ch = curl_init($apiUrl);

// Set cURL options
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
'Content-Type: application/json',
'Content-Length: ' . strlen(json_encode($postData))
]);

// Execute cURL request and get response
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
echo 'cURL error: ' . curl_error($ch);
} else {
// Decode the JSON response
$responseData = json_decode($response, true);

}

// Close cURL session
curl_close($ch);




			//echo "Data successfully inserted into the database table ...";

	

		

	}

  else {

  echo "Mail Is Not Send";

  

  }

	

	

//}

//}



}



elseif(isset($_REQUEST['submitpop']))		

{

	$utmSource = isset($_GET['utm_source']) ? $_GET['utm_source'] : '';
    $utmMedium = isset($_GET['utm_medium']) ? $_GET['utm_medium'] : '';
    $utmCampaign = isset($_GET['utm_campaign']) ? $_GET['utm_campaign'] : '';
    $utmTerm = isset($_GET['utm_term']) ? $_GET['utm_term'] : '';
    $utmContent = isset($_GET['utm_content']) ? $_GET['utm_content'] : '';

	$name 	= $_REQUEST["f_name"];

	$phone 	= $_REQUEST["f_phone"];

	// $msg 	=$_REQUEST["f_msg"];

	// $message 	= $_REQUEST["message"];

	$email	= $_REQUEST["f_email"];

	$from_page=$from_page."brochure_download";





	$subject = $name." has Submitted request in financial-advisor-training-course Download Brochure";

	$body="<html><head><title>Flabindia Form</title></head><body>

		<table width='450'border='1' rules='none' frame='box'>

		<tr bgcolor='#b0e1c6'><td align='center' colspan='2'>financial-advisor-training-course Download Brochure</td></tr>

		<tr><td>Name</td><td>".$name."</td></tr>

		<tr><td>Email</td><td>".$email."</td></tr>

		<tr><td>Contact No</td><td>".$phone."</td></tr>

	

		

		<tr><td>From URL</td><td>".$Source."</td></tr>
		<tr><td>utmSource</td><td>".$utmSource ."</td></tr>
		<tr><td>utmMedium </td><td>".$utmMedium."</td></tr>
		<tr><td>utmCampaign</td><td>".$utmCampaign."</td></tr>
		<tr><td>utmConteny</td><td>".$utmContent."</td></tr>
		<tr><td>utmTerm</td><td>".$utmTerm."</td></tr>

		<tr bgcolor='#b0e1c6'><td colspan='2' align='center'>Thanks</td></tr>

		</table></body></html>";





	//$msg='<div class="alert_success" >Thanks for your queries, our team will get back to you.</div>';

	

	$mail = new PHPMailer;

	$mail->isSMTP();

	$mail->SMTPDebug = 0;



	$mail->Host = 'smtp.gmail.com';

	$mail->Port = 587;

	$mail->SMTPSecure = '';

	$mail->SMTPAuth = true;

	$mail->Username = "feedback@aafmindia.co.in";

	$mail->Password = "admin_123456";

	$mail->setFrom('feedback@aafmindia.co.in');

	

	$mail->addAddress('info@aafmindia.co.in', 'Deepak.'); 	

 $mail->addCC('dimple@aafmindia.co.in','Dimple');

  //$mail->addCC('sarvesh@aafm.co.in','Sarvesh');

   //$mail->AddCC('memberships@aafm.club');

    //$mail->addAddress('technicalsupport1@aafm.co.in');



	$mail->Subject = $name." has Submitted request in financial-advisor-training-course Page";

	$mail->Body = $body;



	//$mail->Send();

	//if (!$mail->send()) {echo "Mailer Error: " . $mail->ErrorInfo;}

	//else {echo $msg;}

	if ($mail->send()) {

		header("location:AAFM_CWM Brochure.pdf");

  /*

       $lead_data = '{

"FirstName":"'.$name.'",

"EmailAddress":"'.$email.'",

"Phone":"'.$phone.'",

"Website":"'.$Website.'",

"Source":"'.$Source.'",

"Notes":"'.$msg.'"

}';

$res= $leadsquared->capture_lead($lead_data);
*/

$apiUrl = 'https://thirdpartyapi.extraaedge.com/api/SaveRequest';
$apiKey = 'AAFMINDIASALES-25-07-2023'; // Replace with your actual API key

// Prepare JSON data to send to the API

$postData = [
    'AuthToken'     => $apiKey,
    "Source"        => "aafmindiasales",
    'FirstName'     => $name,
    'Email'         => $email,
    'MobileNumber'  => $phone,
    "leadSource"    => "cwmindia.com",
    "leadCampaign"  => $utmCampaign,
    "leadChannel"   => $utmMedium,
    "field9"        => $utmTerm,
    "field10"       => $utmContent,
    "field15"       => $utmSource,
    "EducationalQualification" => $Source

];


// Initialize cURL session
$ch = curl_init($apiUrl);

// Set cURL options
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
'Content-Type: application/json',
'Content-Length: ' . strlen(json_encode($postData))
]);

// Execute cURL request and get response
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
echo 'cURL error: ' . curl_error($ch);
} else {
// Decode the JSON response
$responseData = json_decode($response, true);

}

// Close cURL session
curl_close($ch);


		

	

		

	}

  else {

  echo "Mail Is Not Send";

  

  }

	}  

	

//}

//}



?>