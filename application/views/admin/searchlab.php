<div class="container">
<?php echo br(4); ?>
<div class="panel">
        <div class="panel-body">
        <?php 
        $attributes = array("class" => "form-horizontal", "role" => "form", "id" => "searchform", "name" => "searchform");
        echo form_open("admin/labSearch", $attributes);?>
            <div class="form-group">
                <div class="col-md-4 col-sm-offset-2" style="padding:0;">
                    <input class="form-control" id="name_search" name="name_search" placeholder="Search Item" type="text" value="<?php echo set_value('name_search'); ?>" />

                    
                </div>
                <div class="col-xs-3">
                                       
                         
                          <?php
                          $data = array(
                                      'name'  => 'By Laboratory Name',
                                      'room' => 'By Room',
                                      'code'  => 'By Code'
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
            <h2 style="margin-top:50px;text-align:center">No Laboratories Found</h2>
      <?php else: ?>      
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
               
              <?php    $j = 1;
              for ($i = 0; $i < count($x); ++$i) { ?>
                <tr>
                
                    <td><?php echo $j; ?></td>
                    <td><?php echo $x[$i]->name; ?></td>
                    <td><?php echo $x[$i]->room; ?></td>
                    <td><?php echo anchor('admin/updateLab/'.$x[$i]->code,'<button class="btn-xs btn-success">Update</button>');?></td>

                </tr>
                <?php
                $j++;
                 } ?>

              </tbody>
            </table>
          </div>
      <?php endif ?>
   </div>
</div><!-- /.container -->


