<div class="container">
<div class="starter-template">
	<div class="jumbotron">
        <center><h1>Add User</h1>  </center>
    </div>
  <ul class="nav nav-tabs">
  <li role="presentation" class="active"><?php echo anchor('admin/aUser','Admin');?></li>
  <li role="presentation" ><?php echo anchor('admin/LUser','Laboratory Head');?></li>
  <li role="presentation"><?php echo anchor('admin/stUser','Staff');?></li>
 </ul>
<?php echo $this->session->flashdata('msg');?>
<?php
                      
echo "<table>";
	echo form_open('admin/adduser');

	echo "<tr>";
		echo "<td>ID Number</td>";
		echo "<td>".form_input('idnum','','class="form-control" placeholder="ID Number" required')."</td>";
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
		echo "<td>Department</td>";
	echo "<td>".form_input('owner',$this->session->userdata('lab'),'class="form-control" disabled  required')."<td>";
		echo form_hidden('owner',$this->session->userdata('lab'),'class="form-control"  required');
		
		//echo form_hidden('department','DCpE','class="form-control"  required');
		//echo "<td>".form_input('department','DCpE','class="form-control" disabled  required')."<td>";
		//	echo "<td>".form_input('department','','class="form-control" placeholder="Department"')."</td>";
	echo "</tr>";
    
    echo "<tr>";
		echo "<td>Username</td>";
		echo "<td>".form_input('name','','class="form-control" placeholder="Username" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Password</td>";
		echo "<td>".form_password('pass','','class="form-control" placeholder="Password" required')."<td>";
	echo "<tr>";

	echo "<tr>";
		echo "<td>&nbsp;</td>";
		echo "<td>".form_submit('submit','Add User','class="form-control"');
	echo "</tr>";

	echo form_close();
echo "</table>";

?>