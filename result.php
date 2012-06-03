<?php
ini_set('error_reporting', 'E_ALL');
include ('inc/db.php');

$states = array('NSW' => $_POST['NSW'],
		'VIC' => $_POST['VIC'],
		'QLD' => $_POST['QLD'],
		'SA' =>  $_POST['SA'],
		'WA' =>  $_POST['WA'],
		'TAS' => $_POST['TAS'],
		'NT' =>  $_POST['NT'],
		'ACT' => $_POST['ACT']);

$ind = array(
		'1' => $_POST['ind1'],
		'2' => $_POST['ind2'],
		'3' => $_POST['ind3'],
		'4' => $_POST['ind4'],
		'5' => $_POST['ind5'],
		'6' => $_POST['ind6']);			

arsort($states);
$states = array_keys($states);

$state1 = $states[0];
$state2 = $states[1];


// Get population for calculatiing per capita;
$query = 'SELECT "YEAR", "' . $state1 . '", "' . $state2 . '" FROM "state-population"';
$result = pg_query($query) or die('Query failed: ' . pg_last_error());
$result_array = (pg_fetch_all($result));
$last_element = end($result_array);
$state1pop = $last_element[$state1];
$state2pop = $last_element[$state2];

$indicator = array_search('on', $ind);

switch ($indicator) {
    case 1:
        $query = 'SELECT "YEAR", "' . $state1 . '", "' . $state2 . '" FROM "state-gross-product"';
   	 	$result = pg_query($query) or die('Query failed: ' . pg_last_error());
   	 	$result_array = (pg_fetch_all($result));
   	 	$last_element = end($result_array);
		$state1percapita = ($last_element[$state1]*1000000/$state1pop);
		$state2percapita = ($last_element[$state2]*1000000/$state2pop);
   	 	if ($state1percapita > $state2percapita){
   	 		$winner = $state1;
   	 		$looser = $state2;
 			$winValue  = "$".number_format($state1percapita);
			$loseValue = "$".number_format($state2percapita);
   	 	} else {
   	 		$winner = $state2;
   	 		$looser = $state1;
 			$winValue  = "$".number_format($state2percapita);
			$loseValue = "$".number_format($state1percapita);		    
   	 	} 
   	 	$dataset = "Gross Product<br />Per Capita";
		$datasetIcon = "gros-icon";
        break;
    case 2:
       	$query = 'SELECT "YEAR", "' . $state1 . '", "' . $state2 . '" FROM "state-median-age-at-death"';
		$result = pg_query($query) or die('Query failed: ' . pg_last_error());
		$result_array = (pg_fetch_all($result));
		$last_element = end($result_array);
		if ($last_element[$state1] > $last_element[$state2]){
			$winner = $state1;
			$looser = $state2; 
			$winValue  = $last_element[$state1];
			$loseValue = $last_element[$state2];
		} else {
			$winner = $state2;
			$looser = $state1;
			$winValue  = $last_element[$state2];
			$loseValue = $last_element[$state1];		
		} 
		$dataset = "Age at Death<br />Median";
		$datasetIcon = "deat-icon";
        break;
    case 3:
        $query = 'SELECT "YEAR", "' . $state1 . '", "' . $state2 . '" FROM "state-new-motor-sales"';
   	 	$result = pg_query($query) or die('Query failed: ' . pg_last_error());
   	 	$result_array = (pg_fetch_all($result));
   	 	$last_element = end($result_array);
		$state1percapita = ($last_element[$state1]/$state1pop);
		$state2percapita = ($last_element[$state2]/$state2pop);
   	 	if ($state1percapita > $state2percapita){
   	 		$winner = $state1;
   	 		$looser = $state2;
			$winValue  = number_format($state1percapita, 6);
			$loseValue = number_format($state2percapita, 6); 
   	 	} else {
   	 		$winner = $state2;
   	 		$looser = $state1;
			$winValue  = number_format($state2percapita, 6);
			$loseValue = number_format($state1percapita, 6);		
   	 	}
		$dataset = "New motor vehicle sales<br />Per Capita";
		$datasetIcon = "cars-icon";
        break;
    case 4:
        $query = 'SELECT "YEAR", "' . $state1 . '", "' . $state2 . '" FROM "state-population"';
		$result = pg_query($query) or die('Query failed: ' . pg_last_error());
		$result_array = (pg_fetch_all($result));
		if ($last_element[$state1] > $last_element[$state2]){
			$winner = $state1;
			$looser = $state2; 
			$winValue  = number_format($last_element[$state1]);
			$loseValue = number_format($last_element[$state2]);
		} else {
			$winner = $state2;
			$looser = $state1;
			$winValue  = number_format($last_element[$state2]);
			$loseValue = number_format($last_element[$state1]);		
		}
		$dataset = "Population";
		$datasetIcon = "popu-icon";
        break;
    case 5:
       	$query = 'SELECT "YEAR", "' . $state1 . '", "' . $state2 . '" FROM "state-retail-expenditure"';
		$result = pg_query($query) or die('Query failed: ' . pg_last_error());
		$result_array = (pg_fetch_all($result));
		$last_element = end($result_array);
		$state1percapita = ($last_element[$state1]*1000000/$state1pop);
		$state2percapita = ($last_element[$state2]*1000000/$state2pop);
   	 	if ($state1percapita > $state2percapita){
   	 		$winner = $state1;
   	 		$looser = $state2;
 			$winValue  = "$".number_format($state1percapita);
			$loseValue = "$".number_format($state2percapita);
   	 	} else {
   	 		$winner = $state2;
   	 		$looser = $state1;
 			$winValue  = "$".number_format($state2percapita);
			$loseValue = "$".number_format($state1percapita);		    
   	 	}
		$dataset = "Retail Expenditure<br />Per Capita";
		$datasetIcon = "reta-icon";
        break;
    case 6:
        $query = 'SELECT "YEAR", "' . $state1 . '", "' . $state2 . '" FROM "state-unemployment-rate"';
		$result = pg_query($query) or die('Query failed: ' . pg_last_error());
		$result_array = (pg_fetch_all($result));
		$last_element = end($result_array);
		if ($last_element[$state1] < $last_element[$state2]){
			$winner = $state1;
			$looser = $state2; 
			$winValue  = number_format($last_element[$state1], 2) . "%";
			$loseValue = number_format($last_element[$state2], 2) . "%";
		} else {                                                
			$winner = $state2;                                  
			$looser = $state1;                                  
			$winValue  = number_format($last_element[$state2], 2) . "%";
			$loseValue = number_format($last_element[$state1], 2) . "%";		
		}
		$dataset = "Unemployment Rate";
		$datasetIcon = "unem-icon";
        break;
}

