const closecross = document.querySelectorAll('.delete-cross');

closecross.forEach((cross) => {
	cross.addEventListener('click', async () => {
		if (confirm('are you sure you want to delete this message')) {
			document.querySelector('.loader').style.display = 'block';
			const id = cross.getAttribute('data-index');
			const fd = new FormData();
			fd.append('id', id);
			const req = await fetch('php/delFeedback.php', {
				method: 'POST',
				body: fd
			});
			const res = await req.text();
			if (res === 'success') {
				const req1 = await fetch('php/getFeedback.php');
				const res1 = await req1.text();
				document.querySelector('.feedback-container').innerHTML = res1;
				document.querySelector('.loader').style.display = 'none';
			} else {
				console.log(res);
				document.querySelector('.loader').style.display = 'none';
			}
		} else {
			return;
		}
	});
});
