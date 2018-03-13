<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "login";
$route['404_override'] = 'welcome/page_blank';
/*ROUTE UNTUK CONTROLLER HOME*/
$route['home']		='welcome';

/*ROUTE UNTUK CONTROLLER HOME*/

$route['login']									='login/login_user';
$route['login/get_master_data_kerja']									='login/get_master_data_kerja';
$route['login/logout']							='login/logout';

/*ROUTE UNTUK CONTROLLER DATA POSISI */
$route['data_pencari_kerja']												='data_pencari_kerja/index';
$route['data_pencari_kerja/get_master_data_kerja']							='data_pencari_kerja/get_master_data_kerja';
$route['data_pencari_kerja/get_master_data_kerja_limit']							='data_pencari_kerja/get_master_data_kerja_limit';
$route['data_pencari_kerja/input_master_data_pencari_kerja']				='data_pencari_kerja/input_master_data_pencari_kerja';
$route['data_pencari_kerja/save_master_data_pencari_kerja']					='data_pencari_kerja/save_master_data_pencari_kerja';
$route['data_pencari_kerja/view_edit_master_data_pencari_kerja/(:num)']		='data_pencari_kerja/view_edit_master_data_pencari_kerja/$1';
$route['data_pencari_kerja/edit_master_data_pencari_kerja']					='data_pencari_kerja/edit_master_data_pencari_kerja';
$route['data_pencari_kerja/delete_master_data_pencari_kerja']				='data_pencari_kerja/delete_master_data_pencari_kerja';
$route['data_pencari_kerja/excel_pencari_kerja']							='data_pencari_kerja/excel_pencari_kerja';
$route['data_pencari_kerja/backup_posisi']									='data_pencari_kerja/backup_posisi';
$route['data_pencari_kerja/login_delete']									='data_pencari_kerja/login_delete';
$route['data_pencari_kerja/view_delete_master_data_pencari_kerja/(:num)']	='data_pencari_kerja/view_delete_master_data_pencari_kerja/$1';
$route['data_pencari_kerja/print/(:num)']									='data_pencari_kerja/print_kartu/$1';
$route['data_pencari_kerja/print_ktp/(:num)']								='data_pencari_kerja/print_kartu_ktp/$1';
$route['data_pencari_kerja/view_master_data_pencari_kerja/(:num)']			='data_pencari_kerja/view_master_data_pencari_kerja/$1';
$route['data_pencari_kerja/get_master_data_kerja_pend/(:num)']				='data_pencari_kerja/get_master_data_kerja_pend/$1';
$route['data_pencari_kerja/index_data_kerja_pend']							='data_pencari_kerja/view_master_data_pencari_kerja_pend';
$route['data_pencari_kerja/get_master_data_exp']							='data_pencari_kerja/get_master_data_exp';
$route['data_pencari_kerja/get_master_data_pekerja_laki']					='data_pencari_kerja/get_master_data_pekerja_laki';
$route['data_pencari_kerja/get_master_data_pekerja_perempuan']				='data_pencari_kerja/get_master_data_pekerja_perempuan';
$route['data_pencari_kerja/get_master_data_kerja_now']						='data_pencari_kerja/get_master_data_kerja_now';
/*ROUTE UNTUK CONTROLLER DATA POSISI */


/*ROUTE UNTUK CONTROLLER DATA USER */
$route['data_user']											='data_user/index';
$route['data_user/input_master_data_user']					='data_user/input_master_data_user';
$route['data_user/save_master_data_user']					='data_user/save_master_data_user';
$route['data_user/get_master_data_user']					='data_user/get_master_data_user';
$route['data_user/view_edit_master_data_user/(:num)']		='data_user/view_edit_master_data_user/$1';
$route['data_user/edit_master_data_user']					='data_user/edit_master_data_user';
$route['data_user/edit_master_data_user_password']			='data_user/edit_master_data_user_password';
$route['data_user/delete_master_data_user/(:num)']			='data_user/delete_master_data_user/$1';
$route['data_user/delete_master_data_user_oto/(:num)']		='data_user/delete_master_data_user_oto/$1';
$route['data_user/excel_user']								='data_user/excel_user';
$route['data_user/backup_user']								='data_user/backup_user';
/*ROUTE UNTUK CONTROLLER DATA USER */

/*ROUTE UNTUK MENU*/
$route['master_menu/data_master_menu_utama/(:num)']						='master_menu/get_master_menu_utama/$1';
$route['master_menu/data_master_menu_utama_detail/(:num)']				='master_menu/get_master_menu_utama/$1';
$route['master_menu/data_master_menu_child/(:num)']						='master_menu/data_master_menu_child/$1';
/*END ROUTE MENU*/

/*ROUTE UNTUK CONTROLLER GET PLACE */
$route['get_provinsi']												='place_controller/data_provinsi';
$route['get_kota/data_kota/(:num)']									='place_controller/data_kota/$1';
$route['get_kecamatan/data_kecamatan']								='place_controller/data_kecamatan';
$route['get_kelurahan/data_kelurahan/(:num)']						='place_controller/data_kelurahan/$1';
$route['get_kode_pos/data_kode_pos/(:num)']							='place_controller/data_kode_pos/$1';
/*ROUTE UNTUK CONTROLLER GET PLACE */


/*ROUTE UNTUK INFORMASI*/
$route['data_informasi/']											='data_informasi/index';
$route['data_informasi/pekerja_tingkat_pendidikan']					='data_informasi/pekerja_tingkat_pendidikan';
$route['data_informasi/pekerja_tingkat_wilayah']					='data_informasi/pekerja_tingkat_wilayah';
$route['data_informasi/minimal_kadaluarsa']							='data_informasi/minimal_kadaluarsa';
$route['data_informasi/kadaluarsa']									='data_informasi/kadaluarsa';
$route['data_informasi/pekerja_laki']								='data_informasi/pekerja_laki';
$route['data_informasi/pekerja_perempuan']							='data_informasi/pekerja_perempuan';
/*END ROUTE INFORMASI*/


/*ROUTE UNTUK GET DATA*/
$route['get_data/get_data_jenis_kelamin']							='get_data/data_jenis_kelamin';
$route['get_data/get_data_status']									='get_data/data_status';
$route['get_data/get_data_agama']									='get_data/data_agama';
$route['get_data/get_data_pendidikan']								='get_data/data_pendidikan';
$route['get_data/get_data_bahasa']									='get_data/data_bahasa';
$route['get_data/get_data_lokasi']									='get_data/data_lokasi';
$route['get_data/get_data_jabatan']									='get_data/data_jabatan';
$route['get_data/get_data_gaji']									='get_data/data_gaji';
/*END ROUTE GET DATA*/


/* End of file routes.php */
/* Location: ./application/config/routes.php */