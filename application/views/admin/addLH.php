<div class="container">
<div class="starter-template">
	<div class="jumbotron">
        <center><h1>Add User</h1>  </center>
    </div>
  <ul class="nav nav-tabs">
  <li role="presentation"><?php echo anchor('admin/aUser','Admin');?></li>
  <li role="presentation" class="active"><?php echo anchor('admin/LUser','Lab Head');?></li>
  <li role="presentation"><?php echo anchor('admin/stUser','Staff');?></li>
</ul>
<?php
 echo $this->session->flashdata('msg');                     
echo "<table>";
	echo form_open('admin/addLH');

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
		echo "<td>Department</td>";
				$arrayName = array('CPE'	 => 	'Computer Engineering',
						   'CE'		 =>		'Civil Engineering',
						   'CHE'	 =>		'Chemical Engineering',
						   'EEE'	 =>		'Electrical and Electronics Engineering',
						   'IE'		 =>		'Industrial Engineering',
						   'ME'		 =>		'Mechanical Engineering');
		echo "<td>".form_dropdown('department',$arrayName,'class="form-control" placeholder="Department"')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>&nbsp;</td>";
		echo "<td>".form_submit('submit','add user','class="form-control"');
	echo "</tr>";

	echo form_close();
echo "</table>";

?>