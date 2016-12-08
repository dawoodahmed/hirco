<!DOCTYPE HTML>
<head>
	<style type="text/css">
		body, html{
			width: 100%;
			height: 100%;
			margin: 0 auto;
		}

		h1, h2, h3, h4, h5, p, span{
			color: #fff;
			font-family: Arial, Helvetica, sans-serif;
			padding: 0;
			margin: 0;
		}

		p{
			font-weight: bold;
			line-height: 15px;
		}

		.main-sec1{
			margin: 21px 0 25px 15px;	
			width: 679px;
			height: 485px;
			background-color: red;
			background-image: url(http://hircolab.com/assets/admin/certificate_image/<?php echo $background_image;?>);
		}

		.main-sec2{
			margin: 50px 0 0 15px;
			width: 679px;
			height: 485px;
			background-color: red;
			background-image: url(http://hircolab.com/assets/admin/certificate_image/real_bg.jpg);
		}

		.wdth25{
			width: 25%;
		}

		.wdth29{
			width: 29%;
		}

		.wdth30{
			width: 30%;
		}

		.wdth35{
			width: 35%;
		}

		.wdth40{
			width: 40%;
		}

		.wdth45{
			width: 45%;
		}

		.wdth48{
			width: 48%;
		}

		.wdth60{
			width: 60%;
		}

		.wdth65{
			width: 65%;
		}

		.wdth70{
			width: 70%;
		}

		.wdth100{
			width: 100%;
		}

		.fltl{
			float: left;
			display: inline-block;
		}

		.algnr{
			text-align: right;
		}

		.hdrs1{
			padding: 3px 0 0 100px;
		}

		.hdrs2{
			padding: 3px 0 0 50px;
		}

		.pad20{
			padding: 10px 20px 0;
		}
	</style>
</head>
<body>
	<?php
		$pieces ='';
		$item = '';
		$type ='';
		$img = '';
		$comment1 = '';
		$comment2 = '';
		// $comment3 = '';
		// $comment4 = '';
		$quality ='';
		$origin ='';
		$siz1 ='';
		$siz2 ='';
		$siz3 ='';
		$carat ='';
		$chaws ='';
		$drills ='';
		$shape ='';
		$body_clr ='';
		$overtone ='';
		$orient ='';
		$quality ='';
		$luster ='';
		$surface ='';
		$nacre ='';
		$matching ='';
		foreach ($data as  $value) {
			if($value->filter_id == 23){
				$pieces = $value->filter_value;
			}
			if($value->filter_id == 16){
				$item = $value->filter_value;
			}
			if($value->filter_id == 4){
				$type = $value->filter_value;
			}
			if($value->filter_id == 48){
				$img = 'http://hircolab.com/assets/uploads/'.$value->filter_value;
			}
			if($value->filter_id == 25){
				$comment1 = $value->filter_value;
			}
			if($value->filter_id == 26){
				$comment2 = $value->filter_value;
			}
			if($value->filter_id == 5){
				$origin = $value->filter_value;
			}
			if($value->filter_id == 17){
				$size1 = $value->filter_value;
			}
			if($value->filter_id == 18){
				$size2 = $value->filter_value;
			}
			if($value->filter_id == 19){
				$size3 = $value->filter_value;
			}
			if($value->filter_id == 20){
				$carat = $value->filter_value;
			}
			if($value->filter_id == 22){
				$chaws = $value->filter_value;
			}
			if($value->filter_id == 7){
				$drills = $value->filter_value;
			}
			if($value->filter_id == 8){
				$shape = $value->filter_value;
			}
			if($value->filter_id == 9){
				$body_clr = $value->filter_value;
			}
			if($value->filter_id == 10){
				$overtone = $value->filter_value;
			}
			if($value->filter_id == 11){
				$orient = $value->filter_value;
			}
			if($value->filter_id == 6){
				$quality = $value->filter_value;
			}
			if($value->filter_id == 12){
				$luster = $value->filter_value;
			}
			if($value->filter_id == 13){
				$surface = $value->filter_value;
			}
			if($value->filter_id == 14){
				$nacre = $value->filter_value;
			}
			if($value->filter_id == 15 ){
				$matching = $value->filter_value;
			}

		}
		for ($i=1; $i < 2; $i++) { 
	?>
		<div class="main-sec<?=$i?>">
			<div class="wdth70 fltl">
				<h3 style="margin: 20px 20px 0; font-size:1.3em;">ISO 9001:2008</h3>
				<h5 style="margin: 5px 20px;">Certified Organization</h5>
				<h5 style="margin: 30px 20px 0;">Testing Certificate No : <?=$id?></h5>
			</div>
			<div class="wdth25 fltl">
				<h3 style="margin-top: 20px; margin-left: 15px; font-size:1.3em;">HIRCO</h3>
				<h5 style="margin-top: 5px; margin-left: 15px;">Enterprises Pvt. Ltd.<br>
					Mumbai - India<br>
					Website : www.hirco.net<br>
					Email : info@hirco.net
				</h5>
			</div>
			<div class="wdth100">
				<h5 style="margin: 3px 20px;">on the authencity of the following <?=$item?></h5>
			</div>
			<div class="wdth100">
				<h3 style="font-size:1.5em;" class="fltl wdth30 hdrs1">Identification</h3>
				<h3 style="font-size:1.5em;" class="fltl wdth45 hdrs2"><?=$pieces?>&nbsp;&nbsp; <?=$type?></h3>
			</div>
			<div class="wdth50">
				<table>
					<tr>
						<td><h5 style="margin: 0 20px;">Comments : </h5></td>
						<td><h5><?=$origin?></h5></td>
						<td><h5><?=$quality?></h5></td>
						<!-- <td><h5>Comment 3</h5></td> -->
					</tr>
					<tr>
						<td><h5 style="margin: 0 20px;"></h5></td>
						<td><h5><?=$comment1?></h5></td>
						<td><h5><?=$comment2?></h5></td>
						<!-- <td><h5>Comment 6</h5></td>
					</tr> -->
				</table>
			</div>
			<div class="wdth48 fltl pad20">
				<img src="<?=$img?>" width="314.65px" height="236px">
				<h5 style="margin: 5px 20px;">Copyright &#169 2008.</h5>
			</div>
			<div class="wdth48 fltl">
				<div class="fltl wdth100" style="margin:11px 0px 0px 0px;">
					<div class=" fltl wdth35" >
						<p style="font-size:0.8em; margin:1.5px 0 1.5px 0;">Sizes in mm </p>
					</div>
					<div class="wdth60 fltl">
						<span style="font-size:0.8em; margin:1.5px 0;">:&nbsp; <?=$size1?></span>
						<span style=" font-size:0.8em; margin:1.5px 0; margin-left:15%;"><?=$size2?></span>
						<span style=" font-size:0.8em; margin:1.5px 0; margin-left:15%;"><?=$size3?></span>
					</div>
				</div>
				<div class=" wdth100">
					<div class="wdth35 fltl">
						<p style="font-size:0.8em; margin:1.5px 0;">Carat </p>
					</div>
					<div class="wdth30 fltl">
						<p style="font-size:0.8em; margin:1.5px 0;">:&nbsp; <?=$carat?></p>
					</div>	
				</div>
				<div  class=" wdth100">
					<div class="wdth35 fltl">
						<p style="font-size:0.8em; margin:1.5px 0;">Chaws </p>
					</div>

					<div class="wdth30 fltl">
						<p style="font-size:0.8em; margin:1.5px 0;">:&nbsp; <?=$chaws?></p>
					</div>	
				</div>
				<div  class=" wdth100">
					<div class="wdth35 fltl">
						<p style="font-size:0.8em; margin:1.5px 0;">Drill </p>
					</div>
					<div class="wdth30 fltl">
						<p style=" font-size:0.8em; margin:1.5px 0;">:&nbsp; <?=$drills?></p>
					</div>	
				</div>
				<div  class=" wdth100">
					<div class="wdth35 fltl">
						<p style="font-size:0.8em; margin:1.5px 0;">Shape </p>
					</div>
					<div class="wdth30 fltl">
						<p style="font-size:0.8em; margin:1.5px 0;">:&nbsp; <?=$shape?></p>
					</div>	
				</div>
				<div  class=" wdth100">
					<div class="wdth35 fltl">
						<p style="font-size:0.8em; margin:1.5px 0;">Body Color </p>
					</div>
					<div class="wdth30 fltl">
						<p style="font-size:0.8em; margin:1.5px 0;">:&nbsp; <?=$body_clr?></p>
					</div>	
				</div>
				<div  class=" wdth100">
					<div class="wdth35 fltl">
						<p style="font-size:0.8em; margin:1.5px 0;">Overtone</p>
					</div>
					<div class="wdth60 fltl">
						<p style="font-size:0.8em; margin:1.5px 0;">:&nbsp; <?=$overtone?></p>
					</div>	
				</div>
				<div class=" wdth100">
					<div class="wdth35 fltl">
						<p style="font-size:0.8em; margin:1.5px 0;">Orient </p>
					</div>
					<div class="wdth30 fltl">
						<p style="font-size:0.8em; margin:1.5px 0;">:&nbsp; <?=$orient?></p>
					</div>	
				</div>
				<div class="wdth100">
					<div class="wdth35 fltl">
						<p style="font-size:0.8em; margin:1.5px 0;">Luster </p>
					</div>
					<div class="wdth30 fltl">
						<p style="font-size:0.8em; margin:1.5px 0;">:&nbsp; <?=$luster?></p>
					</div>	
				</div>
				<div class=" wdth100">
					<div class="wdth35 fltl">
						<p style="font-size:0.8em; margin:1.5px 0;">Surface </p>
					</div>
					<div class="wdth30 fltl">
						<p style="font-size:0.8em; margin:1.5px 0;">:&nbsp; <?=$surface?></p>
					</div>	
				</div>
				<div class=" wdth100">
					<div class="wdth35 fltl">
						<p style="font-size:0.8em; margin:1.5px 0;">Nacre </p>
					</div>

					<div class="wdth40 fltl">
						<p style="font-size:0.8em; margin:1.5px 0;">:&nbsp; <?=$nacre?></p>
					</div>	
				</div>
				<div  class=" wdth100">
					<div class="wdth35 fltl">
						<p style="font-size:0.8em; margin:1.5px 0 0;">Matching </p>
					</div>
					<div class="wdth90 fltl">
						<p style="font-size:0.8em; margin:1.5px 0 0 0;">:&nbsp; <?=$matching?></p>
						<p style=" font-size:0.77em;margin:6px 0px 0px -20px !important;">See Terms & Conditions on reverse</p> 
					</div>
				</div>
			</div>
		</div>
		<!-- <div class="main-sec2"></div> -->
	<?php
		}
	?>
</body>
</html>