<?php
// cyberseo.vn
// Khởi tạo ngày bt đầu
$date = new DateTime('2023-05-18');

// Kết nối với database
$db = new mysqli('localhost', 'iGXT0yiMwGUYlj', 'S0jCYWJs6JUwpC', 'iGXT0yiMwGUYlj');

// Lấy tất cả các bài viết
$result = $db->query("SELECT ID FROM wp_posts WHERE post_type = 'post' ORDER BY post_date ASC");

// Duyệt qua từng bài viết
while ($row = $result->fetch_assoc()) {
    // Cập nhật ngày đăng
    $db->query("UPDATE wp_posts SET post_date = '".$date->format('Y-m-d H:i:s')."', post_date_gmt = '".$date->format('Y-m-d H:i:s')."' WHERE ID = ".$row['ID']);
    
    // Tăng ngày
    $date->add(new DateInterval('P1D'));
}

$db->close();
?>
