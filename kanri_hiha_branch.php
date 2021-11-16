<?php
    if(isset($_POST['hiha'])==true) 
    {
        $y=date('Y', strtotime($_POST['hiha']));
        $m=date('n', strtotime($_POST['hiha']));
        $d=date('d', strtotime($_POST['hiha']));
    }
    if(isset($_POST['edit'])==true)
    {
        if($_POST['code']=='')
        {
            header('location:kanri_seq_ng.php?year='.$y.'&month='.$m.'&day='.$d.'');
            exit();
        }
        if(isset($_POST['code'])==false)
        {
            header('location:kanri_seq_ng.php?year=".$y."&month=".$m."&day=".$d."');
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
            header('location:kanri_seq_ng.php?year=".$y."&month=".$m."&day=".$d."');
            exit();
        }
        if(isset($_POST['code'])==false)
        {
            header('location:kanri_seq_ng.php?year=".$y."&month=".$m."&day=".$d."');
            exit();
        } 
        $code = $_POST['code'];
        header('location:kanri_hiha_delete.php?code='.$code);
        exit();
    }
?>
