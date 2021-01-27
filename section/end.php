<?php
//Operation must be done after everything

if($p_transaction_package and !in_array($p_transaction_package, $session->getSession('transaction_package')))
    $session->pushSession('transaction_package', $p_transaction_package);

