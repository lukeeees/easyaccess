<div class="container">
<?php echo br(4); ?>
<div class="panel panel-primary">
        <div class="panel-body">
        <?php 
        $attributes = array("class" => "form-horizontal", "role" => "form", "id" => "searchform", "name" => "searchform");
        echo form_open("item_admin/ItemSearch", $attributes);?>
            <div class="form-group">
                <div class="col-md-6" style="margin-left:20%">
                    <input class="form-control" id="name_search" name="name_search" placeholder="Search Item" type="text" value="<?php echo set_value('name_search'); ?>" />

                    
                </div>
                <div>
                    <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="Search"/>
                    <!--<a href="<?php //echo base_url(). "index.php/inventory/index"; ?>" class="btn btn-default">Show All</a> -->

                    
                         
                          <?php
                            $data = array(
                                      'name'  => 'By Item Name',
                                      'owner' => 'By Laboratory',
                                      'code'  => 'By Item Code'
                            );

                            echo form_dropdown('searchBy',$data,set_value('searchBy'));
                   
                          ?>
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
                  <th>Remarks</th>
                  <th>Total Quantity</th>
                  <th>Available Quantity</th>
                  <th>Damaged Quantity</th>
                  <th>Owner</th>
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
                    <td><?php echo $x[$i]->remarks; ?></td>
                    <td><?php echo $x[$i]->totalquantity; ?></td>
                    <td><?php echo $x[$i]->availablequantity; ?></td>
                    <td><?php echo $x[$i]->damagedquantity; ?></td>
                    <td><?php echo $x[$i]->owner; ?></td>
                    <td><?php echo anchor('item_admin/UpdateItem/'.$x[$i]->code,'<button class="btn-xs btn-success">Update</button>');?>
                   <?php 
                   $atts = array(
        'width'       => 800,
        'height'      => 600,
        'scrollbars'  => 'yes',
        'status'      => 'yes',
        'resizable'   => 'yes',
        'screenx'     => 0,
        'screeny'     => 0,
        'window_name' => '_blank'
);
                   echo  anchor_popup('charts/graph_Sitem/'.$x[$i]->code,'<button class="btn-xs">Show Statistics</button>',$atts);
                    ?></td>
                </tr>
                <?php } ?>

              </tbody>
            </table>
         <?php echo  anchor_popup('charts/graph_item/','<button class="btn-xs">Show Statistics</button>',$atts);?>
          </div>
   </div>
</div><!-- /.container -->


