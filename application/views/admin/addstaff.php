<div class="container">
<div class="starter-template">
	<div class="jumbotron">
        <center><h1>Add User</h1>  </center>
    </div>
  <ul class="nav nav-tabs">
  	<?php if($this->session->userdata('type')=="admin"): ?>
  		<li role="presentation"><?php echo anchor('admin/aUser','Admin');?></li>
  		<li role="presentation" ><?php echo anchor('admin/LUser','Lab Head');?></li>
  	<?php endif ?>  
  <li role="presentation" class="active"><?php echo anchor('admin/stUser','Staff');?></li>
</ul>
<?php echo $this->session->flashdata('msg');?>
<?php
echo @$msg;                       
echo "<table>";
	echo form_open('admin/addStaff');

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
		echo "<td>Department/Laboratory</td>";
				$values=array();

      	foreach ($laboratory as $key) {    
      		if($this->session->userdata('type')=="head")
      		{
      			if(strtolower($key->name )== strtolower($this->session->userdata('lab')))  
	        		$values[$key->name] = $key->name;
      		}      	
      		else
      		{
	        	$values[$key->name] = $key->name;
      		}	
      	}  
		

		echo '<div class="form-group">';
		echo "<td>".form_dropdown('department',$values,'','class="form-control"')."</td>";
		echo "</div>";
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
		echo "<td>".form_submit('submit','ADD STAFF','class="form-control"');
	echo "</tr>";

	echo form_close();
echo "</table>";

?>