<?php

    require_once '../public/init.php';
session_start();
    try {
        $request = new Request();
        $content = Router::getContentByUrl($request->server('REQUEST_URI'));


    } catch (PDOException $e) {

            echo $e->getMessage();
            return;

    } catch (Exception $e) {
            echo $e->getMessage();

            return;
    }
    echo $content;




