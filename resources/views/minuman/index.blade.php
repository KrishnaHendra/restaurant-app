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
              <h3 class="box-title"><b>Data Minuman</b> </h3>

              <!-- <div class="box-tools">
              <form action="/masakan/cari" method="GET">
                <input type="text" name="cari" placeholder="Cari Berdasar Kategori" value="{{ old('cari') }}">
                <button type="submit"><i class="fa fa-search"></i></button>
              </form>
              </div> -->

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
                <tr style="background-color:#00a65a;">
                  <th>ID</th>
                  <th>Minuman</th>
                  <th>Harga</th>
                  <th>status</th>
                  <th class="text-center">Action</th>
                </tr>
                <?php  $no=0; ?>
                <?php foreach($minuman as $m): $no++; ?>
                <tr>
                  <td>{{ $no }}</td>
                  <td>{{ $m->minuman }}</td>
                  <td>{{ $m->harga }}</td>
                  <td><?= $m->status ?></td>
                  <td class="text-center">
                  <!-- <a href="{{$m->id_minuman}}" data-target="#modal_edit{{$m->id_minuman}}" data-toggle="modal" class="btn-sm btn-info"><i class="fa fa-fw fa-edit"></i> Edit</a> -->
                  <a href="/minuman/hapus/{{ $m->id_minuman }}" class="btn-sm btn-danger" onClick="return confirm('Anda yakin?')"><i class="fa fa-fw fa-trash"></i> Hapus</a></td>
                </tr>
                <?php endforeach ?>
              </table>
            </div>
            <!-- /.box-body -->

            <!-- /.box-body -->
            <div class="dataTables_paginate paging_simple_numbers " id="example2_paginate">            
            {{ $minuman->links() }}
            </div>
            
          
          </div>
          <!-- /.box -->
          <a href="" class="btn btn-success btn-block" data-toggle="modal" data-target="#exampleModal"><i class="fa  fa-search-plus"></i> Tambah Data Minuman</a>
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
       <form action="/minuman/store" method="post">
            {{ csrf_field() }}
             <i class="fa fa-user btn btn-success btn-sm btn-block"> Minuman</i>
             <input type="text" name="nama" class="form-control text-center" placeholder="Nama Minuman" required><br>
             <i class="fa fa-user btn btn-success btn-sm btn-block"> Harga</i>
             <input type="number" name="harga" class="form-control text-center" placeholder="Harga" required><br>
             <i class="fa fa-map-o btn btn-success btn-sm btn-block"> Status</i>
             <select class="form-control" name="status">
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

@include('partials.script')