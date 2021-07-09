<?php

if($p_string) {

    $mpdf = new \Mpdf\Mpdf();

    $mpdf->WriteHTML($p_string);

    $mpdf->Output();

}