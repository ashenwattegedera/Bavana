let userType = ''; // Global variable to store user type

// Function to set user type based on button click
function setUserType(type) {
    userType = type;
}

function validateForm() {
    // Get form elements
    var username = document.getElementById('username').value.trim();
    var password = document.getElementById('password').value.trim();

    

    // Check if username is empty or too short
    if (username === "" ) {
        alert("Please fill in all fields!");
        return false;
    }
    
    if (username.length < 5) {
        alert("Username must be at least 5 characters long!");
        return false; // Prevent form submission
    }

    // Check if the username starts with 'admin' or 'user'
    const usernamePrefix = username.substring(0, 5).toLowerCase(); // First 5 letters

    if (usernamePrefix !== 'admin' && usernamePrefix !== 'user') {
        alert("Username must start with either 'admin' or 'user'.");
        return false; // Prevent form submission
    }

    // Check if password is empty or too short
    if (password === "") {
        alert("Please fill in all fields.");
        return false;
    }

    if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return false; // Prevent form submission
    }

    // // Ensure the correct button was clicked based on username prefix
    // if (usernamePrefix === 'admin' && userType === 'user') {
    //     alert("If your username starts with 'admin', you must click the Admin button.");
    //     return false; // Prevent form submission
    // }

    // if (usernamePrefix === 'user' && userType === 'admin') {
    //     alert("If your username starts with 'user', you must click the User button.");
    //     return false; // Prevent form submission
    // }

    // // Check if userType is set
    // if (userType === '') {
    //     alert("Please select either Admin or User.");
    //     return false; // Prevent form submission
    // }

    // If everything is valid, allow form submission
    alert("Login successful!"); // For testing purposes, you can remove this in production
    return true; // Allow form submission
}
