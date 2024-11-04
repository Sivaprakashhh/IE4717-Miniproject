<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TeX Electronics - Search Results</title>
</head>
<body>
<h1>Search Results</h1>

<?php
  // Create short variable names
  $searchterm = trim($_POST['query']);

  if (!$searchterm) {
     echo 'You have not entered a search term. Please go back and try again.';
     exit;
  }

  // Connect to the database
  @ $db = new mysqli('localhost', 'root', '', 'TEX');

  if (mysqli_connect_errno()) {
     echo 'Error: Could not connect to database. Please try again later.';
     exit;
  }

  // Construct the query
  $query = "SELECT product_type, product_name, imagelink FROM products WHERE product_name LIKE '%" . $db->real_escape_string($searchterm) . "%'";
  $result = $db->query($query);

  // Check the number of results
  $num_results = $result->num_rows;

  echo "<p>Number of products found: " . $num_results . "</p>";

  // Display each result
  if ($num_results > 0) {
      while ($row = $result->fetch_assoc()) {
          $productType = $row['product_type'];
          $productName = $row['product_name'];
          $imageLink = $row['imagelink'];

          // Determine the link based on the product type
          // Generate the link to the single product page
          $productLink = 'product.php?product=' . urlencode(str_replace(' ', '-', $productName));

          // Display the product details
          echo "<div class='product-item'>";
          echo "<a href='$productLink'>";
          echo "<img src='$imageLink' alt='$productName' style='width:100px;height:100px;'>";
          echo "<h3>$productName</h3>";
          echo "</a>";
          echo "</div>";
      }
  } else {
      echo "<p>No products found.</p>";
  }

  // Close the database connection
  $db->close();
?>

</body>
</html>