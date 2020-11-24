const frameElement = document.querySelectorAll('.richTextArea');
let doc = [];
frameElement.forEach((frame) => {
	doc.push(frame.contentDocument);
});

const inputtext = [...document.querySelectorAll('.inputText')];

const loadContent = () => {
	for (let i = 0; i < doc.length; i++) {
		doc[i].body.innerHTML = inputtext[i].value;
	}
};

loadContent();

doc.forEach((docu) => {
	docu.body.contentEditable = true;
	document.querySelectorAll('.bold').forEach((button) => {
		button.addEventListener('click', (e) => {
			e.preventDefault();
			docu.execCommand('bold', false, null);
		});
	});
	document.querySelectorAll('.italic').forEach((button) => {
		button.addEventListener('click', (e) => {
			e.preventDefault();
			docu.execCommand('italic', false, null);
		});
	});
	document.querySelectorAll('.underline').forEach((button) => {
		button.addEventListener('click', (e) => {
			e.preventDefault();
			docu.execCommand('underline', false, null);
		});
	});
	document.querySelectorAll('.unlink').forEach((button) => {
		button.addEventListener('click', (e) => {
			e.preventDefault();
			docu.execCommand('unlink', false, null);
		});
	});
});

const link = [...document.querySelectorAll('.link')];

for (let i = 0; i < link.length; i++) {
	link[i].addEventListener('click', (e) => {
		e.preventDefault();
		let link = prompt('Paste link', 'http://');
		let sText = doc[i].getSelection();
		doc[i].execCommand(
			'insertHTML',
			false,
			'<a href="' + link + '" target="_blank" class="othera">' + sText + '</a>'
		);
	});
}

const codeContainer = document.querySelector('.code-container');
const codebut = document.querySelector('.htmlcode');

codeContainer.addEventListener('click', (e) => {
	if (e.target !== codeContainer) return;
	codeContainer.style.display = 'none';
});

codebut.addEventListener('click', (e) => {
	e.preventDefault();
	codeContainer.style.display = 'flex';
	document.querySelector('.update').addEventListener('click', (e) => {
		e.preventDefault();
		const codeTA = document.getElementById('code');
		if (codeTA.value == '') {
			codeContainer.style.display = 'none';
		} else {
			doc[1].execCommand('insertHTML', false, codeTA.value);

			codeContainer.style.display = 'none';
			codeTA.value = '';
		}
	});
});

const uploadContainer = document.querySelector('.file-upload-container');
const uploadBut = document.querySelector('.image-upload');

const isFileImage = (file) => {
	return file && file['type'].split('/')[0] === 'image';
};

document.getElementById('TAimg').addEventListener('change', async () => {
	try {
		document.getElementById('TAimgLabel').textContent = document.getElementById(
			'TAimg'
		).files[0].name;
		const file = document.getElementById('TAimg').files[0];
		if (!isFileImage(file)) {
			alert('Please select an image');
			document.querySelector('.uploadLabelTA').textContent = 'Upload File';
			document.getElementById('TAimg').value = '';
		} else {
			const fd = new FormData();
			fd.append('image', file);
			document.getElementById('TAimgLoader').style.display = 'block';
			const res = await fetch('RichTextArea/uploadImage.php', {
				method: 'POST',
				body: fd
			});
			const text = await res.text();
			const img = document.createElement('img');
			img.classList.add('OtherImg');
			img.src = text;
			img.setAttribute('height', '250px');
			img.setAttribute('style', 'display: block; margin: 0 auto;');
			doc[1].body.appendChild(img);
			document.getElementById('TAimgLabel').textContent = 'Image Uploaded';
			document.getElementById('TAimgLoader').style.display = 'none';
			uploadContainer.style.display = 'none';
		}
	} catch (err) {
		console.error(err);
	}
});

uploadBut.addEventListener('click', (e) => {
	e.preventDefault();
	uploadContainer.style.display = 'grid';
});

uploadContainer.addEventListener('click', (e) => {
	if (e.target !== uploadContainer) return;
	uploadContainer.style.display = 'none';
});

document.getElementById('other-form').addEventListener('submit', (e) => {
	e.preventDefault();
	for (let i = 0; i < doc.length; i++) {
		inputtext[i].value = '';
		inputtext[i].value = doc[i].body.innerHTML;
	}
	document.getElementById('other-form').submit();
});
