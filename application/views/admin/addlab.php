<div class="container">
<div class="starter-template">
	<div class="jumbotron">
        <center><h1>Add Laboratory</h1>  </center>
    </div>

<?php
echo "<table>";
	echo form_open('admin/addLaboratory');
	echo "<tr>";
		echo "<td>Laboratory Name</td>";
		echo "<td>".form_input('lab','','class="form-control" placeholder="Laboratory Name" required')."</td>";
	echo "</tr>"; 	 	

	echo "<tr>";
		echo "<td>Room</td>";
		echo "<td>".form_input('room','','class="form-control" placeholder="Room" required')."</td>";
	echo "</tr>";	

	echo "<tr>";
		echo "<td>&nbsp;</td>";
		echo "<td>".form_submit('submit','Submit','class="form-control"');
	echo "</tr>";

	echo form_close();


?>