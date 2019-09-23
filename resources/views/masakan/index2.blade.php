@include('partials.navbar')
@include('partials.sidebar')

<div class="content-wrapper">
<div class="container">

<section>
    <br>
    <div class="row">
        <div class="col-xs-11 pt-2 pr-5 mr-5">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><b>Data Pelanggan</b> </h3>

              <div class="box-tools">
              <form action="/masakan/cari" method="GET">
                <input type="text" name="cari" placeholder="Cari ..." value="{{ old('cari') }}">
                <input type="submit" value="CARI">
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
                <tr style="background-color:#00c0ef;">
                  <th>ID</th>
                  <th>Masakan</th>
                  <th>Kategori</th>
                  <th>status</th>
                  
                  <th class="text-center">Action</th>
                </tr>
                <?php  $no=0; ?>
                <?php foreach($masakan as $m): $no++; ?>
                <tr>
                  <td>{{ $no }}</td>
                  <td>{{ $m->masakan }}</td>
                  <td>{{ $m->kategori }}</td>
                  <td>{{ $m->status }}</td>
                  <td class="text-center"><a href="" class="btn-sm btn-info"><i class="fa fa-fw fa-edit"></i> Edit</a>  |
                  <a href="/masakan/hapus/{{ $m->id_masakan }}" class="btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus?')"><i class="fa fa-fw fa-trash"></i> Hapus</a></td>
                </tr>
                <?php endforeach ?>
              </table>
            </div>
            <!-- /.box-body -->
            

          </div>
          <!-- /.box -->
          <a href="" class="btn btn-info btn-block" data-toggle="modal" data-target="#exampleModal"><i class="fa  fa-search-plus"></i> Tambah Data Masakan</a>
        </div>
      </div>

    <!-- TUTU -->
    </section>
  </div>
  </div>


<!-- MODAL TAMBAH -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Masakan
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </h5>

      </div>
      <div class="modal-body">
       <form action="/masakan/store" method="post">
            {{ csrf_field() }}
             <i class="fa fa-user btn btn-info btn-sm btn-block"> Masakan</i>
             <input type="text" name="masakan" class="form-control text-center" placeholder="Nama Masakan" required><br>
             <i class="fa fa-map-o btn btn-info btn-sm btn-block"> Kategori</i>
             <input type="text" name="kategori" class="form-control text-center" placeholder="Kategori" required><br>
             <i class="fa fa-map-o btn btn-info btn-sm btn-block"> Status</i>
             <select class="form-control" name="id_status">
                <option value="">PILIH</option>
                <option value="1">Tersedia</option>
                <option value="2">Habis</option>
             </select><br>
             

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

@include('partials.script')