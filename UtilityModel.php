<?php
class UtilityModel
{

    public static function getDBConnection()
    {
        $server = !empty(getenv('dbservername'))?getenv('dbservername'):'localhost';
        $dbuser = !empty(getenv('dbuser'))?getenv('dbuser'):'root';
        $dbpassword = !empty(getenv('dbpassword'))?getenv('dbpassword'):'';
        $dbname = 'notification';
        
        $dbc = new PDO('mysql:host='.$server.';dbname='.$dbname, $dbuser, $dbpassword, array(PDO::ATTR_PERSISTENT => true));
        return $dbc;
    }
    
//     public static function canCustomerProceedForMethod($customerId,$method)
//     {
//       $dbc = UtilityModel::getDBConnection();
      
//       $select = "select customer_id,UNIX_TIMESTAMP(lastaccesstime) as lastaccesstime,callermethod,retrycount,UNIX_TIMESTAMP(CURRENT_TIMESTAMP) as curtimestamp from mg_customeractivity_log where customer_id=:customerid and callermethod like :method";

//       $query = $dbc->prepare($select);
//       $query->bindParam(':customerid', $customerId);
//       $query->bindParam(':method', $method);
//       $query->execute();

//       $isRecordAvailable=false;
//       $retryCount=1;
//       foreach($query->fetchAll() as $item)
//       {
//            $isRecordAvailable = true;
	   
//            if($method == 'updateStoredCard'){
//     		if(($item['curtimestamp'] - $item['lastaccesstime'])<=86400)
//                 {
//                         if($item['retrycount']>5)
//                         {
//                                 $dbc=null;
//                                 $query=null;
//                                 return false;
//                         } else {
//                                 $retryCount+=$item['retrycount'];
//                         }
//                 }
	
// 	   }
// 	   else {
//            	if(($item['curtimestamp'] - $item['lastaccesstime'])<=300)
//            	{
//                 	if($item['retrycount']>5)
//                 	{
//                             $dbc=null;
//                             $query=null;
//                     		return false;
//                 	} else {
//                     		$retryCount+=$item['retrycount'];
//                 	}
//            	}    
//            }
//       }
//       $query=null;
      
//       $query = "update mg_customeractivity_log set retrycount=:retrycount, lastaccesstime=CURRENT_TIMESTAMP where customer_id=:customerId and callermethod like :method";
//       if($isRecordAvailable==false)
//       {
//           $query = "insert into mg_customeractivity_log(customer_id,lastaccesstime,retrycount,callermethod) values(:customerId,CURRENT_TIMESTAMP,1,:method)";
//       }
      
//       $query = $dbc->prepare($select);
//       $query->bindParam(':customerid', $customerId);
//       $query->bindParam(':method', $method);
//       $query->bindParam(':retrycount', $retryCount);
//       $query->execute();
        
//       $dbc=null;
//       $query=null;
//       return true;
//   }

//   public static function sendMail($name,$email,$subject,$body)
//   {
//           $url = "https://www.shoperies.com/Shoperies/index.php/message/contactCustomer";

//            $result = false;

//            $postdata = http_build_query(
//             array(
//             "name" => $name,
//             "email" => $email,
//             "message" => $body,
//             "subject" => $subject,
//             )
//          );
          
//            $contextData = array('http' => array (
//                'header'  => 'Content-Type: application/x-www-form-urlencoded',
//                'method' => 'POST',
//                'content'=> $postdata ));

//            $context  = stream_context_create($contextData);

//            $result = file_get_contents($url,false,$context);

//            $json = json_decode($result);
           
//            return $json;        
//   }

//   public static function callCurl($url,$data)
//   {
//       if ($curl = curl_init()) {
//           $result = false;
         
//           curl_setopt($curl, CURLOPT_URL, $url);
//           curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
//           curl_setopt($curl, CURLOPT_USERPWD, "MAM2E3NWE0YZC4Y2M0OT:YTJmNTg2OGE3MTAzM2Y2NmI2NzY3Mzc2ZDIzMTY2");
//           curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
//           curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//           curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
//           curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

//           if(!empty($data))
//           {
//               curl_setopt($curl, CURLOPT_POST, TRUE);
//               curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
//           }
          
//           try {
//               $response = curl_exec($curl);
//               $info = curl_getinfo($curl);
//               curl_close($curl);
//               return $response;
//           } catch (Exception $e) {
//               error_log("error here".$e->getCode()."  ".$e->getMessage());
//               return "error here".$e->getCode()."  ".$e->getMessage();
//           }

//           return true;
//       }
//       return false;
//   }

//   public function parseResult($response, &$curl)
//   {
//           $info = curl_getinfo($curl);
//           $code = $info['http_code'];
//           switch ($code) {
//               case 401:
//                   throw new Exception('The API Key was missing or invalid');
//                   break;
//               case 500:
//                   throw new Exception('An unhandled exception occured on the server');
//                   break;
//           }

//           if (isset($data['ErrorCode'])) {
//               throw new Exception($data['Message'], $data['ErrorCode']);
//           }

//           curl_close($curl);
//           return $data;
//   }

//   public function getCacheId()
//   {  
//       $dbc = UtilityModel::getDBConnection();

//         $sql = "SELECT unix_timestamp(cacheid) as cacheid FROM `mg_purgecache`";
//         $cacheId=0;
//         $dbc = UtilityModel::getDBConnection();
//         $query = $dbc->prepare($sql);

//         $query->execute();

//         foreach($query->fetchAll() as $item)
//         {
//             $cacheId= $item['cacheid'];
//         }
        
//         return $cacheId;
//   }
}
?>