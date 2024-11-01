@extends('admin.master')
@section('content')
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
                    @include('admin.pages._sidebar')
                </div>
                <div class="col-lg-10 pt-2">
                    <div class="button-action mb-3">
                        <a href="{{ route('admin.water_quality.create') }}" class="btn btn-outline-light">Thêm mới</a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="bg-dark text-white" scope="col">#</th>
                                <th class="bg-dark text-white" scope="col">Tên nguồn nước</th>
                                <th class="bg-dark text-white" scope="col">Mức độ pH</th>
                                <th class="bg-dark text-white" scope="col">Tổng chất rắn hòa tan </th>
                                <th class="bg-dark text-white" scope="col">Loại chất gây ô nhiễm</th>
                                <th class="bg-dark text-white" scope="col">Thời gian đo lường</th>
                                <th class="bg-dark text-white" colspan="2" scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $key => $item)
                                <tr>
                                    <th scope="row">{!! $key + 1 !!}</th>
                                    <td>{!! $item->name !!}</td>
                                    <td>{!! $item->ph_level !!}</td>
                                    <td>{!! $item->tds !!}</td>
                                    <td>{!! $item->contamination !!}</td>
                                    <td>{!! $item->measured_at !!}</td>
                                    <td><a href="{{ route('admin.water_quality.edit', $item->id) }}"
                                            class="btn btn-outline-success"><i class="fa-solid fa-pen"></i></a></td>
                                    <td>
                                        <form action="{{ route('admin.water_quality.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE') 
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
