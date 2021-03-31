<div class="row statistic-cards">
    <div class="col-md-3">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{ $university }}</h3>

                <p>University</p>
            </div>

            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>

            <!-- <a href="#" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a> -->
        </div>
    </div>
    <div class="col-md-3">
        <div class="small-box bg-yellow">
        <div class="inner">
          <h3>NaN</h3>

          <p>Student</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
      </div>
    </div>
    <div class="col-md-3">
        <div class="small-box bg-red">
        <div class="inner">
          <h3>NaN</h3>

          <p>Parent</p>
        </div>
        <div class="icon">
          <i class="ion ion-ios-people-outline"></i>
        </div>
      </div>
    </div>
    <div class="col-md-3">
        <div class="small-box bg-green">
        <div class="inner">
          <h3>{{ $vendor }}</h3>

          <p>Vendor</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
      </div>
    </div>
</div>

<div class="row statistic-cards">
    <div class="col-md-12">
        <div class="box">
          <div class="box-body">
            <canvas id="myChart" style="height: 190px; width: 510px;" height="190" width="510"></canvas>
          </div>
        </div>
    </div>
</div>

<script>
  var dataSet = []
  var dataSetLebel = []
  var dataSetTotal = []
  var dataSetBgC = []
  var d = new Date();
  var ctx = document.getElementById('myChart').getContext('2d');
  var year =  d.getFullYear()
  $.get(apiUrl+'getDataDashboardPenjualan', function(res){
    dataSet = JSON.parse(res).penjualan
    dataSet.forEach(function(row){
      dataSetLebel.push(row.bulan)
      dataSetTotal.push(row.total)
      dataSetBgC.push('rgba(0, 192, 239, 0.5)')
    })

    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: dataSetLebel,
          datasets: [{
              label: 'Students',
              data: dataSetTotal,
              backgroundColor: dataSetBgC,
          }]
      },
      options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
        title: {
          display: true,
          text: "Statistic data in "+year
        }
      }
    });
  })
</script>
