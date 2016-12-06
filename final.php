<?php
echo'
<head>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
';
mysql_connect("localhost","root","");
$q2=mysql_select_db('bookstores');

if(!$q2){

	echo"didnt connect";

}
else{

  $q2="SELECT author.sno AS ID,author.name, GROUP_CONCAT(DISTINCT books.name ORDER BY books.aid SEPARATOR ',') AS BOOK FROM books INNER JOIN author ON author.sno = books.aid GROUP BY books.aid";

$results = mysql_query($q2);
	if(!$results){

		echo"results is error";
	}
	else{
	echo '<table class="table table-bordered">
    <tr><th>SNO</th><th>Author Name</th><th>Book Name</th>
    </tr>';
	if(mysql_num_rows($results)>0)
{
   
while ($row = mysql_fetch_array($results)) {
   
    echo '
    
        <tr>
            <td>'.$row['ID'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['BOOK'].'</td>
        </tr>';

}

echo '
</table>';

}
}
}
?>