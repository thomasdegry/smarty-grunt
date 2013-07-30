<?php

     require_once 'Smarty.class.php';

     class AppController {

          protected $action = '';
          protected $smarty;

          public function __construct() {
               if(!empty($_GET['action'])) {
                    $this->action = $_GET['action'];
               }


               $this->smarty = new Smarty();
               $this->smarty->setCompileDir('smarty_compile');
               $this->smarty->setTemplateDir('smarty_templates');
               $this->smarty->muteExpectedErrors();
          }

          public function filter() {

          }

          public function render() {
               $this->smarty->display('index.tpl');
          }

     }

