<?php

//require '.././libs/Slim/Slim.php';
require '../vendor/autoload.php';
include '../include/DbHandler.php';
include '../models/Messages.php';
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");

$config = ['settings' => [
        'addContentLengthHeader' => false,
        'displayErrorDetails' => true
]];

$app = new \Slim\App($config);

function verifyRequiredParams($required_fields) {
        $error = false;
        $error_fields = "";
        $request_params = array();
        $request_params = $_REQUEST;

        foreach ($required_fields as $field) {
            if (!isset($request_params[$field])) {
                $error = true;
                $error_fields .= $field . ', ';
            }
        }

        if ($error) {
            $result = array();
            $result = array(
                'success' => false,
                'message' => 'Required field(s) ' . substr($error_fields, 0, -2) . ' is missing'
            );
            return $result;
        }
}


$app->post('/adminLogin',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('email','password'));   
        if($result == null){
                $db = new DbHandler();
                $email = $request->getParam('email');
                $password = $request->getParam('password');
                $result = $db->adminLogin($email,$password);
        }
        return $response->withJson($result);
});

$app->post('/addKeyToSuccess',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content'));   
        if($result == null){
                $db = new DbHandler();
                $content = $request->getParam('content');
                $result = $db->addKeyToSuccess($content);
        }
        return $response->withJson($result);
});

$app->post('/updateKeyToSuccess',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content_id','content'));   
        if($result == null){
                $db = new DbHandler();
                $content_id = $request->getParam('content_id');
                $content = $request->getParam('content');
                $result = $db->updateKeyToSuccess($content,$content_id,);
        }
        return $response->withJson($result);
});

$app->post('/deleteKeyToSuccess',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content_id'));   
        if($result == null){
                $db = new DbHandler();
                $content_id = $request->getParam('content_id');
                $result = $db->deleteKeyToSuccess($content_id,);
        }
        return $response->withJson($result);
});

$app->get('/fetchKeyToSuccess',function($request, $response, $args) use ($app) {      
        $db = new DbHandler();
        $result = $db->fetchKeyToSuccess();
        return $response->withJson($result);
});

$app->run();
?>