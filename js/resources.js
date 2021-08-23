document.querySelectorAll('.delForm').forEach((form) => {
	form.addEventListener('submit', (e) => {
		e.preventDefault();
		if (confirm('Are you sure you want to delete?')) {
			form.submit();
		} else {
			return;
		}
	});
});
