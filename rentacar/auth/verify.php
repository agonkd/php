<?php
// Assuming you have already connected to your database
// and sanitized user inputs
$token = $_GET['token'];

// Look up the token in the database
$query = "SELECT * FROM users WHERE token = '$token' LIMIT 1";
// Execute the query

// If a matching token is found, mark the user as verified
// Update the is_verified column in the database

// Redirect the user to a success page or display a success message
