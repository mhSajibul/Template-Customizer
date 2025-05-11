<?php
include 'db.php';

$store_id = (int)($_GET['store_id'] ?? 0);
if (!$store_id) {
    die("Invalid store ID");
}

// information fo store and template
$store = $conn->query("SELECT * FROM stores WHERE id = $store_id")->fetch_assoc();
$template = $conn->query("SELECT * FROM store_templates WHERE id = {$store['template_id']}")->fetch_assoc();
$field_values = [];
$res = $conn->query("SELECT * FROM store_template_field_values WHERE store_id = $store_id");
while ($row = $res->fetch_assoc()) {
    $field_values[$row['field_name']] = $row['field_value'];
}

// include template value
$template_file = 'templates/' . $template['template_file'];
if (!file_exists($template_file)) {
    die("Template file not found");
}

// create dynamic variable
foreach ($field_values as $key => $val) {
    $$key = $val;
}

include $template_file;
?>
