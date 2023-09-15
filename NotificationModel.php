<?php
require_once 'UtilityModel.php';

class NotificationModel {

    // Get all Notifications
    public function getNotifications() {
        $sql = 'select * from notification';

        $dbc = UtilityModel::getDBConnection();
        $query = $dbc->prepare($sql);

        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }
    //get notification by id
   public function getNotificationById($id) {
    $sql = "SELECT * FROM notification WHERE id = :id";
    $dbc = UtilityModel::getDBConnection();
    $query = $dbc->prepare($sql);
    $query->bindParam(':id', $id);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}
    //delete notification
    public function deleteNotificationById($id) {
    $sql = "DELETE FROM notification WHERE id = :id";
    $dbc = UtilityModel::getDBConnection();
    $query = $dbc->prepare($sql);
    $query->bindParam(':id', $id);
    return $query->execute();
}
//create notification
public function createNotification(){
    $sql=("INSERT INRTO notification (id,subcontent,des,img) VALUES(? ,?, ?)");
    $dbc = UtilityModel::getDBConnection();
    $sql=$dbc->prepare($sql);
    $query=$dbc->prepare($sql);
    $query->bindParam("sss",$id,$subcontent,$des,$img);
    $query->execute();
}
}
