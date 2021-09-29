<?php

    function db_connect(){
        $mysqli = new mysqli('localhost','root','usbw','db_andorinha');
        $mysqli->set_charset("utf8");

        return $mysqli;
    }