const button = document.querySelector('#updateDB');
const video_ids = document.querySelector('#video_ids');
const total = document.querySelector('#total');

button.addEventListener('click', async () => {
	const fd = new FormData();
	fd.append('update', true);
	fd.append('video_ids', video_ids.value);
	fd.append('total', total.value);

	const res = await fetch('php/updateFilmsTable.php', {
		method: 'POST',
		body: fd
	});

	const data = await res.text();

	console.log(data);
});
