<html><!--insert.html, insert.php, delete.php와 연결되는 코드로 POST로 넘겨받은 code변수, 이름변수, 가격 변수는 table "price"에 저장된다..-->

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
<p><font face="HY울릉도B"><span style="font-size:24pt;">

<?php

  $code = $_POST['code']; // 상품정보를 insert.html이나 insert.php나 delete.php로부터 전송받아 변수로 선언된다.
  $name = $_POST['name'];
  $price = $_POST['price'];


  $dbc = mysqli_connect('localhost', 'raspos', 'raspospw', 'raspos')
    or die('Error connecting to MySQL server.'); //sql연결



  $query = "INSERT INTO price (code, name, price) " .
    "VALUES ('$code', '$name', '$price')"; //변수들은 table "price"에 이렇게 저장된다.

  $result = mysqli_query($dbc, $query)
    or die('Error querying database.');


  mysqli_close($dbc);


  echo '상품 바코드 : ' . $code . '<br />'; //입력 성공시 결과를 출력한다.
  echo '상품 이름 : ' . $name . '<br />';
  echo '상품 가격 : ' . $price . '<br />';

?>
    <p><font face="굴림">&nbsp;</font></p>
	<p><font face="굴림">&nbsp;</font></p>
<p align="center"><b><font face="돋움"><span style="font-size:48pt;">상품관리</span></font></b></p> <!--insert.html의 코드와 동일하게 상품정보를 입력받고 다시 insert.php나 delete.php로 넘어간다. 관련 설명은 insert.html의 각주를 참고바란다.-->
<form name="form1" method="post" action="insert.php">
    <p align="center"><font face="HY울릉도B"><span style="font-size:36pt;">* 상품 추가시 *</span></font></p>
    <p>&nbsp;</p>
    <p><font face="HY울릉도B"><span style="font-size:36pt;">상품 바코드 : <input type="text" name="code" style="font-family:HY울릉도B; font-size:50; border-width:2; border-color:black; border-style:double;" size="25"></span></font></p>
    <p><font face="HY울릉도B"><span style="font-size:36pt;">상품 이름</span></font><span style="font-size:36pt;"><font face="돋움"> &nbsp;&nbsp;&nbsp;</font></span><font face="HY울릉도B"><span style="font-size:36pt;">: <input type="text" name="name" style="font-family:HY울릉도B; font-size:50; border-width:2; border-color:black; border-style:double;" size="25"></span></font></p>
    <p><font face="HY울릉도B"><span style="font-size:36pt;">상품 가격</span></font><span style="font-size:36pt;"><font face="돋움"> &nbsp;&nbsp;&nbsp;</font></span><font face="HY울릉도B"><span style="font-size:36pt;">: <input type="text" name="price" style="font-family:HY울릉도B; font-size:50; border-width:2; border-color:black; border-style:double;" size="25">원</span></font></p>
    <p><input type="submit" name="post" value="상품추가" style="font-family:HY울릉도B; font-size:50;"></p>
</form>
<form name="form2" method="post" action="delete.php">
    <p align="center"><font face="HY울릉도B"><span style="font-size:36pt;">* 상품 제거시 *</span></font></p>
    <p>&nbsp;</p>
    <p><font face="HY울릉도B"><span style="font-size:36pt;">상품 바코드 : <input type="text" name="code" style="font-family:HY울릉도B; font-size:50; border-width:2; border-color:black; border-style:double;" size="25"></span></font></p>
    <p>&nbsp;</p>
    <p><input type="submit" name="post" value="상품제거" style="font-family:HY울릉도B; font-size:50;"></p>
</form>
<p>&nbsp;</p>

</span></font></p>
<p>&nbsp;</p>

</body>

</html><!--builded Web-Application by KAERIUS-->