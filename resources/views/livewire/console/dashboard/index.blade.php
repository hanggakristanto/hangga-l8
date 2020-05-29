@section('title')
Dashboard &mdash; {{ $setting->admin_title }}
@endsection

<div class="row justify-content-center">
   <div class="col-md-6 mb-5">
       <div class="card border-0 shadow-sm rounded-lg">
           <div class="card-header">
               <i class="fa fa-chart-pie"></i> STATISTIC ORDERS THIS MONTH
           </div>
           <div class="card-body">
               <div class="row text-center">
                   <div class="col-md-3">
                    <label style="color: red"><i class="fa fa-circle-notch fa-spin"></i> Pending</label>
                    <hr>
                        <h3 class="font-weight-bold text-center">1</h3>
                   </div>
                   <div class="col-md-3">
                    <label style="color: blue"><i class="fa fa-hourglass-start"></i> Progress</label>
                    <hr>
                        <h3 class="font-weight-bold text-center">3</h3>
                   </div>
                   <div class="col-md-3">
                    <label style="color: purple"><i class="fa fa-truck"></i> Shipping</label>
                    <hr>
                        <h3 class="font-weight-bold text-center">6</h3>
                   </div>
                   <div class="col-md-3">
                    <label style="color: green"><i class="fa fa-check-circle"></i> Completed</label>
                    <hr>
                        <h3 class="font-weight-bold text-center">10</h3>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <div class="col-md-6 mb-5">
      <div class="card border-0 shadow-sm rounded-lg">
          <div class="card-header">
              <i class="fa fa-dollar-sign"></i> INFORMATION INCOME
          </div>
          <div class="card-body">
             <div class="row">
                 <div class="col-md-6">
                    <label>INCOME THIS MONTH</label>
                    <hr>
                        <h3 class="font-weight-bold">Rp. 850.000</h3>
                 </div>
                 <div class="col-md-6">
                    <label>ALL INCOME</label>
                    <hr>
                        <h3 class="font-weight-bold">Rp. 6000.000</h3>
                </div>
             </div>
          </div>
      </div>
  </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card border-0 shadow-sm rounded-lg">
            <div class="card-header">
                <i class="fa fa-chart-line"></i> STATISTIK ORDERS THIS YEAR
            </div>
            <div class="card-body">
            </div>
        </div>
    </div>
</div>