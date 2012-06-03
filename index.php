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
  
  <SCRIPT>
  
  if ((NewCount2 == 1) && (NewCount == 2))
{
$('#submit').addClass('displayed');
}

function KeepCount() {

var NewCount = 0

if (document.stalist.NSW.checked) {NewCount = NewCount + 1;}
if (document.stalist.VIC.checked) {NewCount = NewCount + 1;}
if (document.stalist.QLD.checked) {NewCount = NewCount + 1;}
if (document.stalist.SA.checked) {NewCount = NewCount + 1;}
if (document.stalist.WA.checked) {NewCount = NewCount + 1;}
if (document.stalist.TAS.checked) {NewCount = NewCount + 1;}
if (document.stalist.NT.checked) {NewCount = NewCount + 1;}
if (document.stalist.ACT.checked) {NewCount = NewCount + 1;}

if (NewCount == 3)
{
alert('Please only select two states!')
document.stalist; return false;
}
} 

function KeepCount2() {

var NewCount2 = 0

if (document.stalist.ind1.checked) {NewCount2 = NewCount2 + 1}
if (document.stalist.ind2.checked) {NewCount2 = NewCount2 + 1}
if (document.stalist.ind3.checked) {NewCount2 = NewCount2 + 1}
if (document.stalist.ind4.checked) {NewCount2 = NewCount2 + 1}
if (document.stalist.ind5.checked) {NewCount2 = NewCount2 + 1}
if (document.stalist.ind6.checked) {NewCount2 = NewCount2 + 1}

if (NewCount2 == 2)
{
$('#submit').addClass('displayed');
alert('Please only select one weapon!')
document.stalist; return false;
}
}

</SCRIPT>
  
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
	
		<h2>Step <span class="num">1</span></h2>
		<h3>Choose two fighters!</h3>
		<form name="stalist" action="result.php" method="post"><ul class="state-list">
			<li class="sta1"><input onClick="return KeepCount()" id="cknsw" type="checkbox" name="NSW" /><label for="cknsw"><span class="bgnsw">New South Wales</span></label></li>
			<li class="sta2"><input onClick="return KeepCount()" id="ckvic" type="checkbox" name="VIC" /><label for="ckvic"><span class="bgvic">Victoria</span></label></li>
			<li class="sta3"><input onClick="return KeepCount()" id="ckqld" type="checkbox" name="QLD" /><label for="ckqld"><span class="bgqld">Queensland</span></label></li>
			<li class="sta4"><input onClick="return KeepCount()" id="cksa" type="checkbox" name="SA" /><label for="cksa"><span class="bgsa">South Australia</span></label></li>
			<li class="sta5"><input onClick="return KeepCount()" id="ckwa" type="checkbox" name="WA" /><label for="ckwa"><span class="bgwa">Western Australia</span></label></li>
			<li class="sta6"><input onClick="return KeepCount()" id="cktas" type="checkbox" name="TAS" /><label for="cktas"><span class="bgtas">Tasmania</span></label></li>
			<li class="sta7"><input onClick="return KeepCount()" id="cknt" type="checkbox" name="NT" /><label for="cknt"><span class="bgnt">Northern Territory</span></label></li>
			<li class="sta8"><input onClick="return KeepCount()" id="ckact" type="checkbox" name="ACT" /><label for="ckact"><span class="bgact">Australian Capital Territory</span></label></li>
		</ul>
		
		<div class="hline"><span class="classy"></span></div>
		
		<h2>Step <span class="num">2</span></h2>
		<h3>Choose your weapon!</h3>
		<ul class="cat-list">
			<li class="cat1"><input onClick="return KeepCount2()" id="cat1" type="checkbox" name="ind1" /><label for="cat1"><span class="catspan1">Gross state product</span></label></li>
			<li class="cat2"><input onClick="return KeepCount2()" id="cat2" type="checkbox" name="ind2" /><label for="cat2"><span class="catspan2">Median age at death</span></label></li>
			<li class="cat3"><input onClick="return KeepCount2()" id="cat3" type="checkbox" name="ind3" /><label for="cat3"><span class="catspan3">New car sales</span></label></li>
			<li class="cat4"><input onClick="return KeepCount2()" id="cat4" type="checkbox" name="ind4" /><label for="cat4"><span class="catspan4">Population</span></label></li>
			<li class="cat5"><input onClick="return KeepCount2()" id="cat5" type="checkbox" name="ind5" /><label for="cat5"><span class="catspan5">Retail expenditure</span></label></li>
			<li class="cat6"><input onClick="return KeepCount2()" id="cat6" type="checkbox" name="ind6" /><label for="cat6"><span class="catspan6">Unemployment rate</span></label></li>
		</ul>
	</div>

    <footer>

    </footer>
  </div>	
		<div class="submit-wrapper">
			<input id="submit" type="submit" value="FIGHT!" />
		</div>
		
		</form>
		
     <!--! end of #container -->


  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>

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
