<?php

class DbHandler {
    private $conn;
    private $image_path='../uploads/';
    private $image_path2='../uploads/';
    private $image_path3='../uploads/';
	
    function __construct() {
        require_once dirname(__FILE__) . '/DbConnect.php';
        // opening db connection
        $db = new DbConnect();
        $this->conn = $db->connect();
    }


    // ================   ADMIN    ==============================
    public function adminLogin($admin_email,$admin_password)
    {
    
        $sql_query="CALL admin_login(?,?)";    
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('ss', $admin_email, $admin_password); 
        $stmt->execute();
    
        $res = $stmt->get_result();
        $response = array();

        while($record = $res->fetch_assoc()){
            $response = $record;
        }

        $stmt->close();

        if (count($response) > 0) {
            $result=array(
                'success'=>true,
                'Message'=> "Login successful",
                'Status'=> "Success",
                'Response'=>$response,
            );
        }
        else
        { 
            $result=array(
                'success'=>false,
                'Message'=> "Invalid email or password . Internal server error",
                'Status'=> "Error"
            );
        }
        return $result;
        
    }

    public function editAdminProfile($admin_id,$user_name,$email,$contact_num,$gender,$DOB,$is_photo_set,$pro_image)
    {
        
        $sql_query="CALL editAdminProfile(?,?,?,?,?,?,@is_done)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('isssss', $admin_id,$user_name,$email,$contact_num,$gender,$DOB);
        $stmt->execute();
        $stmt->close();
                
        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done");
        $stmt1->execute();
        $stmt1->bind_result($is_done);       
        $stmt1->fetch();
        $stmt1->close();
        $result = array();

        if ($is_done == 1) {
            if ($is_photo_set) {
                if (!file_exists($this->image_path)) {
                    mkdir($this->image_path, 0777, true);
                }
                $extension = pathinfo($pro_image['name'], PATHINFO_EXTENSION);
                $filename = time() . $pro_name . '_img' . '.' . $extension;
                $file = $this->image_path . $filename;
                if (move_uploaded_file($pro_image['tmp_name'], $file)) {
                    
                    $stmt2 = $this->conn->query("UPDATE tbl_admin SET profile_image = '$filename' WHERE admin_id = $admin_id");
                    $result = array(
                        'success'=>true,
                        'Message'=> "Profile Updated successfully",
                        'Status'=> "Success"
                    );

                } else {
                    $result = array(
                        'success' => true,
                        'Message' => 'Profile Updated successfully . but images are not uploaded due to some issues',
                        'Status'=> "Success"
                    );
                }
            } else {
                $result = array(
                    'success' => false,
                    'Message'=> "Failed to Update Profile . Image is Missing",
                    'Status'=> "Error"
                );
            }
            return $result;
        }
    }

