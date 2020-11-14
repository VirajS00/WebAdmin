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
            }
        }
    }
?>