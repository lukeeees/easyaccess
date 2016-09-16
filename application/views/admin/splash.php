<?php
echo "hello ".$this->session->has_userdata('user');

echo anchor(base_url().'index.php/account/logout','logout');



?>