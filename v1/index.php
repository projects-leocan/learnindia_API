<?php

//require '.././libs/Slim/Slim.php';
require '../vendor/autoload.php';
include '../include/DbHandler.php';
// include '../models/Messages.php';
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

$app->get('/fetchGuidenceContent',function($request, $response, $args) use ($app) {      
        $db = new DbHandler();
        $result = $db->fetchGuidenceContent();
        return $response->withJson($result);
});

$app->post('/addGuidenceContent',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content'));   
        if($result == null){

                $content = $request->getParam('content');
                $is_photo_set = false;
                $content_image = null;
                $content_image2 = null;

                if (isset($_FILES['content_image']) && isset($_FILES['content_image2']) ) {
                        $is_photo_set = true;
                        $content_image = $_FILES['content_image'];
                        $content_image2 = $_FILES['content_image2'];
                }

                $db = new DbHandler();
                $result = $db->addGuidenceContent($content,$is_photo_set,$content_image,$content_image2);
        }
        return $response->withJson($result);
});

$app->post('/updateGuidenceContent',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content','content_id'));   
        if($result == null){

                $content = $request->getParam('content');
                $content_id = $request->getParam('content_id');
                $is_photo_set = false;
                $content_image = null;
                $content_image2 = null;
                if (isset($_FILES['content_image']) ) {
                        $is_photo_set = true;
                        $content_image = $_FILES['content_image'];
                }
                if (isset($_FILES['content_image2']) ) {
                        $is_photo_set = true;
                        $content_image2 = $_FILES['content_image2'];
                }
                $db = new DbHandler();
                $result = $db->updateGuidenceContent($content,$content_id,$is_photo_set,$content_image,$content_image2);
        }
        return $response->withJson($result);
});

$app->post('/addJourneyContent',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content'));   
        if($result == null){
                $db = new DbHandler();
                $content = $request->getParam('content');
                $result = $db->addJourneyContent($content);
        }
        return $response->withJson($result);
});

$app->post('/updateJourneyContent',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content_id','content'));   
        if($result == null){
                $db = new DbHandler();
                $content_id = $request->getParam('content_id');
                $content = $request->getParam('content');
                $result = $db->updateJourneyContent($content,$content_id,);
        }
        return $response->withJson($result);
});

$app->get('/fetchJourneyContent',function($request, $response, $args) use ($app) {      
        $db = new DbHandler();
        $result = $db->fetchJourneyContent();
        return $response->withJson($result);
});


$app->post('/addCounseling',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content','heading'));   
        if($result == null){
                $db = new DbHandler();
                $content = $request->getParam('content');
                $heading = $request->getParam('heading');
                $result = $db->addCounseling($content,$heading);
        }
        return $response->withJson($result);
});

$app->post('/updateCounseling',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content_id','content','heading'));    
        if($result == null){
                $db = new DbHandler();
                $content_id = $request->getParam('content_id');
                $content = $request->getParam('content');
                $heading = $request->getParam('heading');
                $result = $db->updateCounseling($content,$heading,$content_id);
        }
        return $response->withJson($result);
});

$app->get('/fetchCounselingContent',function($request, $response, $args) use ($app) {      
        $db = new DbHandler();
        $result = $db->fetchCounselingContent();
        return $response->withJson($result);
});

$app->post('/addSuccessStory',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content','student_name'));   
        if($result == null){
                $db = new DbHandler();
                $content = $request->getParam('content');
                $student_name = $request->getParam('student_name');
                $result = $db->addSuccessStory($content,$student_name);
        }
        return $response->withJson($result);
});

$app->post('/updateSuccessStory',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content_id','content','student_name'));    
        if($result == null){
                $db = new DbHandler();
                $content_id = $request->getParam('content_id');
                $content = $request->getParam('content');
                $student_name = $request->getParam('student_name');
                $result = $db->updateSuccessStory($content,$student_name,$content_id);
        }
        return $response->withJson($result);
});

$app->get('/fetchSuccessStory',function($request, $response, $args) use ($app) {      
        $db = new DbHandler();
        $result = $db->fetchSuccessStory();
        return $response->withJson($result);
});

$app->post('/addAbout',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content'));   
        if($result == null){
                $db = new DbHandler();
                $content = $request->getParam('content');
                $result = $db->addAbout($content);
        }
        return $response->withJson($result);
});

$app->post('/updateAbout',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content','content_id'));   
        if($result == null){
                $db = new DbHandler();
                $content = $request->getParam('content');
                $content_id = $request->getParam('content_id');
                $result = $db->updateAbout($content,$content_id);
        }
        return $response->withJson($result);
});

