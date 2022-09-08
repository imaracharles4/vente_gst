<?php SESSION_START(); 
 include('../constant/connect.php');
include ('Push.php');  
$push = new Push($connect); 
$array=array(); 
$rows=array(); 
$notifList = $push->listNotificationUser($_SESSION['idboutique']); 
$record = 0;
foreach ($notifList as $key) {
 $data['id'] = $key['id_notification'];
 $data['title'] = $push->getNotificationTitle($key['id_from']);
 $data['msg'] = $push->getNotificationMessage($key['type_operation']);
 $data['icon'] = 'avatar.png';
 $data['url'] = $push->getNotificationUrl($key['type_operation'],$key['id_operation']);
 $rows[] = $data;
 $nextime = date('Y-m-d H:i:s',strtotime(date('Y-m-d H:i:s'))+($key['notif_repeat']*60));
 $push->updateNotification($key['id_notification'],$nextime);
 $record++;
}
$array['notif'] = $rows;
$array['count'] = $record;
$array['result'] = true;
echo json_encode($array);
?>