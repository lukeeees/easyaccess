<div class="container">
<?php echo br(4); ?>
<div class="panel">
        <div class="panel-body">
        <?php 
        $attributes = array("class" => "form-horizontal", "role" => "form", "id" => "searchform", "name" => "searchform");
        echo form_open("item_admin/ItemSearch", $attributes);?>
            <div class="form-group">
                <div class="col-md-4 col-sm-offset-2" style="padding:0;">
                    <input class="form-control" id="name_search" name="name_search" placeholder="Search Item" type="text" value="<?php echo set_value('name_search'); ?>" />         
                </div>
                <div class="col-xs-3">
                                       
                         
                          <?php
                          if($this->session->userdata('type')=="admin")
                          {
                            $data = array(
                                      'name'  => 'By Item Name',
                                      'owner' => 'By Laboratory',
                                      'code'  => 'By Item Code'
                            );
                          }
                          else
                          {
                            $data = array(
                                      'name'  => 'By Item Name',
                                      'code'  => 'By Item Code'
                            );
                          }
                            

                            echo form_dropdown('searchBy',$data,set_value('searchBy'),'class="form-control"');
                   
                          ?>
                </div>
                <div class="col-xs-2" style="padding:0;">
                  <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="Search"/>
                </div>

            </div>
        <?php echo form_close(); ?>
        </div>
</div>

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
 ?>

<div class="starter-template">
    <?php if (!$x): ?>
        <h2 style="margin-top:50px;text-align:center">No Item/s Found</h2>
    <?php else: ?>
        <?php echo $this->session->flashdata('msg'); ?>        
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      
                      <th>Item Code</th>
                      <th>Item Name</th>
                      <th>Item Type</th>
                      <th>Current Status</th>
                      <th>Available Quantity</th>
                      <th>Damaged Quantity</th>
                      <th>Borrowed Quantity</th>
                      <th>Custodian</th>
                      <th>Laboratory</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php for ($i = 0; $i < count($x); ++$i) { ?>
                    <tr>
                        
                        <td><?php echo $x[$i]->code; ?></td>
                        <td><?php echo $x[$i]->name; ?></td>
                        <td><?php echo $x[$i]->itemtype; ?></td>
                        <td><?php echo $x[$i]->remarks; ?></td>
                        <td><?php echo $x[$i]->availablequantity; ?></td>
                        <td><?php echo $x[$i]->damagedquantity; ?></td>
                        <td><?php $borrowedQuantity = intval($x[$i]->totalquantity) - intval($x[$i]->availablequantity); 
                                  echo $borrowedQuantity ?></td>
                        <td><?php echo $x[$i]->custodian; ?></td>
                        <td><?php echo $x[$i]->owner; ?></td>
                        <td><?php if ($this->session->userdata('type')!="admin") {
                          echo anchor('item_admin/UpdateItem/'.$x[$i]->code,'<button class="btn-xs btn-success">Update</button>');
                        }else
                        {
                          echo anchor('item_admin/UpdateItem/'.$x[$i]->code,'<button class="btn-xs btn-success">View</button>');
                        }

                        ?>
                       <?php 
                       echo  anchor_popup('charts/graph_Sitem/'.$x[$i]->code,'<button class="btn-xs">Show Statistics</button>',$atts);
                        ?></td>
                    </tr>
                    <?php } ?>

                  </tbody>
                </table>             
            </div>
            <ul class="pagination pagination-sm" style="float:left;">
            <?php echo $this->pagination->create_links(); ?>
          </ul>         
          <?php echo  anchor_popup('charts/graph_item/','<button class="btn-xs" style="margin-top:24px;margin-left:10px;">Show Statistics</button>',$atts);?>   
    <?php endif ?>      
   </div>
</div><!-- /.container -->


