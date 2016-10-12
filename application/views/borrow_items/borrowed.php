<div class="container">
  <?php echo br(4); ?>
  <div class="panel panel-primary">
  </div>
  <div class="starter-template">
    <div class="table-responsive">
      <div class="row">
        <div class="col-sm-6">
          <h4>Name: <?php echo $item[0]->borrowers_lname.", ".$item[0]->borrowers_fname." ".$item[0]->borrowers_mname ?></h4> 
          <h4>Subject: <?php echo $item[0]->subject; ?></h4>           
          <h4>Table #: <?php echo $item[0]->tablenumber; ?></h4>
        </div>
        <div class="col-sm-6">
          <h4>Schedule: <?php echo $item[0]->schedule; ?></h4> 
          <h4>Instructor: <?php echo $item[0]->instructor; ?></h4> 
        </div>
      </div>
      <div style="clear:both;height:20px;"></div> 
      <?php if (!$item): ?>

        <h2 style="margin-top:50px;text-align:center">No Borrowers Found</h2>

      <?php else: ?>

        <form action="../borrow/returnedItems" method="POST">
          <input type="hidden" name="idnumber" value="<?php echo $item[0]->borrowers_idnumber; ?>">        
            <table class="table table-striped">
              <thead>
                <tr>
                  <th><center>#</center></th>
                  <th><center>Item Code</center></th>     
                  <th><center>Item Name</center></th>            
                  <th><center>Borrowed Quantity</center></th>
                  <th><center>Return Quantity</center></th>
                </tr>
              </thead>

              <tbody>
                <?php $i =1;
                      $count = 0;

                 foreach($item as $row) { ?>
                  <tr>              
                    <td><center><?php echo $i++; ?></center></td>
                    <td><center><?php echo $row->item_code; ?></center></td>
                    <td><center><?php echo $row->item_name; ?></center></td>
                    <td><center class="borrowedquantity"><?php echo $row->quantity; ?></center>
                      <input type="hidden" name="borrowers_id[]" value="<?php echo $row->borrowers_id; ?>">
                      <input type="hidden" name="itemcode[]" value="<?php echo $row->item_code; ?>">
                      <input type="hidden" name="borrowedquantity[]" value="<?php echo $row->quantity; ?>">
                    </td>
                    <td><center><input class="quantity form-control" type="number" name="quantity[]" min="0" max="<?php echo $row->quantity; ?>" value="0" style="width:100px;"></center></td>
                  </tr>
                <?php
                    $count += $row->quantity;
                 }  ?>

              </tbody>
            </table>
        
          <div style="clear:both;height:30px;"></div>
          <div class="form-group">
             <input type="submit" value="Return Items" name="returnbtn" class="btn btn-primary" >
             <?php echo anchor('/borrow/userlist', 'Back','class="btn btn-default"');?>
          </div>
        </form> 
        <center><?php echo "BORROWED ITEMS : ".$count; ?></center><br>

      <?php endif ?>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(function(){
    $('.quantity').change(function(){
      var par = $(this).parent().parent().parent();
      var bq = parseInt($('.borrowedquantity',par).html());
      var rq = parseInt($('.quantity',par).val());
      var dq = parseInt($('.damage',par).val());
      var max = bq - rq;

      $('.damage',par).attr('max',max);

      if($(this).val() != $('.borrowedquantity',par).html())
      {

      }
      else
      {
        $('.damage',par).val(0); 
      }
    });

    // $('.damage').change(function(){
    //   var par = $(this).parent().parent().parent();
    //   var bq = parseInt($('.borrowedquantity',par).html());
    //   var rq = parseInt($('.quantity',par).val());
    //   var max = bq - rq;

    //   $(this).attr('max',max);

    // });
  });


