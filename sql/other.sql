-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql208.epizy.com
-- Generation Time: Nov 20, 2020 at 05:38 AM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_23607028_viraj`
--

-- --------------------------------------------------------

--
-- Table structure for table `other`
--

CREATE TABLE `other` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `very_short_desc` tinytext NOT NULL,
  `short_desc` text NOT NULL,
  `description` mediumtext NOT NULL,
  `video_img` text NOT NULL,
  `platform` text NOT NULL,
  `img_small` varchar(255) NOT NULL,
  `img_large` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other`
--

INSERT INTO `other` (`id`, `title`, `very_short_desc`, `short_desc`, `description`, `video_img`, `platform`, `img_small`, `img_large`) VALUES
(11, 'CSS Logos', 'Some brand an app logos I replicated with CSS.', 'This project was a fun project I Did where I tried to replicate some brand and app logos in HTML and CSS. The two logos on the right are made using CSS. \r\n\r\nYou can check out the project <a href=\"http://virajshukla.com/csslogos/\" class=\"othera\" target=\"_blank\">here</a>. ', 'It was a fun project and took some time to do since whenever I wanted to work on it, I was working on it in the middle. This project first involved which logos can be replicated, the complexity of the logo went up as I added more. One thing that helped me in making these logos is breaking them down into basic shapes and then come down to coding them. \r\n<br><Br>\r\nI took a help of a few resources such as a gradient generator by <a href=\"https://www.colorzilla.com/gradient-editor/\" class=\"othera\" target=\"_blank\">ColorZilla</a> and a page by <a href=\"https://css-tricks.com/the-shapes-of-css/\" class=\"othera\" target=\"_blank\">CSS Tricks</a> which explained how to make basic shapes in css which was very helpful. \r\n<br><Br>\r\nOverall it was a fun project and might add more logos to it.\r\n\r\n<link rel=\"stylesheet\" href=\"http://virajshukla.com/csslogos/style.css\">', '<div class=\"beats\" style=\"margin-right:30px\">\r\n<div class=\"wtcir\"><div class=\"innergola\"></div></div>\r\n<div class=\"danda\"></div>\r\n</div>\r\n<div class=\"adobelogo\" style=\"position: relative; top: 0;\">\r\n<div class=\"innerline10\"></div>\r\n<div class=\"innerline11\"></div>\r\n<div class=\"innerline12\"></div>\r\n</div>', '4,7', 'otherImages/img_small_css.png', 'otherImages/img_large_css.png'),
(12, 'AR City', 'This project is a city I made in 3D and put in an AR Environment. ', 'This was a project I did in college which involved putting a city in an AR environment.\r\n<br><br>\r\nyou can find the project <a href=\"https://lumbar-meteorology-7yuvxfwv2aj.glitch.me\" target=\"_blank\" class=\'othera\' style=\'pointer-events: fill;\'>here</a>. ', 'This project involved modelling a city in a 3D software and putting it in an AR environment. I googled low polygon buildings and tried to replicate some of them in Maya. It was an interesting adventure for me as it was the first time I was using Maya for something proper. Then I thought of various ways that I can put it in an AR environment such as unity, I also found some mobile apps such as Artivive but realise that the 3D feature in that was not for actual 3D objects. Then I searched how to make an AR environment on a web browser and I found that AFrame JS could be used, I had briefly uses AFrame before this project. \r\n<br><br>\r\nOne of the challenges was to find a format that I can load the model in which is a lightweight format and as I was searching this format called GLTF made for the web came up even the AFrame page so I started to find obj to GLTF converters and found one which worked really well for me. You can find it <a href=\"https://modelconverter.com\" target=\"_blank\" class=\'othera\'>here</a>. \r\n<br><Br>\r\nOne more challenge was how add colours and maps to the project. I could not figure out how to use image maps, so I ended up using just colours to add materials to the model.\r\n<br><Br>\r\nI used the built-in Kanji marker since I could not get custom markers working. I tried the method they recommended to create and use custom markers but it did not work out for me. \r\n<br><br>\r\n<img src=\"https://upload.wikimedia.org/wikipedia/commons/b/ba/Kanji_marker_ARjs.png\" style=\"margin:0 auto; display:block;\">\r\n                    <pre class=\"language-html\">\r\n                        <code class=\"language-html\">\r\n&lt;a-scene embedded arjs=\"sourceType: webcam;\">\r\n    &lt;a-assets>\r\n    &lt;a-asset-item id=\"city\" src=\"city.glb\"></a-asset-item>\r\n    &lt;/a-assets>\r\n    &lt;a-marker-camera preset=\"kanji\">\r\n        &lt;a-entity gltf-model=\"#city\" scale=\".01 .01 .01\" position=\"0 0 0\"></a-entity>\r\n    &lt;/a-marker-camera>\r\n&lt;/a-scene>\r\n</code>\r\n</pre>\r\nThat is all the code it takes to put a model in an AR environment using AFrame JS. \r\n<br><Br>\r\nIn case you are wondering the .glb format is a binary version of the GLTF format. \r\nOverall it was a fun project and since putting things in an AR environment has become so easy ill definitely try more projects. ', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/v6a2HdJkqNo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen style=\'pointer-events: fill;\'></iframe>', '1,2', 'otherImages/bIMG_3752.jpg', 'otherImages/IMG_3752.jpg'),
(13, 'Word Game', 'This is a fun web app built using regular expressions and APIs.', 'This is a project I did called \"word game\", you can interact with the words make see how they respond. You can find it <a href=\"http://virajshukla.com/wordgame/\" class=\"othera\" target=\"_blank\">here</a>.', 'This fun project started out as a project to play around with regular expressions and explore them, the idea came from a <a href=\"https://youtu.be/AKuW48WeNMA\" class=\"othera\" target=\"_blank\">YouTube video</a> by the coding train this was a coding challenge he did in 2016 to create a word interactor, he left it open ended and gave some ideas which I got ideas from. This project reacts differently with different word groups. Such as if I put in the word \"Weather\", it pulls from the <a href=\"https://openweathermap.org/api\" class=\"othera\" target=\"_blank\">open weather map API</a> or if you type in something like \"news\", it will send a request to the <a href=\"https://newsapi.org\" class=\"othera\" target=\"_blank\">News API</a> and gets the 5 top articles of the day (for India only right now) and if you type in anything else, it will send a request to the <a href=\"https://developers.giphy.com/docs/api\" class=\"othera\" target=\"_blank\">Giphy API</a>.\r\n<br><br>\r\nThere are also other things which I have included such as if the word is \"Shape\", the request will go to a json file that I wrote my self which will create a <code class=\"language-html\">&ltdiv></code> with that particular class which will in present in a custom css file which I wrote by taking help from this <a href=\"https://css-tricks.com/the-shapes-of-css/\" class=\"othera\" target=\"_blank\">CSS Tricks</a> article which shows how to draw different shapes in css. \r\n<br><br>\r\nThere is also a clock that I made when passing words like \"Time\", \"Clock\", etc which I made in javascript and css by following this <a href=\"https://youtu.be/Ki0XXrlKlHY\" class=\"othera\" target=\"_blank\">tutorial</a> on YouTube by Web Dev Simplified. It was my first time using CSS variables but it was a really nice way to make the clock in vanilla javascript. \r\n<br><br>\r\nThis project was made in vanilla Javascript and some PHP (to hide the API keys). Overall it was a fun creative coding project and will do more in the future. ', '<video height=\"350px\" autoplay loop>\r\n<source src=\"otherImages/A.mov\" type=\"video/mp4\">\r\nYour browser does not support the video tag.\r\n</video>', '4,7,5', 'otherImages/Appicon.png', 'otherImages/img_large.png'),
(14, 'Microsoft teams reimagined', 'This project is a redesign of Microsoft teams. ', 'In this project I decided to reimagine Microsoft teams the way I like. This is just the way I wanted Microsoft teams to look like.<br><br>You can check out the project <a href=\"https://www.figma.com/proto/WFSWpBosSKfpD0RjDRSeOi/Untitled?node-id=1%3A2&viewport=545%2C254%2C0.19833160936832428&scaling=scale-down\" class=\"othera\" target=\"_blank\">here</a>', 'This was an interesting project, taking an app and redesigning it. I used Figma to create this prototype. I choose to create most of the icons myself (except for the settings icon) and I also used the same colour scheme as the original app. I wanted to create something that is easy to use and that is intuitive. I think the current design for the teams app is a bit cluttered and I wanted to clean up the clutter. My aim for this design was to create something that is not only easy to navigate but also easy to use. I decided yo make the teams icon in the centre as something that is noticeable as that is also the teams logo, this was also because that is the logo of teams. The whole design is revolting around the card layout since I think that is a very clutter free way of navigating through any interface. Overall it was a fun project.', '<img src=\"http://virajshukla.com/otherImages/bprojectMain.001.png\" height=\"350px\">', '8', 'otherImages/thumb.png', 'otherImages/bprojectMain.001.png'),
(15, 'URL previewer', 'This is an app that I made to learn web scraping. ', 'I made this app to learn web scraping with Cheerio and Node JS.<br><br>\r\nYou can check out the app <a href=\'https://url-preview.herokuapp.com/\' target=\'_blank\' class=\'othera\'>here</a><br>\r\nand the GitHub repository <a href=\'https://github.com/VirajS00/web-scraping-link-preview\' target=\'_blank\' class=\'othera\'>here</a> ', 'This app was an interesting project. This is app uses Cheerio which is like jQuery on the server and the app is made using express. The app generates a preview when you put in a <a href=\'https://www.wikipedia.org/\' class=\'othera\' target=\'_blank\'>WikiPedia</a> link, <a href=\'https://www.youtube.com/\' class=\'othera\' target=\'_blank\'>YouTube</a> link or <a href=\'https://www.youtube.com/\' class=\'othera\' target=\'_blank\'>Amazon</a> link.\r\n<br><br>\r\nIt uses a NodeJS so that <strong>no JavaScript</strong> is executed directly on the website. This is also the first time I used classes in Javascript.<br>\r\nTo grab an element in cheerio, here is the code:<br>\r\n<pre class=\"language-javascript\">\r\n<code class=\"language-javascript\">\r\n//initiate cheerio with html grabbed from page\r\nconst $ = cheerio.load(html);\r\n//grab the element like you can in jQuery\r\nconst shortDesc = $(\'.shortdescription\').text();\r\n</code>\r\n</pre>\r\n<br><br>\r\nIt grabs an image from the link and the title. The image in the case of both amazon and wikipedia is got directly off the website but for YouTube, there is a specific link for getting the thumbnail which I got from a <a href=\'https://stackoverflow.com/questions/2068344/how-do-i-get-a-youtube-video-thumbnail-from-the-youtube-api\' class=\'othera\' target=\'_blank\'>StackOverflow</a> question. Overall, it was a fun project and hope to do more projects in nodeJS in the future.', '<img src=\'http://virajshukla.com/otherImages/bimg_side.png\' height=\'350px\'>', '9,11,12', 'otherImages/thumb_scrape.jpg', 'otherImages/webscrape_cover.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `other`
--
ALTER TABLE `other`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `other`
--
ALTER TABLE `other`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
