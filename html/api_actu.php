<?php
    $apiKey = 'cd88b053002b4479b30f01c64414b87a';
    $tipic = 'cybersecurity';

    $url ="https://newsapi.org/v2/everything?q={$topic}&apiKey={$apiKey}";


    $ch=curl_int();
    
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

    $response = curl_exec($ch);

    if(curl_exec($ch)){
        echo 'Erreur curl : '.curl_error($ch);
    }

    // Fermer la sesion cURL 
