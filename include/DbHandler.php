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

    //  ================   Fatch/Search API's    ==============================

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
        $sql_query="CALL fetchblogInnerContent()"; 
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
        else
        {
            $result = array(
                'success' => true,
                'Message'=> "Content Updated successfully  ",
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
                        'message' => 'Education Logo Added Sucessfully'

                    );
                } else {
                    $result = array(
                        'success' => true,
                        'message' => 'Failed to Add Education Logo '
                    );
                }
            }
        } else {
            $result = array(
                'success' => false,
                'message' => 'No Images Selected '
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
}

?>