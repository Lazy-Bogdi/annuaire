<?php

    function fullWord(string $fullWord, int $a) { 

        if($a != 1 && $a != 2 && $a != 3):
            $fullWord = 'err';
            return $fullWord;
        else:
            if($a == 1):
                if ($fullWord == 'ComG' ):
                    $fullWord = 'Communication Graphique';
                    return $fullWord;
                elseif($fullWord == 'DevW'):
                    $fullWord = 'Développement Web';
                    return $fullWord;

                elseif($fullWord == 'ComM'):
                    $fullWord = 'Community Management';
                    return $fullWord;

                elseif($fullWord == 'WebM'):
                    $fullWord = 'Web Marketing';
                    return $fullWord;
                endif;

            elseif($a==2):
                if($fullWord == "A1"):
                    $fullWord = 'Année 1';
                    return $fullWord;
                elseif($fullWord == "A2"):
                    $fullWord = 'Année 2';
                    return $fullWord;
                elseif($fullWord == "A3"):
                    $fullWord = 'Année 3';
                    return $fullWord;
                endif;

                elseif($a==3):
                    if($fullWord== "b"):
                        $fullWord ="Niveau Bac";
                        return $fullWord;
                    elseif($fullWord== "b1"):
                        $fullWord ="Niveau Bac+1";
                        return $fullWord;
                    elseif($fullWord== "b2"):
                        $fullWord ="Niveau Bac+2";
                        return $fullWord;
                    elseif($fullWord== "b3"):
                        $fullWord ="Niveau Bac+2";
                        return $fullWord;
                    elseif($fullWord== "b45"):
                        $fullWord ="Niveau Master/Mastère (Bac+4/5)";
                        return $fullWord;
                    elseif($fullWord== "p"):
                        $fullWord ="Parent";
                        return $fullWord;
                    endif;
                    

            endif;
        endif;
    }