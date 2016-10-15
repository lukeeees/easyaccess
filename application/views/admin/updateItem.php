<div class="container">
<div class="starter-template">
	<div class="jumbotron">
        <center><h1>Update Item</h1>  </center>
    </div>


  <?php
      foreach ($x->result() as $key) { 
      ?>

      <?php
	  echo form_hidden('id',$this->uri->segment(3)); 
      echo form_hidden('code',$key->code,'class="form-control" required'); ?>

<form action="../ItemUpdate" method="POST">
			<div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                      <label>Item Name</label>
                      <input value="<?php echo $key->name?>" type="text" name = "itemName" id = "itemName" class = "form-control" required placeholder="Item Name"></input>
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <textarea  name="description" class="form-control" rows="5" id="description"><?php echo $key->description?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Previous Status</label>
                      <input value="<?php echo $key->previousstatus?>"type="text" name = "previousStatus" id = "previousStatus" class = "form-control" required placeholder="Previous Status"></input>
                    </div>
                    <div class="form-group">
                      <label>Current Status</label>
                      <input value="<?php echo $key->currentstatus?>" type="text" name = "currentStatus" id = "currentStatus" class = "form-control" required placeholder="Current Status"></input>
                    </div>
                    <div class="form-group">
                      <label>Item Type</label>
                      <?php $arrayName = array(  'consumable'      =>   'Consumable',
                                                 'non-consumable'  =>   'Non-Consumable');
                      echo form_dropdown('itemType',$arrayName,$key->itemtype,'class="form-control" placeholder="Item Type"'); ?>
                    </div>
                   <div class="form-group">

                   		<input type="submit" value="Submit" name="addItembtn" class="btn btn-primary">
                	</div>
                </div>

                 <div class="column">
                <div class="col-sm-6">
                    <div class="form-group">
                      <label>Serial Number</label>
                      <input value="<?php echo $key->serialnumber?>" type="text" name = "serialNumber" id = "serialNumber" class = "form-control" required placeholder="Serial Number"></input>
                    </div>
                    <div class="form-group">
                      <label>Part Number</label>
                      <input value="<?php echo $key->partnumber?>" type="text" name = "partNumber" id = "partNumber" class = "form-control" required placeholder="Part Number"></input>
                    </div>
                    <div class="form-group">
                      <label>Manufacturer Number</label>
                      <input value="<?php echo $key->manufacturenumber?>" type="text" name = "manufactureNumber" id = "manufacturerNumber" class = "form-control" required placeholder="Manufacturer Number"></input>
                    </div>
                    <div class="form-group">
                      <label>Date Acquired</label>
                      <input value="<?php echo $key->dateacquired?>" type="date" name = "dateAcquired" id = "dateAcquired" class = "form-control" required></input>
                    </div>
                    <div class="form-group">
                      <label>Expiration Date</label>
                      <input value="<?php echo $key->expirationdate?>" type="date" name = "expirationDate" id = "exirationDate" class = "form-control"></input>
                    </div>
                    <div class="form-group">
                      <label>Custodian</label>
                      <input value="<?php echo $key->custodian?>" type="text" name = "custodian" id = "custodian" class = "form-control" placeholder="Custodian" required></input>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                      <label>Total Quantity</label>          
                      <input value="<?php echo $key->totalquantity?>" min="0" type="number" name = "totalQuantity" id = "totalQuantity" class = "form-control" required placeholder="Total Quantity"></input>
                    </div>
                    <div class="form-group">
                      <label>Available Quantity</label>
                      <input value="<?php echo $key->availablequantity?>" min="0" type="number" name = "availableQuantity" id = "availableQuantity" class = "form-control" required placeholder="Available Quantity"></input>
                    </div>
                    <div class="form-group">
                      <label>Damaged Quantity</label>
                      <input value="<?php echo $key->damagedquantity?>" min="0" type="number" name = "damagedQuantity" id = "damagedQuantity" class = "form-control" required placeholder="Damaged Quantity"></input>
                    </div>
                    <div class="form-group">
                      <label>Remarks</label>
                      <textarea placeholder="Remarks" name="remarks" class="form-control" rows="9" id="comment"><?php echo $key->remarks?></textarea>
                    </div>
					<div class="form-group">
					<?php 
							if($this->session->userdata('type')=="admin"):
								echo "<tr>";
									//echo "<td>Owner</td>";
									echo form_hidden('owner',$this->session->userdata('lab'),'class="form-control"  required');
									//echo "<td>".form_input('owner','DCpE','class="form-control" disabled  required')."<td>";
								echo "<tr>";
							else:
								echo "<tr>";
									//echo "<td>Owner</td>";
									echo form_hidden('owner',$this->session->userdata('lab'),'class="form-control"  required');
									//echo "<td>".form_input('owner',$this->session->userdata('lab'),'class="form-control" disabled  required')."<td>";
								echo "<tr>";
							endif;                      		
                    ?>
                    </div>         
                </div>
              
               </div>
             </div>  
</form>

<?php } ?>

 