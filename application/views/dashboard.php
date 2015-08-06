<div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner" id="userCount">
            <h3>10</h3>
            <p>Total Applicants</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer" id="refreshUser">Refresh <i class="fa fa-refresh"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
        <div class="inner" id="categoryCount">
        <h3>15</h3>
        <p>Mining Plans</p>
      </div>
      <div class="icon">
        <i class="ion ion-android-print"></i>
      </div>
      <a href="#" class="small-box-footer" id="refreshCategory">Refresh <i class="fa fa-refresh"></i></a>
    </div>
  </div><!-- ./col -->

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
      <div class="small-box bg-green">
          <div class="inner" id="dealCount">
            <h3>25</h3>
            <p>Environment Clearances</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-partlysunny"></i>
          </div>
          <a href="#" class="small-box-footer" id="refreshDeals">Refresh <i class="fa fa-refresh"></i></a>
      </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
        <div class="inner" id="vendorCount">
        <h3>50</h3>
        <p>Surveys</p>
      </div>
      <div class="icon">
        <i class="ion ion-location"></i>
      </div>
        <a href="#" class="small-box-footer" id="refreshVendor">Refresh <i class="fa fa-refresh"></i></a>
    </div>
  </div><!-- ./col -->
</div>
<div class="row">
    <div class="col-lg-6 col-xs-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <i class="fa fa-bar-chart-o"></i>
          <h3 class="box-title">District Coverage</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <!--button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button-->
          </div>
        </div>
        <div class="box-body">
          <div id="donut-chart" style="height: 300px;"></div>
        </div><!-- /.box-body-->
      </div><!-- /.box -->
    </div>
    <div class="col-lg-6 col-xs-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <i class="fa fa-bar-chart-o"></i>
          <h3 class="box-title">Last 6 Month Status</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <!--button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button-->
          </div>
        </div>
        <div class="box-body">
          <div id="month-chart" style="height: 300px;"></div>
        </div><!-- /.box-body-->
      </div><!-- /.box -->
    </div>
</div>
  <!-- content -->