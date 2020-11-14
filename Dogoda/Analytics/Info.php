<?php
namespace Dogoda\Analytics;

/**
 * File for the analytics class
 * 
 * @package Dogoda\Analytics\Info
 * @author Emmnauel [netesy] Olisah
 * @copyright 2020 Voom Framework
 * @version 0.0.5
 * @todo get_location()
 */
class Info{
    /**
     * Get the users agent.
     * 
     * Get the user agent
     * @return string outputs the user agent.
     */ 

    private string $ipAddress;
    private string $continent;
    private string $country;
    private string $region;
    private string $city;
    private string $longitude;
    private string $latitude;
    private string $timezone;
    private string $currency;
    private string $converter;


    public __construct( $ip){
        $this->ipAddress = $ip ?? self::get_ip();
        self::set_geodata($this->ipAddress);
    }

    private static function get_user_agent() {
        return  $_SERVER['HTTP_USER_AGENT'];
    }

    /**
     * Get the users ip address.
     * 
     * Gets the users ip address
     * @return string the user ips address or unknown ip
     */ 
    public static function get_ip() {
        $mainIp = '';
        if (getenv('HTTP_CLIENT_IP'))
            $mainIp = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $mainIp = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $mainIp = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $mainIp = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $mainIp = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $mainIp = getenv('REMOTE_ADDR');
        else
            $mainIp = 'UNKNOWN';

        $this->ipAddress = $mainIp;
        return $mainIp;
    }

    public static function set_geodata($ipAddress){
      $data = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ipAddress)); 
        $this->continent = $data['geoplugin_continentName'];
        $this->country = $data['geoplugin_countryName'];
        $this->region = $data['geoplugin_regionName'];
        $this->city = $data['geoplugin_city'];
        $this->longitude = $data['geoplugin_longitude'];
        $this->latitude= $data['geoplugin_latitude'];
        $this->timezone = $data['geoplugin_timezone'];
        $this->currency = $data['geoplugin_currencyCode'];
        $this->converter = $data['geoplugin_currencyConverter'];
    }

   /**
     * Get the users continent name.
     * 
     * Gets the users Continent Name
     * @return string the user Continent name
     */ 
    public static function get_continent() {
        return  $this->continent;
    }   

    /**
     * Get the users country name.
     * 
     * Gets the users Country Name
     * @return string the user Country name
     */ 
    public static function get_country() {
        return  $this->country;
    }  
     
     /**
     * Get the users region/state name.
     * 
     * Gets the users Region/State Name
     * @return string the user region/state name
     */ 
    public static function get_region() {
        return  $this->region;
    }   
    /**
     * Get the users city name.
     * 
     * Gets the users City Name
     * @return string the user City name
     */ 
    public static function get_city() {
        return  $this->city;
    }   
    /**
     * Get the users longitude.
     * 
     * Gets the users longitude
     * @return string the user longitude
     */ 
    public static function get_longitude() {
        return  $this->longitude;
    }
    /**
     * Get the users latitude.
     * 
     * Gets the users latitude
     * @return string the user latitude
     */ 
    public static function get_latitude() {
        return  $this->latitude;
    }   
    /**
     * Get the users timezone.
     * 
     * Gets the users timezone
     * @return string the user timezone
     */ 
    public static function get_timezone() {
        return  $this->timezone;
    }  
    /**
     * Get the users currency code.
     * 
     * Gets the users currency
     * @return string the user currency code
     */ 
    public static function get_currency() {
        return  $this->currency;
    }
    /**
     * Get the users currency converted against usd.
     * 
     * Gets the users currency converted against USD
     * @return string the user currency converted versus USD
     */ 
    public static function get_converter() {
        return  $this->converter;
    }

    /**
     * Get the users Operating System.
     * 
     * Get the users Operating system
     * @return string the users operating system or unknown os.
     */ 
    public static function get_os() {

        $user_agent = self::get_user_agent();
        $os_platform    =   "Unknown OS Platform";
        $os_array       =   array(
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
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/android/i'            =>  'Android',
            '/blackberry/i'         =>  'BlackBerry',
            '/webos/i'              =>  'Mobile'
        );

        foreach ($os_array as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $os_platform    =   $value;
            }
        }   
        return $os_platform;
    }

    /**
     * Get the users Browsers name.
     * 
     * Get the users browsers name.
     * @return string the browsers name.
     */ 
    public static function  get_browser() {

        $user_agent= self::get_user_agent();

        $browser        =   "Unknown Browser";

        $browser_array  =   array(
            '/msie/i'       =>  'Internet Explorer',
            '/Trident/i'    =>  'Internet Explorer',
            '/firefox/i'    =>  'Firefox',
            '/safari/i'     =>  'Safari',
            '/chrome/i'     =>  'Chrome',
            '/edge/i'       =>  'Edge',
            '/opera/i'      =>  'Opera',
            '/netscape/i'   =>  'Netscape',
            '/maxthon/i'    =>  'Maxthon',
            '/konqueror/i'  =>  'Konqueror',
            '/ubrowser/i'   =>  'UC Browser',
            '/mobile/i'     =>  'Handheld Browser'
        );

        foreach ($browser_array as $regex => $value) {

            if (preg_match($regex, $user_agent)) {
                $browser    =   $value;
            }

        }

        return $browser;

    }

    /**
     * Get the users device name.
     * 
     * Get the users device's name.
     * @return string indicates the device type of the user.
     */ 
    public static function  get_device(){

        $tablet_browser = 0;
        $mobile_browser = 0;

        if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $tablet_browser++;
        }

        if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $mobile_browser++;
        }

        if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
            $mobile_browser++;
        }

        $mobile_ua = strtolower(substr(self::get_user_agent(), 0, 4));
        $mobile_agents = array(
            'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
            'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
            'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
            'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
            'newt','noki','palm','pana','pant','phil','play','port','prox',
            'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
            'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
            'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
            'wapr','webc','winw','winw','xda ','xda-');

        if (in_array($mobile_ua,$mobile_agents)) {
            $mobile_browser++;
        }

        if (strpos(strtolower(self::get_user_agent()),'opera mini') > 0) {
            $mobile_browser++;
                //Check for tablets on opera mini alternative headers
            $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
            if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
                $tablet_browser++;
            }
        }

        if ($tablet_browser > 0) {
               // do something for tablet devices
            return 'Tablet';
        }
        else if ($mobile_browser > 0) {
               // do something for mobile devices
            return 'Mobile';
        }
        else {
               // do something for everything else
            return 'Computer';
        }   
    }

}