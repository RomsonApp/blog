<?php

class Assets{
    public static function css($file){

        return "<link rel='stylesheet' href='resources/css/" . $file . "'>";
    }
}