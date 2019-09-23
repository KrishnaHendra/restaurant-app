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
              <h5>Order Masuk</h5>

              <!-- <div class="box-tools">
              <form action="/masakan/cari" method="GET">
                <input type="text" name="cari" placeholder="Cari Berdasar Kategori" value="{{ old('cari') }}">
                <button type="submit"><i class="fa fa-search"></i></button>
              </form>
              </div> -->

            </div>
            <!-- /.box-header -->
            
            <!-- SESSION FLASHDATA -->
            

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

            <!-- AKHIR SESSION FLASH -->


            <div class="box-body table-responsive no-padding"> 
              <table class="table table-bordered mb-2 ml-2 mr-2">
              <!-- style="background-color:#ffa84a;" -->
                <tr style="background-color:#ff87fb">
                  <th>#</th>
                  <th>Menu</th>
                  <th>Jumlah</th>
                  <th>Nomor Meja</th>
                  <th>Total</th>
                  <!-- <th class="text-center">Action</th> -->
                </tr>
                <?php  $no=0; ?>
                <?php foreach($pesan as $p): $no++; ?>
                <?php $total=(($p->jumlah)*($p->harga));
                
                ?>
                <tr>
                  <td>{{ $no }}</td>
                  <td>{{ $p->masakan }}</td>
                  <td>{{ $p->jumlah }}</td>
                  <td>{{ $p->no_meja }}</td>
                  <td>Rp. <?= number_format($total) ?></td>
                 
                </tr>
              <!-- <h5 class="text text-danger">Total Bayar: </h5> -->
                <?php endforeach; ?>
              </table>
                
            </div>
            <button class="btn btn-block" style="background-color:#ff87fb; color:black;"><a><i class="fa fa-print"></i><b></b> Cetak Struk</a></button>
            <!-- /.box-body -->
            
          
          </div>
          <!-- /.box -->
          
        </div>
      </div>

    <!-- TUTU -->
    </section>
  </div>
  </div>

@include('partials.script')