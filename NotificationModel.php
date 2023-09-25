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
  //  $query->bindParam(':city', $city, PDO::PARAM_STR);
    //$query->bindParam(':zipcode', $zipcode, PDO::PARAM_STR);

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
       return $query->fetch(PDO::FETCH_COLUMN);
   } else {
       return false;
   }
}

//filter

public function getNotificationsBysubcontent($subcontent)

{
   
    $sql = "SELECT * FROM notification WHERE subcontent = :subcontent";
    $dbc = UtilityModel::getDBConnection();
    $query = $dbc->prepare($sql);
    $query->bindParam(':subcontent', $subcontent);
    $query->execute();

    // Fetch and return the result as an associative array
   // return $query->fetchColumn(PDO::FETCH_COLUMN);
   return $query->fetchAll(PDO::FETCH_ASSOC);

}

public function getNotificationsBylink($link)

{
   
    $sql = "SELECT * FROM notification WHERE link = :link";
    $dbc = UtilityModel::getDBConnection();
    $query = $dbc->prepare($sql);
    $query->bindParam(':link', $link);
    $query->execute();

    // Fetch and return the result as an associative array
   // return $query->fetchColumn(PDO::FETCH_COLUMN);
   return $query->fetchAll(PDO::FETCH_ASSOC);

}

public function getNotificationsBydes($des)

{
   
    $sql = "SELECT * FROM notification WHERE des = :des";
    $dbc = UtilityModel::getDBConnection();
    $query = $dbc->prepare($sql);
    $query->bindParam(':des', $des);
    $query->execute();

    // Fetch and return the result as an associative array
    return $query->fetchAll(PDO::FETCH_ASSOC);
}



//create customer
    public function createCustomer($email, $firstname, $lastname,$city,$zipcode) {
    $sql = "INSERT INTO mg_customer_entity (email,firstname, lastname, city,zipcode) VALUES (:email, :firstname, :lastname,:city,:zipcode)";
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

}

//UserNotification
 
class UserNotificationModel{
 public function createUserNotification($city,$zipcode,$notification_id) {
    
    $cities_id_array = explode(',',$city);
    $zipcodes_id_array= explode(',',$zipcode);
    $dbc = UtilityModel::getDBConnection();
   //$dbc->beginTransaction();
    $is_read=false;
    try {
        $sql = "INSERT INTO usernotification (user_id, notification_id, is_read) VALUES (:user_id, :notification_id, :is_read)";
        $query = $dbc->prepare($sql);

        foreach($cities_id_array as $city){
        //    echo"$city";
            $user_ids=$this->getuserIdsBycity($city);
         
        foreach($user_ids as $user_id){
            //echo" $user_id";
        $query->bindParam(':user_id', $user_id, PDO::PARAM_INT); 
        $query->bindParam(':notification_id', $notification_id, PDO::PARAM_INT); 
        $query->bindParam(':is_read', $is_read, PDO::PARAM_BOOL); 
    $query->execute(); 
    }
        }
        foreach($zipcodes_id_array as $zipcode){
            echo" $zipcode";
            $user_ids=$this->getuserIdsByzipcode($zipcode);
         
            foreach($user_ids as $user_id){
            echo" $user_id";
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

//get userIdBy city
 public  function getuserIdsBycity($city){
    $sql="SELECT entity_id FROM mg_customer_entity WHERE city =:city";
    $dbc=   UtilityModel::getDBConnection();
    $query=$dbc->prepare($sql);
    $query->bindParam(':city',$city, PDO::PARAM_STR);

    $query->execute();
    $user_ids =$query->fetchAll(PDO::FETCH_COLUMN);
    return $user_ids;
}
//get userIdBy zipcode
 public  function getuserIdsByzipcode($zipcode){
    $sql="SELECT entity_id FROM mg_customer_entity WHERE zipcode =:zipcode";
    $dbc=   UtilityModel::getDBConnection();
    $query=$dbc->prepare($sql);
    $query->bindParam(':zipcode',$zipcode, PDO::PARAM_STR);

    $query->execute();
    $user_ids =$query->fetchAll(PDO::FETCH_COLUMN);
    return $user_ids;
}
}
//@friday
?>