if($winner=="NSW"){$winNice = "New South Wales"; $winflag = "flag-nsw";}
if($looser=="NSW"){$loseNice = "New South Wales"; $loseflag = "flag-nsw";}

if($winner=="VIC"){$winNice = "Victoria"; $winflag = "flag-vic";}
if($looser=="VIC"){$loseNice = "Victoria"; $loseflag = "flag-vic";}

if($winner=="QLD"){$winNice = "Queensland"; $winflag = "flag-qld";}
if($looser=="QLD"){$loseNice = "Queensland"; $loseflag = "flag-qld";}

if($winner=="SA"){$winNice = "South Australia"; $winflag = "flag-sa";}
if($looser=="SA"){$loseNice = "South Australia"; $loseflag = "flag-sa";}

if($winner=="WA"){$winNice = "Western Australia"; $winflag = "flag-wa";}
if($looser=="WA"){$loseNice = "Western Australia"; $loseflag = "flag-wa";}

if($winner=="TAS"){$winNice = "Tasmania"; $winflag = "flag-tas";}
if($looser=="TAS"){$loseNice = "Tasmania"; $loseflag = "flag-tas";}

if($winner=="NT"){$winNice = "Northern Territory"; $winflag = "flag-nt";}
if($looser=="NT"){$loseNice = "Northern Territory"; $loseflag = "flag-nt";}

if($winner=="ACT"){$winNice = "Australian Capital Territory"; $winflag = "flag-act";}
if($looser=="ACT"){$loseNice = "Australian Capital Territory"; $loseflag = "flag-act";}


