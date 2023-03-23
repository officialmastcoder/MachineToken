<?php

if($b['machineTokenUpdate'] == 'yes'){
    if(mysqli_query($connection,"UPDATE usertable SET machineToken='$newToken', machineTokenUpdate='no' WHERE operator_uid='$operator_uid' ")){
        setcookie("machineToken", $newToken, time() + ( 365 * 24 * 60 * 60),'/');
        ?>
        <script>
            alert('Machine Token Registration Success!');
            setTimeout(function () {
                 window.location.href = "../aadhar_update/index.php"; 
             }, 1200); 
        </script>
        <?php
        
    }
    
}



$machineToken = $_COOKIE['machineToken'];
if($b['usertype'] == 'Aadmin' ){
    if($b['machineToken'] == $machineToken  && $machineToken !=NULL){
            session_start(); 

        $_SESSION["user"] = "OK";
        $_SESSION["usertype"] = $b['usertype'];
        $_SESSION['operator_uid'] = $b['operator_uid'];
        $_SESSION['operator_id'] = $b['operator_id'];
        $_SESSION['userid'] = $b['userid'];
        $_SESSION['operator_name'] = $b['operator_name'];
        
        
        //header("location: panel.php");
        $msg='Login Successfully...';?>
        <script>
        setTimeout(function() {
            window.location.href = '../user/aadhar_update/index.php';
        }, 200);
        </script>
        <?php
    }else{
        $msgno = "System is Not Registered With us Contact with admin! ";
    }
}else{
    session_start(); 

    $_SESSION["user"] = "OK";
    $_SESSION["usertype"] = $b['usertype'];
    $_SESSION['operator_uid'] = $b['operator_uid'];
    $_SESSION['operator_id'] = $b['operator_id'];
    $_SESSION['userid'] = $b['userid'];
    $_SESSION['operator_name'] = $b['operator_name'];
    
    
    //header("location: panel.php");
    $msg='Login Successfully...';?>
    <script>
    setTimeout(function() {
        window.location.href = '../user/aadhar_update/index.php';
    }, 200);
    </script>
    <?php
}






$filename = basename($_SERVER['SCRIPT_NAME']);
$machineToken = $_COOKIE['machineToken'];
// check token
if($b['usertype'] =='Operator'){
    if($b['machineToken'] != $machineToken ){
        if($filename !='updateMachineToken.php'){
            header('location:/user/usercreate/updateMachineToken.php');
            exit();
        }
    }
}
// for New user			
if($filename !='updateMachineToken.php'){
    if($b['machineToken'] =='' || $b['machineToken'] == NULL){
        header('location:/user/usercreate/updateMachineToken.php');
        exit();
    }
}
?>