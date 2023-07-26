<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\FreelancerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('cache-clear', function(){
    Artisan::call('optimize');
    return 'optimzed';
});

// Route::get('/demo', function() { return 'ok'; });
// Route::get('/', [RouteController::class, 'index'])->name('index');
Route::get('/', [EmployeeController::class, 'index'])->name('index');
Route::any('/login', [AuthController::class, 'login'])->name('login');
Route::any('/logout', [AuthController::class, 'logout'])->name('logout');
Route::any('/forgot', [AuthController::class, 'forgot'])->name('forgot');
Route::any('/reset_password/{token}/{id}', [AuthController::class, 'reset_password'])->name('reset_password');
Route::any('/user/{token}/{id}', [AuthController::class, 'user'])->name('user');

Route::prefix('dashboard')->group(function() {
    Route::get('/analytics', [RouteController::class, 'dashboard_analytics'])->name('dashboard.analytics');
    Route::get('/ecommerce', [RouteController::class, 'dashboard_ecommerce'])->name('dashboard.ecommerce');
    Route::get('/projects', [RouteController::class, 'dashboard_projects'])->name('dashboard.projects');
    Route::get('/wallet', [RouteController::class, 'dashboard_wallet'])->name('dashboard.wallet');
});

Route::get('apps_calendar', [RouteController::class, 'apps_calendar'])->name('apps_calendar');
Route::get('/apps_chat', [RouteController::class, 'apps_chat'])->name('apps_chat');

Route::prefix('crm')->group(function() {
    Route::get('/clients', [RouteController::class, 'crm_clients'])->name('crm.clients');
    Route::get('/dashboard', [RouteController::class, 'crm_dashboard'])->name('crm.dashboard');
    Route::get('/management', [RouteController::class, 'crm_management'])->name('crm.management');
    Route::get('/orders_list', [RouteController::class, 'crm_orders_list'])->name('crm.orders_list');
    Route::get('/projects', [RouteController::class, 'crm_projects'])->name('crm.projects');
});

Route::prefix('ecommerce')->group(function() {
    Route::get('/products', [RouteController::class, 'apps_ecommerce_products'])->name('ecommerce.products');
    Route::get('/products_details', [RouteController::class, 'apps_ecommerce_products_details'])->name('ecommerce.products_details');
    Route::get('/orders', [RouteController::class, 'apps_ecommerce_orders'])->name('ecommerce.orders');
    Route::get('/orders_details', [RouteController::class, 'apps_ecommerce_orders_details'])->name('ecommerce.orders_details');
    Route::get('/customers', [RouteController::class, 'apps_ecommerce_customers'])->name('ecommerce.customers');
    Route::get('/shopping_cart', [RouteController::class, 'apps_ecommerce_shopping_cart'])->name('ecommerce.shopping_cart');
    Route::get('/checkout', [RouteController::class, 'apps_ecommerce_checkout'])->name('ecommerce.checkout');
    Route::get('/sellers', [RouteController::class, 'apps_ecommerce_sellers'])->name('ecommerce.sellers');
});

Route::prefix('email')->group(function() {
    Route::get('/inbox', [RouteController::class, 'apps_email_inbox'])->name('email.inbox');
    Route::get('/read', [RouteController::class, 'apps_email_read'])->name('email.read');
});

Route::prefix('projects')->group(function() {
    Route::get('/list', [RouteController::class, 'apps_projects_list'])->name('projects.list');
    Route::get('/details', [RouteController::class, 'apps_projects_details'])->name('projects.details');
    Route::get('/gantt', [RouteController::class, 'apps_projects_gantt'])->name('projects.gantt');
    Route::get('/create', [RouteController::class, 'apps_projects_add'])->name('projects.create');
});

Route::get('/social_feed', [RouteController::class, 'apps_social_feed'])->name('social_feed');

Route::prefix('tasks')->group(function() {
    Route::get('/list', [RouteController::class, 'apps_tasks'])->name('tasks.list');
    Route::get('/details', [RouteController::class, 'apps_tasks_details'])->name('tasks.details');
    Route::get('/kanban', [RouteController::class, 'apps_kanban'])->name('tasks.kanban');
});

Route::get('/file_manager', [RouteController::class, 'apps_file_manager'])->name('file_manager');

Route::get('/landing', [RouteController::class, 'landing'])->name('landing');

Route::get('/layouts_detached', [RouteController::class, 'layouts_detached'])->name('layouts_detached');
Route::get('/layouts_full', [RouteController::class, 'layouts_full'])->name('layouts_full');
Route::get('/layouts_horizontal', [RouteController::class, 'layouts_horizontal'])->name('layouts_horizontal');

