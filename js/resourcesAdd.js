const addFeildBtn = document.querySelector('#addFeild');

addFeildBtn.addEventListener('click', () => {
	const parentDiv = document.createElement('div');
	parentDiv.classList.add('link');

	const inputName = document.createElement('input');
	inputName.type = 'text';
	inputName.classList.add('link-box');
	inputName.classList.add('link_name');
	inputName.setAttribute('placeholder', 'name');

	const inputUrl = document.createElement('input');
	inputUrl.type = 'text';
	inputUrl.classList.add('link-box');
	inputUrl.classList.add('link_url');
	inputUrl.setAttribute('placeholder', 'url');

	parentDiv.appendChild(inputName);
	parentDiv.appendChild(inputUrl);

	document.querySelector('.link-box-container').appendChild(parentDiv);
});

const form = document.querySelector('#resource-form');

const error_container = document.querySelector('.error-container');

form.addEventListener('submit', (e) => {
	e.preventDefault();

	if (
		document
			.querySelector('.error-container > .infoBox')
			.classList.contains('errors')
	) {
		document
			.querySelector('.error-container > .infoBox')
			.classList.remove('errors');
	}
	if (
		document
			.querySelector('.error-container > .infoBox')
			.classList.contains('success')
	) {
		document
			.querySelector('.error-container > .infoBox')
			.classList.remove('success');
	}
	const resourceName = document.querySelector('#resource_name');
	const resourceType = document.querySelector('#resource_type');
	const shortDesc = document.querySelector('#short_desc');
	const category = document.querySelector('#category');
	const linkNames = [...document.querySelectorAll('.link_name')];
	const linkUrls = [...document.querySelectorAll('.link_url')];
	let linksData = [];
	let errors = [];
	for (let i = 0; i < linkNames.length; i++) {
		if (linkNames[i].value == '' || linkUrls[i].value == '') {
			errors.push('please enter links data');
			break;
		} else {
			linksData.push({
				link_type: linkNames[i].value,
				url: linkUrls[i].value
			});
		}
	}

	if (resourceName.value == '') {
		errors.push('please enter resource name');
	}

	if (resourceType.value == '') {
		errors.push('please enter resource type');
	}

	if (shortDesc.value == '') {
		errors.push('please enter short desc');
	}

	if (category.value == 'null') {
		errors.push('please select category');
	}

	if (errors.length === 0) {
		const fd = new FormData();
		fd.append('resource_name', resourceName.value);
		fd.append('resource_type', resourceType.value);
		fd.append('short_desc', shortDesc.value);
		fd.append('category', category.value);
		fd.append('links_data', JSON.stringify(linksData));

		let fetchUrl;

		if (form.getAttribute('data-sub') === 'add') {
			fetchUrl = 'php/addResource.php';
		}

		if (form.getAttribute('data-sub') === 'update') {
			fetchUrl = 'php/editResource.php';
			const id = document.querySelector('#resource_id');
			fd.append('id', id.value);
		}

		fetch(fetchUrl, {
			method: 'POST',
			body: fd
		})
			.then((res) => res.json())
			.then((json) => {
				console.log(json);
				document.querySelector('.error-container').style.display = 'flex';
				const infoBox = document.querySelector(
					'.error-container > .infoBox > ol'
				);
				let li = document.createElement('li');
				li.textContent = json.message;
				infoBox.appendChild(li);
				if (json.status === 0) {
					document
						.querySelector('.error-container > .infoBox')
						.classList.add('errors');
				} else {
					document
						.querySelector('.error-container > .infoBox')
						.classList.add('success');
				}
			});
	} else {
		error_container.style.display = 'flex';
		errors.forEach((error) => {
			const infoBox = document.querySelector('#errorOl');
			let li = document.createElement('li');
			li.textContent = error;
			document
				.querySelector('.error-container > .infoBox')
				.classList.add('errors');

			infoBox.appendChild(li);
		});
	}
});

error_container.addEventListener('click', (e) => {
	if (e.target !== error_container) return;
	error_container.style.display = 'none';
	if (document.querySelector('.infoBox').classList.contains('errors')) {
		document.querySelector('.infoBox').classList.remove('errors');
	}
	if (document.querySelector('.infoBox').classList.contains('success')) {
		document.querySelector('.infoBox').classList.remove('success');
	}
	document.querySelector('#errorOl').innerHTML = '';
});
