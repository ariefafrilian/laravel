@extends('layouts.master')

@section('title', 'Home')

@section('home', 'active')

@section('content-title', 'Dashboard')

@section('content')
   		<!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $transactions }}</h3>
                <p>Transaction</p>
              </div>
              <div class="icon">
                <i class="ion ion-clipboard"></i>
              </div>
              <a href="{{ url('transaction') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $inventories }}</h3>
                <p>Inventories</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-box"></i>
              </div>
              <a href="javascript:void(0);" class="small-box-footer" style="cursor: not-allowed;"><i class="fas fa-eye-slash"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $customers }}</h3>
                <p>Customers</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="javascript:void(0);" class="small-box-footer" style="cursor: not-allowed;"><i class="fas fa-eye-slash"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $gifts }}</h3>
                <p>Gifts</p>
              </div>
              <div class="icon">
                <i class="ion ion-trophy"></i>
              </div>
              <a href="javascript:void(0);" class="small-box-footer" style="cursor: not-allowed;"><i class="fas fa-eye-slash"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

        <div class="row">
        	<div class="col-12">
        		<div class="card">
              <div class="card-body">
                <canvas id="myChart"></canvas>
              </div>
            </div>
        	</div>
        </div>
@endsection

@push('scripts')
<script>
  $(document).ready(function () {
    var ctx = $("#myChart");
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: [{
        label: '# The sale',
        data: [10, 20, 50, 35, 60, 22],
        backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
  });
</script>
@endpush