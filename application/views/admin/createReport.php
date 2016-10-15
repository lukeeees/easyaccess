<div class="container">
<div class="starter-template">
	<div class="jumbotron">
        <center><h1 id="head">Create Report for <?php echo $this->session->userdata('lab');?></h1>  </center>
    </div>

<form id="selrem" action="" method="POST">
	<input type="hidden" name="con" value="">
</form>
<div id="printing">

<?php
echo @$msg;                       
echo "<table id='tableReport' class='table1'>";
	echo form_open('inventory_admin/AddInventoryToDB');	
	echo "<tr>";
		echo "<td class='label1'>Department:</td>";		
		echo form_hidden('department','COMPUTER ENGINEERING','class="form-control1" required ');
		echo "<td>".form_input('department1','COMPUTER ENGINEERING',' disabled  class="form-control1" required')."<td>";

		echo "<td></td>";
		echo "<td></td>";

		echo "<td class='label2'>Campus:</td>";
		echo form_hidden('campus','Talamban Campus','  class="form-control1" required');
		echo "<td>".form_input('campus1','Talamban Campus',' disabled class="form-control1" required')."<td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td class='label1'>Department Head:</td>";
		echo "<td>".form_input('departmenthead','',' placeholder="Department Head" class="form-control1" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td class='label1'>Building Name:</td>";
		echo form_hidden('buildingname','BUNZEL',' class="form-control1 required');
		echo "<td>".form_input('buildingName1','BUNZEL',' disabled  class="form-control2" required')."<td>";
	
		echo "<td class='label3'>Floor</td>";
		echo "<td>".form_input('floor','',' placeholder="Floor" class="form-control2" required')."</td>";

		echo "<td class='label1'>Inventory Date</td>";
		date_default_timezone_set("Asia/Manila");
		echo form_hidden('inventorydate',''.date("Y").'-'.date("m").'-'.date("d").'','  class="form-control1" required');
		echo form_hidden('csvFilename',''.date("F").'_'.date("d").'_'.date("Y").'_'.date("h").'_'.date("i").'_'.date("s").'','  class="form-control1" required');
		echo "<td>".form_input('inventorydate1',''.date("F").' '.date("d").', '.date("Y").'',' disabled  class="form-control1" required')."<td>";

	echo "</tr>";
	echo form_hidden('laboratory',$this->session->userdata('lab'));
	echo "<tr>";
		echo "<td class='label1'>Room: No./Name</td>";
		echo "<td>".form_input('laboratory',$this->session->userdata('lab'),'placeholder="Room No./Name" class="form-control1" required disabled')."<td>";
		echo "<td></td>";
		echo "<td></td>";
		echo "<td></td>";
		echo "<td></td>";

	echo "</tr>";

	echo "<tr>";
		echo "<td class='label1'>Custodian/Accountable Officer:</td>";
		echo "<td>".form_input('custodian','','placeholder="Custodian" class="form-control1" required')."<td>";

		echo "<td></td>";
		echo "<td></td>";

		echo "<td class='label2'>Position:</td>";
		echo "<td>".form_input('position','','placeholder="Position" class="form-control1" required')."<td>";
	echo "</tr>";
?>
<tr>
	<td class="label1">
		Items To Display
	</td>
	<td>		
		<select class="form-control1" name="remarks">
			<option value="" <?php if($con==""){echo "selected";} ?>>View all</option>
			<option value="consumable" <?php if($con=="consumable"){echo "selected";} ?>>Consumable</option>
			<option value="non-consumable" <?php if($con=="non-consumable"){echo "selected";} ?>>Non-Consumable</option>
		</select>
	</td>
</tr>
<div id="dataprint">
            <table  id="dataprinttable" class="table table-striped">
              <thead >
                <tr>
                  
                  <th>Item Code</th>
                  <th>Available Quantity</th>
                  <th>Item Name</th>
                  <th>Description</th>
                  <th>Serial Number</th>
                  <th>Date Acquired</th>
                  <th>Custodian</th>
                  <th>Remarks</th>
                  
                </tr>
              </thead>
              <tbody>

              <?php for ($i = 0; $i < count($x); ++$i) { ?>
                <tr>
                    
                    <td><?php echo $x[$i]->code; ?></td>
                    <td><?php echo $x[$i]->availablequantity; ?></td>
                    <td><?php echo $x[$i]->name; ?></td>
                    <td><?php echo $x[$i]->description; ?></td>
                    <td><?php echo $x[$i]->serialnumber; ?></td>
                    <td><?php echo date("d-m-Y",strtotime($x[$i]->dateacquired)); ?></td>         
                    <td><?php echo $x[$i]->custodian; ?></td>
                    <td><?php echo $x[$i]->currentstatus; ?></td>
                    
                </tr>
                <?php } ?>

              </tbody>
            </table>
</div>

</div>

<?php


echo "</table>";

echo "<table id='tableReport'>";
	echo "<tr>";
		echo "<td>Prepared By:</td>";
		echo "<td>".form_input('preparedby','',' placeholder="Prepared By" class="form-control1" required')."</td>";

		echo "<td width='100px'></td>";
		echo "<td width='100px'></td>";

		echo "<td>Approved By:</td>";
		echo "<td>".form_input('approvedby','',' placeholder="Approved By" class="form-control1" required')."</td>";
	echo "</tr>";
echo "</table>";

echo "<input type='hidden' name='con' value='".$con."'>";  
echo form_submit('submit','Submit','class="form-control"');
echo form_close();

?>
<script type="text/javascript">
	$(function(){
		$('select[name=remarks]').change(function(){
			$('#selrem input[name=con]').val($(this).val());
			$('#tableReport input[name=con2]').val($(this).val());
			$('#selrem').submit();
		});
	});
</script>