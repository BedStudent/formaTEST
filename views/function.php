<?php
$validationErrors = []; //Validacijos klaidu saugojimui

function saveMessage($data){
    $file = 'data/messages.txt'; //kelias iki duomenu failo
    $content = file_get_contents($file); //nuskaitom faila
    $formData = implode(',',$data); //Konvertuojame masyva i stringa
    $content.=$formData."/n"; //prie masyvo pridedam eilutes pabaigos simboli
    file_put_contents($file,$content);//irasom duomenis i duomenu faila
}

function getData(){
    $messages = file_get_contents('data/messages.txt'); ///nuskaitome duomenis i faila
    $messages = explode('/n', $messages); // Gauta stringa konvertuojam i masyva
    return $messages;
}

function validate($DATA){
    global $validationErrors;
    if(empty($DATA['company'])){
        $validationErrors[] = 'Nepasirikta imone';
    }
    if(empty($DATA['department'])){
        $validationErrors[] = 'Nepasirinktas departamentas';
    }
    if(empty($DATA['firstName']) || !preg_match('/^[A-Za-z0-9]{1,10}$/',$DATA['firstName'])){
        $validationErrors[] = 'Neivestas Vardas';
    }
    if(empty($DATA['email']) || !preg_match('/^(.*?(\@\b)[^$]*)$/',$DATA['email'])){
        $validationErrors[] = 'Neivestas Pastas';
    }
    if(empty($DATA['message'])|| !preg_match('/^[A-Za-z0-9]{1,5}$/',$DATA['message'])){
        $validationErrors[] = 'Neivesta zinute arba Neatitinka duomenu formato';
    }
    return $validationErrors;
}