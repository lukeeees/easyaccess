<div class="container">
<?php echo br(4); ?>
<div class="panel panel-primary">
        <div class="panel-body">
        <?php 
        $attributes = array("class" => "form-horizontal", "role" => "form", "id" => "searchform", "name" => "searchform");
        echo form_open("admin/labSearch", $attributes);?>
            <div class="form-group">
                <div class="col-md-6" style="margin-left:20%">
                    <input class="form-control" id="name_search" name="name_search" placeholder="Search Laboratory" type="text" value="<?php echo set_value('name_search'); ?>" />

                    
                </div>
                <div>
                    <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="Search"/>
                    <!--<a href="<?php //echo base_url(). "index.php/inventory/index"; ?>" class="btn btn-default">Show All</a> -->

                    
                         
                          <?php
                            $data = array(
                                      'name'  => 'By Laboratory Name',
                                      'room' => 'By Room',
                                      'code'  => 'By Code'
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
                  <th>Laboratory Name</th>
                  <th>Room</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>

              <?php for ($i = 0; $i < count($x); ++$i) { ?>
                <tr>
                
                    <td><?php echo $x[$i]->code; ?></td>
                    <td><?php echo $x[$i]->name; ?></td>
                    <td><?php echo $x[$i]->room; ?></td>
                    <td><?php echo anchor('admin/updateLab/'.$x[$i]->code,'<button class="btn-xs btn-success">Update</button>');?></td>
                </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>
   </div>
</div><!-- /.container -->


