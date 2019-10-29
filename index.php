<?php 
	require "send.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anthony Send Blaster</title>
    <!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<!-- Bulma  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  </head>
  <body>
<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="index.php">
      <img src="http://www.columbiacp.com/cfolder/columbiacp/library/Tree/sendblaster/sendblaster.png" alt="Web based Send Blaster to send emails." width="112" height="28" style="    max-height: 4.75rem; max-width: 7rem;">
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>
</nav>

<form class="" action="" method="POST" enctype="multipart/form-data">
<!-- Settings -->
<section class="section" style="margin-bottom: -6%;">
	<div class="container">
<h1 style="font-size: 20px; margin-bottom: 2%;">Configuration</h1>
		<div class="columns">
			<div class="column">
				<input type="text" class="form-control form-inline" id="hostname" name="hostname" placeholder="smtp.google.com" value="">
			</div>
			<div class="column">
				<input type="text" class="form-control form-inline" id="emailaddress" name="emailaddress" placeholder="jamaica12@pectaii.com" value="">
			</div>
			<div class="column">
				<input type="password" class="form-inline form-control"  id="password" name="password" placeholder="your password goes here." value="">
			</div>
			<div class="column">
				<input type="number" class="form-inline form-control" id="port" name="port" placeholder="Your Port goes here. e.g. 467" value="">
			</div>
		</div>
	</div>	
</section>
<!-- Compose Email -->
  <section class="section">

    	<div class="container">

			<div class="columns">
	            <div class=" column ">
	                <label>Upload Emails: </label>
	                <div class="form-inline">
		                <input type="file" class="form-control" name="audioFile" />
		                 <label>Total Emails: <?php echo empty($count) ? '' : $count; ?></label>
		            </div>
	            </div>
	            <div class="form-group column">
	                <label for="timer">Set Timer</label>
	                <input type="number" class="form-control form-inline" id="timer" name="timer" placeholder="Time in seconds.">
	            </div>
	        </div>
    		<div class="columns">
		        <div class="form-group column">
		            <label for="subject">Subject: </label>
		            <input type="text" class="form-control" id="subject" name="subject" placeholder="Your Subject for Email Goes Here">
		        </div>
	            <div class="form-group column">
	                <label for="from">From:</label>
	                <input type="email" class="form-control" id="from" name="from" placeholder="Your Name <jamaica12@fiverr.com>" value="<?php  ?>">
	            </div>            
	        </div>        
	        <div class="form-group">
	            <label for="message">Message: </label>
	            <textarea type="textarea" class="form-control" id="message" name="message" placeholder="Your Message goes here."></textarea>
	        </div>

	        <div class="columns">
	            <div class="column is-1">
	            	<input type="submit" class="form-control button is-primary is-link is-light" value="Send" name="save_audio"/>
	            </div>
	        </div>        
	    </div>
  </section>
    </form>
  </body>
</html>