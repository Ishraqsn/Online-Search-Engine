<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Result Page</title>
	<script type="text/css">
		.result{
		margin-left:12%;
		margin-right:12%;
		margin-top:10px;
	}
	</script>
</head>
<body bgcolor="#F5DEB3">
	<form action="result.php" method="GET">
		<span><b>Write Your Keyword:</b></span>
		<input type="text" name="user_keyword" size="120">
		<input type="submit" name="result" value="search now">
	</form>
	<a href="search.html"><button>Go Back</button>
<?php
mysql_connect("localhost","root","");
mysql_select_db("search");
if(isset($_GET['search']))
{
	$get_value=$_GET['user_query'];
	if($get_value==' ')
	{
		echo "<center><b>Please go back and write something in the search box!</b></center>";
		exit();
	}
	$result_query="select *from site_keywords like '%$get_value%'";
	$run_result=mysql_query($result_query);
	if(mysql_num_rows($run_result)<1)
	{
		echo "<center><b>Ooops! sorry, nothing was found in database!</b></center>";
		exit();
	}
	while ($row_result=mysql_fetch_array($run_result)) {

		$site_title=$row_result['site_title'];
		$site_link=$row_result['site_link'];
		$site_desc=$row_result['site_desc'];
		$site_image=$row_result['site_image'];
		echo "<div class='result'>
		<h2>$site_title</h2>
		<a href='$site_link' target='blank'>$site_link</a>
		<p align='justify'>$site_desc</p>
		<img src='images/$site_image' width='100' height='100'></div>";
}
}
?>
</body>
</html>
