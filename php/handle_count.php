<?php
require_once('conn.php');
// 查詢是否有會員資格的 SQL
// SELECT `會員資料`.id, `會員資料`.user_id, `會員資料`.username,`會員資料`.`create_at`,`樂活會員`.`membership` FROM `會員資料` INNER JOIN `樂活會員` ON `會員資料`.user_id = `樂活會員`.user_id WHERE `樂活會員`.`membership` = "Y";
$sql = "SELECT COUNT(gender),gender FROM `會員資料` GROUP BY gender;";

$result = $conn->query($sql);
if (!$result) {
    die($conn->error);
}
$user = array();
// data push into array;
while ($row = $result->fetch_assoc()) {
    if ($row["gender"] == "0") {
        array_push($user, array(
            "gender" => "female",
            "count" => $row["COUNT(gender)"]
        ));
    }
    if ($row["gender"] == "1") {
        array_push($user, array(
            "gender" => "male",
            "count" => $row["COUNT(gender)"]
        ));
    }
    if ($row["gender"] == "2") {
        array_push($user, array(
            "gender" => "open",
            "count" => $row["COUNT(gender)"]
        ));
    }
}
$json = array(
    "user" => $user
);
$response = json_encode($json);
// provider type and 編碼(英文?)
header('Content-type:application/json;charset=utf-8');
echo ($response);
