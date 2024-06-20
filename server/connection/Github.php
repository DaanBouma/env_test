<?php 
//! ---------------------------------------------------------------------------!//
//!                              GITHUB                                        !//
//! ---------------------------------------------------------------------------!//

//? this is the connection for Github

$token = $github_token;
    $user = $github_username;
    $repos = "https://api.github.com/users/{$user}/repos";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $repos);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: token $token",
        "Content-Type: application/json",
        "User-Agent: $user"
    )
    );
    $response = curl_exec($ch);


