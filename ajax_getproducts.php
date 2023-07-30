<?php
// Connect to the database
$host = "localhost";
$username = "root";
$password = null;
$dbname = "onlinestore";
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from the "products" table
$sql = "SELECT productID, productName, prices FROM products";
$result = mysqli_query($conn, $sql);

// Create an XML document
$xmlDoc = new DOMDocument();
$xmlDoc->formatOutput = true;

// Create the root element
$root = $xmlDoc->createElement("products");
$xmlDoc->appendChild($root);

// Create an HTML table
// echo "<table>";
// echo "<tr><th>Product ID</th><th>Product Name</th><th>Price</th></tr>";

// Loop through the data and create elements for each product
while ($row = mysqli_fetch_assoc($result)) {
  $products = $xmlDoc->createElement("products");
  
  $productID = $xmlDoc->createElement("productID");
  $productID->appendChild($xmlDoc->createTextNode($row["productID"]));
  $products->appendChild($productID);
  
  $productName = $xmlDoc->createElement("productName");
  $productName->appendChild($xmlDoc->createTextNode($row["productName"]));
  $products->appendChild($productName);

  $prices = $xmlDoc->createElement("prices");
  $prices->appendChild($xmlDoc->createTextNode($row["prices"]));
  $products->appendChild($prices);
  
  $root->appendChild($products);

  /*
  // Create HTML rows for each product
  echo "<tr>";
  echo "<td>" . $row["productID"] . "</td>";
  echo "<td>" . $row["productName"] . "</td>";
  echo "<td>" . $row["prices"] . "</td>";
  echo "</tr>";
  */
} 

// Set the content type header to XML
header("Content-type: text/xml");

// Output the XML document
echo $xmlDoc->saveXML();

// Save XML file
$xmlDoc->save('ajax_products.xml');
?>
