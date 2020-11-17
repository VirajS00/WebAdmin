const form = document.getElementById('loginForm');
const error = document.querySelector('.error');
form.addEventListener('submit', (e) => {
	e.preventDefault();
	const formdata = new FormData(form);
	fetch('php/login_action.php', {
		method: 'POST',
		body: formdata
	})
		.then((res) => res.text())
		.then((text) => {
			if (
				text === 'please enter username' ||
				text === 'please enter password' ||
				text === 'please enter username and password' ||
				text === 'username or password not found'
			) {
				error.textContent = text;
			} else {
				form.submit();
			}
		})
		.catch((err) => console.error(err));
});
