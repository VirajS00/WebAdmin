const button = document.querySelector('#updateDB');
const video_ids = document.querySelector('#video_ids');
const total = document.querySelector('#total');
const updated = document.querySelector('.updated');
const updateForms = document.querySelectorAll('.update_form');

button.addEventListener('click', async () => {
	const fd = new FormData();
	fd.append('update', true);
	fd.append('video_ids', video_ids.value);
	fd.append('total', total.value);

	const res = await fetch('php/updateFilmsTable.php', {
		method: 'POST',
		body: fd
	});

	const data = await res.json();

	let status = Object.keys(data[0]).toString();

	if (status == 'success') {
		updated.textContent = data[0].success;
		updated.style.backgroundColor = 'rgb(120, 215, 120)';
		updated.style.color = 'rgb(0, 60, 0)';
		updated.style.opacity = '1';
	} else if (status == 'error') {
		updated.textContent = data[0].error;
		updated.style.backgroundColor = 'rgb(233, 124, 124)';
		updated.style.color = 'rgb(40, 0, 0)';
		updated.style.opacity = '1';
	}

	setTimeout(() => {
		updated.style.opacity = '0';
	}, 2000);
});

updateForms.forEach((form, i) => {
	form.addEventListener('submit', async (e) => {
		e.preventDefault();
		let videoId = form.getAttribute('data-video-id');
		let my_role = form.querySelector('.my_role').value;
		const fd = new FormData();
		fd.append('video_id', videoId);
		fd.append('my_role', my_role);

		const req = await fetch('php/updateValues.php', {
			method: 'POST',
			body: fd
		});
		const res = await req.json();

		let status2 = Object.keys(res).toString();

		if (status2 == 'Success') {
			updated.textContent = res.Success;
			updated.style.backgroundColor = 'rgb(120, 215, 120)';
			updated.style.color = 'rgb(0, 60, 0)';
			updated.style.opacity = '1';
		} else {
			updated.textContent = res.Error;
			updated.style.backgroundColor = 'rgb(233, 124, 124)';
			updated.style.color = 'rgb(40, 0, 0)';
			updated.style.opacity = '1';
		}

		setTimeout(() => {
			updated.style.opacity = '0';
		}, 2000);
	});
});
