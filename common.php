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
        print "<select name = 'shban' form = 'main'>";

        while(true)
        {
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($rec==false)
            {
                break;
            }
    
            print "<option value='".$rec['SHCDSH']."'>".$rec['SHNMSH']."</option>";
        }
        print "</select>"; 
    }

    function pulldown_unsm()
    {
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
        
        print "<select name = 'cdun' >";
        while(true)
        {
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($rec==false)
            {
                break;
            }
    
            print "<option value='".$rec['UNCDUN']."'>".$rec['UNRYUN']."</option>";
        }
        print "</select>"; 
    }

    function pulldown_drvm($cdun)
    {
        include ("userfile.php");               //$dsn,$user,$password

        $dbh = new PDO($dsn, $user, $password); //SqlServerのデータベースに接続
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示
        
        $sql = "SELECT * FROM ST_DRVM_MYSQL
        WHERE st_drvm_mysql.DRCDUN=?
        ORDER BY ST_DRVM_MYSQL.DRCDDR;"; // SELECT文を変数に格納。
    
        $stmt = $dbh->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
        $params[] = $cdun;          // 挿入する値を配列に格納する
        
        $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行
        
        $PDO = null;        //データベースから切断
        
        print "<select name = 'cddr' form = 'main'>";
        while(true)
        {
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($rec==false)
            {
                break;
            }
    
            print "<option value='".$rec['DRCDDR']."'>".$rec['DRNMDR']."</option>";
        }
        print "</select>"; 
    }
?>
