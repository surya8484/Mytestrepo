<!DOCTYPE worked on UNT website for creating a website used JAVASCRIPT, HTML, CSS">
<!--Author - Surya teja Jandhyam
File name - Sample.php
Template adapted from Free CSS Templates http://www.freecsstemplates.org under Creative Commons Attribution 2.5 License
-->
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Library Education in the U.S.-Affiliated Pacific</title>
<meta name="keywords" content="">
<meta name="Hanging" content="">
<link href="../mentors/default.css" rel="stylesheet" type="text/css" media="screen">
<style type="text/css">
.auto-style2 {
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
    font-size: 13px;
    color: #FFFFFF;
    text-transform: capitalize;
}

.auto-style5 {
    font-size: small;
}
.auto-style6 {
    text-align: center;
}
.auto-style8 {
    text-align: right;
}
.auto-style10 {
    font-size: x-large;
    color: #56C0B4;
}

.auto-style11 {
    text-align: left;
}

.auto-style16 {
    background-color: #FFFF8B;
}

.auto-style17 {
    font-size: medium;
    text-align: left;
}

.auto-style18 {
    font-size: medium;
}

.auto-style19 {
    margin-right: 145px;
}

.auto-style20 {
    text-align: right;
    font-size: large;
}
.auto-style21 {
    font-size: large;
}

</style>

<style type="text/css">
#thumb_images
{
    height: 50px;
    margin-bottom: 5px;
    width: 100%;
    padding: 10px 0;
    background-color: #fafafa;
    overflow: auto;
}

#thumb_images div
{
    width: 4500px;
    padding: 0;
    padding-left: 5px;
    padding-right: 5px;
}

img.thumb
{
    border: none;
    float: left;
    display: inline;
    margin-right: 10px;
}
</style>

<script type="text/javascript" language="javascript" src="inclass_alldates.js"></script>
<script type="text/javascript" language="javascript" src="pacific_voices.js"></script>
<script type="text/javascript" language="javascript" src="library_tour_aug13.js"></script>
<script type="text/javascript" language="javascript" src="miscellaneous.js"></script>
<script type="text/javascript" language="javascript" src="classphotosbyislandgroup.js"></script>
<script type="text/javascript" language="javascript" src="finalclasslectureaugust19.js"></script>
<script type="text/javascript" language="javascript" src="leaprecruitment.js"></script>
<script type="text/javascript" language="javascript" src="professionaldevelopmentworkshopaugust15.js"></script>
<script type="text/javascript" language="javascript" src="universityofguamlibrarytour.js"></script>
<script type="text/javascript" language="javascript" src="welcomedinneraugust9.js"></script>

<script type="text/javascript" language="javascript">
// create array of photo directories
var photoDirs = new Array();

// initialize the photo directory array
// in this sample, I used photo_# as the directory name
// the name could be anything.  The only requirement is that
// the directory name must conform to a valid Windows directory
// name and must end with a forward slash (NOT a backslash!)
photoDirs[0] = "inclass_alldates/";
photoDirs[1] = "pacific_voices/";
photoDirs[2] = "library_tour_aug13/";
photoDirs[3] = "miscellaneous/";
photoDirs[4] = "ClassPhotosByIslandGroup/";
photoDirs[5] = "FinalClassLectureAugust19/";
photoDirs[6] = "LeapRecruitment/";
photoDirs[7] = "ProfessionalDevelopmentWorkshopAugust15/";
photoDirs[8] = "UniversityOfGuamLibraryTour/";
photoDirs[9] = "WelcomeDinnerAugust9/";

// initialize the starting directory to display
var currentPhotoDir = 0;

// initialize the name of the thumb nail directory in each
// photo directory.  The thumb nail directory will contain
// thumb nail images (usually 25% of the original's size)
var thumbDir = "thumbs/";

// working array of thumb nail images
var photo_list = new Array();

// array containing all thumb nail photo arrays
var photo_album = new Array();

photo_album[0] = photo_list_1;
photo_album[1] = photo_list_2;
photo_album[2] = photo_list_3;
photo_album[3] = photo_list_4;
photo_album[4] = photo_list_5;
photo_album[5] = photo_list_6;
photo_album[6] = photo_list_7;
photo_album[7] = photo_list_8;
photo_album[8] = photo_list_9;
photo_album[9] = photo_list_10;

