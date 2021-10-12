<html>
<head><title>PHP HAISHA</title>
<style type="text/css">
    table{
        border-color:skyblue;
        border-style:solid;
        boder-widht:1px;
        width:1000px;
        }
    .hdr{background-color:gainsboro}
</style>
</head>
<body>

<caption>社員ログイン</caption>
<br>
<table>
<?php

    print "<form method='post' action='login_check.php'>";
    print "社員cd<br>";
    print "<input type ='text' name = 'code'>";
    print "<br>";
    print "<input type ='submit' value = 'ログイン'>";
    print "</form>";

?>
</table>
</body>
</html>