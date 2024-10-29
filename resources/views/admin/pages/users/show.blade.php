@extends('admin.master')
@section('content')
<div class="card-heading py-3">
  <div class="container">
    <div class="heading-title text-white text-center mx-auto mb-3">
      {{$title}}
    </div>
    <div class="heading-detail text-white text-center mb-3">
      {{$details}}
    </div>
  </div>
</div>
<div class="card-content pb-3">
  <div class="container-fluid mx-0 ps-0">
    <div class="row">
      <div class="col-lg-2">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark js-height-fix">
          <a href="{{ route('admin.dashboard') }}"
            class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32">
              <use xlink:href="#bootstrap"></use>
            </svg>
            <span class="fs-4">Dashboard</span>
          </a>
          <hr>
          <ul class="nav nav-pills flex-column mb-auto">
            <li>
              <a href="{{ route('admin.wells.index') }}" class="nav-link text-white">
                Giám sát chất lượng nước
              </a>
            </li>
            <li>
              <a href="{{ route('admin.reports.index') }}" class="nav-link text-white">
                Báo cáo thống kê
              </a>
            </li>
            <li>
              <a href="{{ route('admin.users.index') }}" class="nav-link text-white">
                Thông tin người dùng
              </a>
            </li>
          </ul>
          <hr>
          <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
              id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
              <strong>mdo</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
              <li><a class="dropdown-item" href="#">New project...</a></li>
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-10 pt-2">
        <div class="content-show bg-white rounded p-3">
          <div class="card-content p-2">
            <div class="d-flex align-items-end flex-wrap gap-2 mb-2">
              <div class="h4">Tên : </div>
              <div class="h5 text-danger">{{$user->name}}</div>
            </div>
            <div class="d-flex align-items-end flex-wrap gap-2 mb-2">
              <div class="h4">Email : </div>
              <div class="h5 text-danger">{{$user->email}}</div>
            </div>
            <div class="d-flex align-items-end flex-wrap gap-2 mb-2">
              <div class="h4">Username : </div>
              <div class="h5 text-danger">{{$user->username}}</div>
            </div>
            <div class="d-flex align-items-end flex-wrap gap-2 mb-2">
              <div class="h4">Vai trò : </div>
              <div class="h5 text-danger">{{$user->role}}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection