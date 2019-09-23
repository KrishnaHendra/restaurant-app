@include('partials.navbar')
@include('partials.sidebar')

<div class="content-wrapper">
<div class="container">
    <p></p>
    <h3 class="box-title">My Profile </h3>
<div class="col-md-7">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username"><b>{{ Auth::user()->name }}</b></h3>
              <h5 class="widget-user-desc">Administrator</h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="{{ asset('admin/dist/img/user2-160x160.png')}}" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-6 border-right">
                  <div class="description-block">
                    <h5 class="description-header">Member Since</h5>
                    <span class="description-text">{{ Auth::user()->created_at }}</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-6 border-right">
                  <div class="description-block">
                    <h5 class="description-header">Email</h5>
                    <span class=>{{ Auth::user()->email }}</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
               
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>

</div>
</div>

@include('partials.script')