Route::prefix('extended_ui')->group(function() {
    Route::get('/dragula', [RouteController::class, 'extended_dragula'])->name('extended.dragula');
    Route::get('/range_slider', [RouteController::class, 'extended_range_slider'])->name('extended.range_slider');
    Route::get('/ratings', [RouteController::class, 'extended_ratings'])->name('extended.ratings');
    Route::get('/scrollbar', [RouteController::class, 'extended_scrollbar'])->name('extended.scrollbar');
    Route::get('/scrollspy', [RouteController::class, 'extended_scrollspy'])->name('extended.scrollspy');
    Route::get('/treeview', [RouteController::class, 'extended_treeview'])->name('extended.treeview');
});

Route::prefix('icons')->group(function() {
    Route::get('/drip_icons', [RouteController::class, 'icons_dripicons'])->name('icons.dripicons');
    Route::get('/material_design_icons', [RouteController::class, 'icons_mdi'])->name('icons.material_designicons');
    Route::get('/unicons', [RouteController::class, 'icons_unicons'])->name('icons.unicons');
});

Route::prefix('form')->group(function() {
    Route::get('/advanced', [RouteController::class, 'form_advanced'])->name('form.advanced');
    Route::get('/editors', [RouteController::class, 'form_editors'])->name('form.editors');
    Route::get('/elements', [RouteController::class, 'form_elements'])->name('form.elements');
    Route::get('/fileuploads', [RouteController::class, 'form_fileuploads'])->name('form.fileuploads');
    Route::get('/validation', [RouteController::class, 'form_validation'])->name('form.validation');
    Route::get('/wizard', [RouteController::class, 'form_wizard'])->name('form.wizard');
});

Route::prefix('charts')->group(function() {
    Route::prefix('apex')->group(function() {
        Route::get('/area', [RouteController::class, 'charts_apex_area'])->name('charts.apex.area');
        Route::get('/bar', [RouteController::class, 'charts_apex_bar'])->name('charts.apex.bar');
        Route::get('/bubble', [RouteController::class, 'charts_apex_bubble'])->name('charts.apex.bubble');
        Route::get('/candlestick', [RouteController::class, 'charts_apex_candlestick'])->name('charts.apex.candlestick');
        Route::get('column', [RouteController::class, 'charts_apex_column'])->name('charts.apex.column');
        Route::get('heatmap', [RouteController::class, 'charts_apex_heatmap'])->name('charts.apex.heatmap');
        Route::get('line', [RouteController::class, 'charts_apex_line'])->name('charts.apex.line');
        Route::get('mixed', [RouteController::class, 'charts_apex_mixed'])->name('charts.apex.mixed');
        Route::get('pie', [RouteController::class, 'charts_apex_pie'])->name('charts.apex.pie');
        Route::get('radar', [RouteController::class, 'charts_apex_radar'])->name('charts.apex.radar');
        Route::get('radialbar', [RouteController::class, 'charts_apex_radialbar'])->name('charts.apex.radialbar');
        Route::get('scatter', [RouteController::class, 'charts_apex_scatter'])->name('charts.apex.scatter');
        Route::get('sparklines', [RouteController::class, 'charts_apex_sparklines'])->name('charts.apex.sparklines');
    });

    Route::get('/brite', [RouteController::class, 'charts_brite'])->name('charts.brite');
    Route::get('/chartjs', [RouteController::class, 'charts_chartjs'])->name('charts.chartjs');
    Route::get('/sparkline', [RouteController::class, 'charts_sparkline'])->name('charts.sparkline');
});

Route::prefix('maps')->group(function() {
    Route::get('/google', [RouteController::class, 'maps_google'])->name('maps.google');
    Route::get('/vector', [RouteController::class, 'maps_vector'])->name('maps.vector');
});

