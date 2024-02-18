<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Themart</title>
        
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="crossorigin="anonymous"referrerpolicy="no-referrer"/>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <link rel="stylesheet" href="{{ asset('backend') }}/vendors/core/core.css">
        <link rel="stylesheet" href="{{ asset('backend') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
        <link rel="stylesheet" href="{{ asset('backend') }}/fonts/feather-font/css/iconfont.css">
        <link rel="stylesheet" href="{{ asset('backend') }}/vendors/flag-icon-css/css/flag-icon.min.css"> 
        <link rel="stylesheet" href="{{ asset('backend') }}/css/demo_1/style.css">
        <link rel="shortcut icon" href="{{ asset('backend') }}/images/favicon.png" />
            <!-- Tooster message -->
        <style>
            .toast{
                width : 480px !important;
                top : 50px !important;
                }
                .toast-success {
                background-color: #51a351 !important;
                }
                .toast-error {
                    background-color: #bd362f !important;
                }
        </style>
        <style>
            .toogle_btn .toggle-off.btn {
                padding-left: 24px;
                background: #e6e6e6;
            }
            .toogle_btn .btn-default {
                color: #333;
                background-color: #fff;
                border-color: #ccc;
            }
        </style>
    </head>
    <body>
        <div class="main-wrapper">
            <!-- partial:../../partials/_sidebar.html -->
            <nav class="sidebar">
                <div class="sidebar-header">
                    <a href="{{ route('dashboard') }}" class="sidebar-brand">The<span>Mart</span></a>
                    <div class="sidebar-toggler not-active">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            <div class="sidebar-body">
                <ul class="nav">
                    <li class="nav-item nav-category">Main</li>
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                            <i class="link-icon" data-feather="box"></i>
                            <span class="link-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">web apps</li>
                    <li class="nav-item">
                        <a href="{{ route('user') }}" class="nav-link">
                            <i class="link-icon" data-feather="user"></i>
                            <span class="link-title">Add User</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
                            <i class="link-icon" data-feather="aperture"></i>
                            <span class="link-title">Category</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="emails">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="{{ route('category.add') }}" class="nav-link">Add Category</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('trash.category') }}" class="nav-link">Trash Category</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('subcategory.add') }}" class="nav-link">Add Subcategory</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('trash.subcategory') }}" class="nav-link">Trash Subcategory</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('brand.add') }}" class="nav-link">
                            <i class="link-icon" data-feather="airplay"></i>
                            <span class="link-title">Brand</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">Components</li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
                            <i class="link-icon" data-feather="feather"></i>
                            <span class="link-title">Product Information</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="uiComponents">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="{{ route('tag') }}" class="nav-link">Tag</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('color') }}" class="nav-link">Color</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('sub.product') }}" class="nav-link">Product Sub Name</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('coupon') }}" class="nav-link">Coupon</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('delivery') }}" class="nav-link">Delivery Charge</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/ui-components/cards.html" class="nav-link">Cards</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/ui-components/carousel.html" class="nav-link">Carousel</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/ui-components/collapse.html" class="nav-link">Collapse</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/ui-components/dropdowns.html" class="nav-link">Dropdowns</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/ui-components/media-object.html" class="nav-link">Media object</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/ui-components/modal.html" class="nav-link">Modal</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/ui-components/navs.html" class="nav-link">Navs</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/ui-components/navbar.html" class="nav-link">Navbar</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/ui-components/pagination.html" class="nav-link">Pagination</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/ui-components/popover.html" class="nav-link">Popovers</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/ui-components/progress.html" class="nav-link">Progress</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/ui-components/scrollbar.html" class="nav-link">Scrollbar</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/ui-components/scrollspy.html" class="nav-link">Scrollspy</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/ui-components/spinners.html" class="nav-link">Spinners</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/ui-components/tooltips.html" class="nav-link">Tooltips</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
                            <i class="link-icon" data-feather="anchor"></i>
                            <span class="link-title">Product</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="advancedUI">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="{{ route('product') }}" class="nav-link">Product</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('product.list') }}" class="nav-link">Product List</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/advanced-ui/sweet-alert.html" class="nav-link">Sweet Alert</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#forms" role="button" aria-expanded="false" aria-controls="forms">
                            <i class="link-icon" data-feather="inbox"></i>
                            <span class="link-title">Index</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="forms">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="{{ route('banner') }}" class="nav-link">Banner</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('upcomming') }}" class="nav-link">Offer</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/forms/editors.html" class="nav-link">Editors</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/forms/wizard.html" class="nav-link">Wizard</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  data-toggle="collapse" href="#charts" role="button" aria-expanded="false" aria-controls="charts">
                            <i class="link-icon" data-feather="pie-chart"></i>
                            <span class="link-title">About</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="charts">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="{{ route('aboutban') }}" class="nav-link">About banner</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('about.service') }}" class="nav-link">About Service</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('about.gallery.part') }}" class="nav-link">About Gallery</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#tables" role="button" aria-expanded="false" aria-controls="tables">
                            <i class="link-icon" data-feather="layout"></i>
                            <span class="link-title">Shop</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="../../pages/tables/basic-table.html" class="nav-link">Basic Tables</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/tables/data-table.html" class="nav-link">Data Table</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#icons" role="button" aria-expanded="false" aria-controls="icons">
                            <i class="link-icon" data-feather="smile"></i>
                            <span class="link-title">Faq</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="icons">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Faq List</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/icons/flag-icons.html" class="nav-link">Flag Icons</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/icons/mdi-icons.html" class="nav-link">Mdi Icons</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#general-pages" role="button" aria-expanded="false" aria-controls="general-pages">
                            <i class="link-icon" data-feather="book"></i>
                            <span class="link-title">Contact</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="general-pages">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="../../pages/general/blank-page.html" class="nav-link">Blank page</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/general/faq.html" class="nav-link">Faq</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/general/invoice.html" class="nav-link">Invoice</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/general/profile.html" class="nav-link">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/general/pricing.html" class="nav-link">Pricing</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/general/timeline.html" class="nav-link">Timeline</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item nav-category">Pages</li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#authPages" role="button" aria-expanded="false" aria-controls="authPages">
                            <i class="link-icon" data-feather="unlock"></i>
                            <span class="link-title">Admin History</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="authPages">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="{{ route('data.history') }}" class="nav-link">All Data Info</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/auth/register.html" class="nav-link">Register</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('roll.manage') }}">
                            <i class="link-icon" data-feather="cloud-off"></i>
                            <span class="link-title">Roll Meneger</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">Docs</li>
                    <li class="nav-item">
                        <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="nav-link">
                            <i class="link-icon" data-feather="hash"></i>
                            <span class="link-title">Documentation</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
            <!-- partial -->
            <div class="page-wrapper">       
                <!-- partial:../../partials/_navbar.html -->
                <nav class="navbar">
                    <a href="#" class="sidebar-toggler">
                        <i data-feather="menu"></i>
                    </a>
                    <div class="navbar-content">
                        <form class="search-form">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i data-feather="search"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="flag-icon flag-icon-us mt-1" title="us"></i> <span class="font-weight-medium ml-1 mr-1 d-none d-md-inline-block">English</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="languageDropdown">
                                    <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-us" title="us" id="us"></i> <span class="ml-1"> English </span></a>
                                    <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-fr" title="fr" id="fr"></i> <span class="ml-1"> French </span></a>
                                    <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-de" title="de" id="de"></i> <span class="ml-1"> German </span></a>
                                    <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-pt" title="pt" id="pt"></i> <span class="ml-1"> Portuguese </span></a>
                                    <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-es" title="es" id="es"></i> <span class="ml-1"> Spanish </span></a>
                                </div>
                            </li>
                            <li class="nav-item dropdown nav-apps">
                                <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i data-feather="grid"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="appsDropdown">
                                    <div class="dropdown-header d-flex align-items-center justify-content-between">
                                        <p class="mb-0 font-weight-medium">Web Apps</p>
                                        <a href="javascript:;" class="text-muted">Edit</a>
                                    </div>
                                    <div class="dropdown-body">
                                        <div class="d-flex align-items-center apps" style="flex-wrap: wrap; min-width:260px">
                                                <a href="{{ route('users.list') }}">
                                                    <i data-feather="users" class="icon-lg"></i><p>Users</p>
                                                </a>
                                                <a href="{{ route('subscriber') }}">
                                                    <i data-feather="alert-octagon" class="icon-lg"></i><p>Subscriber</p>
                                                </a>
                                                <a href="{{ route('shopping.cart') }}">
                                                    <i data-feather="shopping-cart" class="icon-lg"></i><p>Order</p>
                                                </a>
                                                <a href="{{ route('order.cancel.request') }}">
                                                    <i data-feather="alert-triangle" class="icon-lg"></i><p class="text-center">Cancel Order</p>
                                                </a>
                                                <a href="{{ route('orders') }}">
                                                    <i data-feather="shopping-bag" class="icon-lg"></i><p class="text-center">Customer Order</p>
                                                </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown nav-messages">
                                <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i data-feather="mail"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="messageDropdown">
                                    <div class="dropdown-header d-flex align-items-center justify-content-between">
                                        <p class="mb-0 font-weight-medium">9 New Messages</p>
                                        <a href="javascript:;" class="text-muted">Clear all</a>
                                    </div>
                                    <div class="dropdown-body">
                                        <a href="javascript:;" class="dropdown-item">
                                            <div class="figure">
                                                <img src="https://via.placeholder.com/30x30" alt="userr">
                                            </div>
                                            <div class="content">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p>Leonardo Payne</p>
                                                    <p class="sub-text text-muted">2 min ago</p>
                                                </div>	
                                                <p class="sub-text text-muted">Project status</p>
                                            </div>
                                        </a>
                                        <a href="javascript:;" class="dropdown-item">
                                            <div class="figure">
                                                <img src="https://via.placeholder.com/30x30" alt="userr">
                                            </div>
                                            <div class="content">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p>Carl Henson</p>
                                                    <p class="sub-text text-muted">30 min ago</p>
                                                </div>	
                                                <p class="sub-text text-muted">Client meeting</p>
                                            </div>
                                        </a>
                                        <a href="javascript:;" class="dropdown-item">
                                            <div class="figure">
                                                <img src="https://via.placeholder.com/30x30" alt="userr">
                                            </div>
                                            <div class="content">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p>Jensen Combs</p>												
                                                    <p class="sub-text text-muted">1 hrs ago</p>
                                                </div>	
                                                <p class="sub-text text-muted">Project updates</p>
                                            </div>
                                        </a>
                                        <a href="javascript:;" class="dropdown-item">
                                            <div class="figure">
                                                <img src="https://via.placeholder.com/30x30" alt="userr">
                                            </div>
                                            <div class="content">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p>Amiah Burton</p>
                                                    <p class="sub-text text-muted">2 hrs ago</p>
                                                </div>
                                                <p class="sub-text text-muted">Project deadline</p>
                                            </div>
                                        </a>
                                        <a href="javascript:;" class="dropdown-item">
                                            <div class="figure">
                                                <img src="https://via.placeholder.com/30x30" alt="userr">
                                            </div>
                                            <div class="content">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p>Yaretzi Mayo</p>
                                                    <p class="sub-text text-muted">5 hr ago</p>
                                                </div>
                                                <p class="sub-text text-muted">New record</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="dropdown-footer d-flex align-items-center justify-content-center">
                                        <a href="javascript:;">View all</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown nav-notifications">
                                <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i data-feather="bell"></i>
                                    <div class="indicator">
                                        <div class="circle"></div>
                                    </div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="notificationDropdown">
                                    <div class="dropdown-header d-flex align-items-center justify-content-between">
                                        <p class="mb-0 font-weight-medium">6 New Notifications</p>
                                        <a href="javascript:;" class="text-muted">Clear all</a>
                                    </div>
                                    <div class="dropdown-body">
                                        <a href="javascript:;" class="dropdown-item">
                                            <div class="icon">
                                                <i data-feather="user-plus"></i>
                                            </div>
                                            <div class="content">
                                                <p>New customer registered</p>
                                                <p class="sub-text text-muted">2 sec ago</p>
                                            </div>
                                        </a>
                                        <a href="javascript:;" class="dropdown-item">
                                            <div class="icon">
                                                <i data-feather="gift"></i>
                                            </div>
                                            <div class="content">
                                                <p>New Order Recieved</p>
                                                <p class="sub-text text-muted">30 min ago</p>
                                            </div>
                                        </a>
                                        <a href="javascript:;" class="dropdown-item">
                                            <div class="icon">
                                                <i data-feather="alert-circle"></i>
                                            </div>
                                            <div class="content">
                                                <p>Server Limit Reached!</p>
                                                <p class="sub-text text-muted">1 hrs ago</p>
                                            </div>
                                        </a>
                                        <a href="javascript:;" class="dropdown-item">
                                            <div class="icon">
                                                <i data-feather="layers"></i>
                                            </div>
                                            <div class="content">
                                                <p>Apps are ready for update</p>
                                                <p class="sub-text text-muted">5 hrs ago</p>
                                            </div>
                                        </a>
                                        <a href="javascript:;" class="dropdown-item">
                                            <div class="icon">
                                                <i data-feather="download"></i>
                                            </div>
                                            <div class="content">
                                                <p>Download completed</p>
                                                <p class="sub-text text-muted">6 hrs ago</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="dropdown-footer d-flex align-items-center justify-content-center">
                                        <a href="javascript:;">View all</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown nav-profile">
                                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if (Auth::user()->photo == null)
                                    <img src="{{ Avatar::create( Auth::user()->name )->toBase64() }}" />
                                    @else 
                                        <img src="{{ asset('uploads/user') }}/{{ Auth::user()->photo }}" alt=""> 
                                    @endif
                                </a>
                                <div class="dropdown-menu" aria-labelledby="profileDropdown">
                                    <div class="dropdown-header d-flex flex-column align-items-center">
                                        <div class="figure mb-3">
                                            @if (Auth::user()->photo == null)
                                                <img src="{{ Avatar::create( Auth::user()->name )->toBase64() }}" />
                                            @else 
                                                <img src="{{ asset('uploads/user') }}/{{ Auth::user()->photo }}" alt=""> 
                                            @endif
                                        </div>
                                        <div class="info text-center">
                                            <p class="name font-weight-bold mb-0">{{ Auth::user()->name }}</p>
                                            <p class="email text-muted mb-3">{{ Auth::user()->email }}</p>
                                        </div>
                                    </div>
                                    <div class="dropdown-body">
                                        <ul class="profile-nav p-0 pt-3">
                                            <li class="nav-item">
                                                <a href="{{ route('user.profile') }}" class="nav-link">
                                                    <i data-feather="user"></i>
                                                    <span>Profile</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <form action="{{ route('logout') }}" method="post">
                                                    @csrf
                                                    <a href="route('logout')" class="nav-link" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                                        <i data-feather="log-out"></i>
                                                        <span>Log Out</span>
                                                    </a>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- partial -->
                <div class="page-content">
                    @yield('content')
                </div>

                <!-- partial:../../partials/_footer.html -->
                <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <p class="text-muted text-center text-md-left">Copyright © {{ carbon\carbon::now()->format('Y') }} <a href="https://www.nobleui.com" target="_blank">TheMart</a>. All rights reserved</p>
                    <p class="text-muted text-center text-md-left mb-0 d-none d-md-block">Handcrafted With <i class="mb-1 text-primary ml-1 icon-small" data-feather="heart"></i></p>
                </footer>
                <!-- partial -->
            </div>
        </div>

        <!-- core:js -->
        <script src="{{ asset('backend') }}/vendors/core/core.js"></script>
        <script src="{{ asset('backend') }}/vendors/datatables.net/jquery.dataTables.js"></script>
        <script src="{{ asset('backend') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
        <script src="{{ asset('backend') }}/vendors/feather-icons/feather.min.js"></script>
        <script src="{{ asset('backend') }}/js/template.js"></script>
        <script src="{{ asset('backend') }}/js/data-table.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="crossorigin="anonymous"referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        <!-- end custom js for this page -->
        @yield('footer_script')
    </body>
</html>