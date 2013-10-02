<html><!--list.php나 list_search_code.php, list_search_name.php으로부터 넘겨받은 name변수로 상품의 등록정보를 찾아낸다.-->
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">

<title>우리슈퍼 상품현황</title>
</head>
<body>
<!--다음 form code에 대한 설명은 list.php의 주석을 참조하여라.-->
<p align="center"><span style="font-size:48pt;"><font face="휴먼둥근헤드라인">상품 현황</font></span></p>
<form name="form1" method="post" action="list_search_code.php">
    <p align="center"><font face="HY울릉도B"><span style="font-size:24pt;">상품</span></font><span style="font-size:24pt;"> </span><font face="HY울릉도B"><span style="font-size:24pt;">검색</span></font><span style="font-size:16pt;"></span></p>
    <p align="center"><font face="HY울릉도B"><span style="font-size:16pt;">바코드로</span></font><span style="font-size:16pt;"><font face="굴림">&nbsp;</font><font face="HY울릉도B">찾아보기</font><font face="굴림">&nbsp;</font><font face="HY울릉도B">:</font> <font face="HY울릉도B"><input type="text" name="code" style="font-family:HY울릉도B; font-size:24;"></font><font face="굴림">&nbsp;<input type="submit" name="search" value="검색" style="font-family:HY울릉도B; font-size:24;">&nbsp;</font></span></p>
</form>
<form name="form2" action="list_search_name.php" method="post">
    <p align="center"><font face="HY울릉도B"><span style="font-size:16pt;">이름으로</span></font><span style="font-size:16pt;"><font face="굴림">&nbsp;</font><font face="HY울릉도B">찾아보기</font><font face="굴림">&nbsp;</font><font face="HY울릉도B">:</font><font face="굴림">&nbsp; </font><font face="HY울릉도B"><input type="text" name="name" style="font-family:HY울릉도B; font-size:24;"></font><font face="굴림">&nbsp;<input type="submit" name="search" value="검색" style="font-family:HY울릉도B; font-size:24;">&nbsp;</font></span></p>
</form>
<form name="form3" method="post" action="list.php">
<p align="center"><input type="submit" name="return" value="상품 전체 보기" style="font-family:HY울릉도B; font-size:24;"></p>
</form>
<p>&nbsp;</p>
<table border="1" width="767" align="center">
    <tr>
        <td width="248">
            <p align="center"><font face="HY울릉도B"><span style="font-size:24pt;">바코드</span></font></p>
</td>
        <td width="248">
            <p align="center"><font face="HY울릉도B"><span style="font-size:24pt;">상품이름</span></font></p>
</td>
        <td width="248">

            <p align="center"><font face="HY울릉도B"><span style="font-size:24pt;">상품가격</span></font></p>
</td>
    </tr>
    <tr>
        <td width="248" height="27">		
            <p align="center" style="line-height:200%;">
			
<font face="HY울릉도B"><span style="font-size:24pt;">
<?php
$name = $_POST['name']; //name변수는 select문으로 찾게되어 해당 정보가 출력된다. 출력내용은 code, name, price이다.

$hostname = "localhost";
$username = "raspos";
$password = "raspospw";
$dbname = "raspos"; 
 
$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다");
mysql_select_db($dbname,$connect);
 
$sql="select * from price where name = '$name'"; //본래 like문을 사용할 생각이었으나 본 서버에서 한글 인코딩이 こなごな 박살남으로 부분 한글검색은 불가능하였다. <ex 검색할 내용이 '자갈치'라면 '자갈'만 입력하더라도 나올 수 있도록 해주는 검색기능> 혹시 mysql 한글 인코딩이 안 깨어지는 서버라면 like문이 잘 될 것이다.
 
$result=mysql_query($sql);
 
while($array=mysql_fetch_array($result)){ 
 

echo $array[code] . '<br/>'; 
 

mysql_close($connect);

}
?>

</span></font></p>
</td>
        <td width="248" height="27">		
            <p align="center" style="line-height:200%;">
			
<font face="HY울릉도B"><span style="font-size:24pt;">	<?php
$name = $_POST['name'];


$hostname = "localhost";
$username = "raspos";
$password = "raspospw";
$dbname = "raspos"; 
 
$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다");
mysql_select_db($dbname,$connect);
 
$sql="select * from price where name = '$name'"; 
 
$result=mysql_query($sql);
 
while($array=mysql_fetch_array($result)){ 
 

echo $array[name] . '<br/>'; 
 

mysql_close($connect);

}
?>

</span></font></p>
</td>
        <td width="248" height="27">		

            <p align="center" style="line-height:200%;">
			
			
<font face="HY울릉도B"><span style="font-size:24pt;">            <?php
$name = $_POST['name'];


$hostname = "localhost";
$username = "raspos";
$password = "raspospw";
$dbname = "raspos"; 
 
$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다");
mysql_select_db($dbname,$connect);
 
$sql="select * from price where name = '$name'";  
 
$result=mysql_query($sql);
 
while($array=mysql_fetch_array($result)){ 
 

echo $array[price] . '원 <br/>'; 

 

mysql_close($connect);

}
?>
</span></font></p>
</td>
    </tr>
</table>
<p>&nbsp;</p>
</body>
</html> <!--builded Web-Application by KAERIUS-->