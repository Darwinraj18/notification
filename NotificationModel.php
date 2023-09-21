<?php
require_once 'UtilityModel.php';

class NotificationModel {

    // Get all Notifications.
    public function getNotifications() {
        $sql = 'select * from notification';

        $dbc = UtilityModel::getDBConnection();
        $query = $dbc->prepare($sql);

        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }
    
   public function getNotificationById($id) {
    $sql = "SELECT * FROM notification WHERE id = :id";
    $dbc = UtilityModel::getDBConnection();
    $query = $dbc->prepare($sql);
    $query->bindParam(':id', $id);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}

    public function deleteNotificationById($id) {
    $sql = "DELETE FROM notification WHERE id = :id";
    $dbc = UtilityModel::getDBConnection();
    $query = $dbc->prepare($sql);
    $query->bindParam(':id', $id);
    return $query->execute();

}
    public function updateNotificationById($id, $subcontent, $des, $img, $link) {
    $sql = "UPDATE notification SET subcontent = :subcontent, des = :des, img = :img, link = :link WHERE id = :id";
    $dbc = UtilityModel::getDBConnection();
    $query = $dbc->prepare($sql);
    
  $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->bindParam(':subcontent', $subcontent, PDO::PARAM_STR);
    $query->bindParam(':des', $des, PDO::PARAM_STR);
    $query->bindParam(':img', $img, PDO::PARAM_LOB);
    $query->bindParam(':link', $link, PDO::PARAM_STR);

    return $query->execute();
}


public function createNotification($subcontent, $des, $img, $link) {
    $sql = "INSERT INTO notification (subcontent, des, img, link) VALUES (:subcontent, :des, :img, :link)";
    $dbc = UtilityModel::getDBConnection();
    $query = $dbc->prepare($sql);
    $query->bindParam(':subcontent', $subcontent, PDO::PARAM_STR);
    $query->bindParam(':des', $des, PDO::PARAM_STR);
    $query->bindParam(':img', $img, PDO::PARAM_LOB);
    $query->bindParam(':link', $link, PDO::PARAM_STR);
   // $query->bindParam(':city', $city, PDO::PARAM_STR);
    //$query->bindParam(':zipcode', $zipcode, PDO::PARAM_INT);
    // Execute the query
    $query->execute();

    // Check if the insertion was successful
    if ($query->rowCount() > 0) {
       // Fetch the newly inserted record
       $lastInsertId = $dbc->lastInsertId();
       $sql = 'SELECT * FROM notification WHERE id = :id';
       $query = $dbc->prepare($sql);
       $query->bindParam(':id', $lastInsertId, PDO::PARAM_INT);
       $query->execute();
       return $query->fetch(PDO::FETCH_ASSOC);
   } else {
       return false;
   }




//create customer
    public function createCustomer($email, $firstname, $lastname,$city,$zipcode) {
    $sql = "INSERT INTO mg_customer_entity (email,firstname, lastname, city) VALUES (:email, :firstname, :lastname,:city)";
    $dbc = UtilityModel::getDBConnection();
    $query = $dbc->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
    $query->bindParam(':lastname', $lastname, PDO::PARAM_LOB);
    $query->bindParam(':city',$city, PDO::PARAM_STR);
    $query->bindParam(':zipcode',$zipcode, PDO::PARAM_STR);
    // Execute the query
   return  $query->execute();
} 
//GET Customer
public function getCustomerById($entity_id) {
    $sql = "SELECT * FROM mg_customer_entity WHERE entity_id = :entity_id";
    $dbc = UtilityModel::getDBConnection();
    $query = $dbc->prepare($sql);
    $query->bindParam(':entity_id', $entity_id,PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}
//DELETE Customer
public function deleteCustomerById($entity_id){
    $sql = "DELETE FROM mg_customer_entity  WHERE entity_id = :entity_id";
    $dbc = UtilityModel::getDBConnection();
    $query = $dbc->prepare($sql);
    $query->bindParam(':entity_id', $entity_id);
    return $query->execute(); 
}

//UserNotification
public function createUserNotification($cities,$zipcodes,$notification_id) {
    $cities_id_array = explode(',',$cities);
    $zipcodes_id_array= explode(',',$zipcodes);
    $dbc = UtilityModel::getDBConnection();
   // $dbc->beginTransaction();
    $is_read=false;
    try {
        $sql = "INSERT INTO usernotification (user_id, notification_id, is_read) VALUES (:user_id, :notification_id, :is_read)";
        $query = $dbc->prepare($sql);

        foreach($cities_id_array as $city_id){
            $user_id->getuserIdBycity($city_id);

        foreach($user_id as $user_id){
        $query->bindParam(':user_id', $user_id, PDO::PARAM_INT); 
        $query->bindParam(':notification_id', $notification_id, PDO::PARAM_INT); 
        $query->bindParam(':is_read', $is_read, PDO::PARAM_BOOL); 
        $query->execute(); 
    }
        }
    } catch (PDOException $e) {
    
        echo "Error: " . $e->getMessage();
    }
}
public function sendnotificationById(){
    $sql = "SELECT id, subcontent, img, des, link
    FROM notification
    JOIN mg_customer_entity ON notification_id = :notification_id
    WHERE user_id = :user_id";
$dbc = UtilityModel::getDBConnection();
$query = $dbc->prepare($sql);
$query->bindParam(':notification_id', $notificationId, PDO::PARAM_INT);
$query->bindParam(':user_id', $userId, PDO::PARAM_INT);
$query->execute();

}
public  function getuserIdBycity($city_id){
    $sql="SELECT * FROM mg_customer_entity WHERE city_id=:city_id";
    $dbc=   UtilityModel::getDBConnection();
    $query=$dbc->prepare($sql);
    $query->bindParam(':city_id',$city_id, PDO::PARAM_INT);

    $query->execute();
    $user_ids =$query->fetchAll(PDO::FETCH_COLUMN);
    return $user_ids;
}
}


?>
