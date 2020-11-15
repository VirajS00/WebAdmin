const ctx = document.getElementById('layanan').getContext('2d');
const ctx_2 = document.getElementById('layanan_subbagian').getContext('2d');
const ctx_3 = document.getElementById('layanan_subbagian_one').getContext('2d');
const ctx_4 = document.getElementById('layanan_subbagian_two').getContext('2d');
const ctx_5 = document
	.getElementById('layanan_subbagian_three')
	.getContext('2d');

const randomColors = (num) => {
	let colors = [];
	for (let i = 0; i < num; i++) {
		colors.push('#' + Math.floor(Math.random() * 16777215).toString(16));
	}
	return colors;
};

const createOSChart = async () => {
	const res = await fetch('php/getOS.php');
	const json = await res.json();
	let labels = [];
	let dataGraph = [];
	let numberOfColours = json.length;
	let colours = randomColors(numberOfColours);
	json.forEach((item) => {
		labels.push(item[0]);
		dataGraph.push(item[1]);
	});

	let data = {
		datasets: [
			{
				data: dataGraph,
				backgroundColor: colours
			}
		],
		labels: labels
	};

	let myDoughnutChart = new Chart(ctx, {
		type: 'doughnut',
		data: data,
		options: {
			maintainAspectRatio: false,
			legend: {
				position: 'bottom',
				labels: {
					boxWidth: 12
				}
			}
		}
	});
};

const getCountry = async () => {
	const res = await fetch('php/getCountry.php');
	const json = await res.json();
	let labels = [];
	let dataGraph = [];
	let numberOfColours = json.length;
	let colours = randomColors(numberOfColours);

	json.forEach((item) => {
		labels.push(item[0]);
		dataGraph.push(item[1]);
	});

	let data_2 = {
		datasets: [
			{
				data: dataGraph,
				backgroundColor: colours
			}
		],
		labels: labels
	};
	let myDoughnutChart_2 = new Chart(ctx_2, {
		type: 'doughnut',
		data: data_2,
		options: {
			maintainAspectRatio: false,
			legend: {
				position: 'bottom',
				labels: {
					boxWidth: 12
				}
			}
		}
	});
};

const getBrowser = async () => {
	const res = await fetch('php/getBrowser.php');
	const json = await res.json();
	let labels = [];
	let dataGraph = [];
	let numberOfColours = json.length;
	let colours = randomColors(numberOfColours);

	json.forEach((item) => {
		labels.push(item[0]);
		dataGraph.push(item[1]);
	});

	let data_3 = {
		datasets: [
			{
				data: dataGraph,
				backgroundColor: colours
			}
		],
		labels: labels
	};
	let myDoughnutChart_3 = new Chart(ctx_3, {
		type: 'doughnut',
		data: data_3,
		options: {
			maintainAspectRatio: false,
			legend: {
				position: 'bottom',
				labels: {
					boxWidth: 12
				}
			}
		}
	});
};

const getDevice = async () => {
	const res = await fetch('php/getDevice.php');
	const json = await res.json();
	let labels = [];
	let dataGraph = [];
	let numberOfColours = json.length;
	let colours = randomColors(numberOfColours);

	json.forEach((item) => {
		labels.push(item[0]);
		dataGraph.push(item[1]);
	});

	let data_4 = {
		datasets: [
			{
				data: dataGraph,
				backgroundColor: colours
			}
		],
		labels: labels
	};
	let myDoughnutChart_4 = new Chart(ctx_4, {
		type: 'doughnut',
		data: data_4,
		options: {
			maintainAspectRatio: false,
			legend: {
				position: 'bottom',
				labels: {
					boxWidth: 12
				}
			}
		}
	});
};

const getPage = async () => {
	const res = await fetch('php/getPage.php');
	const json = await res.json();
	let labels = [];
	let dataGraph = [];
	let numberOfColours = json.length;
	let colours = randomColors(numberOfColours);

	json.forEach((item) => {
		labels.push(item[0].split('.').slice(0, -1).join('.'));
		dataGraph.push(item[1]);
	});
	let data_5 = {
		datasets: [
			{
				data: dataGraph,
				backgroundColor: colours
			}
		],
		labels: labels
	};
	let myDoughnutChart_5 = new Chart(ctx_5, {
		type: 'doughnut',
		data: data_5,
		options: {
			maintainAspectRatio: false,
			legend: {
				position: 'bottom',
				labels: {
					boxWidth: 12
				}
			}
		}
	});
};

createOSChart();
getCountry();
getBrowser();
getDevice();
getPage();
