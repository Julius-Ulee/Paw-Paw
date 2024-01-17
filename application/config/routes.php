<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'landing';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/**
 * Route untuk customer
 */
// auth
$route['login'] = 'customer/auth';
$route['register'] = 'customer/auth/register';
$route['logout'] = 'customer/auth/logout';
// home
$route['home'] = 'customer/home';
// product
$route['produk'] = 'customer/product';
$route['produk/(:any)'] = 'customer/product/detail/$1';
// cart
$route['detail-keranjang'] = 'customer/cart';
$route['tambah-keranjang/(:num)'] = 'customer/cart/addtocart/$1';
$route['hapus-keranjang/(:num)'] = 'customer/cart/removecartitem/$1';
$route['kosongkan-keranjang'] = 'customer/cart/emptycart';
// proses order
$route['proses-order'] = 'customer/cart/processorder';
$route['checkout-success'] = 'customer/cart/checkoutsuccess';
// lihat order
$route['orderan-saya'] = 'customer/cart/showmyorder';
$route['orderan-saya/detail/(:num)'] = 'customer/cart/showdetailorder/$1';
// category
$route['kategori'] = 'customer/category';
$route['kategori/(:num)'] = 'customer/category/productcategory/$1';
// about us
$route['tentang-kami'] = 'main/aboutus';
// groomings
$route['grooming'] = 'customer/grooming';
$route['grooming/register'] = 'customer/grooming/groomingregistration';
$route['grooming/detail/(:num)'] = 'customer/grooming/detailgrooming/$1';
$route['grooming/hapus/(:num)'] = 'customer/grooming/deletegroomingdata/$1';
// profiles
$route['customer/profile'] = 'customer/profile';
$route['customer/profile/update-profile'] = 'customer/profile/editprofile';
$route['customer/profile/ubah-password'] = 'customer/profile/changepassword';


// auth blocked
$route['access-denied'] = 'customer/auth/blocked';

/**
 * Route untuk admin
 */
// auth
$route['admin'] = 'admin/auth';
$route['admin/logout'] = 'admin/auth/logout';
// dashboard
$route['dashboard'] = 'admin/dashboard';
// kelola customer
$route['kelola-customer'] = 'admin/customer';
$route['kelola-customer/tambah'] = 'admin/customer/create';
$route['kelola-customer/ubah/(:num)'] = 'admin/customer/edit/$1';
$route['kelola-customer/hapus/(:num)'] = 'admin/customer/delete/$1';
$route['kelola-customer/detail/(:num)'] = 'admin/customer/detail/$1';
// kelola admins
$route['kelola-admin'] = 'admin/admin';
$route['kelola-admin/tambah'] = 'admin/admin/create';
$route['kelola-admin/ubah/(:num)'] = 'admin/admin/edit/$1';
$route['kelola-admin/hapus/(:num)'] = 'admin/admin/delete/$1';
// kelola kategori
$route['kelola-kategori'] = 'admin/category';
$route['kelola-kategori/ajaxlist'] = 'admin/category/ajaxlist';
$route['kelola-kategori/ajaxedit/(:num)'] = 'admin/category/ajaxedit/$1';
$route['kelola-kategori/ajaxadd'] = 'admin/category/ajaxadd';
$route['kelola-kategori/ajaxupdate'] = 'admin/category/ajaxupdate';
$route['kelola-kategori/ajaxdelete/(:num)'] = 'admin/category/ajaxdelete/$1';
// kelola products
$route['kelola-produk'] = 'admin/product';
$route['kelola-produk/tambah'] = 'admin/product/create';
$route['kelola-produk/ubah/(:num)'] = 'admin/product/edit/$1';
$route['kelola-produk/hapus/(:num)'] = 'admin/product/delete/$1';
$route['kelola-produk/detail/(:num)'] = 'admin/product/detail/$1';
// Kelola paket grooming
$route['paket-grooming'] = 'admin/package';
$route['paket-grooming/ajaxlist'] = 'admin/package/ajaxlist';
$route['paket-grooming/ajaxedit/(:num)'] = 'admin/package/ajaxedit/$1';
$route['paket-grooming/ajaxadd'] = 'admin/package/ajaxadd';
$route['paket-grooming/ajaxupdate'] = 'admin/package/ajaxupdate';
$route['paket-grooming/ajaxdelete/(:num)'] = 'admin/package/ajaxdelete/$1';
// Kelola grooming customer
$route['kelola-grooming'] = 'admin/grooming';
$route['kelola-grooming/ubah-status/(:num)'] = 'admin/grooming/changestatus/$1';
$route['kelola-grooming/detail/(:num)'] = 'admin/grooming/detail/$1';
$route['kelola-grooming/hapus/(:num)'] = 'admin/grooming/delete/$1';
// kelola orderan customer
$route['kelola-orderan'] = 'admin/order';
$route['kelola-orderan/ubah-status/(:num)'] = 'admin/order/changeorderstatus/$1';
$route['kelola-orderan/hapus/(:num)'] = 'admin/order/deleteorder/$1';
$route['kelola-orderan/detail/(:num)'] = 'admin/order/detailorder/$1';
// Profile saya
$route['admin/profile'] = 'admin/profile';
$route['admin/profile/update-profile'] = 'admin/profile/editprofile';
$route['admin/profile/ubah-password'] = 'admin/profile/changepassword';
// laporan
$route['laporan'] = 'admin/report';
$route['laporan/filter'] = 'admin/report/filterreports';
