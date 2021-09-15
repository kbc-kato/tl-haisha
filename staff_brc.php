<?php

$id = $_POST['id'];
//print "id:".$id; 


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

    header ('Location:staff_del_input.php?id='.$id);
    exit();
}
