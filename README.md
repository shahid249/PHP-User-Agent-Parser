# PHP-User-Agent-Parser
PHP User Agent Parser get device information from useragent is now easy.

HOW TO USE
//start class
$device_info = new device_info();

//Insert User Agent string
$device_info->user_agent(PUT_USER_AGENT_STRING_HERE);

//Print Browser Name
$device_info->get_browser;

//Print Browser Version
$device_info->get_browser_V;

//Print Browser Version Full
$device_info->get_browser_V_F;

//Print OS / Platform
$device_info->get_platform
