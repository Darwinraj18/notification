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
public function createNotification(){
    $id = $_POST['id'];
    $subcontent = $_POST['subcontent'];
    $img = $_POST['img'];
    $des= $_POST['des'];
    $model=new NotificationModel();
    $success=$model->createNotification($id,$subcontent,$img,$des);
    if ($success) {
        $this->sendOutput(json_encode(['message' => 'Notification created']));
    } 

}
}

?>
