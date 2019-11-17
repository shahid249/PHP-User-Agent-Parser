<?php
/**
 * @author SHAHID
 * @description Simple User Agent Parser
 */

class device_info
{
    public $get_browser; //Get name of browser
    public $get_browser_V; //Get browser version
    public $get_browser_V_F;//Get browser version full
    public $get_platform;//Get platform name
    
    //Array of browser list
    private $browser_list = array(
        '/dalvik/i'    => 'Dalvik',
        '/surf/i'      => 'Surf',
        '/msie/i'      => 'Internet Explorer',
        '/firefox/i'   => 'Firefox',
        '/safari/i'    => 'Safari',
        '/chrome/i'    => 'Chrome',
        '/edge/i'      => 'Edge',
        '/opera/i'     => 'Opera',
        '/netscape/i'  => 'Netscape',
        '/maxthon/i'   => 'Maxthon',
        '/konqueror/i' => 'Konqueror',
        '/trident/i'   => 'Trident IE',
        '/comodo/i'    => 'Comodo',
        '/python/i'    => 'Python'
        );
    
    //Array of OS list
    private $os_list = array(
    
        # Android Platform List
        
        '/android 10.0/i'       =>  'Android 10',
        '/android 9.0/i'        =>  'Android Pie',
        '/android 8./i'         =>  'Android Oreo',
        '/android 7.0/i'        =>  'Android Nougat',
        '/android 6.0/i'        =>  'Android Marshmallow',
        '/android 5.0/i'        =>  'Android Lollipop',
        '/android 4.4/i'        =>  'Android KitKat',
        '/android 4.1/i'        =>  'Android Jelly Bean',
        
        //DEAD OR EOL ANDROID LIST
        
        /*'/android 4.0/i'        =>  'Android IceCream Sandwich',
        '/android 3.0/i'        =>  'Android Honeycomb',
        '/android 2.3/i'        =>  'Android Gingerbread',
        '/android 2.2/i'        =>  'Android Froyo',
        '/android 2.0/i'        =>  'Android Eclare',
        '/android 1.6/i'        =>  'Android Donut',
        '/android 1.5/i'        =>  'Android Cupcake',*/
        
        # Windows Platform List
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
        '/blackberry/i'         =>  'BlackBerry',
        '/webos/i'              =>  'Mobile'
        );
    
    public function user_agent($user_agent)
    {
        self::check_useragent($user_agent);
    }
    
    private function check_useragent($user_agent)
    {
        foreach ($this->browser_list as $regexbs => $valuebs){
            if (preg_match($regexbs, $user_agent)){
                 $this->get_browser = $valuebs;
                 $this->get_browser_V_F = explode(' ',explode("/",stristr($user_agent,$valuebs))[1])[0];
                 $this->get_browser_V = substr($this->get_browser_V_F, 0,strpos($this->get_browser_V_F, "."));
            }
        }
        foreach ($this->os_list as $regexbs => $valuebs){
            if (preg_match($regexbs, $user_agent)){
                 $this->get_platform = $valuebs;
            }
        }
    }
}

$devinfo = new device_info();
?>