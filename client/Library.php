<?php 
//! ---------------------------------------------------------------------------!//
//!                              Library                                       !//
//! ---------------------------------------------------------------------------!//
//? in here you can easy add variables that you can use in your template
function execute_lib($repo){
$lib = array();
global $methode;
//! ---------------------------------------------------------------------------!//
//!                              $title                                        !//
//! ---------------------------------------------------------------------------!//

    //? Write your code here to fill in the variable
    if ($methode == "GITHUB")
    {
        $title_value = $repo['name'];
        $title = array("title" => array($title_value));
        $lib[] = $title;

    }

//! ---------------------------------------------------------------------------!//
    if ($methode == "DATABASE")
    {
       //? The settings for if the methode is DATABASE        
    }

//! ---------------------------------------------------------------------------!//
//!                              $img_url                                      !//
//! ---------------------------------------------------------------------------!//

    //? Write your code here to fill in the variable
    if ($methode == "GITHUB")
    {
        $description_value = $repo['description'];
        $description = array("description" => array($description_value));
        $lib[] = $description;

    }

//! ---------------------------------------------------------------------------!//
    if ($methode == "DATABASE")
    {
       //? The settings for if the methode is DATABASE        
    }

//! ---------------------------------------------------------------------------!//
//!                              $url                                          !//
//! ---------------------------------------------------------------------------!//

    //? Write your code here to fill in the variable
    if ($methode == "GITHUB")
    {
        $url_value = $repo['html_url'];
        $url = array("url" => array($url_value));
        $lib[] = $url;

    }

//! ---------------------------------------------------------------------------!//
    if ($methode == "DATABASE")
    {
       //? The settings for if the methode is DATABASE        
    }
return $lib;
}