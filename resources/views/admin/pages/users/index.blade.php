@extends('admin.master')
@section('content')
    @if (session('success'))
        <div id="success-alert" class="alert alert-success position-fixed top-0 end-0 m-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card-heading py-3">
        <div class="container">
            <div class="heading-title text-white text-center mx-auto mb-3">
                {{ $title }}
            </div>
            <div class="heading-detail text-white text-center mb-3">
                {{ $details }}
            </div>
        </div>
    </div>
    <div class="card-content">
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
                            <a href="#"
                                class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                                id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                                    class="rounded-circle me-2">
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
                    <div class="button-action mb-3">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-outline-light">Thêm mới</a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="bg-dark text-white" scope="col">#</th>
                                <th class="bg-dark text-white" scope="col">Tên</th>
                                <th class="bg-dark text-white" scope="col">Username</th>
                                <th class="bg-dark text-white" scope="col">Email</th>
                                <th class="bg-dark text-white" scope="col">Quyền</th>
                                <th class="bg-dark text-white" scope="col">Thời gian tạo</th>
                                <th class="bg-dark text-white" colspan="3" scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td><a href="{{ route('admin.users.show', $user->id) }}"
                                            class="btn btn-outline-success"><i class="fa-solid fa-circle-info"></i></a></td>
                                    <td><a href="{{ route('admin.users.edit', $user->id) }}"
                                            class="btn btn-outline-success"><i class="fa-solid fa-pen"></i></a></td>
                                    <td>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE') <!-- Create phương thức DELETE -->
                                            <button class="btn btn-outline-danger" type="submit"
                                                style=" cursor: pointer;"><i class="fa-solid fa-trash-can"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
