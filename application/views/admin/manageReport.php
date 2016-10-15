
<div class="container">

<div class="starter-template">
  <div id="headerprint" class="jumbotron">
        <center><h1>Manage Report for <?php echo $this->session->userdata('lab');?></h1>  </center>
    </div>
    <div class="panel">
        <div class="panel-body">
<div class="panel">
        <div class="panel-body">
        <?php 
        $attributes = array("class" => "form-horizontal", "role" => "form", "id" => "searchform", "name" => "searchform");
        echo form_open("inventory_admin/viewInventory", $attributes);?>
            <div class="form-group">
                <div class="col-md-4 col-sm-offset-2" style="padding:0;">
                    <input class="form-control" id="name_search" name="name_search" placeholder="Search Item" type="text" value="<?php echo set_value('name_search'); ?>" />

                    
                </div>
                <div class="col-xs-3">
                                                              
                          <?php
                          
                            $data = array(
                                      'inventorydate'     => 'By Inventory Date',
                                      'preparedby'        => 'By Prepared by',
                                      
                            );
                          
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

<div class="starter-template">
        <?php if (!$x): ?>
            <h2 style="margin-top:50px;text-align:center">No Reports Found</h2>
        <?php else: ?>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Date Report Created</th>
                  <th>Prepared By</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php for ($i = 0; $i < count($x); ++$i) { ?>
                <tr>
                    <td><?php echo $i+1?></td>
                    <td><?php echo date("F d, Y",strtotime($x[$i]->inventorydate )); ?></td>
                    <td><?php echo $x[$i]->preparedby; ?></td>
                    <td><?php echo anchor('inventory_admin/updateReport/'.$x[$i]->inventoryid,'<button class="btn-xs btn-success">Update</button>');?></td>
                    <td><?php echo anchor('inventory_admin/printReport/'.$x[$i]->inventoryid,'<button class="btn-xs btn-success">Print</button>');?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        <?php endif ?>
   </div>
</div><!-- /.container -->


