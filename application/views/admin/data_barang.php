<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i>Tambah Barang</button>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nama Akun</th>
        <th>Deskripsi</th>
        <th>Categories</th>
        <th>stok</th>
        <th>Harga</th>
        <th colspan="2">Tambah</th>
    </tr>
<?php
$no=1;
foreach($barang as $brg) : ?>
<tr>
    <td><?php echo $no++ ?></td>
    <td><?php echo $brg->nama_barang ?></td>
    <td><?php echo $brg->deskripsi ?></td>
    <td><?php echo $brg->categories ?></td>
    <td><?php echo $brg->stok_barang ?></td>
    <td><?php echo $brg->harga_barang ?></td>
    <td><?php echo anchor('admin/data_barang/edit/' .$brg->id_barang, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
    <td><?php echo anchor('admin/data_barang/hapus/' .$brg->id_barang, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>

<?php endforeach; ?>
</table>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_barang" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Input Barang</h5>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/data_barang/tambah_aksi'?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
        <label>Nama Barang</label>
        <input type="text" name="nama_barang" class="form-control">
        </div>
        <div class="form-group">
        <label>Deskripsi</label>
        <input type="text" name="deskripsi" class="form-control">
        </div>
        <div class="form-group">
        <label>Categories</label>
        <Input class="form-control" name="categories">
          <label>Pilihan</label>
          <option value="">skin game</option>
          <option value="">akun game</option>
          <option value="">battlepass</option>
          <option value="">item game</option>
        </select>
        </div>
        <div class="form-group">
        <label>Harga</label>
        <input type="text" name="harga_barang" class="form-control">
        </div>
        <div class="form-group">
        <label>Stok Barang</label>
        <input type="text" name="stok_barang" class="form-control">
        </div>
        <div class="form-group">
        <label>Gambar Barang</label>
        <input type="file" name="gambar" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">KIRIM</button>
      </div>
</form>
    </div>
  </div>
</div>