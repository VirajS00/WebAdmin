// https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=20&playlistId=${playListId}&access_token=${token}c&key=${key}

const getVideos = async () => {
	try {
		const playListId = 'PLNUNNqPwkQe-67Wlv8WkoK7fZO96I07wf';
		const token = YOUR_ACCESS_TOKEN;
		const key = YOUR_API_KEY;
		const url = `https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=20&playlistId=${playListId}&access_token=${token}c&key=${key}`;
		const res = await fetch(url);
		const json = await res.json();
		const items = json.items;
		items.forEach((item) => {
			const videoTitle = item.snippet.title;
			const thumbnail = item.snippet.thumbnails.default.url;
			const video = document.createElement('div');
			video.classList.add('video');
			const thumb = document.createElement('img');
			thumb.classList.add('thumb');
			thumb.src = thumbnail;
			const title = document.createElement('h3');
			title.textContent = videoTitle;
			video.appendChild(thumb);
			video.appendChild(title);
			document.querySelector('.video-container').appendChild(video);
		});
	} catch (err) {
		console.error(err);
	}
};

getVideos();
