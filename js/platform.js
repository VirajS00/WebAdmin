const changePaths = () => {
	const platformImg = document.querySelectorAll('.platformimg');
	platformImg.forEach((img) => {
		const src = img.getAttribute('src');
		const newSrc = '../' + src;
		img.setAttribute('src', newSrc);
	});
};

changePaths();
