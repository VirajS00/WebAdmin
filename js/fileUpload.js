const fileInp = document.getElementById('photo');
const label = document.querySelector('.input-label');
const form = document.getElementById('img-form');
const category = document.getElementById('category');

fileInp.addEventListener('change', () => {
	label.textContent = fileInp.files[0].name;
});

category.addEventListener('change', () => {
	let cat_id;
	if (category.value === 'Abstract') {
		cat_id = 1;
	} else if (category.value === 'Nature') {
		cat_id = 2;
	} else if (category.value === 'Macro') {
		cat_id = 3;
	} else {
		cat_id = 0;
	}
	document.getElementById('cat_id').value = cat_id;
});

form.addEventListener('submit', (e) => {
	e.preventDefault();
	const photo = document.getElementById('photo');
	const caption = document.getElementById('caption');
	let errors = [];
	if (category.value == 'null') {
		errors.push('Error: Please choose catgeory');
	}
	if (caption.value == '') {
		errors.push('Error: Please enter caption');
	}
	if (photo.files.length > 0) {
		const fd = new FormData();
		fd.append('photo', photo.files[0]);
		fd.append('caption', caption.value);
		fd.append('category_name', category.value);
		fd.append('category_id', document.getElementById('cat_id').value);
		document.querySelector('.loader-container').style.display = 'flex';
		fetch('php/uploadPhotos.php', {
			method: 'POST',
			body: fd
		})
			.then((res) => {
				if (!res.ok) {
					throw new Error(response);
				}
				return res.text();
			})
			.then((json) => {
				form.reset();
				label.textContent = 'Select Photo';
				console.log(json);
				document.querySelector('.loader-container').style.display = 'none';
			});
	} else {
		errors.push('Error: Please choose photo');
	}

	if (typeof errors !== 'undefined' && errors.length > 0) {
		let error = { status: 'error', error: errors };
		console.log(error);
	}
});
