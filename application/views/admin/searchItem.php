<div class="container">
<?php echo br(4); ?>
<div class="panel panel-primary">
        <div class="panel-body">
        <?php 
        $attributes = array("class" => "form-horizontal", "role" => "form", "id" => "searchform", "name" => "searchform");
        echo form_open("item_admin/ItemSearch", $attributes);?>
            <div class="form-group">
                <div class="col-md-6" style="margin-left:20%">
                    <input class="form-control" id="name_search" name="name_search" placeholder="Search for Item Name" type="text" value="<?php echo set_value('name_search'); ?>" />
                </div>
                <div>
                    <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="Search"/>
                    <!--<a href="<?php //echo base_url(). "index.php/inventory/index"; ?>" class="btn btn-default">Show All</a> -->
                </div>
            </div>
        <?php echo form_close(); ?>
        </div>
    </div>



<div class="starter-template">
	
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Item Code</th>
                  <th>Item Name</th>
                  <th>Description</th>
                  <th>Previous Status</th>
                  <th>Current Status</th>
                  <th>Serial Number</th>
                  <th>Part Number</th>
                  <th>Manufacture Number</th>
                  <th>Date Acquired</th>
                  <th>Remarks</th>
                  <th>Total Quantity</th>
                  <th>Available Quantity</th>
                  <th>Damaged Quantity</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>

              <?php for ($i = 0; $i < count($x); ++$i) { ?>
                <tr>
                    <td><?php echo $i+1?></td>
                    <td><?php echo $x[$i]->code; ?></td>
                    <td><?php echo $x[$i]->name; ?></td>
                    <td><?php echo $x[$i]->description; ?></td>
                    <td><?php echo $x[$i]->previousstatus; ?></td>
                    <td><?php echo $x[$i]->currentstatus; ?></td>
                    <td><?php echo $x[$i]->serialnumber; ?></td>
                    <td><?php echo $x[$i]->partnumber; ?></td>
                    <td><?php echo $x[$i]->manufacturenumber; ?></td>
                    <td><?php echo $x[$i]->dateacquired; ?></td>
                    <td><?php echo $x[$i]->remarks; ?></td>
                    <td><?php echo $x[$i]->totalquantity; ?></td>
                    <td><?php echo $x[$i]->availablequantity; ?></td>
                    <td><?php echo $x[$i]->damagedquantity; ?></td>
                  

                    
                </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>
   </div>
</div><!-- /.container -->


