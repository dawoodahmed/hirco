<html>
<head>
	<style type="text/css">
		body, html{
			width: 100%;
			height: 150%;
			margin: 0 auto;
			
		}
        
       h1,h2, h3{
			color:white;
		}

		h4,h5{
			padding: 0;
			margin: 5px 0;
			color:white;
		}
		span,p{
			padding: 0;
			margin: 3px 0;
			color:white;
			font-size: 17px;

		}
		.main-sec{
			width: 100%;
			padding: 1% 2% 2% 2%;
		}

		.fltleft{
			float: left;
			display: inline-block;
		} 

		.wdth10{
			width:10%;
		}

		.wdth50{
			width: 50%;
		}

		.wdth100{
			width: 100%;
		}

		.wdth30{
			width: 30%;
		}

		.wdth80{
			width: 80%;
		}

		.wdth40{
			width: 40%;
		}

		.wdth60{
			width: 60%;
		}

		.wdth25{
			width: 25%;
		}

		.wdth65{
			width: 65%;
		}
		.wdth53{
			width: 53%;
		}
		.wdth70{
			width: 70%;
		}

		.wdth20{
			width: 20%;
		}
		
		.wdth35{
			width:35%;
		}
		.wdth45{
			width:45%;
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
			      $comment3 = '';
			      $comment4 = '';
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
                		$img = 'http://pearlsarkar.net/hirco/assets/uploads/'.$value->filter_value;
                	}
                	if($value->filter_id == 25){
                		$comment1 = $value->filter_value;
                	}
                	if($value->filter_id == 26){
                		$comment2 = $value->filter_value;
                	}
                	if($value->filter_id == 27){
                		$comment3 = $value->filter_value;
                	}
                	if($value->filter_id == 28){
                		$comment4 = $value->filter_value;
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
		    ?>
	<div class="main-sec" style="background-image: url(http://pearlsarkar.net/hirco/assets/admin/certificate_image/real_bg.jpg); background-size: cover; background-position: 0 0;background-repeat:no-repeat; width: 667.19px; height: 463.22px; margin-left: 3%; margin-top: 2%;font-family: Arial, Helvetica, sans-serif;font-weight:bold !important;
" >
	
		<div class="fltleft wdth60">
			<h1 style="margin: 1% 0 0 0 ; font-size:1.3em;">ISO 9001:2008</h1>
			<h4 style="font-size:0.8em;  font-weight:normal;">Certified Organization</h4>
			<h3 style="padding: 0 0 0 0; margin-top: 3%; margin-bottom:0; font-size:0.9em;  font-weight:normal;font-family: Arial, Helvetica, sans-serif;">Testing Certificate No : <?=$id?>
			<br />on the authencity of the following <?=$item?></h3>
		</div>
		<div class="fltleft" style="display:inline-block; width: 23%; margin-left: 13.5%; ">
			<h1 style="margin: 1% 0 0 0;font-size:1.3em">HIRCO</h1>
			<h4 style="font-size:0.8em; font-weight:normal;margin-top:-5%;">Enterprises pvt. ltd.<br>Mumbai - India<br>Website : www.hirco.net<br>Email : info@hirco.net</h4>
		</div>
		<div class="wdth80" style="">
			<div class="fltleft wdth53">
				<center>
					<h1 style="margin: 0.5% 0 0 0; margin-left:10%; padding: 0; text-align:center; font-size:1.3em;">Identification</h1>
				</center>
			</div>
			<div class="fltleft wdth30">
				<h1 style="margin: 0.5% 0 0 0; margin-left:15%; padding: 0; text-align:left; font-size:1.3em;"><?=$pieces?>&nbsp;&nbsp;<?=$type?></h1>
			</div>
		</div>
	
		<div  class="wdth80">
			<h4 style="padding: 0; margin-top: 0.5%; margin-bottom:1%;  font-weight:normal; font-size:0.8em;" class="">Comment : comment1 &nbsp;&nbsp;&nbsp;comment2 <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;comment3&nbsp;&nbsp;&nbsp; comment4</h4>
		</div>
		<div class="" style="width:100%;">
			<div class="wdth40 fltleft" style="padding: 1% 2%; margin-left:-2%;">
				<img src="http://pearlsarkar.net/hirco/assets/images/pearl.jpg" width="314.65px" height="236px">
				<div class="wdth50">
						<p style=" font-size:0.75em;margin-left:13px;margin-top:10px;">Copyright &#169 2008.</p> 
					</div>
			</div>

			<div class="fltleft wdth40 " style="padding:0% 2%; margin-left:9%;">
				
				<div class="fltleft wdth100" style="margin:11px 0px 0px 0px;">
					<div class=" fltleft wdth35" >
						<p style=" font-size:0.8em;  margin:1.5px 0 1.5px 0;">Sizes in mm </p>
					</div>
						<div class="wdth60 fltleft">
							<span style=" font-size:0.8em;  margin:1.5px 0;">:&nbsp; 8.5</span>
							<span style=" font-size:0.8em; margin:1.5px 0; margin-left:25%;">8.5</span>
							<span style=" font-size:0.8em; margin:1.5px 0; margin-left:25%;">8.5</span>
						</div>
						
				</div>

				<div class=" wdth100">
					<div class="wdth35 fltleft">
						<p style=" font-size:0.8em;  margin:1.5px 0;">Carat </p>
					</div>

					<div class="wdth30 fltleft">
						<p style=" font-size:0.8em;  margin:1.5px 0;">:&nbsp; 8.55</p>
					</div>	
				</div>
					

				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p style=" font-size:0.8em;  margin:1.5px 0;">Chaws </p>
					</div>

					<div class="wdth30 fltleft">
						<p style=" font-size:0.8em;  margin:1.5px 0;">:&nbsp; 5.79</p>
					</div>	
				</div>

				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p style=" font-size:0.8em;  margin:1.5px 0;">Drill </p>
					</div>

					<div class="wdth30 fltleft">
						<p style=" font-size:0.8em; margin:1.5px 0;">:&nbsp; Drilled</p>
					</div>	
				</div>

				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p style=" font-size:0.8em;  margin:1.5px 0;">Shape </p>
					</div>

					<div class="wdth30 fltleft">
						<p style=" font-size:0.8em;  margin:1.5px 0;">:&nbsp; Baroque</p>
					</div>	
				</div>

				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p style=" font-size:0.8em;  margin:1.5px 0;">Body Color </p>
					</div>

					<div class="wdth30 fltleft">
						<p style=" font-size:0.8em;  margin:1.5px 0;">:&nbsp; Cream</p>
					</div>	
				</div>
					
				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p style=" font-size:0.8em;  margin:1.5px 0;">Overtone</p>
					</div>

					<div class="wdth30 fltleft">
						<p style=" font-size:0.8em;  margin:1.5px 0;">:&nbsp; Cream</p>
					</div>	
				</div>

				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p style=" font-size:0.8em;  margin:1.5px 0;">Orient </p>
					</div>

					<div class="wdth30 fltleft">
						<p style=" font-size:0.8em;  margin:1.5px 0;">:&nbsp; Present</p>
					</div>	
				</div>

				<div class="wdth100">
					<div class="wdth35 fltleft">
						<p style=" font-size:0.8em;  margin:1.5px 0;">Luster </p>
					</div>

					<div class="wdth30 fltleft">
						<p style=" font-size:0.8em;  margin:1.5px 0;">:&nbsp; Good</p>
					</div>	
				</div>

				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p style=" font-size:0.8em;  margin:1.5px 0;">Surface </p>
					</div>

					<div class="wdth30 fltleft">
						<p style=" font-size:0.8em;  margin:1.5px 0;">:&nbsp; Wrinkles</p>
					</div>	
				</div>

				<div   class=" wdth100">
					<div class="wdth35 fltleft">
						<p style=" font-size:0.8em;  margin:1.5px 0;">Nacre </p>
					</div>

					<div class="wdth40 fltleft">
						<p style=" font-size:0.8em;  margin:1.5px 0;">:&nbsp;Translucent</p>
					</div>	
				</div>

				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p style=" font-size:0.8em;  margin:1.5px 0;">Matching </p>
					</div>

					<div class="wdth90 fltleft">
						<p style=" font-size:0.8em;  margin:1.5px 0;">:&nbsp; Not Applicable</p>
						<p style=" font-size:0.77em;margin:11px 0px 0px 0px !important;">See Terms & Conditions on reverse</p> 
					</div>
						
				</div>
			</div>


			

				
				

				<!-- <div class="wdth30 fltleft"><h4>Size in mm &nbsp;&nbsp;&nbsp;:</h4></div>
				<div class="wdth60 fltleft"><h4><?=$size1?> &nbsp;&nbsp;&nbsp;<?=$size2?>  &nbsp;&nbsp;&nbsp;<?=$size3?></h4></div>
				<br>
				<div class="wdth30 fltleft"><h4>Carat&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</h4></div>
				<div class="wdth60 fltleft"><h4><?=$carat?></h4></div>
				<br>
				<div class="wdth30 fltleft"><h4>Chaws &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</h4></div>
				<div class="wdth60 fltleft"><h4><?=$chaws?></h4></div>
				<br>
				<div class="wdth30 fltleft"><h4>Drill &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</h4></div>
				<div class="wdth60 fltleft"><h4><?=$drills?></h4></div>
				<br>
				<div class="wdth30 fltleft"><h4>Shape &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</h4></div>
				<div class="wdth60 fltleft"><h4><?=$shape?></h4></div>
				<br>
				<div class="wdth30 fltleft"><h4>Body Color &nbsp;:</h4></div>
				<div class="wdth60 fltleft"><h4><?=$body_clr?></h4></div>
				<br>
				<div class="wdth30 fltleft"><h4>Overtone&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;:</h4></div>
				<div class="wdth60 fltleft"><h4><?=$overtone?></h4></div>
				<br>
				<div class="wdth30 fltleft"><h4>Orient &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</h4></div>
				<div class="wdth60 fltleft"><h4><?=$orient?></h4></div>
				<br>
				<div class="wdth30 fltleft"><h4>Luster &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</h4></div>
				<div class="wdth60 fltleft"><h4><?=$luster?></h4></div>
				<br>
				<div class="wdth30 fltleft"><h4>Surface &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</h4></div>
				<div class="wdth60 fltleft"><h4><?=$surface?></h4></div>
				<br>
				<div class="wdth30 fltleft"><h4>Nacre &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</h4></div>
				<div class="wdth60 fltleft"><h4><?=$nacre?></h4></div>
				<br>
				<div class="wdth30 fltleft"><h4>Matching&nbsp;&nbsp; &nbsp;:</h4></div>
				<div class="wdth60 fltleft"><h4><?=$matching?></h4></div>

				 -->
				
			</div>
		
	</div>
	
	
	<!-- <div class="main-sec" style="background-image: url(http://pearlsarkar.net/hirco/assets/admin/certificate_image/real_bg.jpg); background-size: cover; background-position: 0 0;background-repeat:no-repeat; width: 700px; height: 500px; margin-left: 3%;" >
	
		<div class="fltleft wdth60">
			<h1 style="margin: 1% 0 0 0 ; font-size:1.3em;">ISO 9001 :2008</h1>
			<h4 style="font-size:0.8em;  font-weight:normal;">Certified Organization</h4>
			<h3 style="padding: 0 0 0 0; margin-top: 3%; margin-bottom:0; font-size:1em;  font-weight:normal;">Testing Certificate No : <?=$id?>
			<br />on the authencity of the following <?=$item?></h3>
		</div>
		<div class="fltleft" style="display:inline-block; width: 20%; margin-left: 12%; ">
			<h1 style="margin: 1% 0 0 0">HIRCO</h1>
			<h4 style="font-size:0.8em; font-weight:normal;">Enterprises pvt. ltd.<br>Mumbai - India<br>Website : www.hirco.net<br>Email : info@hirco.net</h4>
		</div>
		<div class="wdth80" style="">
			<div class="fltleft wdth53">
				<center>
					<h1 style="margin: 0.5% 0 0 0; margin-left:10%; padding: 0; text-align:center; font-size:1.5em;">Identification</h1>
				</center>
			</div>
			<div class="fltleft wdth30">
				<h1 style="margin: 0.5% 0 0 0; margin-left:15%; padding: 0; text-align:left; font-size:1.5em;"><?=$pieces?> <?=$type?></h1>
			</div>
		</div>
	
		<div  class="wdth80">
			<h4 style="padding: 0; margin-top: 0.5%; margin-bottom:1%;  font-weight:normal;" class="">Comment : <?=$comment1?> <?=$comment2?> <?=$comment3?> <?=$comment4?></h4>
		</div>
		<div class="" style="width:100%;">
			<div class="wdth40 fltleft" style="padding: 1% 2%; margin-left:-2%;">
				<img src="http://pearlsarkar.net/hirco/assets/images/pearl.jpg" width="310px" height="250px">
			</div>
			<div class="fltleft wdth40 " style="padding:0% 2%; margin-left:3%;">
				
				<div class="fltleft wdth100">
					<div class=" fltleft wdth35">
						<p style=" font-size:0.9em;  margin:3px 0 1.5px 0;">Sizes in mm </p>
					</div>
						<div class="wdth60 fltleft">
							<span style=" font-size:0.9em;  margin:1.5px 0;">:&nbsp; 8.5</span>
							<span style=" font-size:0.9em; margin:1.5px 0; margin-left:28%;">8.5</span>
							<span style=" font-size:0.9em; margin:1.5px 0; margin-left:28%;">8.5</span>
						</div>
						
				</div>

				<div class=" wdth100">
					<div class="wdth35 fltleft">
						<p style=" font-size:0.9em;  margin:1.5px 0;">Carat </p>
					</div>

					<div class="wdth30 fltleft">
						<p style=" font-size:0.9em;  margin:1.5px 0;">:&nbsp; 8.5</p>
					</div>	
				</div>
					

				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p style=" font-size:0.9em;  margin:1.5px 0;">Chaws </p>
					</div>

					<div class="wdth30 fltleft">
						<p style=" font-size:0.9em;  margin:1.5px 0;">:&nbsp; 5.79</p>
					</div>	
				</div>

				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p style=" font-size:0.9em;  margin:1.5px 0;">Drill </p>
					</div>

					<div class="wdth30 fltleft">
						<p style=" font-size:0.9em; margin:1.5px 0;">:&nbsp; Drilled</p>
					</div>	
				</div>

				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p style=" font-size:0.9em;  margin:1.5px 0;">Shape </p>
					</div>

					<div class="wdth30 fltleft">
						<p style=" font-size:0.9em;  margin:1.5px 0;">:&nbsp; Baroque</p>
					</div>	
				</div>

				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p style=" font-size:0.9em;  margin:1.5px 0;">Body Color </p>
					</div>

					<div class="wdth30 fltleft">
						<p style=" font-size:0.9em;  margin:1.5px 0;">:&nbsp; Cream</p>
					</div>	
				</div>
					
				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p style=" font-size:0.9em;  margin:1.5px 0;">Overtone</p>
					</div>

					<div class="wdth30 fltleft">
						<p style=" font-size:0.9em;  margin:1.5px 0;">:&nbsp; Cream</p>
					</div>	
				</div>

				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p style=" font-size:0.9em;  margin:1.5px 0;">Orient </p>
					</div>

					<div class="wdth30 fltleft">
						<p style=" font-size:0.9em;  margin:1.5px 0;">:&nbsp; Present</p>
					</div>	
				</div>

				<div class="wdth100">
					<div class="wdth35 fltleft">
						<p style=" font-size:0.9em;  margin:1.5px 0;">Luster </p>
					</div>

					<div class="wdth30 fltleft">
						<p style=" font-size:0.9em;  margin:1.5px 0;">:&nbsp; Good</p>
					</div>	
				</div>

				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p style=" font-size:0.9em;  margin:1.5px 0;">Surface </p>
					</div>

					<div class="wdth30 fltleft">
						<p style=" font-size:0.9em;  margin:1.5px 0;">:&nbsp; Wrinkles</p>
					</div>	
				</div>

				<div   class=" wdth100">
					<div class="wdth35 fltleft">
						<p style=" font-size:0.9em;  margin:1.5px 0;">Nacre </p>
					</div>

					<div class="wdth40 fltleft">
						<p style=" font-size:0.9em;  margin:1.5px 0;">:&nbsp;Translucent</p>
					</div>	
				</div>

				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p style=" font-size:0.9em;  margin:1.5px 0;">Matching </p>
					</div>

					<div class="wdth90 fltleft">
						<p style=" font-size:0.9em;  margin:1.5px 0;">:&nbsp; Not Applicable</p>
						<p style=" font-size:0.9em;">See Terms & Conditions on reverse</p> 
					</div>	
				</div>
			</div>

 -->
			

				
				

				<!-- <div class="wdth30 fltleft"><h4>Size in mm &nbsp;&nbsp;&nbsp;:</h4></div>
				<div class="wdth60 fltleft"><h4><?=$size1?> &nbsp;&nbsp;&nbsp;<?=$size2?>  &nbsp;&nbsp;&nbsp;<?=$size3?></h4></div>
				<br>
				<div class="wdth30 fltleft"><h4>Carat&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</h4></div>
				<div class="wdth60 fltleft"><h4><?=$carat?></h4></div>
				<br>
				<div class="wdth30 fltleft"><h4>Chaws &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</h4></div>
				<div class="wdth60 fltleft"><h4><?=$chaws?></h4></div>
				<br>
				<div class="wdth30 fltleft"><h4>Drill &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</h4></div>
				<div class="wdth60 fltleft"><h4><?=$drills?></h4></div>
				<br>
				<div class="wdth30 fltleft"><h4>Shape &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</h4></div>
				<div class="wdth60 fltleft"><h4><?=$shape?></h4></div>
				<br>
				<div class="wdth30 fltleft"><h4>Body Color &nbsp;:</h4></div>
				<div class="wdth60 fltleft"><h4><?=$body_clr?></h4></div>
				<br>
				<div class="wdth30 fltleft"><h4>Overtone&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;:</h4></div>
				<div class="wdth60 fltleft"><h4><?=$overtone?></h4></div>
				<br>
				<div class="wdth30 fltleft"><h4>Orient &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</h4></div>
				<div class="wdth60 fltleft"><h4><?=$orient?></h4></div>
				<br>
				<div class="wdth30 fltleft"><h4>Luster &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</h4></div>
				<div class="wdth60 fltleft"><h4><?=$luster?></h4></div>
				<br>
				<div class="wdth30 fltleft"><h4>Surface &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</h4></div>
				<div class="wdth60 fltleft"><h4><?=$surface?></h4></div>
				<br>
				<div class="wdth30 fltleft"><h4>Nacre &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</h4></div>
				<div class="wdth60 fltleft"><h4><?=$nacre?></h4></div>
				<br>
				<div class="wdth30 fltleft"><h4>Matching&nbsp;&nbsp; &nbsp;:</h4></div>
				<div class="wdth60 fltleft"><h4><?=$matching?></h4></div>

				 -->
				
			</div>
		
	</div>
</body>
</html>