$app->get('/fetchAbout',function($request, $response, $args) use ($app) {      
        $db = new DbHandler();
        $result = $db->fetchAbout();
        return $response->withJson($result);
});


$app->post('/addAboutInner',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content'));   
        if($result == null){
                $db = new DbHandler();
                $content = $request->getParam('content');
                $result = $db->addAboutInner($content);
        }
        return $response->withJson($result);
});


$app->post('/updateAboutInner',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content','content_id'));   
        if($result == null){
                $db = new DbHandler();
                $content = $request->getParam('content');
                $content_id = $request->getParam('content_id');
                $result = $db->updateAboutInner($content,$content_id);
        }
        return $response->withJson($result);
});

$app->get('/fetchAboutInner',function($request, $response, $args) use ($app) {      
        $db = new DbHandler();
        $result = $db->fetchAboutInner();
        return $response->withJson($result);
});

$app->post('/addEducationLogo',function($request, $response, $args) use ($app) {   
        $db = new DbHandler();
        $is_image_set = false;
        $photos = null;

        if (isset($_FILES['image'])) {
                $is_image_set = true;
                $photos = $_FILES['image'];
        } else {
                $is_image_set = true;
                $photos = $_FILES['image'];
        }
        $result = $db->addEducationLogo($photos, $is_image_set);
        return $response->withJson($result);
});

$app->get('/fetchEducationLogo',function($request, $response, $args) use ($app) {      
        $db = new DbHandler();
        $result = $db->fetchEducationLogo();
        return $response->withJson($result);
});


$app->post('/addTeamMember',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('teacher_name'));   
        if($result == null){

                $teacher_name = $request->getParam('teacher_name');
                $is_photo_set = false;
                $content_image = null;

                if (isset($_FILES['content_image']) ) {
                        $is_photo_set = true;
                        $content_image = $_FILES['content_image'];
                }

                $db = new DbHandler();
                $result = $db->addTeamMember($teacher_name,$is_photo_set,$content_image);
        }
        return $response->withJson($result);
});


$app->post('/updateTeamMember',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('teacher_name','content_id'));   
        if($result == null){
                $teacher_name = $request->getParam('teacher_name');
                $content_id = $request->getParam('content_id');
                $is_photo_set = false;
                $content_image = null;
                if (isset($_FILES['content_image']) ) {
                        $is_photo_set = true;
                        $content_image = $_FILES['content_image'];
                }
                $db = new DbHandler();
                $result = $db->updateTeamMember($teacher_name,$content_id,$is_photo_set,$content_image);
        }
        return $response->withJson($result);
});

$app->post('/deleteTeamMember',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('member_id'));   
        if($result == null){
                $db = new DbHandler();
                $member_id = $request->getParam('member_id');
                $result = $db->deleteTeamMember($member_id);
        }
        return $response->withJson($result);
});

$app->get('/fetchTeamMember',function($request, $response, $args) use ($app) {      
        $db = new DbHandler();
        $result = $db->fetchTeamMember();
        return $response->withJson($result);
});


$app->post('/addBlogContent',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content'));   
        if($result == null){
                $db = new DbHandler();
                $content = $request->getParam('content');
                $result = $db->addBlogContent($content);
        }
        return $response->withJson($result);
});

$app->post('/updateBlogContent',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content','content_id'));   
        if($result == null){
                $db = new DbHandler();
                $content = $request->getParam('content');
                $content_id = $request->getParam('content_id');
                $result = $db->updateBlogContent($content,$content_id);
        }
        return $response->withJson($result);
});

$app->get('/fetchBlogContent',function($request, $response, $args) use ($app) {      
        $db = new DbHandler();
        $result = $db->fetchBlogContent();
        return $response->withJson($result);
});

$app->post('/addBlogInner',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content'));   
        if($result == null){
                $db = new DbHandler();
                $content = $request->getParam('content');
                $result = $db->addBlogInner($content);
        }
        return $response->withJson($result);
});

$app->post('/updateblogInner',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content','content_id'));   
        if($result == null){
                $db = new DbHandler();
                $content = $request->getParam('content');
                $content_id = $request->getParam('content_id');
                $result = $db->updateblogInner($content,$content_id);
        }
        return $response->withJson($result);
});

$app->get('/fetchblogInnerContent',function($request, $response, $args) use ($app) {      
        $db = new DbHandler();
        $result = $db->fetchblogInnerContent();
        return $response->withJson($result);
});


$app->post('/addCareerArticles',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content','heading'));   
        if($result == null){

                $content = $request->getParam('content');
                $heading = $request->getParam('heading');
                $is_photo_set = false;
                $content_image = null;

                if (isset($_FILES['content_image']) ) {
                        $is_photo_set = true;
                        $content_image = $_FILES['content_image'];
                }

                $db = new DbHandler();
                $result = $db->addCareerArticles($content,$heading,$is_photo_set,$content_image);
        }
        return $response->withJson($result);
});

