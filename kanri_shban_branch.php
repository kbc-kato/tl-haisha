<?php
//    if(isset($_POST['hiha'])==true) 
//    {
//        $y=date('Y', strtotime($_POST['hiha']));
//        $m=date('n', strtotime($_POST['hiha']));
//        $d=date('d', strtotime($_POST['hiha']));
//    }
//print "ymd=".$year."/".$month."/".$day."<br>";    
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
