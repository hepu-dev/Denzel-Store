<div class="container-fluit">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="btn btn-sm btn-success">
            <?php
            $grand_total = 0;
            if ($keranjang = $this->cart->contents())
            {
                foreach ($keranjang as $item)
                {
                    $grand_total = $grand_total + $item['subtotal'];
                }

                echo "<h4>Total Pembayaran Anda: Rp. ".number_format($grand_total,0,',','.');
             ?>
            </div><br><br>

        <h3>Input Data Diri dan Pembayaran</h3>

        <form  action="<?php echo base_url('dashboard/proses_pesanan');?>"method="post">

            <div class="form-group">
                <label>Nama Lengkap</Label>
                <input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control">
            </div>

            <div class="form-group">
                <label>No. Telepon</Label>
                <input type="text" name="no_telp" placeholder="Masukkan nomor anda yang aktif agar dapat dihubungi" class="form-control">
            </div>

            <div class="form-group">
                <label>Alamat Lengkap</Label>
                <input type="text" name="alamat" placeholder="Alamat Lengkap" class="form-control">
            </div>

            <div class="form-group">
                <label>Metode Pembayaran</Label>
                <select class="form-control">
                    <option>OVO</option>
                    <option>Dana</option>
                    <option>ATM</option>
                </select>
            </div>

            <button type="submit" class="btn btn-sm btn-primary mb-3">Pesan</button>
            
        </form>

        <?php
    } else
    {
        echo "<h4>Anda Belum Memesan";
    }
         ?>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>