$app->post('/updateCareerArticles',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content','heading','content_id'));   
        if($result == null){

                $content = $request->getParam('content');
                $heading = $request->getParam('heading');
                $content_id = $request->getParam('content_id');
                $is_photo_set = false;
                $content_image = null;

                if (isset($_FILES['content_image']) ) {
                        $is_photo_set = true;
                        $content_image = $_FILES['content_image'];
                }

                $db = new DbHandler();
                $result = $db->updateCareerArticles($content,$heading,$content_id,$is_photo_set,$content_image);
        }
        return $response->withJson($result);
});

$app->post('/deleteCareerArticles',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content_id'));   
        if($result == null){
                $db = new DbHandler();
                $content_id = $request->getParam('content_id');
                $result = $db->deleteCareerArticles($content_id);
        }
        return $response->withJson($result);
});

$app->get('/fetchCareerArticles',function($request, $response, $args) use ($app) {      
        $db = new DbHandler();
        $result = $db->fetchCareerArticles();
        return $response->withJson($result);
});

$app->post('/addServeyContent',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content'));   
        if($result == null){
                $db = new DbHandler();
                $content = $request->getParam('content');
                $result = $db->addServeyContent($content);
        }
        return $response->withJson($result);
});

$app->post('/updateServeyContent',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content','content_id'));   
        if($result == null){
                $db = new DbHandler();
                $content = $request->getParam('content');
                $content_id = $request->getParam('content_id');
                $result = $db->updateServeyContent($content,$content_id);
        }
        return $response->withJson($result);
});

$app->get('/fetchServeyContent',function($request, $response, $args) use ($app) {      
        $db = new DbHandler();
        $result = $db->fetchServeyContent();
        return $response->withJson($result);
});

$app->post('/addTerms',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content'));   
        if($result == null){
                $db = new DbHandler();
                $content = $request->getParam('content');
                $result = $db->addTerms($content);
        }
        return $response->withJson($result);
});

$app->post('/updateTerms',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content','content_id'));   
        if($result == null){
                $db = new DbHandler();
                $content = $request->getParam('content');
                $content_id = $request->getParam('content_id');
                $result = $db->updateTerms($content,$content_id);
        }
        return $response->withJson($result);
});

$app->get('/fetchTerms',function($request, $response, $args) use ($app) {      
        $db = new DbHandler();
        $result = $db->fetchTerms();
        return $response->withJson($result);
});

$app->post('/addTermsContent',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content'));   
        if($result == null){
                $db = new DbHandler();
                $content = $request->getParam('content');
                $result = $db->addTermsContent($content);
        }
        return $response->withJson($result);
});

$app->post('/updateTermsContent',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content','content_id'));   
        if($result == null){
                $db = new DbHandler();
                $content = $request->getParam('content');
                $content_id = $request->getParam('content_id');
                $result = $db->updateTermsContent($content,$content_id);
        }
        return $response->withJson($result);
});

$app->get('/fetchTermsContent',function($request, $response, $args) use ($app) {      
        $db = new DbHandler();
        $result = $db->fetchTermsContent();
        return $response->withJson($result);
});


$app->get('/fetchTerms_condition',function($request, $response, $args) use ($app) {      
        $db = new DbHandler();
        $result = $db->fetchTerms_condition();
        return $response->withJson($result);
});

$app->post('/addTerms_condition',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content','heading'));   
        if($result == null){
                $db = new DbHandler();
                $content = $request->getParam('content');
                $heading = $request->getParam('heading');
                $result = $db->addTerms_condition($content,$heading);
        }
        return $response->withJson($result);
});

$app->post('/updateTerms_condition',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content_id','content','heading'));    
        if($result == null){
                $db = new DbHandler();
                $content_id = $request->getParam('content_id');
                $content = $request->getParam('content');
                $heading = $request->getParam('heading');
                $result = $db->updateTerms_condition($content,$heading,$content_id);
        }
        return $response->withJson($result);
});

$app->post('/deleteTerms_conditon',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content_id'));   
        if($result == null){
                $db = new DbHandler();
                $content_id = $request->getParam('content_id');
                $result = $db->deleteTerms_conditon($content_id,);
        }
        return $response->withJson($result);
});

$app->post('/addContact',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content','contact_num','email','address'));   
        if($result == null){
                $db = new DbHandler();
                $content = $request->getParam('content');
                $contact_num = $request->getParam('contact_num');
                $email = $request->getParam('email');
                $address = $request->getParam('address');
                $result = $db->addContact($content,$contact_num,$email,$address);
        }
        return $response->withJson($result);
});

