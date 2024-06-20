<?php
//! ---------------------------------------------------------------------------!//
//!                              PHP Functions                                 !//
//! ---------------------------------------------------------------------------!//

 //? this is a function class that creates php html insertions

//! this is a function that adds text to the html
function message($text){
    echo "document.body.innerHTML += '$text';";
}

//! this is a function that adds scripts to your html
function script($script){
    echo $script;
}

//! this function outputs something in the console
function consolelog($text)
{
    global $debug;
    if ($debug == true){
    $test_deformed = json_encode($text);
    echo "console.log('$test_deformed');";
    }
}

//! this is a function to output working

function process($process)
{
    global $debug;
    if ($debug == true){
    echo "console.log('[DC] $process');";
}
}

//! this is a function to output an error
function error($process, $error)
{
    global $debug;
    if ($debug == true){
        echo "console.error('[Dynamic Containers] Failed to load while processing $process. ');";
        echo "console.error('[Dynamic Containers] With the following error: $error. ');";
    } 
}

//! this is a function to output a card into the html
function upload_card($element, $content)
{
        process("[upload_card]: Trying to upload ");
        echo "document.getElementById('$element').innerHTML += ".$content.";";
        process("[upload_card]: upload compleded");
    
}

//! this is a function to output a cards into the html
function upload_cards($element, $content)
{
    $escaped_content = addslashes($content);
    process("trying to upload");
    echo "document.getElementById('$element').innerHTML += '$escaped_content';";
    process("upload completed");
}