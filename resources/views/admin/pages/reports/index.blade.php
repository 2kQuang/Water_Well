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
        <div id="mixed-chart"></div>
      </div>
    </div>
  </div>
</div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
  // Dữ liệu báo cáo từ Laravel
  document.addEventListener('DOMContentLoaded', function () {
    const reports = @json($reports);

    const options = {
      chart: {
        height: 350,
        type: 'line',
      },
      series: [
        {
          name: 'Mức độ nước',
          type: 'column',
          data: reports.map(report => report.water_level)
        },
        {
          name: 'Số lượng nước',
          type: 'line',
          data: reports.map(report => report.water_quality)
        },
        {
          name: 'Nước sử dụng',
          type: 'column',
          data: reports.map(report => report.water_usage)
        }
      ],
      xaxis: {
        categories: reports.map(report => report.month),
      },
      yaxis: [
        {
          title: {
            text: 'Mức độ nước và lượng sử dụng'
          },
        },
        {
          title: {
            text: 'Số lượng nước'
          },
          opposite: true
        }
      ],
    };

    // Kiểm tra phần tử trước khi vẽ
    const chartElement = document.querySelector("#mixed-chart");
    if (chartElement) {
      const chart = new ApexCharts(chartElement, options);
      chart.render();
    } else {
      console.error("Element not found");
    }
  });
</script>