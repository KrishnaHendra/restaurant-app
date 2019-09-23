<!-- NAVBAR -->
@include('partials.navbar')
<!-- xxx -->

<!-- SIDEBAR -->
@include('partials.sidebar')
<!--  -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- tabel -->
<div class="container">
<section>
    <br>
    <div class="row">
        <div class="col-xs-11 pt-2 pr-5 mr-5">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><b>Data Pelanggan</b> </h3>

              <div class="box-tools">
              <form action="/pelanggan/cari" method="GET">
                <input type="text" name="cari" placeholder="Cari Berdasar Nama" value="{{ old('cari') }}">
                <button type="submit"><i class="fa fa-search"></i></button>
              </form>
              </div>

            </div>
            <!-- /.box-header -->
            
            <!-- SESSION FLASHDATA -->
            @if (session('notifadd'))
            <div class="row">
            <div class="col-xs-6 pt-2">  
            <div class="alert alert-success alert-dismissible ml-5">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fa fa-check"></i>{{ session('notifadd') }}
            </div>
            </div>
            </div>
            @endif

            @if (session('notifdelete'))
            <div class="row">
            <div class="col-xs-6 pt-2">  
            <div class="alert alert-danger alert-dismissible ml-5">
                <button type="button" class="close " data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fa fa-check"></i>{{ session('notifdelete') }}
            </div>
            </div>
            </div>
            @endif

            @if (session('notifedit'))
            <div class="row">
            <div class="col-xs-6 pt-2">  
            <div class="alert alert-info alert-dismissible ml-5">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fa fa-check"></i>{{ session('notifedit') }}
            </div>
            </div>
            </div>
            @endif

            <!-- AKHIR SESSION FLASH -->


            <div class="box-body table-responsive no-padding"> 
              <table class="table table-hover">
              <!-- style="background-color:#ffa84a;" -->
                <tr style="background-color:#f39c12;">
                  <th>ID</th>
                  <th>Nama Pelanggan</th>
                  <th>Alamat</th>
                  <th class="text-center">Nomor</th>
                  <th class="text-center">Action</th>
                </tr>
                <?php  $no=0; ?>
                <?php foreach($pelanggan as $p): $no++; ?>
                <tr>
                  <td>{{ $no }}</td>
                  <td>{{ $p->nama }}</td>
                  <td>{{ $p->alamat }}</td>
                  <td class="text-center"><span class="label label-default">{{ $p->no_hp }}</span></td>
                  <td class="text-center"><a href="{{$p->id_pelanggan}}" data-target="#modal_edit{{$p->id_pelanggan}}" data-toggle="modal" class="btn-sm btn-info"><i class="fa fa-fw fa-edit"></i> Edit</a>  |
                  <a href="/pelanggan/hapus/{{ $p->id_pelanggan }}" class="btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus?')"><i class="fa fa-fw fa-trash"></i> Hapus</a></td>
                </tr>
                <?php endforeach ?>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="dataTables_paginate paging_simple_numbers " id="example2_paginate">            
            {{ $pelanggan->links() }}
            </div>

          </div>
          <!-- /.box -->
          <a href="" class="btn btn-warning btn-block" data-toggle="modal" data-target="#exampleModal"><i class="fa  fa-search-plus"></i> Tambah Data Pelanggan</a>
        </div>
      </div>

    <!-- TUTU -->
    </section>
  </div>
  </div>
  <!-- /.content-wrapper -->

<!-- ./wrapper -->


<!-- MODAL TAMBAH -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </h5>

      </div>
      <div class="modal-body">
       <form action="/pelanggan/store" method="post">
            {{ csrf_field() }}
             <i class="fa fa-user btn btn-warning btn-sm btn-block"> Nama</i>
             <input type="text" name="nama" class="form-control text-center" placeholder="Nama Pelanggan" required><br>
             <i class="fa fa-map-o btn btn-warning btn-sm btn-block"> Alamat</i>
             <input type="text" name="alamat" class="form-control text-center" placeholder="Alamat" required><br>
             <i class="fa fa-phone btn btn-warning btn-sm btn-block"> Nomor HP</i>
             <input type="number" name="nomor" class="form-control text-center" placeholder="Nomor HP" required><br>

       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
       </form>
      </div>

    </div>
  </div>
</div>
<!-- TUTUP TAMBAH -->



<!-- MODAL EDIT -->
<div class="modal fade" id="modal_edit{{$p->id_pelanggan}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalEdit" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Pelanggan
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </h5>

      </div>
      <div class="modal-body">
       <form action="/pelanggan/update" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $p->id_pelanggan }}">
             <i class="fa fa-user btn btn-info btn-sm btn-block"> Nama</i>
             <input type="text" name="nama" class="form-control text-center" placeholder="Nama Pelanggan" value="{{$p->nama}}" required><br>
             <i class="fa fa-map-o btn btn-info btn-sm btn-block"> Alamat</i>
             <input type="text" name="alamat" class="form-control text-center" placeholder="Alamat" value="{{$p->alamat}}" required><br>
             <i class="fa fa-phone btn btn-info btn-sm btn-block"> Nomor HP</i>
             <input type="number" name="nomor" class="form-control text-center" placeholder="Nomor HP" value="{{$p->no_hp}}" required><br>

       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
       </form>
      </div>

    </div>
  </div>
</div>
<!-- TUTUP EDIT -->

<!-- jQuery 3 -->
<script src="{{ asset('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap  -->
<script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- SlimScroll -->
<script src="{{ asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('admin/bower_components/chart.js/Chart.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('admin/dist/js/pages/dashboard2.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/dist/js/demo.js')}}"></script>
</body>
</html>
