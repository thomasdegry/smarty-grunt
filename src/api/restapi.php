<?php
     define('WWW_ROOT', dirname(__FILE__) . DIRECTORY_SEPARATOR);

     require_once WWW_ROOT . 'includes' . DIRECTORY_SEPARATOR . 'functions.php';
     require_once WWW_ROOT . 'classes' . DIRECTORY_SEPARATOR . 'Config.php';
     require_once(WWW_ROOT . 'dao' . DIRECTORY_SEPARATOR . 'UserDAO.php');
     require_once(WWW_ROOT . 'Slim' . DIRECTORY_SEPARATOR . 'Slim.php');

     $app = new Slim();

     $app->post('/save', 'save');

     $app->run();

     function save() {
          $request = Slim::getInstance()->request();
          $userDAO = new UserDAO();

          $post = $request->post();
          $data = json_decode($post["data"], true);

          echo json_encode($userDAO->addUser($data));
     }