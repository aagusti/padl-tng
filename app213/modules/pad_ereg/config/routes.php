<?php  if ( ! defined("BASEPATH")) exit("No direct script access allowed");
$modul = 'pad_ereg';

$route["{$modul}/about"] = "irul"; //sample aja; langsung nama controller di dalam module-nya

$route["{$modul}/daftar_wajib_pajak_online"]         = "daftar/add"; 
$route["{$modul}/daftar_wajib_pajak_online/(:any)"]  = "daftar/$1"; 
$route["{$modul}/daftar_wajib_pajak_online_success"] = "daftar/success"; 
