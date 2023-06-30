<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index(){
        return view('index');
    }

    public function apps_calendar(){
        return view('apps-calendar');
    }

    public function apps_chat(){
        return view('apps-chat');
    }

    public function apps_ecommerce_checkout(){
        return view('apps-ecommerce-checkout');
    }

    public function apps_ecommerce_customers(){
        return view('apps-ecommerce-customers');
    }

    public function apps_ecommerce_orders(){
        return view('apps-ecommerce-orders');
    }

    public function apps_ecommerce_orders_details(){
        return view('apps-ecommerce-orders-details');
    }

    public function apps_ecommerce_products(){
        return view('apps-ecommerce-products');
    }

    public function apps_ecommerce_products_details(){
        return view('apps-ecommerce-products-details');
    }

    public function apps_ecommerce_sellers(){
        return view('apps-ecommerce-sellers');
    }

    public function apps_ecommerce_shopping_cart(){
        return view('apps-ecommerce-shopping-cart');
    }

    public function apps_email_inbox(){
        return view('apps-email-inbox');
    }

    public function apps_email_read(){
        return view('apps-email-read');
    }

    public function apps_file_manager(){
        return view('apps-file-manager');
    }

    public function apps_kanban(){
        return view('apps-kanban');
    }

    public function apps_projects_add(){
        return view('apps-projects-add');
    }

    public function apps_projects_details(){
        return view('apps-projects-details');
    }

    public function apps_projects_gantt(){
        return view('apps-projects-gantt');
    }

    public function apps_projects_list(){
        return view('apps-projects-list');
    }

    public function apps_social_feed(){
        return view('apps-social-feed');
    }

    public function apps_tasks(){
        return view('apps-tasks');
    }

    public function apps_tasks_details(){
        return view('apps-tasks-details');
    }

    public function charts_apex_area(){
        return view('charts-apex-area');
    }

    public function charts_apex_bar(){
        return view('charts-apex-bar');
    }

    public function charts_apex_bubble(){
        return view('charts-apex-bubble');
    }

    public function charts_apex_candlestick(){
        return view('charts-apex-candlestick');
    }

    public function charts_apex_column(){
        return view('charts-apex-column');
    }

    public function charts_apex_heatmap(){
        return view('charts-apex-heatmap');
    }

    public function charts_apex_line(){
        return view('charts-apex-line');
    }

    public function charts_apex_mixed(){
        return view('charts-apex-mixed');
    }

    public function charts_apex_pie(){
        return view('charts-apex-pie');
    }

    public function charts_apex_radar(){
        return view('charts-apex-radar');
    }

    public function charts_apex_radialbar(){
        return view('charts-apex-radialbar');
    }

    public function charts_apex_scatter(){
        return view('charts-apex-scatter');
    }

    public function charts_apex_sparklines(){
        return view('charts-apex-sparklines');
    }

    public function charts_brite(){
        return view('charts-brite');
    }

    public function charts_chartjs(){
        return view('charts-chartjs');
    }

    public function charts_sparkline(){
        return view('charts-sparkline');
    }

    public function crm_clients(){
        return view('crm-clients');
    }

    public function crm_dashboard(){
        return view('crm-dashboard');
    }

    public function crm_management(){
        return view('crm-management');
    }

    public function crm_orders_list(){
        return view('crm-orders-list');
    }

    public function crm_projects(){
        return view('crm-projects');
    }

    public function dashboard_analytics(){
        return view('dashboard-analytics');
    }

    public function dashboard_ecommerce(){
        return 'dashboard_ecommerce';
    }

    public function dashboard_projects(){
        return view('dashboard-projects');
    }

    public function dashboard_wallet(){
        return view('dashboard-wallet');
    }

    public function extended_dragula(){
        return view('extended-dragula');
    }

    public function extended_range_slider(){
        return view('extended-range-slider');
    }

    public function extended_ratings(){
        return view('extended-ratings');
    }

    public function extended_scrollbar(){
        return view('extended-scrollbar');
    }

    public function extended_scrollspy(){
        return view('extended-scrollspy');
    }

    public function extended_treeview(){
        return view('extended-treeview');
    }

    public function form_advanced(){
        return view('form-advanced');
    }

    public function form_editors(){
        return view('form-editors');
    }

    public function form_elements(){
        return view('form-elements');
    }

    public function form_fileuploads(){
        return view('form-fileuploads');
    }

    public function form_validation(){
        return view('form-validation');
    }

    public function form_wizard(){
        return view('form-wizard');
    }

    public function icons_dripicons(){
        return view('icons-dripicons');
    }

    public function icons_mdi(){
        return view('icons-mdi');
    }

    public function icons_unicons(){
        return view('icons-unicons');
    }

    public function landing(){
        return view('landing');
    }

    public function layouts_detached(){
        return view('layouts-detached');
    }

    public function layouts_full(){
        return view('layouts-full');
    }

    public function layouts_horizontal(){
        return view('layouts-horizontal');
    }

    public function maps_google(){
        return view('maps-google');
    }

    public function maps_vector(){
        return view('maps-vector');
    }

    public function pages_404_alt(){
        return view('pages-404-alt');
    }

    public function pages_404(){
        return view('pages-404');
    }

    public function pages_500(){
        return view('pages-500');
    }

    public function pages_confirm_mail_2(){
        return view('pages-confirm-mail-2');
    }

    public function pages_confirm_mail(){
        return view('pages-confirm-mail');
    }

    public function pages_faq(){
        return view('pages-faq');
    }

    public function pages_invoice(){
        return view('pages-invoice');
    }

    public function pages_lock_screen_2(){
        return view('pages-lock-screen-2');
    }

    public function pages_lock_screen(){
        return view('pages-lock-screen');
    }

    public function pages_login_2(){
        return view('pages-login-2');
    }

    public function pages_login(){
        return view('pages-login');
    }

    public function pages_logout_2(){
        return view('pages-logout-2');
    }

    public function pages_logout(){
        return view('pages-logout');
    }

    public function pages_maintenance(){
        return view('pages-maintenance');
    }

    public function pages_preloader(){
        return view('pages-preloader');
    }

    public function pages_pricing(){
        return view('pages-pricing');
    }

    public function pages_profile_2(){
        return view('pages-profile-2');
    }

    public function pages_profile(){
        return view('pages-profile');
    }

    public function pages_recoverpassword_2(){
        return view('pages-recoverpw-2');
    }

    public function pages_recoverpassword(){
        return view('pages-recoverpw');
    }

    public function pages_register_2(){
        return view('pages-register-2');
    }

    public function pages_register(){
        return view('pages-register');
    }

    public function pages_starter(){
        return view('pages-starter');
    }

    public function pages_timeline(){
        return view('pages-timeline');
    }
}
