<?php

session_start();

function session_kill(){
    $_SESSION = [];
    session_destroy();
}