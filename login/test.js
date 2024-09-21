function validatePassword() {
    var password = document.getElementById("password").value;
    
    if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return false;
    }
    return true;
}
function trimInputFields() {
    var username = document.getElementById("username").value.trim();
    var password = document.getElementById("password").value.trim();
    
    document.getElementById("username").value = username;
    document.getElementById("password").value = password;
}
