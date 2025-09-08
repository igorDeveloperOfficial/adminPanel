<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
 protected $routes = [];

 function add($url,$controller,$method){
     $this->routes[] = [
         'url' => $url,
         'controller' => $controller,
         'method' => $method,
         'middleware' => null
     ];
     return $this;
 }

 function only($key)
 {
     $this->routes[array_key_last($this->routes)]['middleware'] = $key;

     return $this;
 }

 function get($url,$controller){
    return $this->add($url,$controller,'GET');

 }

 function post($url,$controller){
     return $this->add($url,$controller,'POST');
 }
 function put($url,$controller){
     return $this->add($url,$controller,'PUT');
 }
 function delete($url,$controller){
     return $this->add($url,$controller,'DELETE');
 }

 function load($url,$method){
     foreach ($this->routes as $route){
         if($route['url'] == $url && $route['method'] == strtoupper($method)){
             Middleware::resolve($route['middleware']);
            return  require base_path("/Core/controllers/".$route['controller'].".php");
         }
     }
     abort();
 }



}