const frameElement = document.querySelector('.richTextArea');
const doc = frameElement.contentDocument;
doc.body.contentEditable = true;

document.getElementById('bold').addEventListener('click', (e) => {
	e.preventDefault();
	doc.execCommand('bold', false, null);
});

document.getElementById('italic').addEventListener('click', (e) => {
	e.preventDefault();
	doc.execCommand('italic', false, null);
});

document.getElementById('underline').addEventListener('click', (e) => {
	e.preventDefault();
	doc.execCommand('underline', false, null);
});

document.getElementById('link').addEventListener('click', (e) => {
	e.preventDefault();
	let link = prompt('Paste link', 'http://');
	doc.execCommand('createLink', false, null, link);
});

document.getElementById('unlink').addEventListener('click', (e) => {
	e.preventDefault();
	doc.execCommand('unlink', false, null);
});

const codeContainer = document.querySelector('.code-container');

document.getElementById('htmlcode').addEventListener('click', (e) => {
	e.preventDefault();
	codeContainer.style.display = 'flex';
	document.querySelector('.update').addEventListener('click', (e) => {
		e.preventDefault();
		const codeTA = document.getElementById('code');
		if (codeTA.value == '') {
			codeContainer.style.display = 'none';
		} else {
			doc.execCommand('insertHTML', false, codeTA.value);
			codeContainer.style.display = 'none';
			codeTA.value = '';
		}
	});
});

codeContainer.addEventListener('click', (e) => {
	if (e.target !== codeContainer) return;
	codeContainer.style.display = 'none';
});

const uploadContainer = document.querySelector('.file-upload-container');

const isFileImage = (file) => {
	return file && file['type'].split('/')[0] === 'image';
};

document.getElementById('TAimg').addEventListener('change', async () => {
	try {
		document.querySelector(
			'.uploadLabelTA'
		).textContent = document.getElementById('TAimg').files[0].name;
		const file = document.getElementById('TAimg').files[0];
		if (!isFileImage(file)) {
			alert('Please select an image');
			document.querySelector('.uploadLabelTA').textContent = 'Upload File';
			document.getElementById('TAimg').value = '';
		} else {
			const fd = new FormData();
			fd.append('image', file);
			const res = await fetch('uploadImage.php', { method: 'POST', body: fd });
			const text = await res.text();
			const img = document.createElement('img');
			img.classList.add('OtherImg');
			img.src = text;
			img.setAttribute('height', '250px');
			img.setAttribute('style', 'display: block; margin: 0 auto;');
			doc.body.appendChild(img);
			uploadContainer.style.display = 'none';
		}
	} catch (err) {
		console.error(err);
	}
});

document.getElementById('image-upload').addEventListener('click', (e) => {
	e.preventDefault();
	uploadContainer.style.display = 'grid';
});

uploadContainer.addEventListener('click', (e) => {
	if (e.target !== uploadContainer) return;
	uploadContainer.style.display = 'none';
});
