<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TeX Electronics - Search Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .results-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .product-item {
            width: 200px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
            text-align: center;
            padding: 10px;
        }

        .product-item:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .product-item img {
            width: 100px; /* Fixed width */
            height: 100px; /* Fixed height */
            object-fit: cover; /* Ensures images fill the space without distortion */
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }

        .product-item h3 {
            font-size: 18px;
            color: #333;
            margin: 10px 0;
        }

        .product-item a {
            text-decoration: none;
            color: inherit;
        }

        .no-results {
            text-align: center;
            font-size: 18px;
            color: #777;
        }

        p {
            text-align: center;
        }
    </style>
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
  echo "<div class='results-container'>";
  if ($num_results > 0) {
      while ($row = $result->fetch_assoc()) {
          $productType = $row['product_type'];
          $productName = $row['product_name'];
          $imageLink = $row['imagelink'];

          // Generate the link to the single product page
          $productLink = 'product.php?product=' . urlencode(str_replace(' ', '-', $productName));

          // Display the product details
          echo "<div class='product-item'>";
          echo "<a href='$productLink'>";
          echo "<img src='$imageLink' alt='$productName'>";
          echo "<h3>$productName</h3>";
          echo "</a>";
          echo "</div>";
      }
  } else {
      echo "<p class='no-results'>No products found.</p>";
  }
  echo "</div>";

  // Close the database connection
  $db->close();
?>

</body>
</html>
