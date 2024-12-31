<?php
$insert = false; // Initialize $insert to false

if (isset($_POST['name'])) {
    // Database connection details
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a connection
    $con = new mysqli($server, $username, $password);

    // Check if the connection was successful
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Collect POST variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    // SQL query to insert data into the database
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
            VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    // Execute the query
    if ($con->query($sql) === TRUE) {
        $insert = true;
    } else {
        echo "Error: $sql <br>" . $con->error;
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form - IIT Kharagpur</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-cover bg-center bg-fixed min-h-screen flex items-center justify-center" style="background-image: url('https://cdn.thewire.in/wp-content/uploads/2021/04/29173639/iit.jpeg'); backdrop-filter: blur(8px);">
    <div class="rounded-lg p-8 w-full max-w-2xl mx-auto">
        <h3 class="font-extrabold text-2xl text-blue-800 text-[25px] text-center mb-4">Welcome to IIT Kharagpur</h3>
        <p class="text-center text-black mb-6">Enter your details and submit this form to proceed.</p>

        <?php
        // Display success message if form submission is successful
        if ($insert == true) {
            echo '<p class="italic text-green-600 mb-4 text-[17px]">Thanks for submitting your form. We are happy to see you joining for the US trip!!</p>';
        }
        ?>

        <form action="" method="post" class="space-y-4">
            <input type="text" name="name" id="name" placeholder="Enter your name" class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>

            <input type="number" name="age" id="age" placeholder="Enter your age" class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>

            <input type="text" name="gender" id="gender" placeholder="Enter your gender" class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>

            <input type="email" name="email" id="email" placeholder="Enter your email" class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>

            <input type="tel" name="phone" id="phone" placeholder="Enter your phone" class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>

            <textarea name="desc" id="desc" rows="3" placeholder="Enter any additional information" class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent h-24 resize-none"></textarea>

            <div class="flex justify-between space-x-4">
                <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">Submit</button>
                <button type="reset" class="w-full bg-gray-300 text-gray-700 font-bold py-2 px-4 rounded-lg hover:bg-gray-400 transition duration-300">Reset</button>
            </div>
        </form>
    </div>
</body>

</html>
