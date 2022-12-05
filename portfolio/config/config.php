<?php

if (session_status() == PHP_SESSION_NONE) {
    $name = preg_replace("/[^a-z\d]/i", "", __DIR__);
    session_name($name);
    session_start();
}
