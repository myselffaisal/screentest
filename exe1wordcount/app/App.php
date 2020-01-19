<?php

namespace app;

class App
{
    public static function curl($url)
    {
        $d = new \DOMDocument;
        $mock = new \DOMDocument;
        $d->loadHTML(file_get_contents($url));
        $body = $d->getElementsByTagName('body')->item(0);
        foreach ($body->childNodes as $child){
            $mock->appendChild($mock->importNode($child, true));
        }
        return strip_tags($mock->saveHTML());
    }
}