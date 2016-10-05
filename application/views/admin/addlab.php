<div class="container">
<div class="starter-template">
	<div class="jumbotron">
        <center><h1>Add Laboratory</h1>  </center>
    </div>

<?php
echo "<table>";
	echo form_open('admin/addLaboratory');
	echo "<tr>";
		echo "<td>LABOATORY NAME</td>";
		echo "<td>".form_input('labname','','class="form-control" placeholder="LABORATORY NAME" required')."</td>";
	echo "</tr>"; 	 	

	echo "<tr>";
		echo "<td>ROOM</td>";
		echo "<td>".form_input('room','','class="form-control" placeholder="ROOM" required')."</td>";
	echo "</tr>";

	/*echo "<tr>";
		echo "<td>Assign Laboratory Head</td>";
		echo "<td>".$row['laboratory']."</td>";
	echo "</tr>";*/

	/*echo "<tr>";
		echo "<td>Status</td>";
		$arrayName = array('Active'	 => 	'Active',
						   'Non-Active'	 =>		'Non-Active');		   
						   
		echo "<td>".form_dropdown('status',$arrayName,'class="form-control" placeholder="Status"')."</td>";
	echo "</tr>";*/

	

	echo "<tr>";
		echo "<td>&nbsp;</td>";
		echo "<td>".form_submit('submit','ADD LABORATORY','class="form-control"');
	echo "</tr>";

	echo form_close();


?>