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

form.addEventListener('submit', (e) => {
	e.preventDefault();
	const resourceName = document.querySelector('#resource_name');
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

	if (shortDesc.value == '') {
		errors.push('please enter short desc');
	}

	if (category.value == 'null') {
		errors.push('please select category');
	}

	if (errors.length === 0) {
		const fd = new FormData();
		fd.append('resource_name', resourceName.value);
		fd.append('short_desc', shortDesc.value);
		fd.append('category', category.value);
		fd.append('links_data', JSON.stringify(linksData));

		fetch('php/addResource.php', {
			method: 'POST',
			body: fd
		})
			.then((res) => res.text())
			.then((data) => {
				console.log(data);
			});
	} else {
		console.log(errors);
	}
});
