<!DOCTYPE html>
<html>
<head>
    <meta charset ="UTF-8">
    <TITLE>修正チェック</TITLE>
</head>
<body>

<?php
    session_start();                    //セッションの開始

    $id = $_POST['id'];                 //前画面からのデータを変数にセット
    $name = $_POST['name'];                 
    $address = $_POST['address'];
    $biko = $_POST['biko'];

    $id = htmlspecialchars($id,ENT_QUOTES,'UTF-8');             //変数をエスケープする
    $name = htmlspecialchars($name,ENT_QUOTES,'UTF-8');             //変数をエスケープする
    $address = htmlspecialchars($address,ENT_QUOTES,'UTF-8');
    $biko = htmlspecialchars($biko,ENT_QUOTES,'UTF-8');
   
    if ($name =='')                 //名前が空白のとき
    {
        print ("名前が入力されていません。<br>");
    }
    else
    {
        print "名前：";
        print $name; 
        print "<br>";
        
        print "住所：";
        print $address; 
        print "<br>";

        print "備考：";
        print $biko; 
        print "<br>";
    }

    if ($name == '')
    {
        print "<form>";
        print "<input type='button' onclick='history.back()' value='戻る'>";
        print "</form>";
    }
    else
    {
        print "<form method = 'post' action='staff_upd.php'>";
        print "<input type='hidden' name='id' value='".$id."'>";        //次画面に引き継ぐ値をセット
        print "<input type='hidden' name='name' value='".$name."'>";           
        print "<input type='hidden' name='address' value='".$address."'>";
        print "<input type='hidden' name='biko' value='".$biko."'>";
        print "<input type='hidden' name='sid' value='".session_id()."'>";  //秘密情報としてsession_id()をセット
        print "<br>";
        print "<input type='button' onclick='history.back()' value='戻る'>";
        print "<input type='submit' value='ＯＫ'>";
        print "</form>";
    }

?>    
</body>    
</html>