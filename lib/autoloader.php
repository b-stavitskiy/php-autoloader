<?php

spl_autoload_register(function ($className) {
    $arrayPath = explode('\\', $className);

    if($arrayPath[0] === 'App') {
        $fileName = $arrayPath[sizeof($arrayPath) - 1];
        unset(
            $arrayPath[sizeof($arrayPath) - 1],
            $arrayPath[0]
        );
        $filePath = __DIR__ . DIRECTORY_SEPARATOR . '..' .
            DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR , $arrayPath) .
            DIRECTORY_SEPARATOR . $fileName . '.php';
        if(file_exists($filePath)) {
            require $filePath;
        }
    }
});
