<?php
/*
 * Copyright (c) 2011-2013 Philipp Tempel
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
/**
 * Get the user's operating system
 *
 * @param   string  $userAgent  The user's user agent
 *
 * @return  string  Returns the user's operating system as human readable string,
 *  if it cannot be determined 'n/a' is returned.
 */
function getOS($userAgent) {
    // Create list of operating systems with operating system name as array key 
    $oses = array (
        'iPhone'            => '(iPhone)',
        'Windows 3.11'      => 'Win16',
        'Windows 95'        => '(Windows 95)|(Win95)|(Windows_95)',
        'Windows 98'        => '(Windows 98)|(Win98)',
        'Windows 2000'      => '(Windows NT 5.0)|(Windows 2000)',
        'Windows XP'        => '(Windows NT 5.1)|(Windows XP)',
        'Windows 2003'      => '(Windows NT 5.2)',
        'Windows Vista'     => '(Windows NT 6.0)|(Windows Vista)',
        'Windows 7'         => '(Windows NT 6.1)|(Windows 7)',
        'Windows NT 4.0'    => '(Windows NT 4.0)|(WinNT4.0)|(WinNT)|(Windows NT)',
        'Windows ME'        => 'Windows ME',
        'Open BSD'          => 'OpenBSD',
        'Sun OS'            => 'SunOS',
        'Linux'             => '(Linux)|(X11)',
        'Safari'            => '(Safari)',
        'Mac OS'            => '(Mac_PowerPC)|(Macintosh)',
        'QNX'               => 'QNX',
        'BeOS'              => 'BeOS',
        'OS/2'              => 'OS/2',
        'Search Bot'        => '(nuhk)|(Googlebot)|(Yammybot)|(Openbot)|(Slurp/cat)|(msnbot)|(ia_archiver)'
    );
    
    // Loop through $oses array
    foreach($oses as $os => $preg_pattern) {
        // Use regular expressions to check operating system type
        if ( preg_match('@' . $preg_pattern . '@', $userAgent) ) {
            // Operating system was matched so return $oses key
            return $os;
        }
    }
    
    // Cannot find operating system so return Unknown
    
    return 'n/a';
}
?>