/****************************************************************/
//
//  handleThumbClicked -    This function handles the event of the
//                          user clicking on an image in the list
//                          of thumb nail images.  When that event
//                          happens, the thumb nail image source
//                          location is modified to reflect the
//                          actual photo location and then
//                          that photo is displayed in the larger
//                          single image area.
//
//  imgObj  -   This parameter is the "this" object of the thumb
//              nail image which will contain the source location
/****************************************************************/
function handleThumbClicked( imgObj )
{
    // get the source location of the thumb nail image
    var thumbSrc = imgObj.src;

    // remove the part of the source location that contains the
    // thumb nail directory
    var photoSrc = thumbSrc.replace(thumbDir, "");

    // replace the part of the thumb nail file name that has _thumb
    // with the actual photo name part of _ed
    photoSrc = photoSrc.replace("_ed_thumb", "_ed");

    // set the image to be viewed in large format
    setViewedImage(photoSrc);
}

/****************************************************************/
//
//  setViewedImage -    This function displays the selected image
//                      in large format above the list of thumb
//                      nail images.
//
//  photoSrc -  This parameters is the full path to the image to
//              shown in the image_viewed area on the page
/****************************************************************/
function setViewedImage( photoSrc )
{
    // get the image_viewed img object
    var viewedImg = document.getElementById("image_viewed");

    // set the image_viewed img object's source path to the
    // new photo to display
    viewedImg.src = photoSrc;
}

/****************************************************************/
//
//  reloadPhotoList -   This function clears the list of thumb nails
//                      in view and reloads the photo_list array
//                      with the newly selected array of thumb nail
//                      images.
/****************************************************************/
function reloadPhotoList()
{
    // dump all entries from the array
    photo_list.length = 0;

    // clear the div of img elements
    var nodeDiv = document.getElementById("thumb_list");

    // loop through the list of thumb nail image objects and
    // remove them from the web page
    while( nodeDiv.hasChildNodes() )
    {
        nodeDiv.removeChild(nodeDiv.lastChild);
    }

    // get the newly selected list of photos to display
    var currentPhotoList = photo_album[currentPhotoDir];

    // load those thumb nail image file names into the
    // photo list
    for ( var x = 0; x < currentPhotoList.length; x++ )
    {
        photo_list[x] = currentPhotoList[x];
    }
}

/****************************************************************/
//
//  loadThumbs -    This function handles loading the thumb nail
//                  images into the thumb_list DIV on the web page
/****************************************************************/
function loadThumbs()
{
    // clear the current photo list so we can load the newly
    // selected thumb nails
    reloadPhotoList();

    // get the thumb nail directory to work with
    var initialThumbDir = photoDirs[currentPhotoDir] + thumbDir;

    // get the thumb_list DIV to add the new thumb nail images too
    var thumb_list = document.getElementById("thumb_list");

    // loop through the photo_list array using the thumb nail
    // files names to create the thumb nail images in the
    // thumb_list DIV
    for ( var x = 0; x < photo_list.length; x ++ )
    {
        // build the source location for the thumb nail image
        thumbSrc = initialThumbDir + photo_list[x];

        // create the image object to add to the thumb_list DIV
        var newImgObject = buildImgObject(thumbSrc);

        // add the image object to the thumb_list DIV
        thumb_list.appendChild(newImgObject);
    }
}

/****************************************************************/
//
//  buildImgObj -   This function creates a new image object to
//                  be added to the list of thumb nail images.
//                  It uses the typical DOM createElement function
//                  and then adds the appropriate information
//                  for the thumb nail image to function correctly.
//
//  imgSrc -    This parameter is the source location for the thumb
//              nail image.
/****************************************************************/
function buildImgObject( imgSrc )
{
    // create the initial image object
    var newImg = document.createElement("img");

    // define the class name for the thumb nail image
    newImg.className = "thumb";

    // define the onClick function for the thumb nail image
    newImg.onclick = function() { handleThumbClicked(this); return(false); }

    // set the source location for the thumb nail image
    newImg.src = imgSrc;

    // return this DOM img object to the calling function
    // in this case loadThumbs()
    return newImg;
}

