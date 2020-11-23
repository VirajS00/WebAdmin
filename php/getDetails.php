<?php
    class getUserDetails {
        public $agent;
        public function __construct() {
            $this->agent = $_SERVER["HTTP_USER_AGENT"];
        }
        public function getDeviceType() { 
            $isMobile = preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo 
            |fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i" 
            , $this->agent); 
            if($isMobile) {
                return "Mobile";
            } else {
                return "Desktop";
            }
        }
        public function getBrowser() {
            if( preg_match('/MSIE (\d+\.\d+);/', $this->agent) ) {
                return "Internet Explorer";
            } else if (preg_match('/Chrome[\/\s](\d+\.\d+)/', $this->agent) ) {
                return "Chrome";
            } else if (preg_match('/Edge\/\d+/', $this->agent) ) {
                return "Edge";
            } else if ( preg_match('/Firefox[\/\s](\d+\.\d+)/', $this->agent) ) {
                return "Firefox";
            } else if ( preg_match('/OPR[\/\s](\d+\.\d+)/', $this->agent) ) {
                return "Opera";
            } else if (preg_match('/Safari[\/\s](\d+\.\d+)/', $this->agent) ) {
                return "Safari";
            } else {
                return "Other";
            }
        }
        public function getOS() {
            $user_agent = $this->agent;
            $os_platform  = "Other";
            $os_array     = array(
                                '/windows nt 10/i'      =>  'Windows 10',
                                '/windows nt 6.3/i'     =>  'Windows 8.1',
                                '/windows nt 6.2/i'     =>  'Windows 8',
                                '/windows nt 6.1/i'     =>  'Windows 7',
                                '/windows nt 6.0/i'     =>  'Windows Vista',
                                '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                                '/windows nt 5.1/i'     =>  'Windows XP',
                                '/windows xp/i'         =>  'Windows XP',
                                '/windows nt 5.0/i'     =>  'Windows 2000',
                                '/windows me/i'         =>  'Windows ME',
                                '/win98/i'              =>  'Windows 98',
                                '/win95/i'              =>  'Windows 95',
                                '/win16/i'              =>  'Windows 3.11',
                                '/macintosh|mac os x/i' =>  'Mac OS X',
                                '/mac_powerpc/i'        =>  'Mac OS 9',
                                '/linux/i'              =>  'Linux',
                                '/ubuntu/i'             =>  'Ubuntu',
                                '/iphone/i'             =>  'iOS',
                                '/ipod/i'               =>  'iOS',
                                '/ipad/i'               =>  'iOS/iPadOS',
                                '/android/i'            =>  'Android',
                                '/blackberry/i'         =>  'BlackBerry',
                                '/webos/i'              =>  'Mobile'
                            );
            foreach ($os_array as $regex => $value){
                if (preg_match($regex, $user_agent)){
                    $os_platform = $value;
                }
            }
            return $os_platform;
        }
        public function getPageName() {
            return basename($_SERVER['PHP_SELF']);
        }

        private function getIP() {
            if (!empty($_SERVER['HTTP_CLIENT_IP'])){
                $ip_address = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  {
                $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else{
                $ip_address = $_SERVER['REMOTE_ADDR'];
            }
            return $ip_address;
        }

        public function getCountry() {
            $ip = $this->getIP();
            $url = 'http://www.geoplugin.net/json.gp?ip='.$ip;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            $result = curl_exec($ch);
            $data = json_decode($result, true);
            $country = $data['geoplugin_countryName'];
            return $country;
        }
        
        public function countHits() {
            session_start();
            if(empty($_SESSION['visited'])){
                $counter = file_get_contents('./hits.txt') + 1;
                file_put_contents('./hits.txt', $counter);
            }
            $_SESSION['visited'] = true;
        }
    }
?>