<div class="container">
<div class="starter-template">
	<div class="jumbotron">
        <center><h1>Add User</h1>  </center>
    </div>
  <ul class="nav nav-tabs">
  <li role="presentation" class="active"><?php echo anchor('admin/aUser','Admin');?></li>
  <li role="presentation" ><?php echo anchor('admin/LUser','Lab Head');?></li>
  <li role="presentation"><?php echo anchor('admin/stUser','Staff');?></li>
</ul>
<?php echo $this->session->flashdata('msg');?>
<?php
                      
echo "<table>";
	echo form_open('admin/adduser');

	echo "<tr>";
		echo "<td>ID NUMBER</td>";
		echo "<td>".form_input('idnum','','class="form-control" placeholder="ID NUMBER" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>LASTNAME</td>";
		echo "<td>".form_input('lname','','class="form-control" placeholder="LAST NAME" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>FIRST NAME</td>";
		echo "<td>".form_input('fname','','class="form-control" placeholder="FIRST NAME" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>MIDDLE NAME</td>";
		echo "<td>".form_input('mname','','class="form-control" placeholder="MIDDLE NAME" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>DEPARTMENT</td>";
		echo form_hidden('owner','DCpE','class="form-control"  required');
		echo "<td>".form_input('owner','DCpE','class="form-control" disabled  required')."<td>";
	echo "</tr>";
    
    echo "<tr>";
		echo "<td>USERNAME</td>";
		echo "<td>".form_input('name','','class="form-control" placeholder="USERNAME" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>PASSWORD</td>";
		echo "<td>".form_password('pass','','class="form-control" placeholder="PASSWORD" required')."<td>";
	echo "<tr>";

	echo "<tr>";
		echo "<td>&nbsp;</td>";
		echo "<td>".form_submit('submit','ADD USER','class="form-control"');
	echo "</tr>";

	echo form_close();
echo "</table>";

?>