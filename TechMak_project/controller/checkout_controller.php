<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('../model/checkoutdb.php');

    $customer_name = $_POST['customer_name'];
    $delivery_address = $_POST['delivery_address'];
    $mail_address = $_POST['mail_address'];
    $phone = $_POST['phone'];
    $total = $_POST['total'];
    $payment_method = $_POST['payment_method'];

   
    insert_checkout_info($customer_name, $delivery_address, $mail_address, $phone, $total, $payment_method);

    
    exit();
}
?>
