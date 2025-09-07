<?php

namespace Core\Middleware;

class Middleware
{
    const MAP = [
        'auth'=>Auth::class
 ];

    function resolve($key){
        if(!$key){
            return;
        }

        if(!array_key_exists($key, self::MAP)){
            throw new \Exception("Missing Auth Middleware");
        }

        self::MAP[$key]->resolve();
    }
}