/****************************************************************/
//
//  changePhotoGroup -  This function handles the event of the user
//                      changing the photo group to view.  This
//                      occurs when the users selects a different
//                      group to view in the dropdown select item
//                      on the web page.
/****************************************************************/
function changePhotoGroup()
{
    // get the select box on the page
    var selectGroup = document.getElementById("photo_list");

    // get the item the user selected
    var selectedItem = selectGroup.selectedIndex;

    // get the corresponding value of the selected item
    var selectedValue = selectGroup.options[selectedItem].value;

    // set the current photo directory to the selected value
    currentPhotoDir = selectedValue;

    // load the thumb nail images for the selected photo group
    loadThumbs();

    // determine the photo directory of the selected group
    var photoDir = photoDirs[currentPhotoDir];

    // create the photo source of the large image to display
    // in this case, the first image in the list
    var photoSrc = photoDir + photo_list[0];

    // change the photo source name from thumb nail to photo name
    photoSrc = photoSrc.replace("_ed_thumb", "_ed");

    // set the photo to be viewed
    setViewedImage(photoSrc);
}
</script>

</head>

<body onload="loadThumbs();">
<div id="wrapper">


<!-- start header -->
<div id="header-wrapper">

    <div id="UNT_header">
    <div id="global">
        <div id="search">
            <form method="get" action="http://www.google.com/u/unorthtexas" id="sform">
                <p><label for="searchBox">Search the UNT web site:</label>
                <input id="searchBox" name="q" type="text" value="Search the UNT site" onfocus="document.forms[0].q.select()" />
                <input id="sbutton" name="sa" type="submit" value="Search" /></p>
            </form>
        </div>
        <div id="skip"><a href="#content">Skip to content</a></div>
        <ul>
            <li><a href="http://translate.google.com/translate?u=http%3A//www.unt.edu&amp;langpair=en|es&amp;hl=en&amp;ie=UTF8">En Espa&ntilde;ol</a></li>
            <li><a href="https://my.unt.edu/">MyUNT</a></li>
            <li><a href="https://eagleconnect.unt.edu/">EagleConnect</a></li>
            <li><a href="http://learn.unt.edu/">Blackboard</a></li>
            <li><a href="http://www.unt.edu/find-people-department.htm" title="UNT People and Departments">People &amp; Departments</a></li>
            <li><a href="http://www.unt.edu/pais/map/">Maps</a></li>
            <li><a href="http://www.unt.edu/calendars-events.htm">Calendars</a></li>
            <li><a href="http://www.unt.edu/giving-unt.htm">Giving to UNT</a></li>
        </ul>
    </div>
    <div id="header_divider"></div>
</div>

    <div id="header">
      <div id="logo">
          <h1 class="auto-style2"><span style="float: left"><a href="http://lis.unt.edu/"><img alt="College of Information" height="110" src="../images/lis_leap_logo_wht.png" width="600" /></a><br /></span></h1>
        <div class="branding"><a href="http://www.unt.edu/"><img alt="UNT" height="50" src="images/unt-lettermark.png" width="151" /></a></div>
      </div>
    </div>
  </div>
  
  <div id="menu-wrapper">
    <div id="menu">
      <ul id="main">
        <li><a href="../index.php"><strong>Home</strong></a></li>
        <li><a href="../mlis_program.php"><strong>MLIS Program</strong></a></li>
        <li><a href="../scholarship.php"><strong>Scholarships</strong></a></li>
        <!--<li><a href="../profiles.html"><strong>Students</strong></a></li>-->
        <li><a href="../profiles.html"><strong>Mentors</strong></a></li>
        <li class="current_page_item"><a href="index.php"><strong>Photos</strong></a></li>
        <li><a href="http://www.unt.edu/about-unt.htm"><strong>About UNT</strong></a></li>
      </ul>
    </div>
  </div>
<!-- end header -->



