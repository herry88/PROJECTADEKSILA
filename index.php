<?php
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE);  
  ?>
<?php
session_start();
//error_reporting(0);
require_once"konmysqli.php";
$mnu="";
if(isset($_GET["mnu"])){
$mnu=$_GET["mnu"];
}
date_default_timezone_set("Asia/Jakarta");

if(!isset($_SESSION["cid"])){
	die("<script>location.href='login.php';</script>");
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $header;?></title>
    <link rel="shortcut icon" href="pavicon/iconweb.gif"/>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
    
    
<script type="text/javascript">
function Ajax(){
				var $http,$self = arguments.callee;

				if (window.XMLHttpRequest) {$http = new XMLHttpRequest();} 
				else if (window.ActiveXObject) {
					try {$http = new ActiveXObject('Msxml2.XMLHTTP');} 
					catch(e) {$http = new ActiveXObject('Microsoft.XMLHTTP');}
				}

				if ($http) {
					$http.onreadystatechange = function(){
						if (/4|^complete$/.test($http.readyState)) {
							document.getElementById('ReloadThis').innerHTML = $http.responseText;
							setTimeout(function(){$self();}, 1000);
						}
					};
					$http.open('GET', 'spedo.php' + '?' + new Date().getTime(), true);
					$http.send(null);
				}
			}
		</script>
		<script type="text/javascript">setTimeout(function() {Ajax();}, 1000);</script>
		
        
</head>
<body>

			<?php
			require_once"bar.php";
			?>
	
    
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo $_SESSION["cstatus"];?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
        
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li <?php if($mnu==""){echo " class='active'";}?>><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Main Menu</a></li>
			<li <?php if($mnu=="list"){echo " class='active'";}?>><a href="index.php?mnu=list"><em class="fa fa-calendar">&nbsp;</em> List Data</a></li>
			<li <?php if($mnu=="about"){echo " class='active'";}?>><a href="index.php?mnu=about"><em class="fa fa-bar-chart">&nbsp;</em>About</a></li>
			<li></li>
			<li <?php if($mnu=="logout"){echo " class='active'";}?>><a href="index.php?mnu=logout"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div>
	a<!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Selamat datang</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Smart Garbage Monitoring System</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding"></div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding"></div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding"></div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding"></div>
			</div><!--/.row-->
		</div>
		<?php
		if($mnu=="logout"){require_once"logout.php";}
		else 	if($mnu=="list"){require_once"list.php";}
		else 	if($mnu=="about"){require_once"about.php";}
		else{
			require_once"drop.php";
			}
			
		?>
	
    
    <div id="ReloadThis">Default text</div>
    	
     <?php
	 
		include 'spedo.php';
	 ?>
		
		<div class="row"><!--/.col--><!--/.col-->
			<div class="col-sm-12">
				<p class="back-link"><?php echo $footer;?></p>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
	
	
var mrR = function(){ return Math.round(Math.random()*1000)};
		
window.onload = function () {
	
	<?php  
  $sql="select * from `$tbserver` order by `id` desc limit 0,20";								
	$arr=getData($conn,$sql);
	$no=1;
	$i=0;
	$nom=="";
	$gab1="";
	$gab2="";
	$gab3="";
	$gab4="";
	
		foreach($arr as $d) {							
				$awaktu[$i]=$d["waktu"];
				$akelembapan[$i]=$d["kelembapan"];
				$asuhu[$i]=$d["suhu"];
				$atinggi[$i]=$d["tinggi"];
				$avolume[$i]=$d["volume"];
				$nom.="$no,";	
				$gab1.=$akelembapan[$i].",";	
				$gab2.=$asuhu[$i].",";		
				$gab3.=$atinggi[$i].",";		
				$gab4.=$avolume[$i].",";		
				
				$i++;
		$no++;		
		}
		$gab=$gab2;
			if(isset($_GET["pro"]) && $_GET["pro"]=="kelembapan"){$gab=$gab1;}
			elseif(isset($_GET["pro"]) && $_GET["pro"]=="suhu"){$gab=$gab2;}
			elseif(isset($_GET["pro"]) && $_GET["pro"]=="tinggi"){$gab=$gab3;}
			elseif(isset($_GET["pro"]) && $_GET["pro"]=="volume"){$gab=$gab4;}
		
		?>
	var lineChartDatax = {
		labels : [<?php echo $nom;?>],
		datasets : [{
				label: "My First dataset",
				fillColor : "rgba(48, 164, 255, 0.2)",
				strokeColor : "rgba(48, 164, 255, 1)",
				pointColor : "rgba(48, 164, 255, 1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(220,220,220,1)",
				data : [<?php echo $gab;?>]
			}
		]
	}
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartDatax, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>
		
</body>
</html>




<?php function RP($rupiah){return number_format($rupiah,"2",",",".");}?>
<?php
function WKT($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,0,4);

$judul_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei","Juni", "Juli", "Agustus", "September","Oktober", "November", "Desember");
$wk=$tanggal." ".$judul_bln[(int)$bulan]." ".$tahun;
return $wk;
}
?>
<?php
function WKTP($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,2,2);

$judul_bln=array(1=> "Jan", "Feb", "Mar", "Apr", "Mei","Jun", "Jul", "Agu", "Sep","Okt", "Nov", "Des");
$wk=$tanggal." ".$judul_bln[(int)$bulan]."'".$tahun;
return $wk;
}
?>
<?php
function BAL($tanggal){
	$arr=split(" ",$tanggal);
	if($arr[1]=="Januari"){$bul="01";}
	else if($arr[1]=="Februari"){$bul="02";}
	else if($arr[1]=="Maret"){$bul="03";}
	else if($arr[1]=="April"){$bul="04";}
	else if($arr[1]=="Mei"){$bul="05";}
	else if($arr[1]=="Juni"){$bul="06";}
	else if($arr[1]=="Juli"){$bul="07";}
	else if($arr[1]=="Agustus"){$bul="08";}
	else if($arr[1]=="September"){$bul="09";}
	else if($arr[1]=="Oktober"){$bul="10";}
	else if($arr[1]=="November"){$bul="11";}
	else if($arr[1]=="Nopember"){$bul="11";}
	else if($arr[1]=="Desember"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";	
}
?>

<?php
function BALP($tanggal){
	$arr=split(" ",$tanggal);
	if($arr[1]=="Jan"){$bul="01";}
	else if($arr[1]=="Feb"){$bul="02";}
	else if($arr[1]=="Mar"){$bul="03";}
	else if($arr[1]=="Apr"){$bul="04";}
	else if($arr[1]=="Mei"){$bul="05";}
	else if($arr[1]=="Jun"){$bul="06";}
	else if($arr[1]=="Jul"){$bul="07";}
	else if($arr[1]=="Agu"){$bul="08";}
	else if($arr[1]=="Sep"){$bul="09";}
	else if($arr[1]=="Okt"){$bul="10";}
	else if($arr[1]=="Nov"){$bul="11";}
	else if($arr[1]=="Nop"){$bul="11";}
	else if($arr[1]=="Des"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";	
}
?>


<?php
function process($conn,$sql){
$s=false;
$conn->autocommit(FALSE);
try {
  $rs = $conn->query($sql);
  if($rs){
	    $conn->commit();
	    $last_inserted_id = $conn->insert_id;
 		$affected_rows = $conn->affected_rows;
  		$s=true;
  }
} 
catch (Exception $e) {
	echo 'fail: ' . $e->getMessage();
  	$conn->rollback();
}
$conn->autocommit(TRUE);
return $s;
}

function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}

function getField($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$d= $rs->fetch_assoc();
	$rs->free();
	return $d;
}

function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	//foreach($arr as $row) {
	//  echo $row['nama_kelas'] . '*<br>';
	//}
	
	$rs->free();
	return $arr;
}

function getAdmin($conn,$kode){
$field="username";
$sql="SELECT `$field` FROM `tb_admin` where `kode_admin`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row['$field'];
	}
?>
