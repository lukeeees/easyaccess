<div class="container">
<div class="starter-template">
	<div class="jumbotron">
        <center><h1>Update Item</h1>  </center>
    </div>

     <?php
      foreach ($x->result() as $key) {
    echo "<table>";
      echo form_open('item_admin/ItemUpdate');
  echo form_hidden('id',$this->uri->segment(3));
 
	echo "<tr>";
		echo "<td>Item Name</td>";
		echo "<td>".form_input('itemname',$key->name,'class="form-control"required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Description</td>";
		echo "<td>".form_input('description',$key->description,'class="form-control"required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Previous Status</td>";
		echo "<td>".form_input('previousstatus',$key->previousstatus,'class="form-control"required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Current Status</td>";
		echo "<td>".form_input('currentstatus',$key->currentstatus,'class="form-control"required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Serial Number</td>";
		echo "<td>".form_input('serialnumber',$key->serialnumber,'class="form-control"required')."</td>";
	echo "<tr>";

	echo "<tr>";
		echo "<td>Part Number</td>";
		echo "<td>".form_input('partnumber',$key->partnumber,'class="form-control"required')."</td>";
	echo "<tr>";

	echo "<tr>";
		echo "<td>Manufacture Number</td>";
		echo "<td>".form_input('manufacturenumber',$key->manufacturenumber,'class="form-control"required')."</td>";
	echo "<tr>";

	echo "<tr>";
		echo "<td>Date Acquired</td>";
		echo '<td><input name = "dateacquired" class="form-control" type="date" value = "'.$key->dateacquired.'" required><td>';
	echo "<tr>";
	
	echo "<tr>";
		echo "<td>Remarks</td>";
		echo "<td>".form_input('remarks',$key->remarks,'class="form-control"required')."</td>";
	echo "<tr>";

	echo "<tr>";
		echo "<td>Total Quantity</td>";
		echo "<td>".form_input('totalquantity',$key->totalquantity,'class="form-control"required')."</td>";
	echo "<tr>";

	echo "<tr>";
		echo "<td>Available Quantity</td>";
		echo "<td>".form_input('availablequantity',$key->availablequantity,'class="form-control"required')."</td>";
	echo "<tr>";

	echo "<tr>";
		echo "<td>Damaged Quantity</td>";
		echo "<td>".form_input('damagedquantity',$key->damagedquantity,'class="form-control"required')."</td>";
	echo "<tr>";

	echo "<tr>";
		echo "<td>Owner</td>";
		echo form_hidden('owner','DCpE','class="form-control"  required');
		echo "<td>".form_input('hjk','DCpE','class="form-control" disabled  required')."<td>";
	echo "<tr>";

 
    
    echo "<td>".form_submit('submit','Update User','class="form-control"');
 

  echo form_close();
echo "</table>";
}
?>
