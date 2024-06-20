<?php 
//! ---------------------------------------------------------------------------!//
//!                              Caching                                       !//
//! ---------------------------------------------------------------------------!//


//! methode for getting information from a cache
function cache_get($fileName)
{
    $file = "cache/{$fileName}.cache";
    if (file_exists($file) == true){
        $file = file_get_contents($file);
        return unserialize(file_get_contents($file));
    }
    return null;

}

//! methode for adding things to your cache
$cards = array();
function cache_pack($methode, $id, $url, $html)
{
        $card = array();
        array_push($card, $id, $html);
        global $cards;
        array_push($cards, $card);
}

//! methode die de ding toevoegd aan de cache

function cache_upload($methode){
    global $cards;
    if ($methode == "DATABASE"){
        $file = "cache/Database.cache";
    } else if ($methode == "GITHUB")
    {
        $file = "cache/Github.cache";
    }
    file_put_contents($file, serialize($cards));
}

//! a function that returns true if cache exits.'

function cache_exists($fileName)
{
    $file = "{$fileName}.cache";
    if (file_exists($file)) 
    {
        return true;
    }
    return false;
}