<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['pad/about'] = 'irul'; //sample aja; langsung nama controller di dalam module-nya

$route['pad/skpd']         = 'sptpd'; 
$route['pad/skpd/(:any)']  = 'sptpd/$1'; 