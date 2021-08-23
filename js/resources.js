document.querySelectorAll('.delForm').forEach((form) => {
	form.addEventListener('submit', (e) => {
		e.preventDefault();
		if (confirm('Are you sure you want to delete?')) {
			form.submit();
		} else {
			return;
		}
	});
});

const draggables = document.querySelectorAll('.draggable');
const containerDrag = document.querySelector('tbody');

draggables.forEach((draggable) => {
	draggable.addEventListener('dragstart', () => {
		draggable.classList.add('dragging');
	});
	draggable.addEventListener('dragend', () => {
		draggable.classList.remove('dragging');
		const childNodes = [...document.querySelectorAll('.draggable')];
		childNodes.forEach((item, index) => {
			if (draggable.getAttribute('data-position') !== index + 1) {
				item.setAttribute('data-position', index + 1);
				item.classList.add('updated');
			}
		});
		saveSortOrder();
	});
});

containerDrag.addEventListener('dragover', (e) => {
	e.preventDefault();
	const afterElement = getDragAfterElement(containerDrag, e.clientY);
	const dragging = document.querySelector('.dragging');
	if (afterElement == null) {
		containerDrag.appendChild(dragging);
	} else {
		containerDrag.insertBefore(dragging, afterElement);
	}
});

const getDragAfterElement = (container, y) => {
	const draggableElements = [
		...container.querySelectorAll('.draggable:not(.dragging)')
	];
	return draggableElements.reduce(
		(closest, child) => {
			const box = child.getBoundingClientRect();
			const offset = y - box.top - box.height / 2;
			if (offset < 0 && offset >= closest.offset) {
				return { offset: offset, element: child };
			} else {
				return closest;
			}
		},
		{ offset: Number.NEGATIVE_INFINITY }
	).element;
};

const saveSortOrder = () => {
	let positions = [];
	document.querySelectorAll('.updated').forEach((item) => {
		positions.push([
			item.getAttribute('data-index'),
			item.getAttribute('data-position')
		]);
		item.classList.remove('updated');
	});
	const posSend = JSON.stringify(positions);
	const fd = new FormData();
	fd.append('update', 1);
	fd.append('positions', posSend);
	document.querySelector('.loader-container').style.display = 'flex';
	fetch('php/saveResourcesOrder.php', {
		method: 'POST',
		body: fd
	})
		.then((res) => {
			if (!res.ok) {
				throw new Error(response);
			}
			return res.text();
		})
		.then((text) => {
			if (text === 'success') {
				document.querySelector('.loader-container').style.display = 'none';
			} else {
				console.log('error: ' + text);
			}
		})
		.catch((err) => console.error(err));
};
