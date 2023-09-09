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

    
}

?>