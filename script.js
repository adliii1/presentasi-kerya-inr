function togglePassword() {
    let passwordField = document.getElementById("password");
    let showIcon = document.getElementById("showIcon");
    let hideIcon = document.getElementById("hideIcon");

    if (passwordField.type === "password") {
        passwordField.type = "text";
        showIcon.style.display = "none";
        hideIcon.style.display = "inline-block";
    } else {
        passwordField.type = "password";
        showIcon.style.display = "inline-block";
        hideIcon.style.display = "none";
    }
}
