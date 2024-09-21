function validateForm() {
    // Get form elements
    var username = document.getElementById('username').value.trim();
    var user_password = document.getElementById('user_password').value.trim();
    var display_name = document.getElementById('display_name').value.trim();

    // Check if display name, username, or password is empty
    if (display_name === "" || username === "" || user_password === "") {
        alert("Please fill in all fields!");
        return false; // Prevent form submission
    }

    // Check username length
    if (username.length < 4) {
        alert("Username must be at least 4 characters long!");
        return false; // Prevent form submission
    }

    // Check password length
    if (user_password.length < 4) {
        alert("Password must be at least 4 characters long.");
        return false; // Prevent form submission
    }
    // alert (username.toLowerCase())
    // Check if the username contains "admin"
    if (username.toLowerCase().includes("admin")) {
        alert("You cannot use the word 'admin' in the username.");
        return false;  // Prevent form submission
    }

    // If everything is valid, allow form submission
    return true; // Allow form submission
}
