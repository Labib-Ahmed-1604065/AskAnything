let signup = document.getElementById("sign");
let login = document.getElementById("log");

function showSign() {
	if (signup.style.display != 'block') {
		signup.style.display = "block";
		login.style.display = "none";
	}
}

function showLog() {
	if (login.style.display != 'block') {
		login.style.display = "block";
		signup.style.display = "none";
	}
}
