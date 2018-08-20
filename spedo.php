<?php
error_reporting(0);
		include_once "konmysqli.php";
		
		
		$sql="select * from $tbserver order by id desc";
		$result = $conn->query($sql);
		
		$d = $result->fetch_assoc();
				$id=$d['id'];
				$waktu=$d['waktu'];
				$kelembapan=$d['kelembapan'];
				$suhu=$d['suhu'];
				$tinggi= $d['tinggi'];
				$volume= $d['volume'];
				
		
				
				?>
		<div class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Tinggi Sapah</h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="92" >
                        <span class="percent"><?php echo $tinggi;?></span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Volume</h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="65" ><span class="percent"><?php echo $volume;?> %</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Temperature</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="56" > 
                        <span class="percent"><?php echo $suhu;?> C</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Humadity</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="27" >
                        <span class="percent"><?php echo $kelembapan;?> %</span></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
<?php $conn->close(); ?>