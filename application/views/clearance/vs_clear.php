<div class="container">
<?php echo br(4); ?>
<div class="panel panel-primary">
        <div class="panel-body">
        <?php 
        $attributes = array("class" => "form-horizontal", "role" => "form", "id" => "searchform", "name" => "searchform");
        echo form_open("c_clear/sVio", $attributes);?>
            <div class="form-group">
                <div class="col-md-6" style="margin-left:20%">
                    <input class="form-control" id="name_search" name="name_search" placeholder="SEARCH VIOLATOR" type="text" value="<?php echo set_value('name_search'); ?>" />

                    
                </div>
                <div>
                    <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="SEARCH"/>
                    <!--<a href="<?php //echo base_url(). "index.php/inventory/index"; ?>" class="btn btn-default">Show All</a> -->

                    
                         
                          <?php
                            $data = array(
                                      'name'  => 'BY NAME',
                                      'laboratory' => 'BY LABORATORY'
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
                  <th>ID Number</th>
                  <th>Name</th>
                  <th>Year Level</th>
                  <th>Course</th>
                  <th>Department</th>
                  <th>Violation</th>
                  <th>Room/Laboratory</th>
                  <th>Action</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>

              <?php for ($i = 0; $i < count($x); ++$i) { ?>
                <tr>
                    <td><?php echo $i+1?></td>
                    <td><?php echo $x[$i]->u_id; ?></td>
                    <td><?php echo $x[$i]->lastname; ?><?php echo ",&nbsp;"?><?php echo $x[$i]->name; ?><?php echo "&nbsp;"?><?php echo $x[$i]->middlename; ?></td>
                    <td><?php echo $x[$i]->year; ?></td>
                    <td><?php echo $x[$i]->course; ?></td>
                    <td><?php echo $x[$i]->department; ?></td>
                    <td><?php echo $x[$i]->violation; ?></td>
                    <td><?php echo $x[$i]->laboratory; ?></td>
                    <td><?php echo $x[$i]->status; ?></td>
                    <td><?php echo anchor('c_clear/upVio/'.$x[$i]->id,'<button class="btn-xs btn-success">UPDATE</button>');?></td>
                </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>
   </div>
</div><!-- /.container -->


