<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>Edit Data Barang</h3>

    <?php foreach($barang as $brg) : ?>

        <form method="post" action="<?php echo base_url().'admin/data_barang/update' ?>">

        <div class="for">
            <label>Nama Barang</label>
            <Input type="text" name="nama_barang" class="form-control"
            value="<?php echo $brg->nama_barang ?>">
        </div>

        <div class="for">
            <label>Deskripsi</label>
            <Input type="hidden" name="id_barang" class="form-control"
            value="<?php echo $brg->id_barang ?>">
            <Input type="text" name="deskripsi" class="form-control"
            value="<?php echo $brg->deskripsi ?>">
        </div>

        <div class="for">
            <label>Categories</label>
            <Input type="text" name="categories" class="form-control"
            value="<?php echo $brg->categories ?>">
        </div>

        <div class="for">
            <label>Harga Barang</label>
            <Input type="text" name="harga_barang" class="form-control"
            value="<?php echo $brg->harga_barang ?>">
        </div>

        <div class="for">
            <label>Stok Barang</label>
            <Input type="text" name="stok_barang" class="form-control"
            value="<?php echo $brg->stok_barang ?>">
        </div>

        <button type="submit" class="btn btn-primary btn-sm mt-3"> Simpan </button>

        </form>
    <?php endforeach; ?>
</div>