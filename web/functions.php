<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function debug($data){
    echo '<pre>'.print_r($data, true).'</pre>';
}

function get_text_beetwin_symbol($symbol, $text_all)
{
    $arr = [];
    
    $start = 0; $j = 0; $k = 0;
    foreach ($text_all as $text){
        if($text != null){
            $size = strlen($text);
            for($i = 0; $i < $size; $i++)
            {
                if($symbol == $text[$i])
                {
                    if($start == 0)
                    {
                        $start = 1;
                        $j++;
                        $i++;
                    }
                    else{
                        $start = 0;
                    }
                }
                if($start == 1)
                {
                    if(isset($arr[$k][$j]) ){
                        $arr[$k][$j] = $arr[$k][$j].$text[$i];
                    }
                    else{
                        $arr[$k][$j] = $text[$i];
                    }
                }
                    
            }
            $k++;$j = 0;
        }
    }
    return $arr;
}

