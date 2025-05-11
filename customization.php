<?php
include 'db.php';

$template_id = (int)$_POST['template_id'];
$fields = $_POST['fields'] ?? [];
$files = $_FILES['files'] ?? [];

// add new store
$conn->query("INSERT INTO stores (template_id) VALUES ($template_id)");
$store_id = $conn->insert_id;

// save the field value
foreach ($fields as $field_name => $value) {
    $stmt = $conn->prepare("INSERT INTO store_template_field_values (store_id, field_name, field_value) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $store_id, $field_name, $value);
    $stmt->execute();
    $stmt->close();
}

// file upload
foreach ($files['name'] as $field_name => $filename) {
    if ($files['error'][$field_name] === 0) {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $new_name = uniqid() . "." . $ext;
        move_uploaded_file($files['tmp_name'][$field_name], "assets/uploads/" . $new_name);

        $stmt = $conn->prepare("INSERT INTO store_template_field_values (store_id, field_name, field_value) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $store_id, $field_name, $new_name);
        $stmt->execute();
        $stmt->close();
    }
}

header("Location: store.php?store_id=$store_id");
exit;
?>
