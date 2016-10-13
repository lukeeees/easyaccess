<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $.post("/easyaccess/index.php/c_clear/notif",'',function(data){
      if(data!=0)
      {
        $('#notif').html(data);        
      }
      else
      {
        $('#notif').html("");
      }       
    });

    setInterval(function(){ $.post("/easyaccess/index.php/c_clear/notif",'',function(data){
      if(data!=0)
        $('#notif').html(data);
      else
        $('#notif').html("");
    }); }, 500);
  });
</script>
<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <!-- <a class="navbar-brand" href="#page-top">Easy Access</a> -->
                <?php echo anchor('account/index','Easy Access','class="navbar-brand"'); ?>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>

                        <?php if ($this->session->userdata['type']=="staff"): ?>
                        <li class="dropdown">
                         <?php echo anchor('borrow/userlist', 'Transactions');?> <!-- <a>Transactions</a>-->
                          <div class="dropdown-content">
                              <?php echo anchor('/borrow/ItemSearch', 'Borrow Items');?>
                              <?php// echo anchor('borrow/userlist', 'Return Items');?>                              
                          </div>
                        </li>
                         <?php endif; ?>


                        <?php if ($this->session->userdata['type']!="staff"): ?>
                        <li class="">
                          <a href="/easyaccess/index.php/c_clear/notifications"><span id="notif" class="badge" style="vertical-align:top;margin-right:5px;"></span> Notifications</a></li>
                        <li class="dropdown">
                          <?php echo anchor('c_clear/sVio', 'Clearance');?><!--<a>Clearance</a>-->
                          <div class="dropdown-content">
                              <?php echo anchor('c_clear/violation', 'Add Violation'); ?>
                              <?php //echo anchor('c_clear/clearance', 'Clearance');?>
                              <a href="#">View Statistics</a>
                          </div>
                        </li>
                        <?php endif; ?>

                         <li class="dropdown">
                        <?php echo anchor('item_admin/ItemSearch','Manage Items')?>
                        <div class="dropdown-content">
                          <?php echo anchor('item_admin/addItem','Add Item')?>
                          <?php if ($this->session->userdata['type']!="staff"): ?>
                            <?php echo anchor('inventory_admin/addInventory','Create Inventory Report')?>
                            <?php echo anchor('inventory_admin/viewInventory','Manage Inventory Report')?>
                            <?php echo anchor('','View Statistics')?>
                          <?php endif; ?>
                        </div>
                        </li>
                   
                        <?php if ($this->session->userdata['type']!="staff"): ?>
                        <li class="dropdown">
                            <?php echo anchor('admin/sUser','Manage Accounts')?><!--<a>Manage Accounts</a>-->
                            <div class="dropdown-content">
                              <?php if ($this->session->userdata('type')=="admin"): ?>
                                <?php echo anchor('admin/aUser','Add User')?>
                              <?php elseif($this->session->userdata('type')=="head"): ?>
                                <?php echo anchor('admin/stUser','Add User')?>     
                              <?php endif; ?>                     
                            </div>
                        </li>
                    <?php endif; ?>

                    <?php if ($this->session->userdata('type')=="admin"): ?>
                        <li class="dropdown">
                             <?php echo anchor('admin/labSearch','Manage Laboratory')?>
                            <div class="dropdown-content">
                              <?php echo anchor('admin/aLab','Add Laboratory')?>                          
                            </div>
                        </li>
                    <?php endif ?>                    
                    <?php if ($this->session->userdata['type']=="staff"): ?>
                    <li class="dropdown"> 
                        <?php echo anchor('c_clear/sVio', 'Violation'); ?><?//php echo anchor('c_clear/sVio','Violation')?>
                        <div class="dropdown-content">
                          <?php echo anchor('c_clear/violation', 'Add Violation'); ?><!--<a href="#">Add Violation</a>-->
                        </div>
                    </li>
                  <?php endif; ?>
                    <li class="page-scroll">
               <!--  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"> -->
                  <a data-toggle="modal" data-target="#myModal" href="#">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Logout</h4>
      </div>
      <div class="modal-body">
       Are you sure you want to logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
       <?php echo anchor(base_url().'index.php/account/logout', '<button type="button" class="btn btn-primary">Yes</button>');?>
      </div>
    </div>
  </div>
</div>