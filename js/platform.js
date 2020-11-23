const changePaths = () => {
	const platformImg = document.querySelectorAll('.platformimg');
	platformImg.forEach((img) => {
		const src = img.getAttribute('src');
		const newSrc = '../' + src;
		img.setAttribute('src', newSrc);
	});
};

const getFileExt = (fname) => fname.split('.').pop();

const fileinput = document.getElementById('platfrom_img');

fileinput.addEventListener('change', () => {
	const labeltext = document.querySelector('.labelcontent');
	labeltext.textContent = fileinput.files[0].name;
	const ext = getFileExt(fileinput.files[0].name.toLowerCase());
	if (fileinput.files.length > 0) {
		if (ext == 'jpg' || ext == 'png') {
			const fd = new FormData();
			fd.append('file', fileinput.files[0]);
			labeltext.textContent = '';
			document.querySelector('.inp-loader').style.display = 'block';
			fetch('php/uploadPlatFormImage.php', { method: 'POST', body: fd })
				.then((res) => {
					if (!res.ok) {
						throw new Error(response);
					}
					return res.text();
				})
				.then((text) => {
					const sttext = text.split('|');
					if (sttext[0] == 'success') {
						labeltext.textContent = 'File Uploaded';
						document.querySelector('.inp-loader').style.display = 'none';
						document.getElementById('platform_img_url').value = sttext[1];
					} else if (sttext[0] == 'error') {
						labeltext.textContent = 'Error uploading file Uploaded';
						document.querySelector('.inp-loader').style.display = 'none';
					}
				});
		} else {
			alert('please select a .jpeg or .png file');
			fileinput.value = '';
			labeltext.textContent = 'Choose Platform Image';
		}
	} else {
		alert('please select a file');
	}
});
