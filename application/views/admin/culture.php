<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
    <?php 
				$pieces ='';
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
	<table border="3" width="700px" style="background-image:url(http://pearlsarkar.net/hirco/assets/admin/certificate_image/
	1.jpg); background-size:cover; background-position:center center; image-repeat: no-repeat; ">
		<tr >
			<td width="10px">
			</td>
			<td  width="350px" colspan="3"><font color="black" >
					<font size="30px" style="font-family:Arial, Helvetica, sans-serifs;">ISO 9001:2000<br>
					<font size="16px" style="font-family:Arial, Helvetica, sans-serifs;">Cerified Organisation<br><br>
					<font size="16px" style="font-family:Arial, Helvetica, sans-serifs;">Testing Certificate No: <?=$id?><br>
					on the authenticity of the following Loose Pearl
			</td>
			
			<td></td>
			<td></td>
			<td></td>
			
			<td colspan="3" align="left" ><font color="black">
				
				 <b><font size="30px" style="font-family:Arial, Helvetica, sans-serifs;">&nbsp;&nbsp;&nbsp;&nbsp;HIRCO</b><br>
					<font size="16px" style="font-family:Arial, Helvetica, sans-serifs;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enterprises pvt.ltd.<br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mumbai - India<br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;website:www.hirco.net<br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email: info@hirco.net<br>
				
			</td>
			
		</tr>
		<tr>
			<td width="10px">
			</td>
            <td align="center" colspan="3" ><font color="black">
				<b><font size="30px" style="font-family:Arial, Helvetica, sans-serifs;">Identification</b>
			</td>
			<td width="350px"  align="left" colspan="4"><font color="black">
				<b><font size="30px" style="font-family:Arial, Helvetica, sans-serifs;">&nbsp;&nbsp;<?=$pieces?> <?=$type?></b>
			</td>
        </tr>
        
		<tr>
			<td width="10px">
			</td>
			<td width="15"><font color="black">
				<font size="14px" style="font-family:Arial, Helvetica, sans-serifs;">Comment&nbsp;&nbsp;&nbsp;:
			</td>
			<td><font color="black"><font size="14px" style="font-family:Arial, Helvetica, sans-serifs;"><?=$comment1?></td>
			<td><font color="black"><font size="14px" style="font-family:Arial, Helvetica, sans-serifs;"><?=$comment2?></td>
			
		</tr>

		<tr>
			<td width="10px">
			</td>
			<td></td>
			<td><font color="black"><font size="14px" style="font-family:Arial, Helvetica, sans-serifs;"><?=$comment3?></td>
			<td><font color="black"><font size="14px" style="font-family:Arial, Helvetica, sans-serifs;"><?=$comment4?></td>
		
		</tr>
		
		
		<tr>	
			<td width="10px">
			</td>
			<td  colspan="3">
			<!--background-image:url(http://pearlsarkar.net/hirco/assets/images/pearl.jpg); -->
				<img src="<?=$img?>" width="380px" height="280px">
			</td>
			<td width="100px">
				content will be here
			</td>
			<!-- <td ><font color="Black"><font size="15px" style="font-family:Arial, Helvetica, sans-serifs;"><?=$size3?><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></td>
			<td width="15px"><font color="Black"><font size="15px" style="font-family:Arial, Helvetica, sans-serifs;"> <?=$size3?><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></td> -->
		</tr>
		
		<!-- <tr>
			<td width="10px">
			</td>
			
			<td ><font color="white" style="line-height:20px;"><font size="15px" style="font-family:Arial, Helvetica, sans-serifs;">&nbsp;&nbsp;&nbsp;Carat</td>
			<td><font color="white" style="line-height:20px;"><font size="15px" style="font-family:Arial, Helvetica, sans-serifs;">:&nbsp;&nbsp;<?=$carat?></td>
		</tr>

		<tr>
			<td width="10px">
			</td>
			
			<td colspan="3" > <font color="white"><font size="15px" style="font-family:Arial, Helvetica, sans-serifs;line-height:20px;">&nbsp;&nbsp;&nbsp;Chaws</td>
			<td><font color="white"><font size="15px" style="font-family:Arial, Helvetica, sans-serifs;line-height:20px;">:&nbsp;&nbsp;<?=$chaws?></td>
		</tr>

		<tr>
			<td width="10px">
			</td>
			
			<td ><font color="white"><font size="15px" style="font-family:Arial, Helvetica, sans-serifs;line-height:20px;"> &nbsp;&nbsp;&nbsp;Drill</td>
			<td colspan="3"><font color="white"><font size="15px" style="font-family:Arial, Helvetica, sans-serifs;line-height:20px;">:&nbsp;&nbsp;<?=$drills?></td>
		</tr>

		<tr>
			<td width="10px">
			</td>
			
			<td ><font color="white"><font size="15px" style="font-family:Arial, Helvetica, sans-serifs;line-height:20px;"> &nbsp;&nbsp;&nbsp;Shape</td>
			<td colspan="3"><font color="white"><font size="15px" style="font-family:Arial, Helvetica, sans-serifs;line-height:20px;">:&nbsp;&nbsp;<?=$shape?></td>
		</tr>

		<tr>
			<td width="10px">
			</td>
			
			<td > <font color="white"><font size="15px" style="font-family:Arial, Helvetica, sans-serifs;line-height:20px;">&nbsp;&nbsp;&nbsp;Body Color</td>
			<td colspan="2"><font color="white"><font size="15px" style="font-family:Arial, Helvetica, sans-serifs;line-height:20px;">:&nbsp;&nbsp;<?=$body_clr?></td>
		</tr>

		<tr>
			<td width="10px">
			</td>
			
			<td ><font color="white"><font size="15px" style="font-family:Arial, Helvetica, sans-serifs;line-height:20px;"> &nbsp;&nbsp;&nbsp;Overtone</td>
			<td colspan="2"><font color="white"><font size="15px" style="font-family:Arial, Helvetica, sans-serifs;line-height:20px;">:&nbsp;&nbsp;<?=$overtone?></td>
		</tr>

		<tr>
			<td width="10px">
			</td>
			
			<td ><font color="white"><font size="15px" style="font-family:Arial, Helvetica, sans-serifs;line-height:20px;"> &nbsp;&nbsp;&nbsp;Orient</td>
			<td colspan="2"><font color="white"><font size="15px" style="font-family:Arial, Helvetica, sans-serifs;line-height:20px;">:&nbsp;&nbsp;<?=$orient?></td>
		</tr>

		<tr>
			<td width="10px">
			</td>
			
			<td ><font color="white"><font size="15px" style="font-family:Arial, Helvetica, sans-serifs;line-height:20px;"> &nbsp;&nbsp;&nbsp;Luster</td>
			<td colspan="2"><font color="white"><font size="15px" style="font-family:Arial, Helvetica, sans-serifs;line-height:20px;">:&nbsp;&nbsp;<?=$luster?></td>
		</tr>

		<tr>
			<td width="10px">
			</td>
			
			<td ><font color="white"> <font size="15px" style="font-family:Arial, Helvetica, sans-serifs;line-height:20px;">&nbsp;&nbsp;&nbsp;Surface</td>
			<td colspan="2"><font color="white"><font size="15px" style="font-family:Arial, Helvetica, sans-serifs;line-height:20px;">:&nbsp;&nbsp;<?=$surface?></td>
		</tr>

		<tr>
			<td width="10px">
			</td>
			
			<td > <font color="white"><font size="15px" style="font-family:Arial, Helvetica, sans-serifs;line-height:20px;">&nbsp;&nbsp;&nbsp;Nacre</td>
			<td colspan="2"><font color="white"><font size="15px" style="font-family:Arial, Helvetica, sans-serifs;line-height:20px;">:&nbsp;&nbsp;<?=$nacre?></td>
		</tr>

		

		<tr>
			<td width="10px">
			</td>
			
			<td > <font color="white"><font size="15px" style="font-family:Arial, Helvetica, sans-serifs;line-height:20px;">&nbsp;&nbsp;&nbsp;Matching</td>
			<td colspan="3"><font color="white"><font size="15px" style="font-family:Arial, Helvetica, sans-serifs;line-height:20px;">:&nbsp;&nbsp;<?=$matching?></td>
		</tr>

		<tr>
<td></td> <td></td>
			<td colspan="3" align="left" style="margin-lef: 5% !important;"><font color="white"><font size="15px" style="font-family:Arial, Helvetica, sans-serifs;line-height:20px;">See terms & conditions on reverse</td>
			
		</tr>
	 -->
</table>




<!--table border="1" width="905" height="530">
		<tr>
			<td width="10px">
			</td>
			<td  width="450" colspan="3">
					<b>ISO 9001:2000</b><br>
					Cerified Organisation<br><br>
					Testing Certificate No: 0800140798<br>
					on the authenticity of the following Loose Pearl
			</td>

			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td align="left">
				<b>HIRCO</b><br>
				Enterprises pvt.ltd.<br>
				Mumbai - India<br>
				website:www.hirco.net<br>
				Email: info@hirco.net<br>
					
			</td>
			<td width="10px">
			</td>
		</tr>
		
		<tr>

			<td width="10px">
			</td>

			<td  align="center" colspan="3">
					<b>Identification</b>
			</td>
			<td  align="center" colspan="5" >
					<b>1 Real Pearl</b>
			</td>

			
		</tr>

		<tr>
			<td width="5px">
			</td>
			<td width="60">
				Comment
			</td>
			<td width="30" align="center">:</td>
			<td>njkerk</td>
			
		</tr>

		<tr>	
			<td width="10px">
			</td>
			<td rowspan="13" colspan="3">
				<img src="pearl.jpg" style="padding:2%;">
			</td>
			<td width="190px" >&nbsp;&nbsp;&nbsp;Sizes in mm</td><td  width="15px">:</td>
			<td width="70px">16.60</td>
			<td width="70px">9.70</td>
			<td width="70px" > 0.00</td>
		</tr>
		
		<tr>
			<td width="10px">
			</td>
			<td > &nbsp;&nbsp;&nbsp;Carat</td><td>:</td>
			<td>2.98</td>
		</tr>

		<tr>
			<td width="10px">
			</td>
			<td > &nbsp;&nbsp;&nbsp;Chaws</td><td>:</td>
			<td>5.79</td>
		</tr>

		<tr>
			<td width="10px">
			</td>
			<td > &nbsp;&nbsp;&nbsp;Drill</td><td>:</td>
			<td colspan="3">Drilled</td>
		</tr>

		<tr>
			<td width="10px">
			</td>
			<td > &nbsp;&nbsp;&nbsp;Shape</td><td>:</td>
			<td colspan="3">Baroque</td>
		</tr>

		<tr>
			<td width="10px">
			</td>
			<td > &nbsp;&nbsp;&nbsp;Body Color</td><td>:</td>
			<td colspan="3">Cream</td>
		</tr>

		<tr>
			<td width="10px">
			</td>
			<td > &nbsp;&nbsp;&nbsp;Overtone</td><td>:</td>
			<td colspan="3">Cream</td>
		</tr>

		<tr>
			<td width="10px">
			</td>
			<td > &nbsp;&nbsp;&nbsp;Orient</td><td>:</td>
			<td colspan="3">Present</td>
		</tr>

		<tr>
			<td width="10px">
			</td>
			<td > &nbsp;&nbsp;&nbsp;Luster</td><td>:</td>
			<td colspan="3">Good</td>
		</tr>

		<tr>
			<td width="10px">
			</td>
			<td > &nbsp;&nbsp;&nbsp;Surface</td><td>:</td>
			<td colspan="3">Wrinkless</td>
		</tr>

		<tr>
			<td width="10px">
			</td>
			<td > &nbsp;&nbsp;&nbsp;Nacre</td><td>:</td>
			<td colspan="3">Translucent</td>
		</tr>

		

		<tr>
			<td width="10px">
			</td>
			<td > &nbsp;&nbsp;&nbsp;Matching</td><td>:</td>
			<td colspan="3">Not Applicable</td>
		</tr>

		<tr>
<td></td> <td></td>
			<td colspan="4" align="left" style="margin-lef: 5% !important;">See terms & conditions on reverse</td>
			
		</tr>
	
</table-->





</body>
</html>