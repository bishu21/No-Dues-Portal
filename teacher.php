<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>
	MY PROFILE
</title>
<style>
.header{
	position:fixed;
	background-color: #F0E68C;
	left: 0px;
	height:100px;
	top:0px;
	width:100%;
}
#head1{
	float:left;
	width:100px;
	height:100px;
	margin-left: 10px;
}
#head2{
	float: left;
	width:70%;
	margin-top:10px;
	margin-left: 5px;
}
#head3{
	font-size:30px;
	color: #1E2B78;
}
ul.tab {
	position: fixed;
	left: 0px;
	top:100px;
	width:100%;
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

/* Float the list items side by side */
ul.tab li {
    float: left;
}

/* Style the links inside the list items */
ul.tab li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    transition: 0.3s;
    font-size: 18px;
}

/* Change background color of links on hover */
ul.tab li a:hover:not(.active) {
	cursor: pointer;
    background-color:#4CAF50; /*#111*/;
}

/* Create an active/current tablink class */
ul.tab li a:focus, .active {
    background-color: #4CAF50;
}

/* Style the tab content */
.tabcontent {
    display: none;  
}
#homepage,#nodues_requests{
	margin-top: 164px;
}
#img{
	position:fixed;
	float: left;
	top:149px;
	left:1px;
	width: 10%;
}
#upload{
	width:100%;
	margin-top: -5px;
}
#upload_file
{
	border-radius: 10px;
	width:100%;
	background-color: #4CAF50;
    color: white;
    padding: 12px 32px;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    cursor: pointer;
}
#data{
	background-color: #D3D3D3;
	margin-top:-12px;
	margin-left: 256px;
	float: left;
	width:980px;
	height:600px;
}

</style>
</head>
<body>

<!--/////////////////////////////////////////////////////////////////////////-->
<div class="header">
	<div id="head1"><img src="logo1.gif" height="100px" width="100%"></div>
	<div id="head2"><span id="head3">INDIAN INSTITUTE OF TECHNOLOGY <br/>
						  			NO DUES PORTAL
					</span>
	</div>
</div>
<!--////////////////////////////////////////////////////////////////////////////-->
<div class="nav">
<ul class="tab">
	<li><a href="javascript:void(0)" class="tablinks" id="active" onclick="openTab(event, 'homepage')">
		Home page</a></li>
  	<li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 
  		'nodues_requests')">
  		No Dues Requests
  		</a></li>

  	<li style="float:right"><a class="active" href="logout.php">Sign Out</a></li>
</ul>
</div>
<!--//////////////////////////////////////////////////////////////////////////-->
	<div id="homepage" class="tabcontent" style="display:block;">
		<div id="img">
		<img src="img.jpg" width="100%" height="250px">
		<div id="upload"><input id="upload_file" type="button" value="Upload Image"></div>
		</div>
		<div id="data"> 
		<?php
		$row=$_SESSION['user_data'];

		echo "<p style='color:green; top-margin:20px; left:20px;font-size:30px;'> Name:" . $row['Name']."</p>";
		echo "<p style='color:green; top-margin:20px; left:20px;font-size:30px;'>Designation:" 
				.$row['designation']."</p>";
		echo "<p style='color:green; top-margin:20px; left:20px;font-size:30px;'>Department:" 
					. $row['dept']."</p>";?>
		</div>
	</div>

	<div id="nodues_requests" class="tabcontent">
		<div id="img">
		<img src="img.jpg" width="100%" height="250px">
		<div id="upload"><input id="upload_file" type="button" value="Upload Image"></div>
		</div>
	
	<div id="data"> 

		<?php
		require 'database.php' ;
		?>

	</div>
	</div>
<!--////////////////////////////////////////////////////////////////////-->

<script>

function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

</script>

</body>
</html>