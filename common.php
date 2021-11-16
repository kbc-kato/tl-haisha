<?php

function sanitize($before)
    {
        foreach($before as $key => $value)
        {
            $after[$key] = htmlspecialchars($value,ENT_QUOTES,"UTF-8");
        }
        return $after;
    }
    
    function pulldown_year()
    {
        $y=date("Y");

        print "<select name = 'year'>";
        for ($i=2020; $i <= 2030; $i++) {
	
            if($i == $y){
                print "<option value='".$i."' selected>".$i."</option>";
            }else{
                print "<option value ='".$i."'>".$i."</option>";
            }
        }
        print "</select>";
    } 
    
    function pulldown_month()
    {
        $m=date("n"); 

        print "<select name = 'month'>";
        for ($i=1; $i <= 12; $i++) {

            if($i == $m){
                print "<option value='".$i."' selected>".$i."</option>";
            }else{
                print "<option value ='".$i."'>".$i."</option>";
            }
        }
        print "</select>";
    }

    function pulldown_day()
    {
        $d=date("d");

        print "<select name = 'day'>";
        for ($i=1; $i <= 31; $i++) {
	
              if($i == $d){
                print "<option value='".$i."' selected>".$i."</option>";
            }else{
                print "<option value ='".$i."'>".$i."</option>";
            }
        }
        print "</select>";    
    }

    function pulldown_shban()
    {
print "session=".$_SESSION["shban"];
        include ("userfile.php");               //$dsn,$user,$password

        $dbh = new PDO($dsn, $user, $password); //SqlServerのデータベースに接続
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示
        
        $sql = "SELECT * FROM ST_SHBAN_MYSQL
        WHERE st_shban_mysql.SHCDSH>?
        ORDER BY ST_SHBAN_MYSQL.SHKBSH, ST_SHBAN_MYSQL.SHCDSH"; // SELECT文を変数に格納。
    
        $stmt = $dbh->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
        $params[] = 0;          // 挿入する値を配列に格納する
        
        $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行
        
        $PDO = null;        //データベースから切断
        print "<select name = 'shban'>";

        while(true)
        {
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($rec==false)
            {
                break;
            }
            if($_SESSION["shban"] == $rec['SHCDSH'])
            {
                print "<option value='".$rec['SHCDSH']."' selected>".$rec['SHNMSH']."</option>";
            }
            else
            {
                print "<option value='".$rec['SHCDSH']."'>".$rec['SHNMSH']."</option>";
            }
        }
        print "</select>"; 
    }

    function pulldown_unsm()
    {
print "session=".$_SESSION["cdun"];
        include ("userfile.php");               //$dsn,$user,$password

        $dbh = new PDO($dsn, $user, $password); //SqlServerのデータベースに接続
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示
        
        $sql = "SELECT * FROM ST_UNSM_MYSQL
        WHERE st_unsm_mysql.UNCDUN>?
        ORDER BY ST_UNSM_MYSQL.UNNOHY, ST_UNSM_MYSQL.UNKNUN"; // SELECT文を変数に格納。
    
        $stmt = $dbh->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
        $params[] = 0;          // 挿入する値を配列に格納する
        
        $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行
        
        $PDO = null;        //データベースから切断
        
        print "<select name = 'cdun' class='mainselect'>";
        while(true)
        {
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($rec==false)
            {
                break;
            }
            if($_SESSION["cdun"] == $rec['UNCDUN'])
            {
                print "<option value='".$rec['UNCDUN']."' selected>".$rec['UNRYUN']."</option>";
            }
            else
            {
                print "<option value='".$rec['UNCDUN']."'>".$rec['UNRYUN']."</option>";
            }
        }
        print "</select>"; 
    }

    function pulldown_drvm()
    {
print "session=".$_SESSION["cddr"];
        include ("userfile.php");               //$dsn,$user,$password

        $dbh = new PDO($dsn, $user, $password); //SqlServerのデータベースに接続
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示
        
        $sql = "SELECT * FROM ST_DRVM_MYSQL
        WHERE ST_DRVM_MYSQL.DRCDDR>?
        ORDER BY ST_DRVM_MYSQL.DRCDUN, ST_DRVM_MYSQL.DRCDDR;"; // SELECT文を変数に格納。
    
        $stmt = $dbh->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
        $params[] = 0;          // 挿入する値を配列に格納する
        
        $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行
        
        $PDO = null;        //データベースから切断
        
        $id = -1;
//        $cnt = 0;
        while(true)
        {
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($rec==false)
            {
                break;
            }
    
            if($id != $rec['DRCDUN'])
            {
                if($id != -1)
                {
                    print "</select>"; 
                }
//                $cnt++;
                print "<select name = 'cddr_".$rec['DRCDUN']."' id = ".$rec['DRCDUN']." class='subbox'>";

                $id = $rec['DRCDUN'];
            }
            if($_SESSION["cddr"] == $rec['DRCDDR'])
            {
                print "<option value='".$rec['DRCDDR']."' selected>".$rec['DRNMDR']."</option>";
            }
            else
            {
                print "<option value='".$rec['DRCDDR']."'>".$rec['DRNMDR']."</option>";
            }
        }
        print "</select>"; 
    }
?>
