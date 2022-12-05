<?php

if (is_file(__DIR__ . '/vendor/autoload.php')) {
    require_once(__DIR__ . '/vendor/autoload.php');
} else {
    die("Cannot find 'vendor/autoload.php'. Run `composer install`.");
}

require_once(__DIR__ . "/config/config.php");

// instance Pico
$pico = new Pico(
    __DIR__,    // root dir
    'config/',  // config dir
    'plugins/', // plugins dir
    'themes/'   // themes dir
);

// override configuration?
$pico->setConfig(array(
    'session' => $_SESSION
));

// run application
echo $pico->run();

if (isset($_GET["action"])) {
    // Update session link
    if ($_GET["action"] == "theme") {
        $previousValue = isset($_SESSION["theme"]) ? $_SESSION["theme"] : null;

        if ($previousValue == "dark") {
            unset($_SESSION["theme"]);
        } else {
            $_SESSION["theme"] = "dark";
        }

        $url = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"];
        $url = preg_replace("/index.php\//", "", $url);
        header("Location: $url");
    }

    // Destroy session link
    if ($_GET["action"] == "session_destroy") {
        session_destroy();
        $url = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"];
        $url = preg_replace("/index.php\//", "", $url);
        header("Location: $url");
    }
}

