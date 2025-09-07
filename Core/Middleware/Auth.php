<?php

namespace Core\Middleware;

class Auth
{
    static function resolve(){
        if(!isset($_SESSION['admin'])){
            redirect("/");
        }
    }
}