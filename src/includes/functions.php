<?php

     function trace($data) {
          echo '<pre>';
          print_r($data);
          echo '</pre>';
     }

     function globalErrorHandler($errno,$errstr,$errfile,$errline,$errcontext){
          if(Config::DEVELOPMENT){
               trace(array(
                    'errno' => $errno,
                    'errstr' => $errstr,
                    'errfile' => $errfile,
                    'errline' => $errline,
                    'errcontext' => $errcontext
               ));
          }else{
               ob_start();
               trace(array(
                    'errno' => $errno,
                    'errstr' => $errstr,
                    'errfile' => $errfile,
                    'errline' => $errline,
                    'errcontext' => $errcontext
               ));
               require('error.html');
               $content = ob_get_clean();
               error_log($content);
               die();
          }
     }

     function globalExceptionHandler($e){
          if(Config::DEVELOPMENT){
               trace($e);
          }else{
               ob_start();
               trace($e);
               $content = ob_get_clean();
               error_log($content);
               require('error.html');
               die;
          }
     }