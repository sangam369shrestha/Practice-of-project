<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX Form Submission with Various Input Types</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <h2>Submit Form Using AJAX with All Input Types</h2>

    <form id="myForm" enctype="multipart/form-data">
        <!-- Text input -->
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br><br>

        <!-- Email input -->
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>

        <!-- Number input -->
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required min="18" max="100">
        <br><br>

        <!-- Date input -->
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>
        <br><br>

        <!-- Time input -->
        <label for="time">Preferred Time:</label>
        <input type="time" id="time" name="time" required>
        <br><br>

        <!-- File input -->
        <label for="file">Upload File:</label>
        <input type="file" id="file" name="file" required>
        <br><br>

        <!-- Checkbox -->
        <label>Subscribe to newsletter:</label>
        <input type="checkbox" name="newsletter" value="yes">
        <br><br>

        <!-- Radio buttons -->
        <label>Gender:</label>
        <input type="radio" name="gender" value="male" required> Male
        <input type="radio" name="gender" value="female"> Female
        <br><br>

        <!-- Range input -->
        <label for="experience">Experience (Years):</label>
        <input type="range" id="experience" name="experience" min="0" max="50" value="10">
        <br><br>

        <!-- URL input -->
        <label for="website">Website:</label>
        <input type="url" id="website" name="website">
        <br><br>

        <!-- Username input -->
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br><br>

        <!-- Password input -->
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>

        <button type="submit">Submit</button>
    </form>

    <div id="response"></div> <!-- To show server response -->

    <script>
        // AJAX form submission
        $('#myForm').submit(function(event) {
            event.preventDefault(); // Prevents the default form submission

            // Get form values
            var formData = new FormData(this); // Use FormData to handle file input

            // Make AJAX request
            $.ajax({
                url: 'submit_form.php',  // PHP script to handle form submission
                type: 'POST',
                data: formData,
                contentType: false,  // Do not set content-type, FormData will handle it
                processData: false,   // Prevent jQuery from processing the data
                success: function(response) {
                    $('#response').html(response);  // Display the server response (success/error message)
                },
                error: function() {
                    alert('Error occurred while submitting the form.');
                }
            });
        });
        
    </script>
</body>
</html>
