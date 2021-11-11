<?php
require_once('config.php');
$todos=[];
if($_SERVER['REQUEST_METHOD']==='POST'){
    $error=null;
    validateToken();
    if(isset($_POST['register'])){
        $deadline=$_POST['year']."-".$_POST['month']."-".$_POST['day'];
        if(date_check($deadline)===21){
            $error='指定した日時はございません。もう一度設定しなおしてください。';
        }elseif(date_check($deadline)===22){
            $error='締め切り日は半角数字で入力下さい。';
        }elseif(title_check($_POST['title'])===11){    
            $error='タスクを入力してください';
        }elseif(priority_check($_POST['priority'])===31){
            $error='優先度を入力してください';
        }else{
           
            if(isset($_POST['title'])&& isset($_POST['priority'])){
                $title=$_POST['title'];
                $priority=$_POST['priority'];
                insert_todo($link,$title,$priority,$deadline);
                header('Location: ' . SITE_URL);
                exit;
            }
        }    
    }  
    if(isset($_POST['check'])){
        $check_id=$_POST['check'];
        update_todo($link,$check_id);
    }
    if(isset($_POST['delete'])){
        $delete_id=$_POST['delete'];
        delete_todo($link,$delete_id);
    }
     if(isset($_POST['change_id'])){
        $change_id=$_POST['change_id'];
        $change_date=$_POST['change_date'];
        update_date_todo($link,$change_date,$change_id);
    }
}
$todos=select($link);
$deads=dead_select($link,$date);
if($deads){
    $alert = "<script type='text/javascript'>alert('本日で締め切りのタスクがあります');</script>";
echo $alert;
}

if($_SERVER['REQUEST_METHOD']==='GET'){
    if(isset($_GET['star'])){
        if($_GET['star']==="sime"){
            $todos=dead_select($link,$date);
        }else{
            $star=$_GET['star'];
            $todos=star_select($link,$star);
        }
    }
    if(isset($_GET['kaijo'])){
        header('Location: ' . SITE_URL);
        exit;
    }
}
var_dump($date);