?>
<!doctype html>
<!-- Conditional comment for mobile ie7 blogs.msdn.com/b/iemobile/ -->
<!--[if IEMobile 7 ]>    <html class="no-js iem7" lang="en"> <![endif]-->
<!--[if (gt IEMobile 7)|!(IEMobile)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
  <meta charset="utf-8">

  <title>State v State: FIGHT</title>
  <meta name="description" content="">

  <!-- Mobile viewport optimization h5bp.com/ad -->
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width">

  <!-- Home screen icon  Mathias Bynens mathiasbynens.be/notes/touch-icons -->
  <!-- For iPhone 4 with high-resolution Retina display: -->
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/h/apple-touch-icon.png">
  <!-- For first-generation iPad: -->
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/m/apple-touch-icon.png">
  <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
  <link rel="apple-touch-icon-precomposed" href="img/l/apple-touch-icon-precomposed.png">
  <!-- For nokia devices: -->
  <link rel="shortcut icon" href="img/l/apple-touch-icon.png">

  <!-- iOS web app, delete if not needed. https://github.com/h5bp/mobile-boilerplate/issues/94 -->
  <!-- <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black"> -->
  <!-- <script>(function(){var a;if(navigator.platform==="iPad"){a=window.orientation!==90||window.orientation===-90?"img/startup-tablet-landscape.png":"img/startup-tablet-portrait.png"}else{a=window.devicePixelRatio===2?"img/startup-retina.png":"img/startup.png"}document.write('<link rel="apple-touch-startup-image" href="'+a+'"/>')})()</script> -->
  
  <!-- The script prevents links from opening in mobile safari. https://gist.github.com/1042026 -->
  <!-- <script>(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")</script> -->
  
  <!-- Mobile IE allows us to activate ClearType technology for smoothing fonts for easy reading -->
  <meta http-equiv="cleartype" content="on">

  <!-- more tags for your 'head' to consider h5bp.com/d/head-Tips -->

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">

  <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
  <script src="js/libs/modernizr-2.0.6.min.js"></script>
  
  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>
  
  <!-- HighCharts and Rubens HighCharts Addon -->
  <script src="js/highcharts.js"></script>
  <script src="js/modules/exporting.js"></script>
  <script src="js/high.js"></script>
  
  
</head>

<body>

  <div id="container">
    <header>
	<a href="/fight">
		<h1><span class="rotatel">State</span><span class="v">vs</span><span class="rotater">State</span></h1>
		
		<h2 class="enters">TWO STATES ENTER, ONE STATE LEAVES</h2>
	</a>
    </header>
	
    <div id="main" role="main">
		
		<div class="thirds">
			<div class="first">
				<h2>The <span>WINNER</span> with <span><?php echo $winValue; ?></span> is:</h2>
				<h3><?php echo $winNice; ?></h3>
				<div class="<?php echo $winflag; ?>"></div>
			</div>
		</div>
		
		<div class="thirds">
			<div class="result">
				<h2><!--Your weapon was:-->&nbsp;</h2>
				<h2><?php echo $dataset; ?></h2>
				<div class="datasetIcon <?php echo $datasetIcon; ?>"></div>
			</div>
		</div>
		
		<div class="thirds">
			<div class="second">
				<h2>The <span>LOSER</span> with <span><?php echo $loseValue; ?></span> is:</h2>
				<h3><?php echo $loseNice; ?></h3>
				<div class="<?php echo $loseflag; ?>"></div>
			</div>
		</div>
		
		<div id="rendertable"></div>
		
		<table id="result">
			<?php

					print "<thead><tr><th>Year</th><th>" . $loseNice . "</th><th>" . $winNice . "</th></tr></thead><tbody>";
				
			?>
			<?php
				while ($row = pg_fetch_row($result)) {
					echo "<tr><th>$row[0]</th><td>$row[1]</td><td>$row[2]</td></tr>";
				}
			?></tbody>
		</table>
		
		
    </div>

    <footer>

    </footer>
  </div> <!--! end of #container -->


  <!-- JavaScript at the bottom for fast page loading -->

  <!-- scripts concatenated and minified via ant build script-->
  <script src="js/helper.js"></script>
  <!-- end scripts-->

  <!-- Debugger - remove for production -->
  <!-- <script src="https://getfirebug.com/firebug-lite.js"></script> -->

  <!-- Asynchronous Google Analytics snippet. Change UA-XXXXX-X to be your site's ID.
       mathiasbynens.be/notes/async-analytics-snippet -->
  <script>
    var _gaq=[["_setAccount","UA-XXXXX-X"],["_trackPageview"]];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
    g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
    s.parentNode.insertBefore(g,s)}(document,"script"));
  </script>

</body>
</html>
