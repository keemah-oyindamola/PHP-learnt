<?php
    // Enable CORS
    header('Access-Control-Allow-Origin: *'); // Allow requests from this origin
    header('Access-Control-Allow-Methods: POST, GET, OPTIONS'); // Allow these methods
    header('Access-Control-Allow-Headers: Content-Type, Authorization'); // Allow these headers
    
    // Handle preflight (OPTIONS) requests
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        exit();
    }

        // Set content type to JSON
        // header('Content-Type: application/json');

        // Get the JSON input data from Angular
        $data = json_decode(file_get_contents('php://input'), true);
    

        if ($data) {
            // Extract user data
            $first_name = $data['firstname'];
            $last_name = $data['lastname'];
            $email = $data['email'];
            $password = $data['password'];
        
            // Database connection
            include("./database/connectdb.php");
        
            // Simple query to insert the user data
            $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";
        
            if (mysqli_query($connect, $sql)) {
                echo json_encode(['success'=>true,'message' => 'Registration successful']);
            } else {
                // Check for duplicate email error
                if (mysqli_errno($connect) === 1062) {
                    echo json_encode(['success'=>false,'message' => 'Email already exists']);
                } else {
                    echo json_encode(['success'=>false,'message' => 'Error: ' . mysqli_error($connect)]);
                }
            }
        
            // Close the connection
            mysqli_close($connect);
        } else {
            echo json_encode(['success'=>false,'message' => 'Invalid data received']);
        }
?>