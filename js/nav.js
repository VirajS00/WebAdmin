const menuSign = document.querySelector('.menuSign');
const container = document.querySelector('.nav-container');
const menu = document.querySelector('.nav-ul');
menuSign.addEventListener('click', () => {
	menu.style.transform = 'scale(1, 1)';
	container.style.pointerEvents = 'fill';
	container.style.transform = 'scale(1, 1)';
});

container.addEventListener('click', (e) => {
	if (e.target !== container) return;
	menu.style.transform = 'scale(0, 1)';
	setTimeout(() => {
		container.style.transform = 'scale(0, 1)';
		container.style.pointerEvents = 'none';
	}, 300);
});
