<?php

class UrlMaker 
{
    public static function avecParams(string $param, $value): string {
        return http_build_query(array_merge($_GET, [$param => $value]));
     }
}