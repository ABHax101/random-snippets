/*******************************************************
*   Made by ABHax101
*   Credits to https://github.com/svbailey/fingerprintjs
*   
*   USAGE:
*   <?php
*       session_start();
*       require("./blacklist.php");
*       //Rest of your script here
*   ?>
*******************************************************/


<script>
    function Fingerprint(e){var r=Array.prototype.forEach,t=Array.prototype.map;this.each=function(e,t,n){if(null!=e)if(r&&e.forEach===r)e.forEach(t,n);else if(e.length===+e.length){for(var h=0,s=e.length;s>h;h++)if(t.call(n,e[h],h,e)==={})return}else for(var a in e)if(e.hasOwnProperty(a)&&t.call(n,e[a],a,e)==={})return},this.map=function(e,r,n){var h=[];return null==e?h:t&&e.map===t?e.map(r,n):(this.each(e,function(e,t,s){h[h.length]=r.call(n,e,t,s)}),h)},e&&(this.hasher=e)}Fingerprint.prototype={get:function(){keys=[],keys.push(navigator.userAgent),keys.push([screen.height,screen.width,screen.colorDepth].join("x")),keys.push((new Date).getTimezoneOffset()),keys.push(!!window.sessionStorage),keys.push(!!window.localStorage);var e=this.map(navigator.plugins,function(e){var r=this.map(e,function(e){return[e.type,e.suffixes].join("~")}).join(",");return[e.name,e.description,r].join("::")},this).join(";");return keys.push(e),this.hasher?this.hasher(keys.join("###"),31):this.murmurhash3_32_gc(keys.join("###"),31)},murmurhash3_32_gc:function(e,r){var t,n,h,s,a,i,o,c;for(t=3&e.length,n=e.length-t,h=r,a=3432918353,i=461845907,c=0;n>c;)o=255&e.charCodeAt(c)|(255&e.charCodeAt(++c))<<8|(255&e.charCodeAt(++c))<<16|(255&e.charCodeAt(++c))<<24,++c,o=4294967295&(65535&o)*a+((65535&(o>>>16)*a)<<16),o=o<<15|o>>>17,o=4294967295&(65535&o)*i+((65535&(o>>>16)*i)<<16),h^=o,h=h<<13|h>>>19,s=4294967295&5*(65535&h)+((65535&5*(h>>>16))<<16),h=(65535&s)+27492+((65535&(s>>>16)+58964)<<16);switch(o=0,t){case 3:o^=(255&e.charCodeAt(c+2))<<16;case 2:o^=(255&e.charCodeAt(c+1))<<8;case 1:o^=255&e.charCodeAt(c),o=4294967295&(65535&o)*a+((65535&(o>>>16)*a)<<16),o=o<<15|o>>>17,o=4294967295&(65535&o)*i+((65535&(o>>>16)*i)<<16),h^=o}return h^=e.length,h^=h>>>16,h=4294967295&2246822507*(65535&h)+((65535&2246822507*(h>>>16))<<16),h^=h>>>13,h=4294967295&3266489909*(65535&h)+((65535&3266489909*(h>>>16))<<16),h^=h>>>16,h>>>0}};
    var fingerprint = new Fingerprint().get();
    var list = [/* Add your blacklisted user IDs here separated by commas */];
    if (list.includes(fingerprint)) {location.href="about:blank";}
    document.cookie = "id="+fingerprint;
    <?php
        function getIP() { if (isset($_SERVER)) { if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) { $realip = $_SERVER['HTTP_X_FORWARDED_FOR']; } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) { $realip = $_SERVER['HTTP_CLIENT_IP']; } else { $realip = $_SERVER['REMOTE_ADDR']; } } else { if (getenv("HTTP_X_FORWARDED_FOR")) { $realip = getenv( "HTTP_X_FORWARDED_FOR"); } elseif (getenv("HTTP_CLIENT_IP")) { $realip = getenv("HTTP_CLIENT_IP"); } else { $realip = getenv("REMOTE_ADDR"); } } return $realip; }

        $ips = fopen("./log.txt", "a+"); 
        $ip = getIP(); 
        $log = date("D, H:i:s ") . $_SESSION['Username'].', '.$ip.', '.$_COOKIE['id']." (".$_SERVER['HTTP_USER_AGENT'].")".PHP_EOL.PHP_EOL; 
        fwrite($ips, $log); 
        fclose($ips);
    ?>
</script>
