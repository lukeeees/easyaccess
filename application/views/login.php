<nav class="navbar navbar-default">
    <div class="contrainer-fluid">
        <div class="navbar-header" style="margin-left:20%">
            <a class="navbar-brand" href='<?php echo base_url()."index.php"?>'>Easy Access</a>
        </div>
        <ul class="nav navbar-nav pull-right" style="margin-right:20%">
               <li class="active"><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Log In</a></li>
              
          </ul>
    </div>
</nav>

<hr/>

<div class="row">
     <div class="col-md-6 col-md-offset-3">
          <div class="panel panel-default">
               <div class="panel-heading">
                    <h4>Log In</h4>
               </div>
               <div class="panel panel-body">
                      <?php
                          if ($this->uri->segment(3)=='error') {
                            $error = "Invalid username or password";
                          } ?>

                          <span class="text-danger"><?php echo @$error ?> </span>

                    <?php $attributes = array("id" => "loginform", "name" => "loginform");
                    echo form_open("account/login", $attributes);?>

                    <div class="form-group">
                         <label for="txt_username" class="control-label">Username</label>
                         <?php echo form_input('name',set_value('name'),'placeholder="Username" class="form-control" id="name" required');?>
                         <span class="text-danger">
          </span>
                    </div>

                    <div class="form-group">
                         <label for="txt_password" class="control-label">Password</label>
                        <!--  <input class="form-control" id="txt_password" name="txt_password" placeholder="Password" type="password" /> -->
                        <?php echo form_password('password',set_value('password'),'placeholder="Password" class="form-control" id="name" required');?>
                         <span class="text-danger"><?php echo form_error('txt_password'); ?></span>
                    </div>
               
                              
                    <div class="form-group">
                         <input id="login_btn" name="login_btn" type="submit" class="btn btn-danger" value="Log In" />
                         <input id="cancel_btn" name="cancel_btn" type="reset" class="btn btn-default" value="Reset" />
                    <?php echo validation_errors(); ?>
                    </div>
               </div>
            
               <?php echo form_close(); ?>
               <?php echo $this->session->flashdata('msg'); ?>
          </div>
     </div>
</div>
