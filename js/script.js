/**
 * Application's scripts
 *
 * In this file, you set up the scripts controlling the behavior of your
 * application, as well as plugins setups and dependencies.
 *
 * Licensed under Creative Commons Attribution-ShareAlike 3.0 Unported
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright       Copyright 2012-2012, Gabriel Izaias (http://gabrielizaias.com)
 * @license         CC BY-SA 3.0 (http://creativecommons.org/licenses/by-sa/3.0/)
 */

/*! Browser */
(function(d){var b=navigator.userAgent.toLowerCase(),c=b.indexOf("macintosh")!==-1?"macintosh":b.indexOf("windows")!==-1?"windows":b.indexOf("linux")!==-1?"linux":undefined,a=/(chrome)(?:.*chrome)?[ \/]([\w.]+)/.exec(b)||/(safari)(?:.*version)?[ \/]([\w.]+)/.exec(b)||/(opera)(?:.*version)?[ \/]([\w.]+)/.exec(b)||/(ie) ([\w.]+)/.exec(b)||!/compatible/.test(b)&&/(firefox)(?:.*firefox)?[ \/]([\w.]+)/.exec(b)||[];d("html").addClass(a[1]+" "+a[1]+parseInt(a[2],10)+" "+c+" "+navigator.platform);})(jQuery);

$(document).ready( function(){
    "use strict";
});