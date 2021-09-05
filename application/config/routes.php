<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/** ------------------ Admin Login ------------*/
$route['administrator'] = 'admin/C_Login';
$route['admin/auth'] = 'admin/C_Login/auth';
$route['admin/logout'] = 'admin/C_Login/logout';
/** ------------------ Admin Dashboard ---------*/
// $route['admin/dashboard'] = 'admin/C_Dashboard';
$route['admin/dashboard'] = 'admin/C_Dashboard';
$route['admin/dashboard-filter'] = 'admin/C_Dashboard/filter';
/** ------------------ Admin User ---------*/
$route['admin/user'] = 'admin/C_User';
$route['admin/user_list'] = 'admin/C_User/search';
$route['admin/user_get'] = 'admin/C_User/get_data';
$route['admin/user_save'] = 'admin/C_User/save_add';
$route['admin/user_update'] = 'admin/C_User/save_update';
$route['admin/user_delete'] = 'admin/C_User/destroy';
/** ------------------ Admin Profile ---------*/
$route['admin/profile'] = 'admin/C_Profile';
$route['admin/profile_update'] = 'admin/C_Profile/save_update';
$route['admin/change_password'] = 'admin/C_Profile/change_password';
$route['admin/profile_upload'] = 'admin/C_Profile/upload';
/** ------------------ Admin Setting Tahunan ---------*/
$route['admin/setting_tahun'] = 'admin/C_SettingTahun';
$route['admin/setting_list'] = 'admin/C_SettingTahun/search';
$route['admin/setting_get'] = 'admin/C_SettingTahun/get_data';
$route['admin/setting_save_add'] = 'admin/C_SettingTahun/save_add';
$route['admin/setting_save_update'] = 'admin/C_SettingTahun/save_update';
$route['admin/setting_delete'] = 'admin/C_SettingTahun/destroy';
/** ------------------ Admin Data User ---------------*/
$route['admin/data_user'] = 'admin/C_DataUser';
$route['admin/data_user_list'] = 'admin/C_DataUser/search';
$route['admin/data_user_get'] = 'admin/C_DataUser/get_data';
$route['admin/data_user_save'] = 'admin/C_DataUser/save_add';
$route['admin/data_user_update'] = 'admin/C_DataUser/save_update';
$route['admin/data_user_delete'] = 'admin/C_DataUser/destroy';
$route['admin/data_user_import'] = 'admin/C_DataUser/import_data';
$route['admin/data_user_export'] = 'admin/C_DataUser/export_data';
$route['admin/data_user_generate'] = 'admin/C_DataUser/generate_data';
$route['admin/data_user_detail/(:any)'] = 'admin/C_DataUserDetail';
$route['admin/data_user_addDetail'] = 'admin/C_DataUserDetail/save_add';
$route['admin/data_user_deleteDetail'] = 'admin/C_DataUserDetail/destroy';
/** ------------------ Admin Kelembagaan ---------------*/
$route['admin/kelembagaan'] = 'admin/C_Kelembagaan';
$route['admin/kelembagaan_search'] = 'admin/C_Kelembagaan/search';
$route['admin/kelembagaan-detail/(:any)'] = 'admin/C_Kelembagaan/get_data';
$route['admin/kelembagaan-update'] = 'admin/C_Kelembagaan/set_update';
$route['admin/kelembagaan-export'] = 'admin/C_Kelembagaan/kelembagaan_export';

/** ------------------ Admin Kesiswaan ---------------*/
$route['admin/kesiswaan'] = 'admin/C_Kesiswaan';
$route['admin/kesiswaan_search'] = 'admin/C_Kesiswaan/search';
$route['admin/kesiswaan_get'] = 'admin/C_Kesiswaan/get_data';
$route['admin/kesiswaan_update'] = 'admin/C_Kesiswaan/aditional';
$route['admin/kesiswaan_tahun'] = 'admin/C_Kesiswaan/get_tahun';
/** ------------------ Admin Kesiswaan ---------------*/
$route['admin/gtk'] = 'admin/C_Gtk';
$route['admin/gtk_data'] = 'admin/C_Gtk/get_data';
$route['admin/gtk_tahun'] = 'admin/C_Gtk/get_tahun';
$route['admin/gtk_search'] = 'admin/C_Gtk/search';
$route['admin/gtk_detail/(:any)'] = 'admin/C_Gtk_detail';
$route['admin/gtk_save_add'] = 'admin/C_Gtk_detail/save_add';
$route['admin/gtk_save_update'] = 'admin/C_Gtk_detail/save_update';
$route['admin/gtk_data_detail'] = 'admin/C_Gtk_detail/get_data';
$route['admin/gtk_delete'] = 'admin/C_Gtk_detail/delete';
/** ------------------ Admin  Backup Database ---------------*/
$route['admin/backup_database'] = 'admin/C_Backup_database/backup';
/** ------------------ Admin  Rekap Kelembagaan ---------------*/
// $route['admin/rekap-kelembagaan'] = 'admin/C_RekapKelembagaan';
/** ------------------ Admin  Rekap Kesiswaan ---------------*/
$route['admin/rekap-kesiswaan'] = 'admin/C_RekapKesiswaan';
$route['admin/rekap-kesfilter'] = 'admin/C_RekapKesiswaan/search';
/** ------------------ Admin  Rekap GTK ---------------*/
$route['admin/rekap-gtk'] = 'admin/C_RekapGtk';
$route['admin/rekap-gtkfilter'] = 'admin/C_RekapGtk/search';





/** ------------------ End Admin ---------*/

/** ------------------ Start User -------------------*/
$route['default_controller'] = 'C_Login';
$route['auth'] = 'C_Login/auth';
$route['logout'] = 'C_Login/logout';
/** ------------------ User Profile-------------------*/
$route['user/profile'] = 'user/C_Profile';
$route['user/change_password'] = 'user/C_Profile/change_password';
$route['user/profile_upload'] = 'user/C_Profile/upload';
/** ------------------ User Dashboard-------------------*/
$route['user/dashboard'] = 'user/C_Dashboard';
$route['user/dashboard-filter'] = 'user/C_Dashboard/filter';
/** ------------------ User Kelembagaan-----------------*/
$route['user/kelembagaan'] = 'user/C_Kelembagaan';
/** ------------------ User Kesiswaan-------------------*/
$route['user/kesiswaan'] = 'user/C_Kesiswaan';
$route['user/kesiswaan_list'] = 'user/C_Kesiswaan/search';
$route['user/kesiswaan_get'] = 'user/C_Kesiswaan/get_data';
$route['user/kesiswaan_adt'] = 'user/C_Kesiswaan/aditional';
/** ------------------ User GTK-------------------*/
$route['user/gtk'] = 'user/C_Gtk';
$route['user/gtk_list'] = 'user/C_Gtk/search';
$route['user/gtk_data'] = 'user/C_Gtk/get_data';
$route['user/gtk_import'] = 'user/C_Gtk/import_gtk';
$route['user/gtk_detail/(:any)'] = 'user/C_Gtk_detail';
$route['user/gtk_save_add'] = 'user/C_Gtk_detail/save_add';
$route['user/gtk_save_update'] = 'user/C_Gtk_detail/save_update';
$route['user/gtk_data_detail'] = 'user/C_Gtk_detail/get_data';
$route['user/gtk_delete'] = 'user/C_Gtk_detail/delete';
/** ------------------ End User -------------------*/

$route['404_override'] = 'C_Error_404';
$route['translate_uri_dashes'] = FALSE;
