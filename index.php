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
<table>
<caption>配車情報</caption>
<br>

<?php

    print "<form method='post' action='login_check.php'>";
    print "社員cd<br>";
    print "<input type ='text' name = 'code' style = 'width:20px'>";
    print "<br>";
    print "<input type ='submit' value = 'ログイン'>";

    print("</form>");

?>
</table>
</body>
</html>