<?php
    include('OFXParser.php');
    $ofx= new OFXParser();
    $ofx->loadFromFile('transactions.OFX');
   
    echo '<pre>';
    print_r($ofx->getCredits());
    print_r($ofx->getDebits());
    print_r($ofx->getById());
    
    //print_r($ofx->getMoviment(2)); // the second moviment
    print_r($ofx->filter('MEMO', 'DOC', true, true)); // all moviments that have DOC in its description, NOT case sensitive
    echo '</pre>';
?> 