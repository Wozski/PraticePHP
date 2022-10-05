<?php
require_once('conn.php');
// SELECT `會員資料`.id, `會員資料`.user_id, `會員資料`.username,`會員資料`.`create_at`,`樂活會員`.`membership` FROM `會員資料` INNER JOIN `樂活會員` ON `會員資料`.user_id = `樂活會員`.user_id WHERE `樂活會員`.`membership` = "Y";
$sql = "SELECT DATE_FORMAT(create_at, '%M'),COUNT(*) FROM `會員資料` 
GROUP BY DATE_FORMAT(create_at, '%M') ORDER by create_at;";

$result = $conn->query($sql);
if (!$result) {
    die($conn->error);
}
$user = array();
// data push into array;
while ($row = $result->fetch_assoc()) {
    array_push($user, array(
        "month" => $row["DATE_FORMAT(create_at, '%M')"],
        "sum" => $row["COUNT(*)"],
    ));
}
$json = array(
    "user" => $user
);
$response = json_encode($json);
// provider type and 編碼(英文?)
header('Content-type:application/json;charset=utf-8');
echo ($response);
