<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="PHP入力テスト">
  <title>入力フォーム</title>
  <link rel="stylesheet" href="/main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
<div id="post_page">
  <form method="post" action="staff_ins_chk.php">
    <div>名前 <input type="text" name="name" size="30"></div><br>
    <div>住所 <input type="text" name="address" size="50"></div><br>
    <div>備考 <textarea name="biko" cols="40" rows="5"></textarea></div>
    <input type="submit" name="submit" value="登録" class="button"><input type="button" onclick="history.back()" value="戻る">
  </form>
</div>
</body>
</html>