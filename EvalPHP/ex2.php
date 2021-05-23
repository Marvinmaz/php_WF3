<?php


function convert($amount, $currency) {
    if(is_numeric($amount) && is_string($currency)) { 
        if ($currency === "USD") { 
            $res = $amount * 1.19; 
            return "<p style='color: red'>$amount euros = $res dollars américains</p>"; 
        } else if($currency === "EUR") { 
            $res = $amount * 0.84; 
            return "<p style='color: red'>$amount dollars américains = $res euros</p>"; 
        }
    } 
    return "Le montant ou la devise est incorrecte"; 
}

echo convert(6, "EUR"); 

?>