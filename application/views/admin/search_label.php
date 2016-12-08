<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>

	
	<style>
		div {
		
		    width:86.5px;
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
		$item_id = '';
		$total = count($data)+1 ;
		foreach($data as $key => $value){
			$item_id = $key;
			foreach ($value as  $val) {
				$count = 0;
				for($i=0; $i < $total; $i++) { 

					$count++;
					if($count == 6){
						echo "<br>";$count = 1;
					}else{
						$count = '';
					}
					if($val->filter_id == 4){ 
						$type = $val->filter_value;
					}
					if($val->filter_id == 20){
						$carat = $val->filter_value;
					}
					if($val->filter_id == 22){
						$chaws = $val->filter_value;
					}
					if($val->filter_id == 7){
						$drills = $val->filter_value;
					}
					if($val->filter_id == 5){
						$origin = $val->filter_value;
					}
					if($val->filter_id == 6){
						$quality = $val->filter_value;
					}
				}
			}

	?>
	

<div style="margin: 0 2% 2%;display:inline-block">
	
			<table  border="0"  width="90px" height="90px" style="margin-top: 0%;  margin-right: 0%;display:inline-table;" >
				<tr>
					<td colspan="2" align="center" style="font-size:14px;line-height:50%;font-weight: 800;"><?=$item_id?></td>
				</tr>
				<tr>
					<td colspan="2" align="center" style="font-size:11px;line-height:50%;"><?=$type?></td>
				</tr>
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
				</tr>
				<tr>
					<td colspan="2" align="center" style="font-size:10px; line-height:10%;"><?=$drills?></td>
				</tr>
			</table>

			</div>
<?php } ?>
	
	<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
	
</body>
</html>
