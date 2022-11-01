<?php

class TriTable 
{

    const CLE_TRI = 'tri';
    const CLE_DIR = 'dir';
    public static function tri(string $cleTri, string $label, array $data): string {
        $tri = $data[self::CLE_TRI] ?? null;
        $direction = $data[self::CLE_DIR] ?? null;
        $icone ="";
        if($tri === $cleTri) {
            $icone =  $direction ===  'asc' ? "^" : 'v' ;
        }

        $url = UrlMaker::paramsTri($data, [
            'tri' => $cleTri,
            'dir' => $direction === 'asc' && $tri === $cleTri ? 'desc': 'asc'
        ]);
        return <<<HTML
        <a href='?$url'>$label $icone</a>
        HTML;
    }
}