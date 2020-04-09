	<html>

	<head>

	<meta charset="UTF-8">
	<meta name="description" content="Senate Legislative Library Visitor Monitoring System" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Eugene Jose Espinoza">
	<title>Senate Legislative Library Visitor Monitoring System</title>
	<meta name="description" content="Senate Library Monitoring System" />
	<!--<meta http-equiv="refresh" content="<?php /*echo $sec?>;URL='<?php echo $page*/?>'">-->
	<meta name="keywords" content="Senate Legislative Library Visitor Monitoring System">
	<link rel='shortcut icon' href="/kohaimages/senate/website_banner18th__0.png" type="image/png"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>-->
	  
	<link rel="stylesheet" type="text/css" href="includes/main.css" media="screen"/>
	  
	  
	<script>
		function myFunction() {
		var x = document.getElementById("myDIV");
		if (x.style.display === "none") {
		x.style.display = "block";
		} else {
		x.style.display = "none";
			}
		}

		function myFunction2() {
		document.getElementById("demo").innerHTML = "<textarea cols = '50' rows = '20' name='text' id='text_id' class='form-control' style='resize:vertical' ></textarea>";
		}


	</script>  
	  
	  
	</head>


	<body>
	
	<div>
	<div class="container">
  <div class="row">
    <div class="col-sm-8">
      	<a href="/visitor-login7" style="text-decoration: none;">
	<img src="/kohaimages/senate/website_banner18th__0.png" alt="Senate Library Banner"/>
	</a>
    </div>
    <div class="col-sm-4">
      	<font size = +2> <font color = 'b2965a'><b>Senate Legislative Library Visitor Monitoring System</b></font>
	
    </div>
  </div>
  </div>
	
	
	<!--
	<div>
	<div>
	<a href="/visitor-login" style="text-decoration: none;">
	<img src="/kohaimages/senate/website_banner18th__0.png" alt="Senate Library Banner"/>
	</a>
	</div>
	<div style="text-align: center;">
	<font size = +3> <font color = 'b2965a'><b>Senate Legislative Library Visitor Monitoring System</b></font>
	<hr color='#b2965a'>
	</div>
	</div>
	-->
	<hr color='#b2965a'>
	
	
	
	<?php

	error_reporting(1);
	header( "refresh:120;url=index.php" );
	
	require_once("db.php");
	
	$link = mysqli_connect($hostname, $username, $passwd)
		or die("Could not connect");
		
	mysqli_select_db($link,$dbase) or die("cannot select DB");
	//Capture who is the currently logged-in staff
	$sql = "select bo.firstname, bo.surname, es.borrowernumber from entry_staffloggedin es LEFT JOIN borrowers bo ON (es.borrowernumber=bo.borrowernumber) where currently_loggedin='1' order by entry_staffloggedin_id DESC LIMIT 1";
    // the result of the query
    $result = mysqli_query($link,$sql) or die("Invalid query");
	$data8=mysqli_fetch_row($result);
	//$borrowernumber = $data8[0];
	
	$_SESSION['currentlylogged'] = $data8[1];
	$_SESSION['currentlyloggedborrowernumber'] = $data8[2];
	
	mysqli_close($link);
	
	
	?>	
	
	
	<div align="center">
	
	<form class="form-horizontal" method="post" enctype="multipart/form-data" action="action.php">
	<fieldset>

	<!-- Form Name -->
	<legend style="color:white;">Please check your purpose in visiting the library: (You can check more than one)</legend>

	<!-- Multiple Checkboxes (inline) -->
	<div class="form-group">
	<!--<label class="col-md-4 control-label" for="checkboxes"></label>-->
	<div class="col-md-12">
    <label class="checkbox-inline" style="color:white;">
      <input type="checkbox" name="check_list[]" value="Basic Research">
      Basic Research
    </label>
    <label class="checkbox-inline" style="color:white;">
      <input type="checkbox" name="check_list[]" value="Online Research">
      Online Research
    </label>
    <label class="checkbox-inline" style="color:white;">
      <input type="checkbox" name="check_list[]" value="Borrow Library Materials">
      Borrow Library Materials
    </label>
    <label class="checkbox-inline" style="color:white;">
      <input type="checkbox" name="check_list[]" value="Return Library Materials">
      Return Library Materials
    </label>
    <label class="checkbox-inline" style="color:white;">
      <input type="checkbox" name="check_list[]" value="Read Newspapers and Magazines">
      Read Newspapers and Magazines
    </label>
    <label class="checkbox-inline" style="color:white;">
      <input type="checkbox" name="check_list[]" value="Clearance">
      Clearance
    </label>
    <label class="checkbox-inline" style="color:white;">
      <input type="checkbox" name="check_list[]" value="Others" onclick="myFunction2()">
      Others
    </label>
	<!--<br />-->
	
	
	<!--<p id="demo">A Paragraph.</p>-->
	
	<!--<div id="myDIV">
	<textarea name="othersdescribed" rows="2" cols="70" placeholder="If you checked 'Others', you may indicate exact business transaction."></textarea>
	</div>-->
	
	<div>
		<textarea name="othersdescribed" rows="2" cols="70" placeholder="If you checked 'Others', you may indicate exact business transaction."></textarea>
	</div>
	</div>
	</div>

	</fieldset>

	

	<div class="container">
	<div>
		 <p style="color:white;text-align:center;">PLEASE SWIPE YOUR ID </p>
	</div>
	
	<!--<form action="scanid.php" method="GET">-->
	<div align="center">
	<input type = 'text' name = 'id' autofocus="autofocus" size="35" style="text-align:center"></input>

	<script>
	if (!("autofocus" in document.createElement("input"))) {
		document.getElementById("my-input").focus();
	}
  
	/*
     var time = new Date().getTime();
     $(document.body).bind("mousemove keypress", function(e) {
         time = new Date().getTime();
     });

     function refresh() {
         if(new Date().getTime() - time >= 60000) 
             window.location.reload(true);
         else 
             setTimeout(refresh, 10000);
     }

     setTimeout(refresh, 10000); 
	*/
	</script>
	</div>
	<div align="center">
	<input type="submit" name="submit" value="Submit"/>
	</div>
	
	</div>

	</form>
	
	<!--</div>-->
	</div>
	
	<div align="center">	
	<a href='scanidvisitor.php'>Outside researchers or visitors, please click here</a>

	<br/>

	<p style="background-color:powderblue;">Monitoring Staff: 
	<?php
	$staffname = "$data8[0]" . " " . "$data8[1]";
	if (empty($data8[0])) {
		echo "<p style='background-color:powderblue; color:red;'>There's no monitoring staff currently logged in.</p>";
		} else {
		echo $staffname;	
		}
?>
	</p>
	

<p style="color:white;">Data Privacy Notice:</p>
<p style="color:white;">The Legislative Library Service (LLS) is committed to protecting the privacy of its data subjects, and ensuring the safety and security of personal data under its control and custody.</p>

</div>

	

	
	
	</div>

	</body>
	</html>