<div class="container-fluid">
    <h3>Pendapatan Pemesanan Akun</h3>

    <table class="table table-bordered table-hover table-striped">
    <tr>
        <th>Id Pendapatan</th>
        <th>Nama Constumer</th>
        <th>Alamat Costumer</th>
        <th>Nomor Telepon</th>
        <th>Tanggal Pemesanan</th>
        <th>Batas Pembayaran</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($pendapatan as $ptn): ?>
    <tr>
        <td><?php echo $ptn->id ?></td>
        <td><?php echo $ptn->nama ?></td>
        <td><?php echo $ptn->alamat ?></td>
        <td><?php echo $ptn->no_telp ?></td>
        <td><?php echo $ptn->tgl_pemesanan ?></td>
        <td><?php echo $ptn->batas_bayar ?></td>
        <td><?php echo anchor('admin/pendapatan/detail/'.$ptn->id, '<div class="btn btn-sm btn-warning">Detail</div>') ?></td>
    </tr>
    <?php endforeach; ?>
    </table>
</div>