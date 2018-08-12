function validateForm() {
    var x = document.forms["registration"]["pswd"].value;
	var y = document.forms["registration"]["conf_pswd"].value;
    if (x != y) {
        alert("Password do not match!");
        return false;
    }
}