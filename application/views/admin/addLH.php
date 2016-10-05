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
		echo "<td>ID Number</td>";
		echo "<td>".form_input('idnum','','class="form-control" placeholder="ID NUMBER" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Last Name</td>";
		echo "<td>".form_input('lname','','class="form-control" placeholder="LAST NAME" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>First Name</td>";
		echo "<td>".form_input('fname','','class="form-control" placeholder="FIRST NAME" required')."</td>";
	echo "</tr>";

 	echo "<tr>";
		echo "<td>Middle Name</td>";
		echo "<td>".form_input('mname','','class="form-control" placeholder="MIDDLE NAME" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td><label>Station</label></td>";
				/*$arrayName = array('DCpE'	 	=> 	'Department of Computer Engineering',
								   'CEAC LAB'	=>	'CEAC LABORATORY',
								   'CISCO LAB'	=>	'CISCO LABORATORY',
								   'CN LAB'	 	=>	'CN LABORATORY',
								   'DM LAB'		=>	'DM LABORATORY',
								   'NCR LAB'	=>	'NCR LABORATORY',
								   'PCB LAB'	=>	'PCB LABORATORY',
								   'SE LAB'		=>	'SE LABORATORY');*/
		$values=array();
		array_push($values,'Department of Computer Engineering');
		foreach ($laboratory as $key) {
			# code...
			array_push($values,$key->name);
		}
		

		echo '<div class="form-group">';
		echo "<td>".form_dropdown('department',$values,'class="form-control" multiple')."</td>";
		echo "</div>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Password</td>";
		echo "<td>".form_password('pass','','class="form-control" placeholder="PASSWORD" required')."<td>";
	echo "<tr>";

	echo "<tr>";
		echo "<td>Username</td>";
		echo "<td>".form_input('name','','class="form-control" placeholder="USERNAME" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>&nbsp;</td>";
		echo "<td>".form_submit('submit','ADD LAB Head','class="form-control"');
	echo "</tr>";

	echo form_close();
echo "</table>";
?>