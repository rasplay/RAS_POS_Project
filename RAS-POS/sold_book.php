﻿<html><!--매상 정보를 출력하는 code이다.-->
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">

<title>우리슈퍼 매상장부</title>
</head>
<body>

<p align="center"><span style="font-size:48pt;"><font face="휴먼둥근헤드라인">매상 장부</font></span></p>
<form name="form1" method="post" action="sold_book_search.php">
    <p align="center"><select name="year" size="1" style="font-family:HY울릉도B; font-size:24;">
	<option selected value="">판매년도</option>
        <?php //본 페이지에서는 상품 판매 년도와 상품판매 월별 조회가 가능하다. 이 php문은 html select form과 맞물려있다.

$hostname = "localhost";
$username = "raspos";
$password = "raspospw";
$dbname = "raspos";
 
$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다");
mysql_select_db($dbname,$connect);
 
$sql="SELECT distinct(year) FROM sold_book";  //판매 년도에 중복되는 부분을 찾아서 없앤다. 이 부분은 매뉴를 나타내는 폼이기 때문에 sold_book의 전체 year을 보여줄 필요는 없다.

$result=mysql_query($sql);
 
while($row=mysql_fetch_array($result)){ 
 
echo '<option value="' . $row[year] . '">' . $row[year] . '</option>';//table "sold_book"에서 뽑아낸 데이터를 form html에 그대로 적용시킨다. 테이블에 등록된 판매 년도와 월별정보만 나오기 때문에 시간이 지나더라도 페이지 유지보수다 싶어서 년도를 따로 추가할 필요는 없다.
 

mysql_close($connect);

}
?>
</select> &nbsp;&nbsp;<select name="month" size="1" style="font-family:HY울릉도B; font-size:24;">
<option selected value="">판매월</option>
        <?php //판매월을 찾아 출력하는 문이다.

$hostname = "localhost"; 
$username = "raspos";
$password = "raspospw";
$dbname = "raspos";
 
$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다");
mysql_select_db($dbname,$connect);
 
$sql="SELECT distinct(month) FROM sold_book";
 
$result=mysql_query($sql);
 
while($row=mysql_fetch_array($result)){ 
 
echo '<option value="' . $row[month] . '">' . $row[month] . '</option>'; 


mysql_close($connect);

}
?>
</select> &nbsp;&nbsp;<input type="submit" name="search" value="검색" style="font-family:HY울릉도B; font-size:24;"></p>
</form> <!--year과 month를 입력받은 폼은 sold_book_search로 정보를 넘겨준다.-->
<p>&nbsp;</p>
<table border="1" width="767" align="center">
    <tr>
        <td width="248" height="51">
            <p align="center"><font face="HY울릉도B"><span style="font-size:24pt;">판매날짜</span></font></p>
</td>
        <td width="248" height="51">
            <p align="center"><font face="HY울릉도B"><span style="font-size:24pt;">판매시간</span></font></p>
</td>
        <td width="248" height="51">

            <p align="center"><font face="HY울릉도B"><span style="font-size:24pt;">매상</span></font></p>
</td>
    </tr>
    <tr>
        <td width="248" height="27">		
            <p align="center" style="line-height:175%;">
			
<font face="HY울릉도B"><span style="font-size:24pt;">
<?php
$hostname = "localhost";
$username = "raspos";
$password = "raspospw";
$dbname = "raspos"; 
 
$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다");
mysql_select_db($dbname,$connect);
 
$sql="select * from sold_book"; 
 
$result=mysql_query($sql);
 
while($array=mysql_fetch_array($result)){ 
 

echo $array[year] . '-' . $array[month] . '-' . $array[day] . '<br/>'; 
 

mysql_close($connect);

}
?>

</span></font>
</p>
</td>
        <td width="248" height="40">		
            <p align="center" style="line-height:175%;">
			
<font face="HY울릉도B"><span style="font-size:24pt;">
<?php

$hostname = "localhost";
$username = "raspos";
$password = "raspospw";
$dbname = "raspos"; 
 
$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다");
mysql_select_db($dbname,$connect);
 
$sql="select * from sold_book"; 
 
$result=mysql_query($sql);
 
while($array=mysql_fetch_array($result)){ 
 

	echo $array[time] . '<br/>'; 
 

mysql_close($connect);

}
?>

</span></font>
</p>
</td>
        <td width="248" height="27">		

            <p align="center" style="line-height:175%;">
			
<font face="HY울릉도B"><span style="font-size:24pt;">
<?php

$hostname = "localhost";
$username = "raspos";
$password = "raspospw";
$dbname = "raspos"; 
 
$connect = mysql_connect($hostname, $username, $password) or die("MySQL Server 연결에 실패했습니다");
mysql_select_db($dbname,$connect);
 
$sql="select * from sold_book"; 
 
$result=mysql_query($sql);
 
while($array=mysql_fetch_array($result)){ 
 

echo $array[totalprice] . '<br/>'; 
 

mysql_close($connect);

}
?>
			
</span></font>			
</p>
</td>
    </tr>
</table>
<p>&nbsp;</p>
</body>
</html> <!--builded Web-Application by KAERIUS-->