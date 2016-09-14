<?php

echo form_open('admin/addLaboratory');
	echo form_input('lab','','placeholder="labname"');
	echo form_input('room','','placeholder="room"');
	echo form_input('status','','placeholder="status"');
	echo form_submit('submit','submit');
echo form_close();

?>