Route::prefix('pages')->group(function() {
    Route::prefix('authentication')->group(function() {
        Route::get('confirm_mail_2', [RouteController::class, 'pages_confirm_mail_2'])->name('pages.confirm_mail_2');
        Route::get('confirm_mail', [RouteController::class, 'pages_confirm_mail'])->name('pages.confirm_mail');
        Route::get('lock_screen_2', [RouteController::class, 'pages_lock_screen_2'])->name('pages.lock_screen_2');
        Route::get('lock_screen', [RouteController::class, 'pages_lock_screen'])->name('pages.lock_screen');
        Route::get('login_2', [RouteController::class, 'pages_login_2'])->name('pages.login_2');
        Route::get('login', [RouteController::class, 'pages_login'])->name('pages.login');
        Route::get('logout_2', [RouteController::class, 'pages_logout_2'])->name('pages.logout_2');
        Route::get('logout', [RouteController::class, 'pages_logout'])->name('pages.logout');
        // Route::get('confirm-mail-2', [RouteController::class, 'pages_confirm_mail_2'])->name('pages.confirm_mail_2');
        Route::get('recoverpassword_2', [RouteController::class, 'pages_recoverpassword_2'])->name('pages.recoverpassword_2');
        Route::get('recoverpassword', [RouteController::class, 'pages_recoverpassword'])->name('pages.recoverpassword');
        Route::get('register_2', [RouteController::class, 'pages_register_2'])->name('pages.register_2');
        Route::get('register', [RouteController::class, 'pages_register'])->name('pages.register');
    });

    Route::prefix('error')->group(function() {
        Route::get('/404_alt', [RouteController::class, 'pages_404_alt'])->name('pages.404_alt');
        Route::get('/404', [RouteController::class, 'pages_404'])->name('pages.404');
        Route::get('/500', [RouteController::class, 'pages_500'])->name('pages.500');
    });

    Route::get('faq', [RouteController::class, 'pages_faq'])->name('pages.faq');
    Route::get('invoice', [RouteController::class, 'pages_invoice'])->name('pages.invoice');
    Route::get('maintenance', [RouteController::class, 'pages_maintenance'])->name('pages.maintenance');
    Route::get('preloader', [RouteController::class, 'pages_preloader'])->name('pages.preloader');
    Route::get('pricing', [RouteController::class, 'pages_pricing'])->name('pages.pricing');
    Route::get('profile_2', [RouteController::class, 'pages_profile_2'])->name('pages.profile_2');
    Route::get('profile', [RouteController::class, 'pages_profile'])->name('pages.profile');
    Route::get('starter', [RouteController::class, 'pages_starter'])->name('pages.starter');
    Route::get('timeline', [RouteController::class, 'pages_timeline'])->name('pages.timeline');
});

Route::prefix('employee')->group(function() {
    Route::any('leave', [EmployeeController::class, 'leave'])->name('employee.leave');
    Route::any('birthday', [GeneralController::class, 'birthday'])->name('employee.birthday');
    Route::any('mail_payslip/{id}', [EmployeeController::class, 'mail_payslip'])->name('employee.mail_payslip');
    Route::any('access', [EmployeeController::class, 'access'])->name('employee.access');
    ROute::any('create_access', [EmployeeController::class, 'create_access'])->name('employee.create_access');
    Route::any('get_salary', [EmployeeController::class, 'get_salary'])->name('employee.get_salary');
    Route::any('salary_slip/{id}', [EmployeeController::class, 'print_paySlip'])->name('employee.print_paySlip');
    Route::any('update_salary_slip', [EmployeeController::class, 'update_salary_slip'])->name('employee.update_salary_slip');
    Route::get('all', [EmployeeController::class, 'all'])->name('employee.all');
    Route::any('create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::any('update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::any('delete/{id}', [EmployeeController::class, 'delete'])->name('employee.delete');
    Route::any('view/{id}', [EmployeeController::class, 'employee'])->name('employee.id');
    Route::get('history',[EmployeeController::class,'employeeHistory'])->name('employee.history');
});

Route::prefix('salary')->group(function() {
    Route::any('all', [SalaryController::class, 'all'])->name('salary.all');
    Route::any('update/{id}', [SalaryController::class, 'update'])->name('salary.update');
    Route::any('delete/{id}', [SalaryController::class, 'delete'])->name('salary.delete');
});

Route::prefix('freelancer')->group(function() {
    Route::any('all', [FreelancerController::class, 'index'])->name('freelancer.all');
    Route::get('freelancer_create',[FreelancerController::class,'add'])->name('freelancer.add');
    Route::post('freelancer_store',[FreelancerController::class,'store'])->name('freelancer.store');
    Route::any('freelancer_update/{id}',[FreelancerController::class,'update'])->name('freelancer.update');
    Route::any('freelancer_delete/{id}', [FreelancerController::class, 'delete'])->name('freelancer.delete');
    Route::any('freelancer/{id}', [FreelancerController::class, 'view'])->name('freelancer.id');
    Route::any('freelancer_payment',[FreelancerController::class,'payment'])->name('freelancer.payment');
    Route::any('freelancer-payments',[FreelancerController::class,'allPayments'])->name('freelancer-payments');
    Route::get('freelancer_pay/{id}',[FreelancerController::class,'payFreelancer'])->name('freeancer_pay');
});

Route::get('bank', [EmployeeController::class, 'bank'])->name('bank');
