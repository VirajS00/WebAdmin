const ctx = document.getElementById('layanan').getContext('2d');

const randomColors = (num) => {
	let colors = [];
	for (let i = 0; i < num; i++) {
		colors.push('#' + Math.floor(Math.random() * 16777215).toString(16));
	}
	return colors;
};

const createOSChart = async () => {
	const res = await fetch('php/getChartData.php');
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

createOSChart();

// const ctx_2 = document.getElementById('layanan_subbagian').getContext('2d');
// let data_2 = {
// 	datasets: [
// 		{
// 			data: [10, 20, 30],
// 			backgroundColor: ['#3c8dbc', '#f56954', '#f39c12']
// 		}
// 	],
// 	labels: ['Request', 'Layanan', 'Problem']
// };
// let myDoughnutChart_2 = new Chart(ctx_2, {
// 	type: 'doughnut',
// 	data: data_2,
// 	options: {
// 		maintainAspectRatio: false,
// 		legend: {
// 			position: 'bottom',
// 			labels: {
// 				boxWidth: 12
// 			}
// 		}
// 	}
// });

// const ctx_3 = document.getElementById('layanan_subbagian_one').getContext('2d');
// let data_3 = {
// 	datasets: [
// 		{
// 			data: [10, 30, 20],
// 			backgroundColor: ['#3c8dbc', '#f56954', '#f39c12']
// 		}
// 	],
// 	labels: ['Request', 'Layanan', 'Problem']
// };
// let myDoughnutChart_3 = new Chart(ctx_3, {
// 	type: 'doughnut',
// 	data: data_3,
// 	options: {
// 		maintainAspectRatio: false,
// 		legend: {
// 			position: 'bottom',
// 			labels: {
// 				boxWidth: 12
// 			}
// 		}
// 	}
// });

// const ctx_4 = document.getElementById('layanan_subbagian_two').getContext('2d');
// let data_4 = {
// 	datasets: [
// 		{
// 			data: [30, 10, 20],
// 			backgroundColor: ['#3c8dbc', '#f56954', '#f39c12']
// 		}
// 	],
// 	labels: ['Request', 'Layanan', 'Problem']
// };
// let myDoughnutChart_4 = new Chart(ctx_4, {
// 	type: 'doughnut',
// 	data: data_4,
// 	options: {
// 		maintainAspectRatio: false,
// 		legend: {
// 			position: 'bottom',
// 			labels: {
// 				boxWidth: 12
// 			}
// 		}
// 	}
// });

// const ctx_5 = document
// 	.getElementById('layanan_subbagian_three')
// 	.getContext('2d');
// let data_5 = {
// 	datasets: [
// 		{
// 			data: [20, 20, 20],
// 			backgroundColor: ['#3c8dbc', '#f56954', '#f39c12']
// 		}
// 	],
// 	labels: ['Request', 'Layanan', 'Problem']
// };
// let myDoughnutChart_5 = new Chart(ctx_5, {
// 	type: 'doughnut',
// 	data: data_5,
// 	options: {
// 		maintainAspectRatio: false,
// 		legend: {
// 			position: 'bottom',
// 			labels: {
// 				boxWidth: 12
// 			}
// 		}
// 	}
// });
