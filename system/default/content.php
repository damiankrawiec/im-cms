<div class="container-fluid">
<?php

$db->prepare('select * from im_label where label_id = ?');
$db->run('select:all', array(1));

?>
</div>