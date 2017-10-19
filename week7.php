
<?php
	echo "<h1>PDO demo!</h1>";
	$username = 'dc267';
	$password = 'DaCK9cF9';
	$hostname = 'sql.njit.edu';
	$dsn = "mysql:host=$hostname;dbname=$username";
	try {
    $conn = new PDO($dsn, $username, $password);
    echo "Connected successfully<br>";
    
    $query = 'SELECT * FROM accounts
    		WHERE id <6';
    $anything = $conn->prepare($query);
    $anything->execute();

    $product = $anything->fetchAll();
    $anything->closeCursor();

	} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;

?>
<html>
Results: 
	<?php echo count($product);?> <br></br>
		<table>
		<?php foreach ($product as $product) { ?>
			<tr>
				<td><?php echo $product['id']; ?></td>
				<td><?php echo $product['email']; ?></td>
			</tr>
		<?php } ?>
		</table>
</html>