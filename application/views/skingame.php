<div class="container-flui">

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url('assets/img/wallgames2.png') ?>" class="d-block w-10" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-10" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-10" alt="...">
    </div>
  </div>
</div>



    <div class="row text-center mt-5">

        <?php foreach ($skingame as $brg) : ?>

            <div class="card ml-4 mb-4" style="width: 16rem;">
                <img src="<?php echo base_url().'/uploads/'.$brg->gambar?>" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title mb-1"><?php echo $brg->nama_barang?></h5>
                    <small><?php echo $brg->deskripsi?></small><br>
                    <span class="badge rounded-pill bg-warning mb-4">Rp. 
                    <?php echo number_format($brg->harga_barang, 0,',','.') ?></span>
                    <?php echo anchor('dashboard/tambah_ke_keranjang/'.$brg->id_barang,'<div class="btn btn-sm btn-primary">Tambah ke Keranjang</div>') ?>
                    <?php echo anchor('dashboard/detail/'.$brg->id_barang,'<div class="btn btn-sm btn-success">Detail</div>') ?>
            </div>
        </div>

        <?php endforeach; ?>
    </div>
</div>