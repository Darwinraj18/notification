	<?php

require_once "model/NotificationModel.php";

class NotificationController extends BaseController
{

    // Notification Reference
 public function getNotificationAction()
    {
        $model = new NotificationModel();

        $this->sendOutput(
            json_encode($model->getNotifications()),
            array(BaseController::APP_JSON, BaseController::HTTPOK));

    }


    public function getNotificationByIdAction()
    {
        $id=$_GET['id'];// Get the notification ID from the request
        $model = new NotificationModel();// Call the notificationmodel method to delete the notification by ID
        $notification=$model->getNotificationById($id);
        if($notification){
            $this->sendOutput(json_encode($notification));
        }else{
           $this->sendOutput(json_encode(['error'=>'notification not found'])) ;
        }

    }

    public function deleteNotificationByIdAction() {
  
    $id = $_GET['id'];  // Get the notification ID from the request
    
    $model = new NotificationModel();// Call the notificationmodel method to delete the notification by ID
    $success = $model->deleteNotificationById($id);
    
    // Check if the deletion was successful 
    if ($success) {
        // Send a success response 
        $this->sendOutput(json_encode(['message' => 'Notification deleted']));
    } else {
        
        $this->sendOutput(json_encode(['error' => 'Notification not found']));
    
    }
}
    public function updateNotificationByIdAction(){
        
    $id=$_POST['id'];
    $subcontent = $_POST['subcontent'];
    $img = $_FILES['img']['tmp_name'];
    $des = $_POST['des'];
    $link=$_POST['link'];
    $model= new NotificationModel();
    $success=$model->updateNotificationById($id,$subcontent,$img,$des,$link);
    if ($success) {
        // Send a success response 
        $this->sendOutput(json_encode(['message' => 'Notification updated']));
    } else {
        
        $this->sendOutput(json_encode(['error' => 'Notification not found']));
    
    }
}

public function createNotificationAction() {
    
    $data = json_decode(file_get_contents("php://input"));
    $subcontent = $_POST['subcontent'];
    $img = $_FILES['img']['tmp_name'];
    $des = $_POST['des'];
    
    // Check if 'link' key exists and is not empty
    $link = isset($_POST['link']) ? $_POST['link'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';

    
    $zipcode = isset($_POST['zipcode']) ? $_POST['zipcode'] : ''; //  is a ternary conditional statement that Check if 'zipcode' key exists, use empty string if not found
//$zipcode=$_POST['zipcode'];

    $model = new NotificationModel();
    $success = $model->createNotification($subcontent, $des, $img, $link);
    
    $userNotificationModel= new UserNotificationModel();
      $success1 =   $userNotificationModel->createUserNotification($city,$zipcode,$success['id']);
      
    if ($success1) {
        $this->sendOutput(
            json_encode($success1),
            array(BaseController::APP_JSON, BaseController::HTTPOK));
    } else {
        $this->sendOutput(json_encode(['error' => 'Unable to create Notification']));
    }
}

//filter
public function getNotificationBysubcontentAction()
{
    //echo"hello";
    $subcontent=$_GET['subcontent'];
   // echo"$subcontent";
    $model = new NotificationModel();
    $notification = $model->getNotificationsBysubcontent($subcontent);
    if ($notification) {
        $this->sendOutput(json_encode($notification));
    } else {
       $this->sendOutput(json_encode(['error' => 'Notification not found']));
    }
}

public function getNotificationBylinkAction()
{
    //echo"hello";
    $link=$_GET['link'];
   // echo"$subcontent";
    $model = new NotificationModel();
    $notification = $model->getNotificationsBylink($link);
    if ($notification) {
        $this->sendOutput(json_encode($notification));
    } else {
       $this->sendOutput(json_encode(['error' => 'Notification not found']));
    }
}


public function getNotificationBydesAction()
{
  //  echo"hello";
  $des=$_GET['des'];
  

   // echo"$des";
    $model = new NotificationModel();
    $notification = $model->getNotificationsBydes($des);
    if ($notification) {
        $this->sendOutput(json_encode($notification));
    } else {
       $this->sendOutput(json_encode(['error' => 'Notification not found']));
    }
}


public function createCustomerAction(){
    $data=json_decode(file_get_contents("php://input"));
    $email=$_POST['email'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $city=$_POST['city'];
    $zipcode=$_POST['zipcode'];
    $model=new NotificationModel();
    $success=$model->createCustomer($email,$firstname,$lastname,$city,$zipcode);
    if($success){
        $this->sendOutput(json_encode(['message' => 'user created']));
    } else {
        $this->sendOutput(json_encode(['error' => 'Unable to create']));
    }
}
//GET Customer
public function getCustomerByIdAction()
    {
        $entity_id=$_GET['entity_id'];// Get the notification ID from the request
        $model = new NotificationModel();// Call the notificationmodel method to delete the notification by ID
        $Customer=$model->getCustomerById($entity_id);
        if($Customer){
            $this->sendOutput(json_encode($Customer));
        }else{
           $this->sendOutput(json_encode(['error'=>'notification not found'])) ;
        }

    }
    //DELETE Coustomer
public function deleteCustomerByIdAction(){
    $entity_id=$_GET['entity_id'];
    $model= new NotificationModel();
    $success=$model->deleteCustomerById($entity_id);
    if ($success) {
        // Send a success response 
        $this->sendOutput(json_encode(['message' => 'Notification deleted']));
    } else {
        
        $this->sendOutput(json_encode(['error' => 'Notification not found']));
    
    }
}
//create usernotification
    public function createusernotification(){
        $user_id=$_POST['user_id'];
        $notification_id=$_POST['notification_id'];
        $is_read=$_POST['is_read'];
       
        $userNotificationModel= new UserNotificationModel();
        $success=$userNotificationModel->createUserNotification($user_id,$notification_id,$is_read);
        if($success){
            $this->sendOutput(json_encode(['message' => 'user notification created']));
        } 
    }
  
}//
?>