$app->post('/updateContact',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('content_id','content','contact_num','email','address'));     
        if($result == null){
                $db = new DbHandler();
                $content_id = $request->getParam('content_id');
                $content = $request->getParam('content');
                $contact_num = $request->getParam('contact_num');
                $email = $request->getParam('email');
                $address = $request->getParam('address');
                $result = $db->updateContact($content,$contact_num,$email,$address,$content_id);
        }
        return $response->withJson($result);
});

$app->get('/fetchContact',function($request, $response, $args) use ($app) {      
        $db = new DbHandler();
        $result = $db->fetchContact();
        return $response->withJson($result);
});

$app->post('/fillContactForm',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('user_name','email','meassge'));   
        if($result == null){
                $db = new DbHandler();
                $user_name = $request->getParam('user_name');
                $email = $request->getParam('email');
                $meassge = $request->getParam('meassge');
                $result = $db->fillContactForm($user_name,$email,$meassge);
        }
        return $response->withJson($result);
});

$app->get('/fetchContactFormDetails',function($request, $response, $args) use ($app) {      
        $db = new DbHandler();
        $result = $db->fetchContactFormDetails();
        return $response->withJson($result);
});

$app->post('/addQuestionnaire',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('question'));   
        if($result == null){
                $db = new DbHandler();
                $question = $request->getParam('question');
                $result = $db->addQuestionnaire($question);
        }
        return $response->withJson($result);
});

$app->post('/updateQuestionnaire',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('question','question_id'));   
        if($result == null){
                $db = new DbHandler();
                $question = $request->getParam('question');
                $question_id = $request->getParam('question_id');
                $result = $db->updateQuestionnaire($question,$question_id);
        }
        return $response->withJson($result);
});

$app->post('/deleteQuestionnaire',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('question_id'));   
        if($result == null){
                $db = new DbHandler();
                $question_id = $request->getParam('question_id');
                $result = $db->deleteQuestionnaire($question_id);
        }
        return $response->withJson($result);
});

$app->post('/addOption',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('option','question_id'));    
        if($result == null){
                $db = new DbHandler();
                $option = $request->getParam('option');
                $question_id = $request->getParam('question_id');
                $result = $db->addOption($option,$question_id);
        }
        return $response->withJson($result);
});

$app->post('/updateOption',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('option','question_id'));    
        if($result == null){
                $db = new DbHandler();
                $option = $request->getParam('option');
                $question_id = $request->getParam('question_id');
                $result = $db->updateOption($option,$question_id);
        }
        return $response->withJson($result);
});

$app->post('/fetchQuestionnaire',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('page_num','page_size'));    
        if($result == null){
                $db = new DbHandler();
                $page_num = $request->getParam('page_num');
                $page_size = $request->getParam('page_size');
                $result = $db->fetchQuestionnaire($page_num,$page_size);
        }
        return $response->withJson($result);
});



$app->post('/fillServeyForm',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('first_name','last_name','email','date_of_birth','gender','grade'));    
        if($result == null){
                $db = new DbHandler();
                $first_name = $request->getParam('first_name');
                $last_name = $request->getParam('last_name');
                $email = $request->getParam('email');
                $date_of_birth = $request->getParam('date_of_birth');
                $gender = $request->getParam('gender');
                $grade = $request->getParam('grade');
                $result = $db->fillServeyForm($first_name,$last_name,$email,$date_of_birth,$gender,$grade);
        }
        return $response->withJson($result);
});

$app->get('/fetchServeyForm',function($request, $response, $args) use ($app) {      
        $db = new DbHandler();
        $result = $db->fetchServeyForm();
        return $response->withJson($result);
});

$app->post('/deleteServeyResponse',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('user_id'));   
        if($result == null){
                $db = new DbHandler();
                $user_id = $request->getParam('user_id');
                $result = $db->deleteServeyResponse($user_id);
        }
        return $response->withJson($result);
});

$app->post('/storeAnswers',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('answer','user_name'));   
        if($result == null){
                $db = new DbHandler();
                $answer = $request->getParam('answer');
                $user_name = $request->getParam('user_name');
                $result = $db->storeAnswers($answer,$user_name);
        }
        return $response->withJson($result);
});

$app->post('/fetchAnswers',function($request, $response, $args) use ($app) {   
        $result = verifyRequiredParams(array('email'));   
        if($result == null){
                $db = new DbHandler();
                $email = $request->getParam('email');
                $result = $db->fetchAnswers($email);
        }
        return $response->withJson($result);
});

$app->run();
?>