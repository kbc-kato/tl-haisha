<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scele=1">
        <link rel="stylesheet" href="base.css">
        <link rel="stylesheet" media= "screen and (max-width:800px)" href="base_sp.css">
        <link rel="stylesheet" href="form.css">
        <title>株式会社 高崎リビング</title>
    </head>
    <body>
        <div id="pagebody">
        <!-- ヘッダー -->
            <div id = "header">
                <h1>配車状況入力</h1>
            </div>
            <br><br>
			<div id='kanri'>
				<form method='POST' name='form2' action='kanri_check.php'>
					<input type='hidden' name='kakushi' value='secret'>
					<table class='kanri_tbl'>
						<tr><th>配車日</th><td>;<input type ='date' name = 'hiha' form = 'main'></label></td></tr>
						<tr><th>車番</th>
						<td>;<select name = 'shban' form = 'main'>
							<option value='1'>11号車</option><option value='2'>13号車</option><option value='3'>12号車</option><option value='4'>15号車</option><option value='5'>16号車</option><option value='6'>61号車</option><option value='7'>51号車</option><option value='8'>52号車</option><option value='9'>31号車</option><option value='10'>32号車</option><option value='11'>21号車2001</option><option value='12'>21号車1811</option><option value='13'>81号車</option>
							<option value='21'>傭車1</option><option value='22'>傭車2</option><option value='23'>傭車3</option><option value='24'>傭車4</option><option value='25'>傭車5</option>
							<option value='31'>依頼1</option><option value='32'>依頼2</option><option value='33'>依頼3</option><option value='34'>依頼4</option><option value='35'>依頼5</option><option value='36'>依頼6</option><option value='37'>依頼7</option><option value='38'>依頼8</option>
							</select>
						</td></tr>
						<tr><th>運送会社</th>
						<td>;<select name = 'cdun' onChange('this.form.submit()')>
							<option value='1000083'>(株)ロジスタッフ</option><option value='1000012'>【仮配車】</option><option value='6'>高崎ﾘﾋﾞﾝｸﾞ</option><option value='1000024'>TL cargo</option><option value='4'>月岡産業</option><option value='3'>路線便</option><option value='1000005'>群馬小型運送</option><option value='2'>(株)新和物流</option><option value='12'>ﾀﾞｲﾁｭｳ</option><option value='5'>ﾁｬｰﾀｰ便</option><option value='1000006'>ｱｲｴｽﾃｨｰ急送ﾁﾋﾞﾄﾗ</option><option value='1000010'>静岡フスマ商会</option><option value='1000014'>ボルテックスセイグン</option><option value='1000040'>株式会社友和物流</option><option value='1000011'>タイケイ商事</option><option value='1000033'>高崎運送組合</option><option value='1000017'>蛭間運送</option><option value='1000031'>よろずライフ</option><option value='1000013'>(有)松栄商事</option><option value='1000038'>田胡運送</option><option value='1000042'>塚原運送株式会社</option><option value='8'>みつわ運輸(株)</option><option value='1000036'>ﾔﾏﾄﾎｰﾑｺﾝﾋﾞﾆｴﾝｽ</option><option value='1'>Ｇライン(有)</option><option value='1000034'>花澤運輸倉庫</option><option value='1000026'>矢内運輸</option><option value='1000055'>株式会社ケイアイ物流</option><option value='1000049'>株式会社コスモ運輸</option><option value='1000054'>株式会社ハクトランス</option><option value='1000047'>株式会社ランドポート</option><option value='1000044'>関越流通倉庫株式会社</option><option value='1000051'>北上運輸株式会社</option><option value='1000050'>込山運送株式会社</option><option value='10'>職人持参</option><option value='1000016'>駿遠運送(株)</option><option value='1000048'>司企業株式会社</option><option value='1000056'>トランスネット株式会社</option><option value='7'>日の出貨物(有)</option><option value='1000015'>(有)山崎運輸</option><option value='1000046'>山崎商事運輸</option><option value='1000052'>山崎商事運輸株式会社</option><option value='1000053'>有限会社北都商運</option><option value='1000043'>有限会社VS.Transport</option><option value='1000027'>NK産業</option><option value='1000066'>株式会社TARFFICS</option><option value='1000065'>株式会社インターナショナルカンパニー</option><option value='1000057'>株式会社大島運送</option><option value='1000058'>株式会社サーティーンエクスプレス</option><option value='1000061'>株式会社つばめ急便</option><option value='1000068'>株式会社廣建　諏訪支店</option><option value='1000018'>九州商運</option><option value='1000064'>鈴木興業運輸株式会社</option><option value='1000062'>蓮沼商運株式会社</option><option value='11'>ひまわり特急便</option><option value='1000060'>富士運輸株式会社</option><option value='1000063'>有限会伸和物流</option><option value='1000059'>有限会社仲野運輸</option><option value='1000067'>株式会社タジマ</option><option value='1000030'>佐藤運送</option><option value='1000072'>司企業(株)仙台営業所</option><option value='1000081'>奄美コポレーション</option><option value='1000076'>(有)阿見企画</option><option value='1000079'>(有)興進運輸</option><option value='1000074'>(有)仲野運輸</option><option value='1000082'>REX(株)</option><option value='1000080'>(株)トランスポート</option><option value='1000078'>(株)ランドポート</option><option value='1000073'>関東陸運(株)</option><option value='1000071'>群馬中央(株)</option><option value='1000077'>誠和梱包運輸</option><option value='13'>泰斗</option><option value='1000070'>日成運輸(株)日高営業所</option><option value='1000075'>藤久運輸倉庫株式会社</option><option value='1000069'>有限会社マークス</option><option value='14'>ﾐﾔｼﾞﾏ</option><option value='1000032'>ﾌｼﾞﾓﾄ</option><option value='16'>凸版印刷</option><option value='17'>ｱｲｶ工業</option><option value='20'>ｳﾁﾔﾏ</option><option value='21'>三木製作所</option><option value='22'>中越加工</option><option value='23'>ｼﾓﾀﾞｲﾗ</option><option value='24'>匠の一冊</option><option value='26'>ﾔﾏｼﾀ</option><option value='27'>日成共益</option><option value='28'>ｳｯﾄﾞ建材</option><option value='29'>SEFT</option><option value='30'>関東商会</option><option value='32'>ｶﾜｼﾞｭﾝ</option><option value='33'>ﾕﾆｵﾝ</option><option value='35'>ｱｵｷｱｰﾄ工業</option><option value='36'>ｲﾋﾞｹﾝ</option><option value='999999'>未定</option><option value='1000002'>八伸</option><option value='1000004'>SHINSEI</option><option value='1000007'>太陽工業</option><option value='1000008'>ﾘｰﾌﾟ</option><option value='1000009'>ﾗﾐﾃｯｸ</option><option value='1000019'>広陵運送</option><option value='1000020'>AZﾛｼﾞ</option><option value='1000021'>群馬中央運送</option><option value='1000022'>ﾌｪﾛｰｼｯﾌﾟ</option><option value='1000023'>浅田運送</option><option value='1000025'>ﾁｪﾘｰｼﾞｬﾊﾟﾝ</option><option value='1000029'>関根運送</option><option value='1000035'>上中居運輸</option><option value='1000039'>北通千葉配車ｾﾝﾀｰ</option><option value='1000037'>樋口物流（山形）</option><option value='1000045'>ﾊｸﾄﾗﾝｽ</option>
							</select>
						</td></tr>
						<tr><th>運転者</th>
							<select name = 'cddr' id = 6 form = 'main'>
							<option value='142'>吉川秀樹</option><option value='162'>金坂邦雄</option><option value='325'>和田勉</option><option value='326'>今井功</option><option value='327'>中村史</option><option value='328'>蓼沼駿介</option>
							</select>
							<select name = 'cddr' id = 8 form = 'main'>
							<option value='1'>谷井氏</option><option value='2'>山田氏</option><option value='3'>有原氏</option><option value='4'>島田氏</option><option value='5'>白倉氏</option>
							</select>
							<select name = 'cddr' id = 12 form = 'main'>
							<option value='1'>渡辺展広</option></select><select name = 'cddr' id = 1000005 form = 'main'><option value='1'>吉沢</option><option value='2'>清水仁</option>
							</select>
							<select name = 'cddr' id = 1000006 form = 'main'>
							<option value='1'>吉田修</option><option value='2'>大塚千秋</option><option value='3'>高井一夫</option><option value='4'>岡田茂</option>
							</select>
							<select name = 'cddr' id = 1000023 form = 'main'>
							<option value='1'>浅田</option><option value='2'>浅田</option></select><select name = 'cddr' id = 1000024 form = 'main'><option value='1'>吉川秀樹</option><option value='2'>長岡洋介</option><option value='3'>金古雅之</option><option value='4'>山本勲</option><option value='5'>黒澤恵一</option><option value='7'>金井健治</option><option value='8'>小池永二</option><option value='12'>神正晃</option><option value='13'>安藤敏哉</option><option value='14'>吉田修</option><option value='15'>鈴木善章</option><option value='16'>小柏秀博</option><option value='17'>伴場哲也</option><option value='18'>片桐理裕</option><option value='19'>藤本茂樹</option></select>
							<select name = 'cddr' id = 1000027 form = 'main'>
							<option value='1'>仁木</option><option value='2'>富岡</option><option value='3'>川上</option>
							</select>
							<select name = 'cddr' id = 1000028 form = 'main'><option value='1'>富岡</option>
							</select>
							<select name = 'cddr' id = 1000029 form = 'main'><option value='1'>八木</option>
							</select>
							<select name = 'cddr' id = 1000030 form = 'main'><option value='1'>中島</option><option value='2'>金井</option>
							</select>
						</td></tr>
						<tr><th>行先1</th><td>;<input type ='text' name = 'nmry1' size='40' maxlength='40' form = 'main'> 着時間 <input type ='time' name = 'tmha1' form = 'main'>
						</td></tr>
						<tr><th>備考</th><td>;<textarea name = 'biko1' cols='40' rows='5' form = 'main'></textarea>
						</td></tr>
						<tr><th>行先2</th><input type ='text' name = 'nmry2' size='40' maxlength='40' form = 'main'> 着時間 <input type ='time' name = 'tmha2' form = 'main'></td></tr><tr><th>備考</th><td>;<textarea name = 'biko2' cols='40' rows='5' form = 'main'></textarea></td></tr></table><input type ='submit' value = '更新'></form></div>        </div>
    </body>
</html>