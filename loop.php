<html>
<head>
</head>
<body>
    <?php
    function sum(...$x){
        $num = 0;
        $len = count($x);
        for($i=0;$i<$len;$i++){
            $num += $x[$i];
        }
        return $num;
    }
    $a=sum(2,3,4,5);
    echo $a;
    ?>
    </body>
    </html>