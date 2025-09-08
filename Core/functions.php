<?php
function base_path($path){
    return BASE_PATH.$path;
}

function view($path,$data = []){
    extract($data);

    require base_path("views/".$path.".php");
}

function redirect($path)
{
    header("Location: {$path}");
}
function dd($value = "Hello"){
    echo  "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function abort($code = 404)
{
    http_response_code($code);
    view($code);
}

function logout()
{
    $_SESSION = [];
    session_destroy();
}

function isUrl($url){
    return $_SERVER['REQUEST_METHOD'] == $url;
}
