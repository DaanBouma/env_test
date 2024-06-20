<?php
//! ---------------------------------------------------------------------------!//
//!                              HTML Functions                                !//
//! ---------------------------------------------------------------------------!//

 //? this is a function class that creates php html insertions

//! This is the headfunction
function card_create($lib){
    process("[Card] starting function");
    global $template_encoded;
    $template_updated = $template_encoded;


//! Loop trough the template and replace the variables.
    foreach ($lib as $index => $element) {
        $key = array_key_first($element);
        $value = $element[$key][0];
        $template_updated = str_replace("$".$key, $value, $template_updated);
    }
    process("[Card] requesting upload");
    upload_card("dc-1", $template_updated);
}

