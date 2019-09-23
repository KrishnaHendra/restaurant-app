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
                <input type="text" name="cari" placeholder="Cari Berdasar Kategori" value="{{ old('cari') }}">
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
                <tr style="background-color:#00c0ef;">
                  <th>ID</th>
                  <th>Masakan</th>
                  <th>Harga</th>
                  <th>Kategori</th>
                  <th>status</th>
                  
                  <th class="text-center">Action</th>
                </tr>
                <?php  $no=0; ?>
                <?php foreach($masakan as $m): $no++; ?>
                <tr>
                  <td>{{ $no }}</td>
                  <td>{{ $m->masakan }}</td>
                  <td>{{ $m->harga }}</td>
                  <td>{{ $m->kategori }}</td>
                  <td><?= $m->status ?></td>
                  <td class="text-center"><a href="{{$m->id_masakan}}" data-target="#modal_edit{{$m->id_masakan}}" data-toggle="modal" class="btn-sm btn-info"><i class="fa fa-fw fa-edit"></i> Edit</a>  |
                  <a href="" class="btn-sm btn-danger" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-fw fa-trash"></i> Hapus</a></td>
                </tr>
                <?php endforeach ?>
              </table>
            </div>
            <!-- /.box-body -->

            <!-- /.box-body -->
            <div class="dataTables_paginate paging_simple_numbers " id="example2_paginate">            
            {{ $masakan->links() }}
            </div>
            
          
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
             <i class="fa fa-user btn btn-info btn-sm btn-block"> Harga</i>
             <input type="number" name="harga" class="form-control text-center" placeholder="Harga Masakan" required><br>
             <i class="fa fa-map-o btn btn-info btn-sm btn-block"> Kategori</i>
             <select class="form-control" name="kategori">
                <option value=""><b>PILIH KATEGORI</b></option>
                <option value="Roti">Roti</option>
                <option value="Nasi">Nasi</option>
                <option value="Mie">Mie</option>
             </select><br>
             <!-- <input type="text" name="kategori" class="form-control text-center" placeholder="Nasi, Roti, atau Mie.." required><br> -->
             <i class="fa fa-map-o btn btn-info btn-sm btn-block"> Status</i>
             <select class="form-control" name="id_status">
                <option value=""><b>PILIH STATUS</b></option>
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


<!-- MODAL EDIT -->
<div class="modal fade" id="modal_edit{{$m->id_masakan}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalEdit" aria-hidden="true">
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
       <form action="/masakan/update" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $m->id_masakan }}">
             <i class="fa fa-user btn btn-info btn-sm btn-block"> Masakan</i>
             <input type="text" name="masakan" class="form-control text-center" placeholder="Nama Masakan" value="{{$m->masakan}}" required><br>
             <i class="fa fa-user btn btn-info btn-sm btn-block"> Harga</i>
             <input type="number" name="harga" class="form-control text-center" placeholder="Harga Masakan" value="{{$m->harga}}" required><br>
             <i class="fa fa-map-o btn btn-info btn-sm btn-block"> Kategori</i>
             <select class="form-control" name="kategori">
             
                <option value="{{$m->kategori}}">{{ $m->kategori }}</option>
             
             </select><br>
             <i class="fa fa-phone btn btn-info btn-sm btn-block"> Status</i>
              <select name="status" class="form-control text-center">
              <?php foreach($masakan as $m): ?>
              <option name="status"  value="{{$m->id_status}}">{{ $m->status }}</option>
              <?php endforeach ?>
              </select>
             

             <!-- <input type="text" name="status" class="form-control text-center" placeholder="Nomor HP" value="{{$m->id_status}}" required><br> -->

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

<!-- HAPUS -->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Anda Yakin Ingin Menghapus Data Masakan?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="/masakan/hapus/{{ $m->id_masakan }}"><button type="button" class="btn btn-primary">Hapus</button></a>
      </div>
    </div>
  </div>
</div>
@include('partials.script')