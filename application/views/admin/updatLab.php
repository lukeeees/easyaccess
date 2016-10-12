<div class="container">
<div class="starter-template">
	<div class="jumbotron">
        <center><h1>Update Laboratory</h1>  </center>
    </div>

     <?php
      foreach ($x as $key) {
    echo "<table>";
      echo form_open('admin/LabUpdate');
  echo form_hidden('id',$this->uri->segment(3));

  	echo "<tr>";
		echo "<td>".form_hidden('code',$key->code,'class="form-control" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Laboratory Name</td>";
		echo "<td>".form_input('name',$key->name,'class="form-control"required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Room</td>";
		echo "<td>".form_input('room',$key->room,'class="form-control"required')."</td>";
	echo "</tr>";


 
    
    echo "<td>".form_submit('submit','Update Laboratory','class="form-control"');
 

  echo form_close();
echo "</table>";
}
?>
