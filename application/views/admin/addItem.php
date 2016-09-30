<div class="container">
<div class="starter-template">
	<div class="jumbotron">
        <center><h1>Add Item</h1>  </center>
    </div>
<?php
echo @$msg;                       
echo "<table>";
	echo form_open('item/addItem_admin');

	echo "<tr>";
		echo "<td>Id Number</td>";
		echo "<td>".form_input('idnum','','class="form-control" placeholder="Id Number" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Username</td>";
		echo "<td>".form_input('name','','class="form-control" placeholder="Username" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Last Name</td>";
		echo "<td>".form_input('lname','','class="form-control" placeholder="Last Name" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>First Name</td>";
		echo "<td>".form_input('fname','','class="form-control" placeholder="First Name" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Middle Name</td>";
		echo "<td>".form_input('mname','','class="form-control" placeholder="Middle Name" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Password</td>";
		echo "<td>".form_password('pass','','class="form-control" placeholder="Password" required')."<td>";
	echo "<tr>";

	echo "<tr>";
<<<<<<< HEAD
		echo "<td>Part Number</td>";
		echo "<td>".form_input('partNumber','','class="form-control" placeholder="Part Number" required')."<td>";
	echo "<tr>";

	echo "<tr>";
		echo "<td>Manufacture Number</td>";
		echo "<td>".form_input('manufactureNumber','','class="form-control" placeholder="Manufacture Number" required')."<td>";
	echo "<tr>";

	echo "<tr>";
		echo "<td>Date Acquired</td>";
		echo '<td><input type="date" name="dateAcquired"><td>';
	echo "<tr>";
	
	echo "<tr>";
		echo "<td>Remarks</td>";
		echo "<td>".form_input('remarks','','class="form-control" placeholder="Remarks" required')."<td>";
	echo "<tr>";

	echo "<tr>";
		echo "<td>Total Quantity</td>";
		echo "<td>".form_input('totalQuantity','','class="form-control" placeholder="Total Quantity" required')."<td>";
	echo "<tr>";

	echo "<tr>";
		echo "<td>Available Quantity</td>";
		echo "<td>".form_input('availableQuantity','','class="form-control" placeholder="Available Quantity" required')."<td>";
	echo "<tr>";
=======
		echo "<td>Department</td>";
		$arrayName = array('CPE'	 => 	'Computer Engineering',
						   'CE'		 =>		'Civil Engineering',
						   'CHE'	 =>		'Chemical Engineering',
						   'EEE'	 =>		'Electrical and Electronics Engineering',
						   'IE'		 =>		'Industrial Engineering',
						   'ME'		 =>		'Mechanical Engineering');
		echo "<td>".form_dropdown('department',$arrayName,'class="form-control" placeholder="Department"')."</td>";
	echo "</tr>";
>>>>>>> origin/master

	echo "<tr>";
		echo "<td>&nbsp;</td>";
		echo "<td>".form_submit('submit','add user','class="form-control"');
	echo "</tr>";

	echo form_close();
echo "</table>";

?>