<?php

    @require "../inc/bootstrap.php";
    function checkString($s) {
        return (strlen($s) > 0);
    };
    function checkMail($s) {
        return preg_match("/^[a-zA-Z0-9.!#$%&'*+=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/", $s);
    };
    function checkPhone($s) {
        return preg_match("/^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\.0-9]*$/", $s);
    };
    function checkTick($s) {
        return $s;
    };
    $requiredPosts = ["full_name","email","phone","subject","message","contactMarketing"];
    $filters = [
        "full_name" => FILTER_SANITIZE_STRING,
        "email" => FILTER_VALIDATE_EMAIL,
        "phone" => FILTER_SANITIZE_STRING,
        "subject" => FILTER_SANITIZE_STRING,
        "message" => FILTER_SANITIZE_STRING,
        "contactMarketing" => FILTER_VALIDATE_BOOL,
    ];
    $checksForType = [
        "full_name" => "checkString",
        "email" => "checkMail",
        "phone" => "checkPhone",
        "subject" => "checkString",
        "message" => "checkString",
        "contactMarketing" => "checkTick",
    ];
    $failed = [];
    $recievedPosts = [];
    foreach ($requiredPosts as $value) {
        if (!isset($_POST[$value])){
            $failed[] = $value;   
        } else {
            $recievedPosts[$value] = filter_input(INPUT_POST, $value, $filters[$value]);
        };
    };
    if (count($failed)){
        die(json_encode($failed));
    };
    $success = [];
    foreach ($recievedPosts as $key => $value){
        if (!$checksForType[$key]($value)){
            $failed[] = $value;   
        } else {
            $success[$key] = $value;
        };
    }
    if (count($failed)){
        die(json_encode($failed));
    };
    try {
        $q = $db->prepare("INSERT INTO contact_entries (date,full_name,email,phone,subject,message) " .
        "VALUES (now(), :full_name, :email, :phone, :subject, :message);");
        $q->bindParam(":full_name", $success["full_name"]);
        $q->bindParam(":email", $success["email"]);
        $q->bindParam(":phone", $success["phone"]);
        $q->bindParam(":subject", $success["subject"]);
        $q->bindParam(":message", $success["message"]);
        $q->execute();
        echo '{"status": "success"}';
    } catch (Exception $e) {
    }
    
?>