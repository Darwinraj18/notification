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
}
