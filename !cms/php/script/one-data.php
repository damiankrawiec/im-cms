<?php
if(isset($getData) and is_array($getData) and count($getData) > 0 and isset($getData['column']) and isset($getData['table'])) {

    $sql = 'select 
        '.$getData['column'].' as value
        from ' . $getData['table'];

    if(isset($getData['in']) and is_array($getData['in']) and count($getData['in']) > 0) {

        foreach ($getData['in'] as $i => $in) {

            $sql .= ' ' . $addition->whereOrAnd($sql).' ';

            $sql .= $i.' = ';
            if(is_string($in)) {

                $sql .=  '"'.$in.'"';

            }else{

                $sql .= $in;

            }

        }

    }

    $db->prepare($sql);

    $oneData = $db->run('one');

}