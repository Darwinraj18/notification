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
    $query->bindParam(':img', $img, PDO::PARAM_STR);
    $query->bindParam(':link', $link, PDO::PARAM_STR);

    return $query->execute();
}


public function createNotification($subcontent, $des, $img,$link) {
    $sql = "INSERT INTO notification (subcontent, des, img,link) VALUES (:subcontent, :des, :img,:link)";
    $dbc = UtilityModel::getDBConnection();
    
    // Prepare the SQL query
    $query = $dbc->prepare($sql);

    // Bind parameters with data types
    // Assuming $id, $subcontent, $des, and $img are of the correct data types (e.g., integers, strings, etc.)
  //$query->bindParam("ssb",  $subcontent, $des, $img);
 // $query->bindParam(':id', $id, PDO::PARAM_STR);
   $query->bindParam(':subcontent', $subcontent, PDO::PARAM_STR);
    $query->bindParam(':des', $des, PDO::PARAM_STR);
    $query->bindParam(':img', $img, PDO::PARAM_LOB);
    $query->bindParam(':link',$link, PDO::PARAM_STR);
    // Execute the query
   return  $query->execute();
    
   
}

public function createCustomer($email, $firstname, $lastname,$city) {
    $sql = "INSERT INTO mg_customer_entity (email,firstname, lastname, city) VALUES (:email, :firstname, :lastname,:city)";
    $dbc = UtilityModel::getDBConnection();
    $query = $dbc->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
    $query->bindParam(':lastname', $lastname, PDO::PARAM_LOB);
    $query->bindParam(':city',$city, PDO::PARAM_STR);
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


}
?>
