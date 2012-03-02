// Get the search variable from URL
$searchstring = $_POST['term'];

//get all the tables from the database test
$q = "show tables";
$r = mysql_query($q);
$searchresult = array();

// fetch table in array and output comma separated version
$a ='';
while ($row = mysql_fetch_array($r)) {
$a.= ' SELECT * FROM `' .$row['0'].'` WHERE';
$a.= " `column1` LIKE '%" . $searchstring . "%' OR ";
$a.= " `column2` LIKE '%" . $searchstring . "%' OR ";
$a.= " `column3` LIKE '%" . $searchstring . "%' OR ";
$a.= " `column4` LIKE '%" . $searchstring . "%' OR ";
$a.= " `column5` LIKE '%" . $searchstring . "%'";
$a.= ' UNION';
}
// remove the final UNION from the SQL query above
$table = substr($a,0,-5);
echo "<br>";
echo "<br>";
$finalquery = $table . "\n";
echo $finalquery; // just to checkout the SQL query before running it
echo "<br>";
echo "<br>";

$result = mysql_query($finalquery);
while($row = mysql_fetch_array($result)){
// do something here with the query result in array
}
