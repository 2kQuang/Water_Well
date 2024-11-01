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
    <div class="card-content pb-3">
        <div class="container-fluid mx-0 ps-0">
            <div class="row">
                <div class="col-lg-2">
                    @include('admin.pages._sidebar')
                </div>
                <div class="col-lg-10 pt-2">
                    <form class="p-4 bg-dark text-white rounded" action="{{ route('admin.wells.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên</label>
                            <input type="text" class="form-control" id="name" name="name"
                                aria-describedby="emailHelp" placeholder="Tên">
                        </div>
                        <div class="mb-3">
                            <label for="depth" class="form-label">Độ sâu giếng</label>
                            <input type="text" class="form-control" name="depth" id="depth"
                                placeholder="Độ sâu giếng (m)">
                        </div>
                        <div class="mb-3">
                            <label for="water_level" class="form-label">Mức nước</label>
                            <input type="text" class="form-control" name="water_level" id="water_level"
                                placeholder="Mức nước (m)">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Trạng thái</label>
                            <select id="status" class="form-select" name="status">
                                <option value="Đang hoạt động">Đang hoạt động</option>
                                <option value="Không hoạt động">Không hoạt động</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Vị trí</label>
                            <textarea class="form-control" name="location" id="location" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