    public function adminChangePassword($admin_id,$password)
    {
        if ($password != "") {
            $password = md5($password);
        }

        $sql_query="CALL adminChangePassword(?,?,@is_done)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('is',$admin_id,$password);
        $stmt->execute();
        $stmt->close();
                
        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done");
        $stmt1->execute();
        $stmt1->bind_result($is_done);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result = array(
                'success'=>true,
                'Message'=> "Password updated successfully",
                'Status'=> "Success"
            );
        }
        else
        {
            $result = array(
                'success'=>false,
                'Message'=> "Password change failed. Please make sure your new password meets the minimum requirements and try again",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    //  ================   FETCH/SEARCH API's    ==============================

    public function fetchKeyToSuccess()
    {
        $sql_query="CALL fetchKeyToSuccess()"; 
        $stmt = $this->conn->query($sql_query); 
        $this->conn->next_result();           
        $response = array();
        while ( $row = $stmt->fetch_assoc()) {     
            $response = $row;
        }

        $stmt->close();

        if (count($response)>0)
        {
            $result=array(
                'success'=>true,
                'Message'=> "Content fetched successfully",
                'Status'=> "Success",
                'Response'=>$response
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to fetch Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }
    
    public function fetchGuidenceContent()
    {
        $sql_query="CALL fetchGuidenceContent()"; 
        $stmt = $this->conn->query($sql_query); 
        $this->conn->next_result();           
        $response = array();
        while ( $row = $stmt->fetch_assoc()) {     
            $response = $row;
        }

        $stmt->close();

        if (count($response)>0)
        {
            $result=array(
                'success'=>true,
                'Message'=> "Content fetched successfully",
                'Status'=> "Success",
                'Response'=>$response
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to fetch Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function fetchJourneyContent()
    {
        $sql_query="CALL fetchJourneyContent()"; 
        $stmt = $this->conn->query($sql_query); 
        $this->conn->next_result();           
        $response = array();
        while ( $row = $stmt->fetch_assoc()) {     
            $response = $row;
        }

        $stmt->close();

        if (count($response)>0)
        {
            $result=array(
                'success'=>true,
                'Message'=> "Content fetched successfully",
                'Status'=> "Success",
                'Response'=>$response
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to fetch Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function fetchCounselingContent()
    {
        $sql_query="CALL fetchCounselingContent()"; 
        $stmt = $this->conn->query($sql_query); 
        $this->conn->next_result();           
        $response = array();
        while ( $row = $stmt->fetch_assoc()) {     
            $response = $row;
        }

        $stmt->close();

        if (count($response)>0)
        {
            $result=array(
                'success'=>true,
                'Message'=> "Content fetched successfully",
                'Status'=> "Success",
                'Response'=>$response
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to fetch Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function fetchSuccessStory()
    {
        $sql_query="CALL fetchSuccessStory()"; 
        $stmt = $this->conn->query($sql_query); 
        $this->conn->next_result();           
        $response = array();
        while ( $row = $stmt->fetch_assoc()) {     
            $response[] = $row;
        }

        $stmt->close();

        if (count($response)>0)
        {
            $result=array(
                'success'=>true,
                'Message'=> "Content fetched successfully",
                'Status'=> "Success",
                'Response'=>$response
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to fetch Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    // combine all HOME Section response
    public function fetchCombinedContent()
    {
        $response = array();

        // Fetch data from the first table
        $sql_query = "SELECT * FROM `home`";
        $result = $this->conn->query($sql_query);
        $table1Response = array();
        while ($row = $result->fetch_assoc()) {
            $table1Response[] = $row;
        }
        if (count($table1Response) > 0) {
            $response['home'] = $table1Response;
        }

        $sql_query = "SELECT * FROM `career_guidence`";
        $result = $this->conn->query($sql_query);
        $table2Response = array();
        while ($row = $result->fetch_assoc()) {
            $table2Response[] = $row;
        }
        if (count($table2Response) > 0) {
            $response['career_guidance'] = $table2Response;
        }

        $sql_query = "SELECT * FROM `career_journey`";
        $result = $this->conn->query($sql_query);
        $table3Response = array();
        while ($row = $result->fetch_assoc()) {
            $table3Response[] = $row;
        }
        if (count($table3Response) > 0) {
            $response['career_journey'] = $table3Response;
        }

        $sql_query = "SELECT * FROM `counseling`";
        $result = $this->conn->query($sql_query);
        $table4Response = array();
        while ($row = $result->fetch_assoc()) {
            $table4Response[] = $row;
        }
        if (count($table4Response) > 0) {
            $response['counseling'] = $table4Response;
        }

        $sql_query = "SELECT * FROM `success_stories`";
        $result = $this->conn->query($sql_query);
        $table5Response = array();
        while ($row = $result->fetch_assoc()) {
            $table5Response[] = $row;
        }
        if (count($table5Response) > 0) {
            $response['success_stories'] = $table5Response;
        }


        if (count($response) > 0) {
            $result = array(
                'success' => true,
                'Message' => "Content fetched successfully",
                'Status' => "Success",
                'Response' => $response
            );
        } else {
            $result = array(
                'success' => false,
                'Message' => "Failed to fetch Content",
                'Status' => "Error"
            );
        }

        return $result;
    }

    // combine all About Section response

    public function fetchAboutCombinedContent()
    {
        $response = array();

        // Fetch data from the first table
        $sql_query = "SELECT * FROM `about_main`";
        $result = $this->conn->query($sql_query);
        $table1Response = array();
        while ($row = $result->fetch_assoc()) {
            $table1Response[] = $row;
        }
        if (count($table1Response) > 0) {
            $response['about_main'] = $table1Response;
        }

        $sql_query = "SELECT * FROM `about_inner`";
        $result = $this->conn->query($sql_query);
        $table2Response = array();
        while ($row = $result->fetch_assoc()) {
            $table2Response[] = $row;
        }
        if (count($table2Response) > 0) {
            $response['about_inner'] = $table2Response;
        }

        $sql_query = "SELECT * FROM `education_logo`;";
        $result = $this->conn->query($sql_query);
        $table3Response = array();
        while ($row = $result->fetch_assoc()) {
            $table3Response[] = $row;
        }
        if (count($table3Response) > 0) {
            $response['education_logo'] = $table3Response;
        }

        $sql_query = "SELECT * FROM `our_team`;";
        $result = $this->conn->query($sql_query);
        $table4Response = array();
        while ($row = $result->fetch_assoc()) {
            $table4Response[] = $row;
        }
        if (count($table4Response) > 0) {
            $response['our_team'] = $table4Response;
        }

        if (count($response) > 0) {
            $result = array(
                'success' => true,
                'Message' => "Content fetched successfully",
                'Status' => "Success",
                'Response' => $response
            );
        } else {
            $result = array(
                'success' => false,
                'Message' => "Failed to fetch Content",
                'Status' => "Error"
            );
        }

        return $result;
    }

    public function fetchAbout()
    {
        $sql_query="CALL fetchAbout()"; 
        $stmt = $this->conn->query($sql_query); 
        $this->conn->next_result();           
        $response = array();
        while ( $row = $stmt->fetch_assoc()) {     
            $response = $row;
        }

        $stmt->close();

        if (count($response)>0)
        {
            $result=array(
                'success'=>true,
                'Message'=> "Content fetched successfully",
                'Status'=> "Success",
                'Response'=>$response
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to fetch Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function fetchAboutInner()
    {
        $sql_query="CALL fetchAboutInner()"; 
        $stmt = $this->conn->query($sql_query); 
        $this->conn->next_result();           
        $response = array();
        while ( $row = $stmt->fetch_assoc()) {     
            $response = $row;
        }

        $stmt->close();

        if (count($response)>0)
        {
            $result=array(
                'success'=>true,
                'Message'=> "Content fetched successfully",
                'Status'=> "Success",
                'Response'=>$response
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to fetch Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function fetchEducationLogo()
    {
        $sql_query="CALL fetchEducationLogo()"; 
        $stmt = $this->conn->query($sql_query); 
        $this->conn->next_result();           
        $response = array();
        while ( $row = $stmt->fetch_assoc()) {     
            $response[] = $row;
        }

        $stmt->close();

        if (count($response)>0)
        {
            $result=array(
                'success'=>true,
                'Message'=> "Content fetched successfully",
                'Status'=> "Success",
                'Response'=>$response
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to fetch Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function fetchTeamMember()
    {
        $sql_query="CALL fetchTeamMember()"; 
        $stmt = $this->conn->query($sql_query); 
        $this->conn->next_result();           
        $response = array();
        while ( $row = $stmt->fetch_assoc()) {     
            $response[] = $row;
        }

        $stmt->close();

        if (count($response)>0)
        {
            $result=array(
                'success'=>true,
                'Message'=> "Content fetched successfully",
                'Status'=> "Success",
                'Response'=>$response
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to fetch Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }
    
    public function fetchBlogContent()
    {
        $sql_query="CALL fetchBlogContent()"; 
        $stmt = $this->conn->query($sql_query); 
        $this->conn->next_result();           
        $response = array();
        while ( $row = $stmt->fetch_assoc()) {     
            $response = $row;
        }

        $stmt->close();

        if (count($response)>0)
        {
            $result=array(
                'success'=>true,
                'Message'=> "Content fetched successfully",
                'Status'=> "Success",
                'Response'=>$response
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to fetch Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function fetchblogInnerContent()
    {
        $sql_query = "CALL fetchblogInnerContent()";

        // Execute the query
        $stmt = $this->conn->query($sql_query);

        // Check for query error
        if (!$stmt) {
            $result = array(
                'success' => false,
                'Message' => "Query error: " . $this->conn->error,
                'Status' => "Error"
            );
            return $result;
        }

        // Check for empty result set
        if ($stmt->num_rows > 0) {
            $response = $stmt->fetch_assoc();
        } else {
            $result = array(
                'success' => false,
                'Message' => "Failed to fetch Content",
                'Status' => "Error"
            );
            return $result;
        }

        $stmt->close();

        $result = array(
            'success' => true,
            'Message' => "Content fetched successfully",
            'Status' => "Success",
            'Response' => $response
        );

        return $result;
    }

    public function fetchCareerArticles()
    {
        $sql_query="CALL fetchCareerArticles()"; 
        $stmt = $this->conn->query($sql_query); 
        $this->conn->next_result();           
        $response = array();
        while ( $row = $stmt->fetch_assoc()) {     
            $response[] = $row;
        }

        $stmt->close();

        if (count($response)>0)
        {
            $result=array(
                'success'=>true,
                'Message'=> "Content fetched successfully",
                'Status'=> "Success",
                'Response'=>$response
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to fetch Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    // combine all Blog Section response
    public function fetchBlogCombinedContent()
    {
        $response = array();

        // Fetch data from the first table
        $sql_query = "SELECT * FROM `blog`";
        $result = $this->conn->query($sql_query);
        $table1Response = array();
        while ($row = $result->fetch_assoc()) {
            $table1Response[] = $row;
        }
        if (count($table1Response) > 0) {
            $response['blog'] = $table1Response;
        }

        $sql_query = "SELECT * FROM `bloginner`;";
        $result = $this->conn->query($sql_query);
        $table2Response = array();
        while ($row = $result->fetch_assoc()) {
            $table2Response[] = $row;
        }
        if (count($table2Response) > 0) {
            $response['bloginner'] = $table2Response;
        }

        $sql_query = "SELECT * FROM `career_articles`";
        $result = $this->conn->query($sql_query);
        $table3Response = array();
        while ($row = $result->fetch_assoc()) {
            $table3Response[] = $row;
        }
        if (count($table3Response) > 0) {
            $response['career_articles'] = $table3Response;
        }

        if (count($response) > 0) {
            $result = array(
                'success' => true,
                'Message' => "Content fetched successfully",
                'Status' => "Success",
                'Response' => $response
            );
        } else {
            $result = array(
                'success' => false,
                'Message' => "Failed to fetch Content",
                'Status' => "Error"
            );
        }

        return $result;
    }

    public function fetchServeyContent()
    {
        $sql_query="CALL fetchServeyContent()"; 
        $stmt = $this->conn->query($sql_query); 
        $this->conn->next_result();           
        $response = array();
        while ( $row = $stmt->fetch_assoc()) {     
            $response = $row;
        }

        $stmt->close();

        if (count($response)>0)
        {
            $result=array(
                'success'=>true,
                'Message'=> "Content fetched successfully",
                'Status'=> "Success",
                'Response'=>$response
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to fetch Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function fetchTerms()
    {
        $sql_query="CALL fetchTerms()"; 
        $stmt = $this->conn->query($sql_query); 
        $this->conn->next_result();           
        $response = array();
        while ( $row = $stmt->fetch_assoc()) {     
            $response = $row;
        }

        $stmt->close();

        if (count($response)>0)
        {
            $result=array(
                'success'=>true,
                'Message'=> "Content fetched successfully",
                'Status'=> "Success",
                'Response'=>$response
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to fetch Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function fetchTermsContent()
    {
        $sql_query="CALL fetchTermsContent()"; 
        $stmt = $this->conn->query($sql_query); 
        $this->conn->next_result();           
        $response = array();
        while ( $row = $stmt->fetch_assoc()) {     
            $response = $row;
        }

        $stmt->close();

        if (count($response)>0)
        {
            $result=array(
                'success'=>true,
                'Message'=> "Content fetched successfully",
                'Status'=> "Success",
                'Response'=>$response
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to fetch Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function fetchTerms_condition()
    {
        $sql_query="CALL fetchTerms_condition()"; 
        $stmt = $this->conn->query($sql_query); 
        $this->conn->next_result();           
        $response = array();
        while ( $row = $stmt->fetch_assoc()) {     
            $response[] = $row;
        }

        $stmt->close();

        if (count($response)>0)
        {
            $result=array(
                'success'=>true,
                'Message'=> "Content fetched successfully",
                'Status'=> "Success",
                'Response'=>$response
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to fetch Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    // combine all T&C Section response
    public function fetchTermsCombinedContent()
    {
        $response = array();

        // Fetch data from the first table
        $sql_query = "SELECT * FROM `terms`";
        $result = $this->conn->query($sql_query);
        $table1Response = array();
        while ($row = $result->fetch_assoc()) {
            $table1Response[] = $row;
        }
        if (count($table1Response) > 0) {
            $response['terms'] = $table1Response;
        }

        $sql_query = "SELECT * FROM `terms_condition`";
        $result = $this->conn->query($sql_query);
        $table2Response = array();
        while ($row = $result->fetch_assoc()) {
            $table2Response[] = $row;
        }
        if (count($table2Response) > 0) {
            $response['terms_condition'] = $table2Response;
        }

        $sql_query = "SELECT * FROM `add_terms`";
        $result = $this->conn->query($sql_query);
        $table3Response = array();
        while ($row = $result->fetch_assoc()) {
            $table3Response[] = $row;
        }
        if (count($table3Response) > 0) {
            $response['add_terms'] = $table3Response;
        }

        if (count($response) > 0) {
            $result = array(
                'success' => true,
                'Message' => "Content fetched successfully",
                'Status' => "Success",
                'Response' => $response
            );
        } else {
            $result = array(
                'success' => false,
                'Message' => "Failed to fetch Content",
                'Status' => "Error"
            );
        }

        return $result;
    }

    public function fetchContact()
    {
        $sql_query="CALL fetchContact()"; 
        $stmt = $this->conn->query($sql_query); 
        $this->conn->next_result();           
        $response = array();
        while ( $row = $stmt->fetch_assoc()) {     
            $response = $row;
        }

        $stmt->close();

        if (count($response)>0)
        {
            $result=array(
                'success'=>true,
                'Message'=> "Content fetched successfully",
                'Status'=> "Success",
                'Response'=>$response
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to fetch Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function fetchContactFormDetails()
    {
        $sql_query="CALL fetchContactFormDetails()"; 
        $stmt = $this->conn->query($sql_query); 
        $this->conn->next_result();           
        $response = array();
        while ( $row = $stmt->fetch_assoc()) {     
            $response[] = $row;
        }

        $stmt->close();

        if (count($response)>0)
        {
            $result=array(
                'success'=>true,
                'Message'=> "Content fetched successfully",
                'Status'=> "Success",
                'Response'=>$response
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to fetch Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function fetchQuestions()
    {
        $sql_query="CALL fetchQuestions()"; 
        $stmt = $this->conn->query($sql_query); 
        $this->conn->next_result();           
        $response = array();
        while ( $row = $stmt->fetch_assoc()) {     
            $response[] = $row;
        }

        $stmt->close();

        if (count($response)>0)
        {
            $result=array(
                'success'=>true,
                'Message'=> "Content fetched successfully",
                'Status'=> "Success",
                'Response'=>$response
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to fetch Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function fetchQuestionnaire($page_number,$page_size)
    {
        $sql_query="CALL fetchQuestionnaire(?,?,@totalQuestions)";    
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('ii', $page_number,$page_size); 
        $stmt->execute();
    
        $res = $stmt->get_result();
        $response = array();

        while($record = $res->fetch_assoc()){
            $response[] = $record;
        }

        $stmt->close();

        $stmt1 = $this->conn->prepare("SELECT @totalQuestions AS totalQuestions");
        $stmt1->execute();
        $stmt1->bind_result($totalQuestions);       
        $stmt1->fetch();
        $stmt1->close();

        if (count($response) > 0) {
            $result=array(
                'success'=>true,
                'Message'=> "Answers fetched successfully",
                'Status'=> "Success",
                'Response'=>$response,
                'totalQuestions'=>$totalQuestions
            );
        }
        else
        { 
            $result=array(
                'success'=>false,
                'Message'=> "Failed to fetch Answer",
                'Status'=> "Error"
            );
        }
        return $result;
        
    }

    public function fetchServeyForm()
    {
        $sql_query="CALL fetchServeyForm()"; 
        $stmt = $this->conn->query($sql_query); 
        $this->conn->next_result();           
        $response = array();
        while ( $row = $stmt->fetch_assoc()) {     
            $response[] = $row;
        }
    
        $stmt->close();
    
        if (count($response)>0)
        {
                $result=array(
                    'success'=>true,
                    'Message'=> "Content fetched successfully",
                    'Status'=> "Success",
                    'Response'=>$response
                );
        }
        else
        {
                $result=array(
                    'success'=>false,
                    'Message'=> "Failed to fetch Content",
                    'Status'=> "Error"
                );
        }
        return $result;
    }

    public function fetchAnswers($email)
    {
    
        $sql_query="CALL fetchAnswers(?)";    
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('s', $email); 
        $stmt->execute();
    
        $res = $stmt->get_result();
        $response = array();

        while($record = $res->fetch_assoc()){
            $response[] = $record;
        }

        $stmt->close();

        if (count($response) > 0) {
            $result=array(
                'success'=>true,
                'Message'=> "Answers fetched successfully",
                'Status'=> "Success",
                'Response'=>$response
            );
        }
        else
        { 
            $result=array(
                'success'=>false,
                'Message'=> "Failed to fetch Answer",
                'Status'=> "Error"
            );
        }
        return $result;
        
    }

    // ================ HOME ==============================

    public function addKeyToSuccess($content)
    {
        $sql_query="CALL addKeyToSuccess(?,@is_done,@last_added)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('s', $content);
        $stmt->execute();
        $stmt->close();
                
        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done,@last_added AS last_added");
        $stmt1->execute();
        $stmt1->bind_result($is_done, $last_added);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Content added successfully",
                'Status'=> "Success",
                'last_added'=>$last_added
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to add Content.",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function updateKeyToSuccess($content,$id)
    {
        $sql_query="CALL updateKeyToSuccess(?,?,@is_done)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('si',$content,$id);
        $stmt->execute();
        $stmt->close();

        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done");
        $stmt1->execute();
        $stmt1->bind_result($is_done);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Content Updated successfully",
                'Status'=> "Success"
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to update Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function deleteKeyToSuccess($id)
    {
        $sql_query="CALL deleteKeyToSuccess(?,@is_done)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $stmt->close();
        
        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done");
        $stmt1->execute();
        $stmt1->bind_result($is_done);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Content Deleted Successfully",
                'Status'=> "Success"
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to Delete Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function addGuidenceContent($content,$is_photo_set,$content_image,$content_image2)
    {
        $sql_query="CALL addGuidenceContent(?,@is_done,@last_added)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('s', $content);
        $stmt->execute();
        $stmt->close();
                
        $stmt1 = $this->conn->prepare("SELECT @last_added AS last_added,@is_done AS is_done");
        $stmt1->execute();
        $stmt1->bind_result($last_added,$is_done);       
        $stmt1->fetch();
        $stmt1->close();
        $result = array();

        if ($is_done == 1) {
            if ($is_photo_set) {
                if (!file_exists($this->image_path)) {
                    mkdir($this->image_path, 0777, true);
                }

                $extension = pathinfo($content_image['name'], PATHINFO_EXTENSION);
                $extension_image2 = pathinfo($content_image2['name'], PATHINFO_EXTENSION);
                $filename = time().'_img'.'.'.$extension;
                $filename2 = time().'_img2'.'.'.$extension_image2;
                $file = $this->image_path . $filename;
                $file2 = $this->image_path2 . $filename2;

                if (move_uploaded_file($content_image['tmp_name'], $file) && move_uploaded_file($content_image2['tmp_name'], $file2)) {                    
                    $stmt2 = $this->conn->query(" UPDATE career_guidence SET image = '$filename' , image2 = '$filename2' WHERE id = $last_added");
                    $result = array(
                        'success'=>true,
                        'Message'=> "Content added successfully ",
                        'Status'=> "Success",
                        'last_added'=>$last_added
                    );

                } else {
                    $result = array(
                        'success' => true,
                        'Message' => 'Content added successfully . but images are not uploaded due to some issues ',
                        'Status'=> "Success",
                        'last_added'=>$last_added
                    );
                }
            } else {
                $result = array(
                    'success' => true,
                    'Message'=> "Content added successfully . but images are not uploaded due to some issues ",
                    'Status'=> "Success",
                    'last_added'=>$last_added
                );
            }
            return $result;

        }
        else
        {
            $result = array(
                'success' => true,
                'Message'=> "Content added successfully ",
                'Status'=> "Success",
                'last_added'=>$last_added
            );
        }
        return $result;
    }

    public function updateGuidenceContent($content,$content_id,$is_photo_set,$content_image,$content_image2)
    {
        $sql_query="CALL updateGuidenceContent(?,?,@is_done)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('si', $content,$content_id);
        $stmt->execute();
        $stmt->close();
                
        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done");
        $stmt1->execute();
        $stmt1->bind_result($is_done);       
        $stmt1->fetch();
        $stmt1->close();
        $result = array();
            if ($is_photo_set) {
                if (!file_exists($this->image_path)) {
                    mkdir($this->image_path, 0777, true);
                }
                $extension = pathinfo($content_image['name'], PATHINFO_EXTENSION);
                $extension_image2 = pathinfo($content_image2['name'], PATHINFO_EXTENSION);
                $filename = time().'_img'.'.'.$extension;
                $filename2 = time().'_img2'.'.'.$extension_image2;
                $file = $this->image_path . $filename;
                $file2 = $this->image_path2 . $filename2;

                if (move_uploaded_file($content_image['tmp_name'], $file) && move_uploaded_file($content_image2['tmp_name'], $file2)) {                    
                    $stmt2 = $this->conn->query(" UPDATE career_guidence SET image = '$filename' , image2 = '$filename2' WHERE id = $content_id");
                    $result = array(
                        'success'=>true,
                        'Message'=> "Content Updated successfully",
                        'Status'=> "Success"
                    );

                } else {
                    $result = array(
                        'success' => true,
                        'Message' => 'Content Updated successfully . but images are not uploaded due to some issues',
                        'Status'=> "Success"
                    );
                }
            } else {
                $result = array(
                    'success' => true,
                    'Message'=> "Content Updated successfully but images are not uploaded due to some issues ",
                    'Status'=> "Success"
                );
            }
            return $result;
        }


    public function addJourneyContent($content)
    {
        $sql_query="CALL addJourneyContent(?,@is_done,@last_added)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('s', $content);
        $stmt->execute();
        $stmt->close();
                
        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done,@last_added AS last_added");
        $stmt1->execute();
        $stmt1->bind_result($is_done, $last_added);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Content added successfully",
                'Status'=> "Success",
                'last_added'=>$last_added
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to add Content.",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function updateJourneyContent($content,$id)
    {
        $sql_query="CALL updateJourneyContent(?,?,@is_done)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('si',$content,$id);
        $stmt->execute();
        $stmt->close();

        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done");
        $stmt1->execute();
        $stmt1->bind_result($is_done);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Content Updated successfully",
                'Status'=> "Success"
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to update Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function addCounseling($content,$heading)
    {
        $sql_query="CALL addCounseling(?,?,@is_done,@last_added)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('ss', $content,$heading);
        $stmt->execute();
        $stmt->close();
                
        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done,@last_added AS last_added");
        $stmt1->execute();
        $stmt1->bind_result($is_done, $last_added);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Content added successfully",
                'Status'=> "Success",
                'last_added'=>$last_added
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to add Content.",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function updateCounseling($content,$heading,$id)
    {
        $sql_query="CALL updateCounseling(?,?,?,@is_done)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('ssi',$content,$heading,$id);
        $stmt->execute();
        $stmt->close();

        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done");
        $stmt1->execute();
        $stmt1->bind_result($is_done);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Content Updated successfully",
                'Status'=> "Success"
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to update Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function addSuccessStory($content,$student_name)
    {
        $sql_query="CALL addSuccessStory(?,?,@is_done,@last_added)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('ss', $content,$student_name);
        $stmt->execute();
        $stmt->close();
                
        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done,@last_added AS last_added");
        $stmt1->execute();
        $stmt1->bind_result($is_done, $last_added);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Content added successfully",
                'Status'=> "Success",
                'last_added'=>$last_added
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to add Content.",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function updateSuccessStory($content,$student_name,$id)
    {
        $sql_query="CALL updateSuccessStory(?,?,?,@is_done)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('ssi',$content,$student_name,$id);
        $stmt->execute();
        $stmt->close();

        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done");
        $stmt1->execute();
        $stmt1->bind_result($is_done);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Content Updated successfully",
                'Status'=> "Success"
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to update Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function deleteSuccessStory($id)
    {
        $sql_query = "DELETE FROM `success_stories` WHERE id = ?";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $affectedRows = $stmt->affected_rows;
        $stmt->close();
        
        if ($affectedRows > 0) {
            $is_done = 1;
            $result = array(
                'success' => true,
                'Message' => "Content Deleted Successfully",
                'Status' => "Success"
            );
        } else {
            $is_done = 0;
            $result = array(
                'success' => false,
                'Message' => "Failed to Delete Content",
                'Status' => "Error"
            );
        }
        
        // $result['is_done'] = $is_done;
        return $result;
    }
    

    // ================ ABOUT US SECTION ==============================

    public function addAbout($content)
    {
        $sql_query="CALL addAbout(?,@is_done,@last_added)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('s', $content);
        $stmt->execute();
        $stmt->close();
                
        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done,@last_added AS last_added");
        $stmt1->execute();
        $stmt1->bind_result($is_done, $last_added);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Content added successfully",
                'Status'=> "Success",
                'last_added'=>$last_added
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to add Content.",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function updateAbout($content,$id)
    {
        $sql_query="CALL updateAbout(?,?,@is_done)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('si',$content,$id);
        $stmt->execute();
        $stmt->close();

        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done");
        $stmt1->execute();
        $stmt1->bind_result($is_done);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Content Updated successfully",
                'Status'=> "Success"
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to update Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function addAboutInner($content)
    {
        $sql_query="CALL addAboutInner(?,@is_done,@last_added)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('s', $content);
        $stmt->execute();
        $stmt->close();
                
        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done,@last_added AS last_added");
        $stmt1->execute();
        $stmt1->bind_result($is_done, $last_added);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Content added successfully",
                'Status'=> "Success",
                'last_added'=>$last_added
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to add Content.",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function updateAboutInner($content,$id)
    {
        $sql_query="CALL updateAboutInner(?,?,@is_done)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('si',$content,$id);
        $stmt->execute();
        $stmt->close();

        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done");
        $stmt1->execute();
        $stmt1->bind_result($is_done);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Content Updated successfully",
                'Status'=> "Success"
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to update Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function addEducationLogo($photos, $is_photo_set)
    {
        if ($is_photo_set) {
            if (!file_exists($this->image_path3)) {
                mkdir($this->image_path3, 0777, true);
            }

            $count = count($photos["name"]);

            for ($i = 0; $i < $count; $i++) {
                $extension = pathinfo($photos['name'][$i], PATHINFO_EXTENSION);
                $filename = time() . $i . '.' . $extension;
                $file = $this->image_path3 . $filename;


                if (move_uploaded_file($photos['tmp_name'][$i], $file)) {
                    $sql_query = "INSERT INTO `education_logo`(`image`) VALUES('$filename');";
                    $stmt1 = $this->conn->query($sql_query);
                    $result = array(
                        'success' => true,
                        'Message' => 'Education Logo Added Sucessfully'

                    );
                } else {
                    $result = array(
                        'success' => true,
                        'Message' => 'Failed to Add Education Logo '
                    );
                }
            }
        } else {
            $result = array(
                'success' => false,
                'Message' => 'No Images Selected '
            );
        }
        return $result;
    }

    public function updateEducationLogo($id,$photos, $is_photo_set)
    {
        if ($is_photo_set) {
            if (!file_exists($this->image_path3)) {
                mkdir($this->image_path3, 0777, true);
            }

            $count = count($photos["name"]);

            for ($i = 0; $i < $count; $i++) {
                $extension = pathinfo($photos['name'][$i], PATHINFO_EXTENSION);
                $filename = time() . $i . '.' . $extension;
                $file = $this->image_path3 . $filename;


                if (move_uploaded_file($photos['tmp_name'][$i], $file)) {
                    $sql_query = "UPDATE `education_logo` SET `image` = '$filename' WHERE id = $id";
                    $stmt1 = $this->conn->query($sql_query);
                    $result = array(
                        'success' => true,
                        'Message' => 'Education Logo updated Sucessfully'

                    );
                } else {
                    $result = array(
                        'success' => true,
                        'Message' => 'Failed to update Education Logo '
                    );
                }
            }
        } else {
            $result = array(
                'success' => false,
                'Message' => 'No Images Selected '
            );
        }
        return $result;
    }

    public function deleteEducationLogo($id)
    {
        $sql_query="CALL deleteEducationLogo(?,@is_done)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $stmt->close();
        
        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done");
        $stmt1->execute();
        $stmt1->bind_result($is_done);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Education Logo Deleted Successfully",
                'Status'=> "Success"
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to Delete Education Logo",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function addTeamMember($teacher_name,$is_photo_set,$content_image)
    {
        $sql_query="CALL addTeamMember(?,@is_done,@last_added)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('s', $teacher_name);
        $stmt->execute();
        $stmt->close();
                
        $stmt1 = $this->conn->prepare("SELECT @last_added AS last_added,@is_done AS is_done");
        $stmt1->execute();
        $stmt1->bind_result($last_added,$is_done);       
        $stmt1->fetch();
        $stmt1->close();
        $result = array();

        if ($is_done == 1) {
            if ($is_photo_set) {
                if (!file_exists($this->image_path)) {
                    mkdir($this->image_path, 0777, true);
                }

                $extension = pathinfo($content_image['name'], PATHINFO_EXTENSION);
                $filename = time().'_img'.'.'.$extension;
                $file = $this->image_path . $filename;

                if (move_uploaded_file($content_image['tmp_name'], $file) ) {                    
                    $stmt2 = $this->conn->query(" UPDATE our_team SET image = '$filename'  WHERE id = $last_added");
                    $result = array(
                        'success'=>true,
                        'Message'=> "Content added successfully ",
                        'Status'=> "Success",
                        'last_added'=>$last_added
                    );

                } else {
                    $result = array(
                        'success' => true,
                        'Message' => 'Content added successfully . but images are not uploaded due to some issues ',
                        'Status'=> "Success",
                        'last_added'=>$last_added
                    );
                }
            } else {
                $result = array(
                    'success' => true,
                    'Message'=> "Content added successfully . but images are not uploaded due to some issues ",
                    'Status'=> "Success",
                    'last_added'=>$last_added
                );
            }
            return $result;

        }
        else
        {
            $result = array(
                'success' => true,
                'Message'=> "Content added successfully ",
                'Status'=> "Success",
                'last_added'=>$last_added
            );
        }
        return $result;
    }


    public function updateTeamMember($teacher_name,$content_id,$is_photo_set,$content_image)
    {
        $sql_query="CALL updateTeamMember(?,?,@is_done)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('si', $teacher_name,$content_id);
        $stmt->execute();
        $stmt->close();
                
        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done");
        $stmt1->execute();
        $stmt1->bind_result($is_done);       
        $stmt1->fetch();
        $stmt1->close();
        $result = array();
    
            if ($is_photo_set) {
                if (!file_exists($this->image_path)) {
                    mkdir($this->image_path, 0777, true);
                }

                $extension = pathinfo($content_image['name'], PATHINFO_EXTENSION);
                $filename = time().'_img'.'.'.$extension;
                $file = $this->image_path . $filename;

                if (move_uploaded_file($content_image['tmp_name'], $file)) {                    
                    $stmt2 = $this->conn->query(" UPDATE our_team SET image = '$filename' WHERE id = $content_id");
                    $result = array(
                        'success'=>true,
                        'Message'=> "Content Updated successfully ",
                        'Status'=> "Success"
                    );

                } else {
                    $result = array(
                        'success' => true,
                        'Message' => 'Content Updated successfully . but images are not uploaded due to some issues',
                        'Status'=> "Success"
                    );
                }
            } else {
                $result = array(
                    'success' => true,
                    'Message'=> "Content Updated successfully but images are not uploaded due to some issues ",
                    'Status'=> "Success"
                );
            }
            return $result;
    }

    public function deleteTeamMember($id)
    {
        $sql_query="CALL deleteTeamMember(?,@is_done)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $stmt->close();
        
        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done");
        $stmt1->execute();
        $stmt1->bind_result($is_done);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Team Member Deleted Successfully",
                'Status'=> "Success"
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to Delete Team Member",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    // ================ BLOG SECTION ==============================

    public function addBlogContent($content)
    {
        $sql_query="CALL addBlogContent(?,@is_done,@last_added)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('s', $content);
        $stmt->execute();
        $stmt->close();
                
        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done,@last_added AS last_added");
        $stmt1->execute();
        $stmt1->bind_result($is_done, $last_added);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Content added successfully",
                'Status'=> "Success",
                'last_added'=>$last_added
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to add Content.",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function updateBlogContent($content,$id)
    {
        $sql_query="CALL updateBlogContent(?,?,@is_done)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('si',$content,$id);
        $stmt->execute();
        $stmt->close();

        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done");
        $stmt1->execute();
        $stmt1->bind_result($is_done);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Content Updated successfully",
                'Status'=> "Success"
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to update Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }


    public function addBlogInner($content)
    {
        $sql_query="CALL addBlogInner(?,@is_done,@last_added)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('s', $content);
        $stmt->execute();
        $stmt->close();
                
        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done,@last_added AS last_added");
        $stmt1->execute();
        $stmt1->bind_result($is_done, $last_added);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Content added successfully",
                'Status'=> "Success",
                'last_added'=>$last_added
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to add Content.",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function updateblogInner($content,$id)
    {
        $sql_query="CALL updateblogInner(?,?,@is_done)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('si',$content,$id);
        $stmt->execute();
        $stmt->close();

        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done");
        $stmt1->execute();
        $stmt1->bind_result($is_done);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Content Updated successfully",
                'Status'=> "Success"
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to update Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function addCareerArticles($content,$heading,$is_photo_set,$content_image)
    {
        $sql_query="CALL addCareerArticles(?,?,@is_done,@last_added)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('ss', $content,$heading);
        $stmt->execute();
        $stmt->close();
                
        $stmt1 = $this->conn->prepare("SELECT @last_added AS last_added,@is_done AS is_done");
        $stmt1->execute();
        $stmt1->bind_result($last_added,$is_done);       
        $stmt1->fetch();
        $stmt1->close();
        $result = array();

        if ($is_photo_set) {
                if (!file_exists($this->image_path)) {
                    mkdir($this->image_path, 0777, true);
                }

                $extension = pathinfo($content_image['name'], PATHINFO_EXTENSION);
                $filename = time().'_img'.'.'.$extension;
                $file = $this->image_path . $filename;

                if (move_uploaded_file($content_image['tmp_name'], $file) ) {                    
                    $stmt2 = $this->conn->query(" UPDATE career_articles SET image = '$filename'  WHERE id = $last_added");
                    $result = array(
                        'success'=>true,
                        'Message'=> "Content added successfully ",
                        'Status'=> "Success",
                        'last_added'=>$last_added
                    );

                } else {
                    $result = array(
                        'success' => true,
                        'Message' => 'Content added successfully . but images are not uploaded due to some issues ',
                        'Status'=> "Success",
                        'last_added'=>$last_added
                    );
                }
            } else {
                $result = array(
                    'success' => true,
                    'Message'=> "Content added successfully . but images are not uploaded due to some issues ",
                    'Status'=> "Success",
                    'last_added'=>$last_added
                );
            }
            return $result;
    }


    public function updateCareerArticles($content,$heading,$content_id,$is_photo_set,$content_image)
    {
        $sql_query="CALL updateCareerArticles(?,?,?,@is_done)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('ssi', $content,$heading,$content_id);
        $stmt->execute();
        $stmt->close();
                
        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done");
        $stmt1->execute();
        $stmt1->bind_result($is_done);       
        $stmt1->fetch();
        $stmt1->close();
        $result = array();

        if ($is_photo_set) {
                if (!file_exists($this->image_path)) {
                    mkdir($this->image_path, 0777, true);
                }

                $extension = pathinfo($content_image['name'], PATHINFO_EXTENSION);
                $filename = time().'_img'.'.'.$extension;
                $file = $this->image_path . $filename;

                if (move_uploaded_file($content_image['tmp_name'], $file) ) {                    
                    $stmt2 = $this->conn->query(" UPDATE career_articles SET image = '$filename'  WHERE id = $content_id");
                    $result = array(
                        'success'=>true,
                        'Message'=> "Content updated successfully ",
                        'Status'=> "Success"
                        
                    );

                } else {
                    $result = array(
                        'success' => true,
                        'Message' => 'Content Updated successfully . but images are not uploaded due to some issues ',
                        'Status'=> "Success"
                
                    );
                }
            } else {
                $result = array(
                    'success' => true,
                    'Message'=> "Content updated successfully . but images are not uploaded due to some issues ",
                    'Status'=> "Success"
                );
            }
            return $result;
    }

    public function deleteCareerArticles($id)
    {
        $sql_query="CALL deleteCareerArticles(?,@is_done)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $stmt->close();
        
        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done");
        $stmt1->execute();
        $stmt1->bind_result($is_done);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Career Article Deleted Successfully",
                'Status'=> "Success"
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to Delete Career Article",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    // ================ SERVEY SECTION  ==============================

    public function addServeyContent($content)
    {
        $sql_query="CALL addServeyContent(?,@is_done,@last_added)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('s', $content);
        $stmt->execute();
        $stmt->close();
                
        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done,@last_added AS last_added");
        $stmt1->execute();
        $stmt1->bind_result($is_done, $last_added);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Content added successfully",
                'Status'=> "Success",
                'last_added'=>$last_added
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to add Content.",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function updateServeyContent($content,$id)
    {
        $sql_query="CALL updateServeyContent(?,?,@is_done)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('si',$content,$id);
        $stmt->execute();
        $stmt->close();

        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done");
        $stmt1->execute();
        $stmt1->bind_result($is_done);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Content Updated successfully",
                'Status'=> "Success"
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to update Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }
    public function addQuestionnaire($question)
    {
        $sql_query="CALL addQuestionnaire(?,@is_done,@last_added)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('s', $question);
        $stmt->execute();
        $stmt->close();
                
        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done,@last_added AS last_added");
        $stmt1->execute();
        $stmt1->bind_result($is_done, $last_added);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Question added successfully",
                'Status'=> "Success",
                'last_added'=>$last_added
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to add Question.",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function updateQuestionnaire($question,$question_id)
    {
        $sql_query="CALL updateQuestionnaire(?,?,@is_done)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('si',$question,$question_id);
        $stmt->execute();
        $stmt->close();

        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done");
        $stmt1->execute();
        $stmt1->bind_result($is_done);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Question Updated successfully",
                'Status'=> "Success"
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to update Question",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function deleteQuestionnaire($question_id)
    {
        $sql_query="CALL deleteQuestionnaire(?,@is_done)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('i',$question_id);
        $stmt->execute();
        $stmt->close();
        
        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done");
        $stmt1->execute();
        $stmt1->bind_result($is_done);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Question Deleted Successfully",
                'Status'=> "Success"
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to Delete Question",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function addOption($option,$question_id)
    {
        $sql_query="CALL addOption(?,?,@is_done,@last_added)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('si', $option,$question_id);
        $stmt->execute();
        $stmt->close();
                
        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done,@last_added AS last_added");
        $stmt1->execute();
        $stmt1->bind_result($is_done, $last_added);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Option added successfully",
                'Status'=> "Success",
                'last_added'=>$last_added
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to add Question.",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function updateOption($question,$question_id)
    {
        $sql_query="CALL updateOption(?,?,@is_done)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('si',$question,$question_id);
        $stmt->execute();
        $stmt->close();

        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done");
        $stmt1->execute();
        $stmt1->bind_result($is_done);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "option Updated successfully",
                'Status'=> "Success"
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to update option",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function fillServeyForm($first_name,$last_name,$email,$date_of_birth,$gender,$grade)
    {
        $sql_query="CALL fillServeyForm(?,?,?,?,?,?,@is_done,@last_added)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('ssssss', $first_name,$last_name,$email,$date_of_birth,$gender,$grade);
        $stmt->execute();
        $stmt->close();
                
        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done,@last_added AS last_added");
        $stmt1->execute();
        $stmt1->bind_result($is_done, $last_added);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Form submitted successfully",
                'Status'=> "Success",
                'last_added'=>$last_added
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to submit form",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function deleteServeyResponse($user_id)
    {
        $sql_query="CALL deleteServeyResponse(?,@is_done)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('i',$user_id);
        $stmt->execute();
        $stmt->close();
        
        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done");
        $stmt1->execute();
        $stmt1->bind_result($is_done);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Response Deleted Successfully",
                'Status'=> "Success"
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to Delete Response",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    // public function storeAnswers($answer,$question_id,$answer_id,$user_name)
    // {
    //     $sql_query="CALL storeAnswers(?,?,@is_done)";
    //     $stmt = $this->conn->prepare($sql_query);
    //     $stmt->bind_param('ss', $answer,$user_name);
    //     $stmt->execute();
    //     $stmt->close();
                
    //     $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done");
    //     $stmt1->execute();
    //     $stmt1->bind_result($is_done);       
    //     $stmt1->fetch();
    //     $stmt1->close();
            
    //     if ($is_done) {
    //         $result=array(
    //             'success'=>true,
    //             'Message'=> "Form filled successfully",
    //             'Status'=> "Success"
    //         );
    //     }
    //     else
    //     {
    //         $result=array(
    //             'success'=>false,
    //             'Message'=> "Failed to fill form",
    //             'Status'=> "Error"
    //         );
    //     }
    //     return $result;
    // }

    public function storeAnswers($data)
    {
        $decodedData = json_decode($data, true);
    
        $sql_query = "INSERT INTO answers (`answer`, `user_name`, `question_id`, `option_id`) VALUES ";
    
        $query_parts = array();
        foreach ($decodedData as $question) {
            $question_id = $question['question_id'];
    
            foreach ($question['answers'] as $answer) {
                $option_id = $answer['option_id'];
                $answer_value = $answer['answer'];
                $user_name = $answer['user_name'];
    
                $query_parts[] = "('" . $answer_value . "', '" . $user_name . "', '" . $question_id . "', '" . $option_id . "')";
            }
        }
    
        $sql_query .= implode(',', $query_parts);
    
        try {
            if (mysqli_query($this->conn, $sql_query)) {
                $result = array(
                    'success' => true,
                    'Message' => 'answers submitted successfully',
                    'Status'=> "Success"
                );
            } else {
                $result = array(
                    'success' => false,
                    'Message' => 'something went wrong',
                    'Status'=> "Error"
                );
            }
        } catch (Exception $e) {
            $result = array(
                'success' => false,
                'Message' => 'please fill the form',
                'Status'=> "Error"
            );
        }
    
        return $result;
    }
    

    // ================ TERMS & CONDITONS SECTION  ==============================

    public function addTerms($content)
    {
        $sql_query="CALL addTerms(?,@is_done,@last_added)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('s', $content);
        $stmt->execute();
        $stmt->close();
                
        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done,@last_added AS last_added");
        $stmt1->execute();
        $stmt1->bind_result($is_done, $last_added);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Content added successfully",
                'Status'=> "Success",
                'last_added'=>$last_added
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to add Content.",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function updateTerms($content,$id)
    {
        $sql_query="CALL updateTerms(?,?,@is_done)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('si',$content,$id);
        $stmt->execute();
        $stmt->close();

        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done");
        $stmt1->execute();
        $stmt1->bind_result($is_done);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Content Updated successfully",
                'Status'=> "Success"
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to update Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function addTermsContent($content)
    {
        $sql_query="CALL addTermsContent(?,@is_done,@last_added)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('s', $content);
        $stmt->execute();
        $stmt->close();
                
        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done,@last_added AS last_added");
        $stmt1->execute();
        $stmt1->bind_result($is_done, $last_added);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Content added successfully",
                'Status'=> "Success",
                'last_added'=>$last_added
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to add Content.",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function updateTermsContent($content,$id)
    {
        $sql_query="CALL updateTermsContent(?,?,@is_done)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('si',$content,$id);
        $stmt->execute();
        $stmt->close();

        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done");
        $stmt1->execute();
        $stmt1->bind_result($is_done);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Content Updated successfully",
                'Status'=> "Success"
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to update Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function addTerms_condition($content,$heading)
    {
        $sql_query="CALL addTerms_condition(?,?,@is_done,@last_added)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('ss', $content,$heading);
        $stmt->execute();
        $stmt->close();
                
        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done,@last_added AS last_added");
        $stmt1->execute();
        $stmt1->bind_result($is_done, $last_added);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Content added successfully",
                'Status'=> "Success",
                'last_added'=>$last_added
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to add Content.",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function updateTerms_condition($content,$heading,$id)
    {
        $sql_query="CALL updateTerms_condition(?,?,?,@is_done)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('ssi',$content,$heading,$id);
        $stmt->execute();
        $stmt->close();

        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done");
        $stmt1->execute();
        $stmt1->bind_result($is_done);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Content Updated successfully",
                'Status'=> "Success"
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to update Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function deleteTerms_conditon($id)
    {
        $sql_query="CALL deleteTerms_conditon(?,@is_done)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $stmt->close();
        
        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done");
        $stmt1->execute();
        $stmt1->bind_result($is_done);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Content Deleted Successfully",
                'Status'=> "Success"
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to Delete Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function addContact($content,$contact_num,$email,$address)
    {
        $sql_query="CALL addContact(?,?,?,?,@is_done,@last_added)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('ssss', $content,$contact_num,$email,$address);
        $stmt->execute();
        $stmt->close();
                
        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done,@last_added AS last_added");
        $stmt1->execute();
        $stmt1->bind_result($is_done, $last_added);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Content added successfully",
                'Status'=> "Success",
                'last_added'=>$last_added
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to add Content.",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function updateContact($content,$contact_num,$email,$address,$id)
    {
        $sql_query="CALL updateContact(?,?,?,?,?,@is_done)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('ssssi',$content,$contact_num,$email,$address,$id);
        $stmt->execute();
        $stmt->close();

        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done");
        $stmt1->execute();
        $stmt1->bind_result($is_done);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Content Updated successfully",
                'Status'=> "Success"
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to update Content",
                'Status'=> "Error"
            );
        }
        return $result;
    }

    public function fillContactForm($user_name,$email,$meassge)
    {
        $sql_query="CALL fillContactForm(?,?,?,@is_done,@last_added)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bind_param('sss',$user_name,$email,$meassge);
        $stmt->execute();
        $stmt->close();
                
        $stmt1 = $this->conn->prepare("SELECT @is_done AS is_done,@last_added AS last_added");
        $stmt1->execute();
        $stmt1->bind_result($is_done, $last_added);       
        $stmt1->fetch();
        $stmt1->close();
            
        if ($is_done) {
            $result=array(
                'success'=>true,
                'Message'=> "Content added successfully",
                'Status'=> "Success",
                'last_added'=>$last_added
            );
        }
        else
        {
            $result=array(
                'success'=>false,
                'Message'=> "Failed to add Content.",
                'Status'=> "Error"
            );
        }
        return $result;
    }



}

?>