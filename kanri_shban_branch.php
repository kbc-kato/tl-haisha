<?php
    if(isset($_POST['edit'])==true)
    {
        if($_POST['code']=='')
        {
            header('location:kanri_seq_ng.php');
            exit();
        }
        if(isset($_POST['code'])==false)
        {
            header('location:kanri_seq_ng.php');
            exit();
        }  
        $code = $_POST['code'];
        header('location:kanri_hiha_update.php?code='.$code);
        exit();
    }

    if(isset($_POST['delete'])==true)
    {
        if($_POST['code']=='')
        {
            header('location:kanri_seq_ng.php');
            exit();
        }
        if(isset($_POST['code'])==false)
        {
            header('location:kanri_seq_ng.php');
            exit();
        } 
        $code = $_POST['code'];
        header('location:kanri_hiha_delete.php?code='.$code);
        exit();
    }
?>
