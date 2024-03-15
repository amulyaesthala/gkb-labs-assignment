// script.js (for client-side validation)
document.getElementById("userForm").addEventListener("submit", function (event) {
    var email = document.getElementById("email").value;
    var age = document.getElementById("age").value;

    if (!validateEmail(email)) {
        document.getElementById("error").innerHTML = "Invalid email format.";
        event.preventDefault();
    } else if (isNaN(age) || age <= 0) {
        document.getElementById("error").innerHTML = "Age must be a positive integer.";
        event.preventDefault();
    }
});

function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}
