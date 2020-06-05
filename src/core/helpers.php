<?php


function dd($content)
{
    echo "<pre>";
    print_r($content);
    die("</pre>");
}


function dump($content)
{
    echo "<pre>";
    var_dump($content);
    "</pre>";
}
