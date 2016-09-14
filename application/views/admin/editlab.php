<?php 

echo form_open('admin/C_editLab');
    				echo form_hidden('code',$code);
   				 	echo form_input('lab',$name);
					echo form_input('room',$room);
					echo form_input('status',$status);
					echo form_submit('submit','submit');
echo form_close();

?>