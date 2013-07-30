<?php

     define('WWW_ROOT', dirname(__FILE__) . DIRECTORY_SEPARATOR);
     session_start();

     include_once WWW_ROOT . 'includes' . DIRECTORY_SEPARATOR . 'functions.php';
     set_error_handler('globalErrorHandler');
     set_exception_handler('globalExceptionHandler');

     require_once WWW_ROOT.'classes'.DIRECTORY_SEPARATOR.'Config.php';

     $arrSecure = array();
     $page = 'home';

     if(!empty($_GET['page'])) {
          $page = $_GET['page'];
     }

     $controller = NULL;
     switch($page) {
          default:
               break;
     }

     $controller->filter();
     $controller->render();