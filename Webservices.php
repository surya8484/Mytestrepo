<?php
//This page contains the information on submitting data to Iformbuilder using cURL php. 
//File Name : post_data.php
//Author : Surya

//Gathering information from HTML page.
include_once('/forma.html');
$PAGE = 'registration';
$FIRSTNAME = addslashes($_POST['fname']);
$LASTNAME = addslashes($_POST['lname']);
$EMAIL = addslashes($_POST['email']);
$PHONE = addslashes($_POST['cphone']);
$DOB = addslashes($_POST['dob']);
$ZIPCODE = addslashes($_POST['zcode']);
$SSN = addslashes($_POST['ssn']);
$GENDER = addslashes($_POST['gender']);
$EDUCATION = addslashes($_POST['education']);
$EDUCATION_OTH = addslashes($_POST['otherEducation']);

$data = array(
   "FIELDS" => array(
	  [
         "ELEMENT_ID" => 281552640,
         "VALUE" => $FIRSTNAME
      ],
	  [
         "ELEMENT_ID" => 281552643,
         "VALUE" => $LASTNAME
      ],
	  [
         "ELEMENT_ID" => 281552646,
         "VALUE" => $EMAIL
      ],
	  [
         "ELEMENT_ID" => 281552649,
         "VALUE" => $PHONE
      ],
	  [
         "ELEMENT_ID" => 281552652,
         "VALUE" => $DOB
      ],
	  [
         "ELEMENT_ID" => 281552655,
         "VALUE" => $ZIPCODE
      ],
	  [
         "ELEMENT_ID" => 281552658,
         "VALUE" => $SSN
      ],
	  [
         "ELEMENT_ID" => 281552661,
         "VALUE" => $EDUCATION
      ],
	  [
         "ELEMENT_ID" => 281552667,
         "VALUE" => $GENDER
      ]
   )
);
 
 // Connecting to URL using Profile ID and Database ID.
$url = 'https://app.iformbuilder.com/exzact/api/profiles/469719/pages/3632511/records';
$authorization = "Authorization: Bearer c2ab983c6076fa8700a728baa16c0b745bf103b9";
$content = json_encode($data); 

//Create cURL resource
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt($curl, CURLOPT_HTTPHEADER,
        array("Content-type: application/json", $authorization,"X-IFORM-API-REQUEST-ENCODING: JSON"));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
// Execute HTTP request
$json_response = curl_exec($curl);

$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

//print_r(json_decode($json_response, true));
	


if (!$json_response)
{  
echo "<p><b>Provided details already exist in the database. Please try with other Email address.</b></p>";

}
else{

   echo '<div class="box">';
   echo '<ul id="Menu">';
   echo "<p><p><b>Your data saved successfully.</b>";
   echo "<p><b>Please wait for the administrator approval. It takes 24 hours to activate. <p>Thank you!</b>";
   echo '</div></ul>';
   //echo "Data inserted successfully";
}

?>