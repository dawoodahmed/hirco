<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	
	<style>
div {

    width: 86.5px;
    height:86.5px;
    left:-2% !important;
    border: 1px solid gray;
}

body{
	 font-family: Arial, Helvetica, sans-serif;
	 text-align: center !important;
}
</style>
</head>

<body>
<?php  
		      $carat ='';
		      $chaws ='';
		      $drills ='';
		      $type ='';
		      $origin ='';
		      $quality ='';
		      $item_id = $id;
			  foreach($label_data as $value){
			   // print_r($value->filter_id);
	              if($value->filter_id == 4){
		        		$type = $value->filter_value;
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
		          if($value->filter_id == 5){
		        		$origin = $value->filter_value;
		          }
		          if($value->filter_id == 6){
		        		$quality = $value->filter_value;
		          }
		       }			       
	?>

        
	    <div style="display:inline-block;margin: 4% 0 4% 4%">
		<table  border="0"  width="90px" height="90px" style="margin-top: 0%;  margin-right: 0%;" >
			<tr>
				<td colspan="2" align="center" style="font-size:14px;line-height:50%;font-weight: 800;"><?=$item_id?></td>
			</tr>
			<tr>
				<td colspan="2" align="center" style="font-size:11px;line-height:50%;"><?=$type?></td>
			</tr>
			<!-- <tr>
				<td align="center"style="font-size:10px;line-height:60%;"><?=$origin?></td>
				<td align="center"style="font-size:10px;line-height:60%;">origin</td>
			</tr> -->
			<tr>
				<td align="center"style="font-size:10px;line-height:50%;text-align: right !important;padding-right: 12% !important;"><?=$carat?></td>
				<td align=""style="font-size:8px;line-height:50%; text-align: left !important; padding-left: 22% !important;">CT</td>
			</tr>
			
			<tr>
				<td style="font-size:10px;line-height:50%;text-align: right !important;padding-right: 12% !important;"><?=$chaws?></td>
				<td style="font-size:8px;line-height:50%;text-align: left !important; padding-left: 22% !important;">CHW</td>
			</tr>
			<tr>
				<td colspan="2" align="center"style="font-size:10px;line-height:50%;"><?=$origin?></td>
			</tr>
			<tr>
			   <td colspan="2" align="center" style="font-size:11px;line-height:50%;"><?=$quality?></td>
				<!-- <td align="center"style="font-size:8px;line-height:50%;text-align: right !important;padding-right: 12% !important;"><?=$quality?></td> -->
				<!-- <td align="center"style="font-size:10px;line-height:50%;text-align: left !important; padding-left: 22% !important;">Quality</td> -->
			</tr>
			<tr>
				<td colspan="2" align="center" style="font-size:10px; line-height:10%;margin-top:1%!important;"><?=$drills?></td>
			</tr>
		</table>
	   </div>
</body>
</html>
