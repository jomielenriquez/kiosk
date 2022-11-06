<?php
include 'db_connection.php';
$conn = OpenCon();
echo "Connected Successfully";
CloseCon($conn);
?>


<?php
include("parameter.php");
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
 <div class="row">
   <div class="col-sm-8">
    
    <div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr><th>S.N</th>
				<th>Parameter ID</th>
				<th>Parameter</th>
				<th>Parameter Value test</th>
			</thead>
			<tbody>
			<?php
			if(is_array($fetchData)){      
				$sn=1;
				foreach($fetchData as $data){
				?>
					<tr>
					<td><?php echo $sn; ?></td>
					<td><?php echo $data['paraid']??''; ?></td>
					<td><?php echo $data['parameter']??''; ?></td>
					<td><?php echo $data['paravalue']??''; ?></td>
					</tr>
					<?php
					$sn++;
				}
			}else{ ?>
				<tr><td colspan="8">
				<?php echo $fetchData; ?>
				</td>
				<tr>
			<?php
			}?>
			</tbody>
		</table>
	</div>
</div>
</div>
</div>
</body>
</html>
