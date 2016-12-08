<!DOCTYPE html>
<html>
<head>
	<style type="text/css" media="screen">
	    .body,html{
	    	width: 50%;
	    }
		.half{
			width: 50%;
		}
		h1,h2, h3{
			color:white;
		}

		h4,h5{
			padding: 0;
			margin: 5px 0;
			color:white;
		}
		p{
			padding: 0;
			margin: 0 0;
			color:white;
			font-size: 17px;

		}
		.main-sec{
			width: 100%;
			padding: 2%;
		}

		.fltleft{
			float: left;
			display: inline-block;
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
		.wdth10{
			width:10%;
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
  <div class="half" style="background-image: url(http://pearlsarkar.net/hirco/assets/admin/certificate_image/real6.jpg); background-size: contain; background-position: 0 0;background-repeat:no-repeat;">
  <div class="fltleft wdth60">
			<h1 style="margin: 0">ISO 9001:2008</h1>
			<h5>Certified Organization</h5>
			<h4 style="padding: 3% 0 0 0; margin: 0;">Testing Certificate No : <?=$id?></h4>
			<h4 style="padding: 0; margin: 0;">onthe authencity of the following <?=$item?></h4>
		</div>
		<div class="fltleft" style="display:inline-block; width: 50%; margin-left: -12%; ">
			<h1 style="margin: 0 0 0 50%">HIRCO</h1>
			<h5 style="margin-left: 50%">Enterprises pvt. ltd.<br>Mumbai - India<br>Website : www.hirco.net<br>Email : info@hirco.net</h5>
		</div>
		<br>
		<div class="wdth80" style="">
			<div class="fltleft wdth70">
				<center>
					<h2 style="margin: 1% 0 0 0; padding: 0">Identification</h2>
				</center>
			</div>
			<div class="fltleft wdth30" style="">
				<h2 style="margin: 1% 0 0 0%; padding: 0;"><?=$pieces?> <?=$type?></h2>
			</div>
		</div>
		
		<div style="" class="wdth80">
			<h5 style="padding: 0; margin: 0%;" class="">Comment : <?=$comment1?> <?=$comment2?> <?=$comment3?> <?=$comment4?></h5>
		</div>
		<div class="wdth80">
			<div class="wdth40 fltleft" style="padding: 2%; margin-left:-2%;">
				<img src="http://pearlsarkar.net/hirco/assets/images/pearl.jpg" width="390px" height="280px">
			</div>
			<div class="fltleft wdth40 " style="padding: 2%; margin-left:10%;">
				
				<div class="fltleft wdth100">
					<div class=" fltleft wdth35">
						<p >Sizes in mm </p>
					</div>
						<div class="wdth60 fltleft">
							<p >:&nbsp;&nbsp;8.5 &nbsp;&nbsp;&nbsp;&nbsp;8.5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8.5</p>
						</div>
						
				</div>

				<div class=" wdth100">
					<div class="wdth35 fltleft">
						<p>Carat </p>
					</div>

					<div class="wdth30 fltleft">
						<p>:&nbsp; 8.5</p>
					</div>	
				</div>
					

				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p>Chaws </p>
					</div>

					<div class="wdth30 fltleft">
						<p>:&nbsp; 5.79</p>
					</div>	
				</div>

				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p>Drill </p>
					</div>

					<div class="wdth30 fltleft">
						<p>:&nbsp; Drilled</p>
					</div>	
				</div>

				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p>Shape </p>
					</div>

					<div class="wdth30 fltleft">
						<p>:&nbsp; Baroque</p>
					</div>	
				</div>

				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p>Body Color </p>
					</div>

					<div class="wdth30 fltleft">
						<p>:&nbsp; Cream</p>
					</div>	
				</div>
					
				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p>Overtone</p>
					</div>

					<div class="wdth30 fltleft">
						<p>:&nbsp; Cream</p>
					</div>	
				</div>

				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p>Orient </p>
					</div>

					<div class="wdth30 fltleft">
						<p>:&nbsp; Present</p>
					</div>	
				</div>

				<div class="wdth100">
					<div class="wdth35 fltleft">
						<p>Luster </p>
					</div>

					<div class="wdth30 fltleft">
						<p>:&nbsp; Good</p>
					</div>	
				</div>

				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p>Surface </p>
					</div>

					<div class="wdth30 fltleft">
						<p>:&nbsp; Wrinkles</p>
					</div>	
				</div>

				<div   class=" wdth100">
					<div class="wdth35 fltleft">
						<p>Nacre </p>
					</div>

					<div class="wdth40 fltleft">
						<p>:&nbsp;Translucent</p>
					</div>	
				</div>

				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p>Matching </p>
					</div>

					<div class="wdth90 fltleft">
						<p>:&nbsp; Not Applicable</p>
						<p>See Terms & Conditions on reverse</p> 
					</div>	
				</div>
  	
  </div>
   <div class="half"  style="background-image: url(http://pearlsarkar.net/hirco/assets/admin/certificate_image/real6.jpg); background-size: contain; background-position: 0 0;background-repeat:no-repeat;">
  	<div class="fltleft wdth60">
			<h1 style="margin: 0">ISO 9001:2008</h1>
			<h5>Certified Organization</h5>
			<h4 style="padding: 3% 0 0 0; margin: 0;">Testing Certificate No : <?=$id?></h4>
			<h4 style="padding: 0; margin: 0;">onthe authencity of the following <?=$item?></h4>
		</div>
		<div class="fltleft" style="display:inline-block; width: 50%; margin-left: -12%; ">
			<h1 style="margin: 0 0 0 50%">HIRCO</h1>
			<h5 style="margin-left: 50%">Enterprises pvt. ltd.<br>Mumbai - India<br>Website : www.hirco.net<br>Email : info@hirco.net</h5>
		</div>
		<br>
		<div class="wdth80" style="">
			<div class="fltleft wdth70">
				<center>
					<h2 style="margin: 1% 0 0 0; padding: 0">Identification</h2>
				</center>
			</div>
			<div class="fltleft wdth30" style="">
				<h2 style="margin: 1% 0 0 0%; padding: 0;"><?=$pieces?> <?=$type?></h2>
			</div>
		</div>
		
		<div style="" class="wdth80">
			<h5 style="padding: 0; margin: 0%;" class="">Comment : <?=$comment1?> <?=$comment2?> <?=$comment3?> <?=$comment4?></h5>
		</div>
		<div class="wdth80">
			<div class="wdth40 fltleft" style="padding: 2%; margin-left:-2%;">
				<img src="http://pearlsarkar.net/hirco/assets/images/pearl.jpg" width="390px" height="280px">
			</div>
			<div class="fltleft wdth40 " style="padding: 2%; margin-left:10%;">
				
				<div class="fltleft wdth100">
					<div class=" fltleft wdth35">
						<p >Sizes in mm </p>
					</div>
						<div class="wdth60 fltleft">
							<p >:&nbsp;&nbsp;8.5 &nbsp;&nbsp;&nbsp;&nbsp;8.5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8.5</p>
						</div>
						
				</div>

				<div class=" wdth100">
					<div class="wdth35 fltleft">
						<p>Carat </p>
					</div>

					<div class="wdth30 fltleft">
						<p>:&nbsp; 8.5</p>
					</div>	
				</div>
					

				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p>Chaws </p>
					</div>

					<div class="wdth30 fltleft">
						<p>:&nbsp; 5.79</p>
					</div>	
				</div>

				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p>Drill </p>
					</div>

					<div class="wdth30 fltleft">
						<p>:&nbsp; Drilled</p>
					</div>	
				</div>

				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p>Shape </p>
					</div>

					<div class="wdth30 fltleft">
						<p>:&nbsp; Baroque</p>
					</div>	
				</div>

				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p>Body Color </p>
					</div>

					<div class="wdth30 fltleft">
						<p>:&nbsp; Cream</p>
					</div>	
				</div>
					
				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p>Overtone</p>
					</div>

					<div class="wdth30 fltleft">
						<p>:&nbsp; Cream</p>
					</div>	
				</div>

				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p>Orient </p>
					</div>

					<div class="wdth30 fltleft">
						<p>:&nbsp; Present</p>
					</div>	
				</div>

				<div class="wdth100">
					<div class="wdth35 fltleft">
						<p>Luster </p>
					</div>

					<div class="wdth30 fltleft">
						<p>:&nbsp; Good</p>
					</div>	
				</div>

				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p>Surface </p>
					</div>

					<div class="wdth30 fltleft">
						<p>:&nbsp; Wrinkles</p>
					</div>	
				</div>

				<div   class=" wdth100">
					<div class="wdth35 fltleft">
						<p>Nacre </p>
					</div>

					<div class="wdth40 fltleft">
						<p>:&nbsp;Translucent</p>
					</div>	
				</div>

				<div  class=" wdth100">
					<div class="wdth35 fltleft">
						<p>Matching </p>
					</div>

					<div class="wdth90 fltleft">
						<p>:&nbsp; Not Applicable</p>
						<p>See Terms & Conditions on reverse</p> 
					</div>	
				</div>
  </div>
</body>
</html>