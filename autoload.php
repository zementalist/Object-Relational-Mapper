<?php
spl_autoload_register(function($className) {
    $filename = str_replace("\\", "/", $className) . ".php";
    
    if(file_exists($filename)){
        include_once $filename;
    }
    else {
        echo $filename;
    }
});

(new \Core\Foundation\DotEnv(__DIR__ . '/.env'))->load();

function url(){
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
    else{
        $protocol = 'http';
    }
    return $protocol . "://" . $_SERVER['HTTP_HOST'] ;//. $_SERVER['REQUEST_URI'];
}

function current_path() {
    return $_GET["url"];
}

function env($key, $default=null) {
    $value = getenv($key);
    return $value == false ? $default : $value;
}

?>