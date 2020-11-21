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
