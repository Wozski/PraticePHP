<?php
// DB url,DB username, DB password, DB name
require_once('conn.php');
if (empty($_POST['Start_date']) || empty($_POST['End_date'])) {
    die('請輸入正確資料');
}
$Start_date = $_POST['Start_date'];
$End_date = $_POST['End_date'];
// $Start_date = "2022-01-01";
// $End_date = "2022-12-31";
$sql = sprintf(
    "SELECT * FROM `會員資料` INNER JOIN `樂活會員` ON `會員資料`.user_id = `樂活會員`.user_id 
    WHERE `會員資料`.`create_at` 
    BETWEEN ('%s') AND ('%s') 
    ORDER BY `會員資料`.`create_at` DESC",
    $Start_date,
    $End_date,
);
$result = $conn->query($sql);
if (!$result) {
    die($conn->error);
};
$user = array();
while ($row = $result->fetch_assoc()) {
    array_push($user, array(
        "id" => $row["id"],
        "user_id" => $row["user_id"],
        "username" => $row["username"],
        "phone" => $row["phone"],
        "gender" => $row["gender"],
        "create_at" => $row["create_at"],
        "membership" => $row["membership"]
    ));
};

$json = array(
    "user" => $user
);
$response = json_encode($json);
// provider type and 編碼(英文?)
header('Content-type:application/json;charset=utf-8');
echo $response;
