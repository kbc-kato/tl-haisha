<?php

if (isset($_POST['insert'])==true)              //新規登録
{
    header ('Location:staff_ins_input.php');
    exit();
}
if (isset($_POST['edit'])==true)                //修正
{
    if (isset($_POST['id'])==false)
    {
        header ('Location:staff_ng.php');
        exit();
    }

    $id = $_POST['id'];    

    $id = htmlspecialchars($id,ENT_QUOTES,'UTF-8');             //変数をエスケープする

    header ('Location:staff_upd_input.php?id='.$id);
    exit();
}

if (isset($_POST['delete'])==true)              //削除
{
    if (isset($_POST['id'])==false)
    {
        header ('Location:staff_ng.php');
        exit();
    }

    $id = $_POST['id'];

    $id = htmlspecialchars($id,ENT_QUOTES,'UTF-8');             //変数をエスケープする
    
    header ('Location:staff_del_input.php?id='.$id);
    exit();
}
