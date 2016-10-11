<div class="container">
<div class="starter-template">
	<div class="jumbotron">
        <center><h1>Add Item</h1>  </center>
    </div>
    <?php echo $this->session->flashdata('msg');?>
<?php
echo @$msg;                       
echo "<table>";
	echo form_open('item_admin/ItemAdd');

	echo "<tr>";
		echo "<td>Item Name</td>";
		echo "<td>".form_input('itemName','','class="form-control" placeholder="Item Name" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Description</td>";
		echo "<td>".form_input('description','','class="form-control" placeholder="Descriptiion" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Previous Status</td>";
		echo "<td>".form_input('previousStatus','','class="form-control" placeholder="Previous Status" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Current Status</td>";
		echo "<td>".form_input('currentStatus','','class="form-control" placeholder="Current Status" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Serial Number</td>";
		echo "<td>".form_input('serialNumber','','class="form-control" placeholder="Serial Number" required')."<td>";
	echo "<tr>";

	echo "<tr>";
		echo "<td>Part Number</td>";
		echo "<td>".form_input('partNumber','','class="form-control" placeholder="Part Number" required')."<td>";
	echo "<tr>";

	echo "<tr>";
		echo "<td>Manufacture Number</td>";
		echo "<td>".form_input('manufactureNumber','','class="form-control" placeholder="Manufacture Number" required')."<td>";
	echo "<tr>";

	echo "<tr>";
		echo "<td>Date Acquired</td>";
		echo '<td><input name = "dateAcquired" class="form-control" type="date" placeholder="Date Acquired" required><td>';
	echo "<tr>";
	
	echo "<tr>";
		echo "<td>Remarks</td>";
		$remarksarr = array('consumable'=>"Consumable", 'non-consumable'=>"Non-Consumable");
		echo "<td>".form_dropdown('remarks',$remarksarr,'','class="form-control"')."</td>";
	echo "<tr>";

	echo "<tr>";
		echo "<td>Total Quantity</td>";
		$totalQuantity = array('name'=>'totalQuantity','type'=>'number');
		echo "<td>".form_input($totalQuantity,'','class="form-control" placeholder="Total Quantity" required')."<td>";
	echo "<tr>";

	echo "<tr>";
		echo "<td>Available Quantity</td>";
		$availableQuantity = array('name'=>'availableQuantity','type'=>'number');
		echo "<td>".form_input($availableQuantity,'','class="form-control" placeholder="Available Quantity" required')."<td>";
	echo "<tr>";

	echo "<tr>";
		echo "<td>Damaged Quantity</td>";
		$damagedQuantity = array('name'=>'damagedQuantity','type'=>'number');
		echo "<td>".form_input($damagedQuantity,'','class="form-control" placeholder="Damaged Quantity" required')."<td>";
	echo "<tr>";

	echo "<tr>";
		echo "<td>Custodian</td>";
		echo "<td>".form_input('custodian','','class="form-control" placeholder="Custodian" required')."<td>";
	echo "<tr>";

	if($this->session->userdata('type')=="admin"):
		echo "<tr>";
			//echo "<td>Owner</td>";
			echo form_hidden('owner','DCpE','class="form-control"  required');
			//echo "<td>".form_input('owner','DCpE','class="form-control" disabled  required')."<td>";
		echo "<tr>";
	else:
		echo "<tr>";
			//echo "<td>Owner</td>";
			echo form_hidden('owner',$this->session->userdata('lab'),'class="form-control"  required');
			//echo "<td>".form_input('owner',$this->session->userdata('lab'),'class="form-control" disabled  required')."<td>";
		echo "<tr>";
	endif;


//echo "<tr><td><button type='button' class='btn-xl btn-danger'>Submit</button></td></tr>";
	echo "<tr><td>".form_submit('submit','submit','class="form-control"')."</td></tr>";
	echo form_close();
echo "</table>";



?>