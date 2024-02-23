@extends('navbar.navbar')
@section('content')
<div id="main" class='layout-navbar'>
    <header class='mb-3'>
        <nav class="navbar navbar-expand navbar-light navbar-top">
            <div class="container-fluid">
                <a href="#" class="burger-btn d-block">
                    <i class="bi bi-justify fs-3"></i>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-lg-0">
                        <li class="nav-item dropdown me-1">
                            <a class="nav-link active dropdown-toggle text-gray-600" href="#" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class='bi bi-envelope bi-sub fs-4'></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <h6 class="dropdown-header">Mail</h6>
                                </li>
                                <li><a class="dropdown-item" href="#">No new mail</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown me-3">
                            <a class="nav-link active dropdown-toggle text-gray-600" href="#" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                <i class='bi bi-bell bi-sub fs-4'></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end notification-dropdown" aria-labelledby="dropdownMenuButton">
                                <li class="dropdown-header">
                                    <h6>Notifications</h6>
                                </li>
                                <li class="dropdown-item notification-item">
                                    <a class="d-flex align-items-center" href="#">
                                        <div class="notification-icon bg-primary">
                                            <i class="bi bi-cart-check"></i>
                                        </div>
                                        <div class="notification-text ms-4">
                                            <p class="notification-title font-bold">Successfully check out</p>
                                            <p class="notification-subtitle font-thin text-sm">Order ID #256</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-item notification-item">
                                    <a class="d-flex align-items-center" href="#">
                                        <div class="notification-icon bg-success">
                                            <i class="bi bi-file-earmark-check"></i>
                                        </div>
                                        <div class="notification-text ms-4">
                                            <p class="notification-title font-bold">Homework submitted</p>
                                            <p class="notification-subtitle font-thin text-sm">Algebra math homework</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <p class="text-center py-2 mb-0"><a href="#">See all notification</a></p>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="dropdown">
                        <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="user-menu d-flex">
                                <div class="user-name text-end me-3">
                                    <h6 class="mb-0 text-gray-600">Yang Mulia Fadli</h6>
                                    <p class="mb-0 text-sm text-gray-600">Administrator</p>
                                </div>
                                <div class="user-img d-flex align-items-center">
                                    <div class="avatar avatar-md">
                                        <img src="{{asset('img/profil1.jpg')}}">
                                    </div>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                            <li>
                                <h6 class="dropdown-header">Hello, John!</h6>
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                    Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                    Settings</a></li>
                            <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>
                                    Wallet</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#"><i
                                        class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div id="main-content">
        
<div class="page-heading">
<div class="page-title">
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Employee Data</h3>
        <p class="text-subtitle text-muted">This is page of Employee.</p>
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Employees</li>
                <li class="breadcrumb-item active" aria-current="page">Employee Data</li>
            </ol>
        </nav>
    </div>
</div>
</div>
<section class="section">
<div class="card">
    <div class="card-header">
        <button type="submit" class="btn btn-info btn-lg" title="Info Employee"><i class="bi bi-person-bounding-box"></i> </button>             
        <button type="submit" class="btn btn-primary btn-lg" title="Add New Employee"><i class="bi bi-person-plus"></i> </button>             
        <button type="submit" class="btn btn-success btn-lg" title="Import Employee"><i class="bi bi-file-earmark-excel"></i> </button>             
        <button type="submit" class="btn btn-warning btn-lg" title="Edit Employee"><i class="bi bi-arrow-up-square"></i> </button>             
        <button type="submit" class="btn btn-danger btn-lg" title="Delete Employee"><i class="bi bi-person-x"></i> </button>             
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th>NIK</th>
                        <th>Name</th>
                        <th>Dept</th>
                        <th>Section</th>
                        <th>Hire Date</th>
                        <th>Birth Date</th>
                        <th>Golongan</th>
                        <th>Religion</th>
                        <th>Education</th>
                        <th>Blood Type</th>
                        <th>Email</th>
                        <th>Status Employee</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
</section>
<script type="text/javascript">
    $(document).ready(function(){
        var datatable = $('#table1').DataTable({
            processing: true,
            serverSide: true,
            select:true,
            responsive: true,
            ajax: '{{route('employee')}}',
            columns:[
                {
                    data: 'eid',
                    name: 'eid',
                    render: function(data,type,row,meta){
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                { data: 'nik', name: 'nik'},
                { data: 'name', name: 'name'},
                { data: 'departement', name: 'departement'},
                { data: 'section', name: 'section'},
                { data: 'hire_date', name: 'hire_date'},
                { data: 'birth_date', name: 'birth_date'},
                { data: 'golongan', name: 'golongan'},
                { data: 'religion', name: 'religion'},
                { data: 'education', name: 'education'},
                { data: 'blood_type', name: 'blood_type'},
                { data: 'email', name: 'email'},
                { data: 'emp_status', name: 'emp_status'},
                { data: 'salary', name: 'salary'},
            ],
            dom: 'Blfrtip',
            buttons: ['copy','excel','csv','print','pdf','colvis'],
        })
    });
</script>    
@endsection