const labeltext = [...document.querySelectorAll('.labelcontent')];
const img_upload = document.getElementById('img_upload');
const img_small_upload = document.getElementById('img_small_upload');
const loader = [...document.querySelectorAll('.inp-loader')];

const getFileExtension = (filename) => filename.split('.').pop();

img_small_upload.addEventListener('change', () => {
	if (img_small_upload.files.length > 0) {
		labeltext[0].textContent = img_small_upload.files[0].name;
		let ext = getFileExtension(img_small_upload.files[0].name);
		const rand = Math.floor(Math.random() * 1000000000) + 1;
		let newFileName = `${rand}.${ext}`;
		const fd = new FormData();
		fd.append('file', img_small_upload.files[0]);
		fd.append('fileName', newFileName);
		loader[0].style.display = 'block';
		labeltext[0].style.display = 'none';
		fetch('php/img_small_upload.php', { method: 'POST', body: fd })
			.then((res) => {
				if (!res.ok) {
					throw new Error(response);
				}
				return res.text();
			})
			.then((text) => {
				const filedetails = text.split('|');
				if (filedetails[0] == 'success') {
					labeltext[0].style.display = 'block';
					loader[0].style.display = 'none';
					labeltext[0].textContent = 'Cover image upload complete';
					document.getElementById('img_small').value = filedetails[1];
				} else {
					labeltext[0].style.display = 'block';
					loader[0].style.display = 'none';
					labeltext[0].textContent = 'Error uploading Cover Image';
				}
			});
	} else {
		alert('please select cover image');
	}
});

img_upload.addEventListener('change', () => {
	if (img_upload.files.length > 0) {
		labeltext[1].textContent = img_upload.files[0].name;
		let ext = getFileExtension(img_upload.files[0].name);
		const rand = Math.floor(Math.random() * 1000000000) + 1;
		let newFileName = `${rand}.${ext}`;
		const fd = new FormData();
		fd.append('file', img_upload.files[0]);
		fd.append('fileName', newFileName);
		loader[1].style.display = 'block';
		labeltext[1].style.display = 'none';
		fetch('php/img_large_upload.php', { method: 'POST', body: fd })
			.then((res) => {
				if (!res.ok) {
					throw new Error(response);
				}
				return res.text();
			})
			.then((text) => {
				let filedetails = text.split('|');
				if (filedetails[0] == 'success') {
					console.log(text);
					labeltext[1].textContent = 'Large image upload complete';
					labeltext[1].style.display = 'block';
					loader[1].style.display = 'none';
					document.getElementById('img_large').value = filedetails[1];
				} else {
					labeltext[0].style.display = 'block';
					loader[0].style.display = 'none';
					labeltext[0].textContent = 'Error uploading Large Image';
				}
			});
	} else {
		alert('please select large image');
	}
});
