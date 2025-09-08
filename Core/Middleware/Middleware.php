<?php

namespace Core\Middleware;

class Middleware
{
    const MAP = [
        'auth'=>Auth::class,
        'guest'=>Guest::class
 ];

    static function resolve($key){
        if(!$key){
            return ;
        }
        $middleware = self::MAP[$key] ?? false;


        if(!$middleware){
            throw new \Exception("Middleware not found in $key");
        }

        (new $middleware)->handle();


    }
}