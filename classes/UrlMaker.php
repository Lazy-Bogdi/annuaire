<?php

class UrlMaker 
{
    public static function avecParams(array $data, string $param, $value): string {
        return http_build_query(array_merge($data, [$param => $value]));
     }

     public static function paramsTri(array $data, array $params): string {
        return http_build_query(array_merge($data, $params));
     }
}