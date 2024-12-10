<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Submit Form</h1>
    <form id="detailsForm">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age"><br><br>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select><br><br>

        <label for="preferences">Preferences:</label>
        <input type="checkbox" name="preferences[]" value="sports"> Sports
        <input type="checkbox" name="preferences[]" value="music"> Music
        <input type="checkbox" name="preferences[]" value="travel"> Travel<br><br>

        <label for="bio">Bio:</label>
        <textarea id="bio" name="bio"></textarea><br><br>

        <button type="submit">Submit</button>
    </form>

    <div id="messages"></div>

    <script>
        $(document).ready(function () {
            $('#detailsForm').on('submit', function (e) {
                e.preventDefault(); // Prevent default form submission
                
                // Send form data via AJAX
                $.ajax({
                    url: 'register_process.php',
                    type: 'POST',
                    data: $(this).serialize(), // Serialize form data
                    success: function (response) {
                        const result = JSON.parse(response);
                        displayMessages(result.messages, result.status);
                        if (result.status === 'success') {
                            $('#detailsForm')[0].reset(); // Reset form
                        }
                    },
                    error: function (xhr, status, error) {
                        displayMessages(['An error occurred: ' + error], 'error');
                    }
                });
            });

            function displayMessages(messages, type) {
                const messageBox = $('#messages');
                messageBox.empty();
                messages.forEach(msg => {
                    messageBox.append(`<p class="${type}">${msg}</p>`);
                });
            }
        });
    </script>
    <style>
        .success { color: green; }
        .error { color: red; }
    </style>
</body>
</html>
