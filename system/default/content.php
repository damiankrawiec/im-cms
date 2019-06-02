<div class="container-fluid">
<?php

    $db->prepare('select * from im_object where object_id > :id');

    $parameter = array(
         'name' => ':id', 'value' => 1, 'type' => 'int'
    );

    $db->run($parameter);

?>
</div>