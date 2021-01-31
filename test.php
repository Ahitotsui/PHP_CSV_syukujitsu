
<table border=1>
    <tr>
        <th>year</th>
        <th>month</th>
        <th>day</th>
        <th>syukujitu</th>
    </tr>

    
    <?php

    // #1 ファイルの読み込み
    $f = fopen("./syukujitsu.csv", "r");

    $newAry = array();
    
    // 1行ずつCSVを配列に変換して $newAry に格納。
    while ($line = fgetcsv($f)) {

        // 文字化け対策
        $line = mb_convert_encoding($line, 'UTF-8', 'sjis-win');

        $newAry[] = $line;
    }
    

    for ($i=1;$i<count($newAry);$i++) {
            
        //年・月・日をスラッシュ/で分解する
        $YMD = explode('/',$newAry[$i][0]);

        print("<tr>");
        print("<td>{$YMD[0]}</td>");//年
        print("<td>{$YMD[1]}</td>");//月
        print("<td>{$YMD[2]}</td>");//日
        print("<td>{$newAry[$i][1]}</td>");//祝日名
        print("</tr>");
    }

    // ファイルを閉じる
    fclose($f);

    ?>
    
    
</table>