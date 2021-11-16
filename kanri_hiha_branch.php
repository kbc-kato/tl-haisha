<?php
    if(isset($_POST['edit'])==true)
    {
        if(isset($_POST['seq'])==false)
        {
            header('location:kanri_seq_ng.php');
            exit();
        } 
        $seq = $_POST['seq'];
print "seq=".$seq;        
        header('location:kanri_hiha_update.php');
        exit();
    }

    if(isset($_POST['delete'])==true)
    {
        if(isset($_POST['seq'])==false)
        {
            header('location:kanri_seq_ng.php');
            exit();
        } 
        $seq = $_POST['seq'];
        header('location:kanri_hiha_delete.php');
        exit();
    }
?>
