<html><!--insert.html, insert.php, delete.php와 연결되는 코드로 POST로 넘겨받은 code변수로 table "price"에서  상품 목록을 찾고 해당 목록을 지우는 역할을 한다.-->

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>상품등록</title>

</head>

<body bgcolor="white" text="black" link="blue" vlink="purple" alink="red">
<form name="form3" target="_blank" action="list.php">
    <p align="center"><b><span style="font-size:48pt;"><font face="HY울릉도B">상품관리</font><font face="굴림"> &nbsp;&nbsp;</font></span></b><input type="submit" name="list" value="상품리스트보기" style="font-family:HY울릉도B; font-size:36;"></p>
</form>
<form name="form4" method="post" action="sold_book.php" style="font-family:HY울릉도B; font-size:36;" target="_blank">
<p align="center"><font face="굴림">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><input type="submit" name="sold_list" value="매상장부보기" style="font-family:HY울릉도B; font-size:36;"></p> <!--매상 장부(sold_book.php)로 넘어가는 버튼-->
</form>
<p>&nbsp;</p>
<font face="HY울릉도B"><span style="font-size:36pt;">상품명 </span></font><b><font face="HY울릉도B"><span style="font-size:36pt;"><?php


$code = $_POST['code']; // 상품코드를 insert.html이나 insert.php나 delete.php로부터 전송받는다.

$hostname = "localhost"; //DB연결
$username = "raspos";
$password = "raspospw";
$dbname = "raspos"; 
 
$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다"); 
mysql_select_db($dbname,$connect); 
 
$sql="SELECT * FROM price WHERE code = '$code'"; //바코드 데이터를 통하여 지워지는 상품정보를 찾는다.
 
$result=mysql_query($sql);
 
while($array=mysql_fetch_array($result)){ 
 

echo $array[name]; //지워지는 상품명을 "지워지기전에" 출력한다.

 

mysql_close($connect); //안정성을 위해 php를 끊어놓았다?? 뭐 사실은 내가 미흡한거지만 말이야.

}
?></span></font></b><font face="HY울릉도B"><span style="font-size:36pt;">은</span></font><b><font face="HY울릉도B"><span style="font-size:36pt;">


<?php //php문에 다시 재접속한다.

  $code = $_POST['code'];

  $dbc = mysqli_connect('localhost', 'raspos', 'raspospw', 'raspos')
    or die('Error connecting to MySQL server.'); //DB연결, <연결문이 자꾸 뒤죽박죽이 된 것은 여기저기 코드를 많이 빌려와서 그렇다. 양해바란다.>

  $query = "DELETE FROM price WHERE code = '$code'"; //해당 코드의 상품을 리스트에서 제거한다.

mysqli_query($dbc, $query)
    or die('Error querying database.');


  mysqli_close($dbc);


  echo '제거' //성공적으로 제거하였을 경우 '제거'라는 단어가 화면상에 나타난다.

?>
</span></font></b><font face="HY울릉도B"><span style="font-size:36pt;">되었습니다.</span></font>
    <p>&nbsp;</p>
	<p>&nbsp;</p>
<p align="center"><b><font face="돋움"><span style="font-size:48pt;">상품관리</span></font></b></p> <!--insert.html의 코드와 동일하게 상품정보를 입력받고 다시 insert.php나 delete.php로 넘어간다. 관련 설명은 insert.html의 각주를 참고바란다.-->
<form name="form1" method="post" action="insert.php">
    <p align="center"><font face="HY울릉도B"><span style="font-size:36pt;">* 상품 추가시 *</span></font></p>
    <p>&nbsp;</p>
    <p><font face="HY울릉도B"><span style="font-size:36pt;">상품 바코드 : <input type="text" name="code" style="font-family:HY울릉도B; font-size:50; border-width:2; border-color:black; border-style:double;" size="25"></span></font></p>
    <p><font face="HY울릉도B"><span style="font-size:36pt;">상품 이름</span></font><span style="font-size:36pt;"><font face="돋움"> &nbsp;&nbsp;&nbsp;</font></span><font face="HY울릉도B"><span style="font-size:36pt;">: <input type="text" name="name" style="font-family:HY울릉도B; font-size:50; border-width:2; border-color:black; border-style:double;" size="25"></span></font></p>
    <p><font face="HY울릉도B"><span style="font-size:36pt;">상품 가격</span></font><span style="font-size:36pt;"><font face="돋움"> &nbsp;&nbsp;&nbsp;</font></span><font face="HY울릉도B"><span style="font-size:36pt;">: <input type="text" name="price" style="font-family:HY울릉도B; font-size:50; border-width:2; border-color:black; border-style:double;" size="25">원</span></font></p>
    <p><input type="submit" name="post" value="상품추가" style="font-family:HY울릉도B; font-size:50;"></p>
</form>
<form name="form2" method="post" action="delect.php">
    <p align="center"><font face="HY울릉도B"><span style="font-size:36pt;">* 상품 제거시 *</span></font></p>
    <p>&nbsp;</p>
    <p><font face="HY울릉도B"><span style="font-size:36pt;">상품 바코드 : <input type="text" name="code" style="font-family:HY울릉도B; font-size:50; border-width:2; border-color:black; border-style:double;" size="25"></span></font></p>
    <p>&nbsp;</p>
    <p><input type="submit" name="post" value="상품제거" style="font-family:HY울릉도B; font-size:50;"></p>
</form>
<p>&nbsp;</p>
</body>

</html> <!--builded Web-Application by KAERIUS-->