<!-- start page -->
<div id="page">
<div id="page-bgtop">
<div id="page-bgbtm">
   
   
<!-- start left sidebar -->
   <div id="sidebar1" class="sidebar">
      <ul>
        <li><a href="http://www.unt.edu"><img alt="UNT" height="84" src="../images/leap_logo.jpg" width="166" /></a>
          <ul>
              <li class="auto-style17"></li>
              <li class="auto-style17">Program Resources</li>
              <li><a href="http://lis.unt.edu" target="_blank">LIS Home Page</a> </li>
              <li><a href="http://www.unt.edu/catalog/" target="_blank">LIS Graduate Catalog</a></li>
              <li><a href="http://catalog.unt.edu/content.php?catoid=13&amp;navoid=966" target="_blank">CoI Programs &amp; Degrees</a></li>
              <li><a href="http://lis.unt.edu/admissions-and-advising" target="_blank">LIS Admissions &amp; Advising</a></li>
              <li><a href="http://lis.unt.edu/programs-study" target="_blank">LIS Programs of Study</a></li>
              <li><a href="http://orgs.unt.edu/lissa/" target="_blank">LISSA (Student Organization)</a></li>
              
              <li class="auto-style17">UNT Resources</li>
              <li><a href="http://www.unt.edu/">University of North Texas</a></li>
              <li><a href="http://www.unt.edu/catalog/grad/slisc.htm">Graduate Catalog</a></li>
              <li><a href="http://www.unt.edu/catalog/grad/slisc.htm">Courses</a></li>
              <li><a href="http://web3.unt.edu/calendar/newindex.cfm">UNT Event Calendar</a></li>
              <li><a href="http://my.unt.edu">My UNT</a></li>
              <li><a href="http://irservices.library.unt.edu/">UNT Library Electronic Resources</a></li>
           </ul>
        </li>
      </ul>

      <ul>
      	<li><img src="../images/unt_green_line.png" width="210" height="10" alt=""/>
                    <p><strong>Mailing address:</strong>
            <address class="auto-style11">
                        University of North Texas</address>
                    <address class="auto-style11">
                        Department of LIS
                    </address>
                    <address class="auto-style11">
                        1155 Union Circle #311068</address>
                    <address class="auto-style11">
            Denton, TX 76203-5017</address></p>
                        
                      
                    <p><strong>Shipping address:</strong>
                    <address class="auto-style11">
                        University of North Texas</address>
                    <address class="auto-style11">
                        Department of LIS
                    </address>
                    <address class="auto-style11">
                        Information Sciences Building</address>
          <address class="auto-style11">
                        3940 N. Elm, E292</address>
                    <address class="auto-style11">
                        Denton, TX 76207
                    </address>
                    
                      <p>PHONE: (940) 565-2445<br />
                      FAX: (940) 565-3101<br />
                      UNT METRO: (817)267-3731, x2445<br />
                      TOLL FREE: 1-877-ASK-SLIS</p>
          </li>
       </ul>              	
    </div>
<!-- end left sidebar -->


<!-- start content -->
                <div id="content" class="auto-style19" style="width: 622px;">
                    <div class="post">
                        <h2 align="center" class="auto-style10">LEAP I Photos</h2>

<!--    HERE'S THE DIV configuration for the Photo Album Area on the Page -->
<!--    HERE'S THE DIV configuration for the Photo Album Area on the Page -->
                <form id="changePhoto">
                    <p>Select a group of photos to view:&nbsp
                        <select id="photo_list" onChange="changePhotoGroup()">
                            <option value="0" selected>All Class Days</option>
                            <option value="1">Pacific Voices</option>
                            <option value="2">Library Tour August 13</option>
                            <option value="3">Miscellaneous</option>
                            <option value="4">Class Photos By Island Group</option>
                            <option value="5">Final Class Lecture August 19</option>
                            <option value="6">LEAP Recruitment</option>
                            <option value="7">Professional Development Workshop August 15</option>
                            <option value="8">University of Guam Library Tour</option>
                            <option value="9">Welcome Dinner August 9</option>
                        </select>
                    </p>
                </form>
                <div id="album" style="width: 560px;">
                    <div id="current_image" style="margin-left: 10px">
                        <img id="image_viewed" style="border: none;" src="inclass_alldates/DSC02075_ed.jpg">
                    </div>
                    <div id="thumb_images">
                        <div id="thumb_list">
                        </div>
                    </div>
                </div>
<!--    END DIV configuration for the Photo Album Area on the Page -->
<!--    END DIV configuration for the Photo Album Area on the Page -->

                    </div>
                </div>
            </div>
            <div style="clear: both;">&nbsp;</div>
        </div>
  <!-- end page -->
    </div>
</div>

<?php require("../unt_footer.php") ?>

</body>
</html>
