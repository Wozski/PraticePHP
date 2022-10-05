<?php
require_once('conn.php');
// 查詢是否有會員資格的 SQL
// SELECT `會員資料`.id, `會員資料`.user_id, `會員資料`.username,`會員資料`.`create_at`,`樂活會員`.`membership` FROM `會員資料` INNER JOIN `樂活會員` ON `會員資料`.user_id = `樂活會員`.user_id WHERE `樂活會員`.`membership` = "Y";
$sql = "SELECT * FROM `會員資料` INNER JOIN `樂活會員` ON `會員資料`.user_id = `樂活會員`.user_id;";
$result = $conn->query($sql);
if (!$result) {
	die($conn->error);
}
$user = array();
// data push into array;
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
}
$json = array(
	"user" => $user
);
$response = json_encode($json);
// provider type and 編碼(英文?)
header('Content-type:application/json;charset=utf-8');
echo ($response);
