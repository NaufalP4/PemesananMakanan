<div class="container mt-5">
  <div class="card">
    <div class="card-header bg-primary text-white">
      <h4>Form Pemesanan Makanan</h4>
    </div>
    <div class="card-body">
      <form action="<?= base_url('pesanan/simpan') ?>" method="post">
        <input type="hidden" name="id_menu" value="<?= $menu->id_menu ?>">

        <div class="form-group">
          <label for="nama_menu">Nama Menu</label>
          <input type="text" class="form-control" id="nama_menu" value="<?= $menu->nama_menu ?>" readonly>
        </div>

        <div class="form-group">
          <label for="harga">Harga</label>
          <input type="text" class="form-control" id="harga" value="Rp <?= number_format($menu->harga, 0, ',', '.') ?>" readonly>
        </div>

        <div class="form-group">
          <label for="jumlah">Jumlah</label>
          <input type="number" class="form-control" id="jumlah" name="jumlah" required min="1">
        </div>

        <button type="submit" class="btn btn-success">Pesan</button>
        <a href="<?= base_url('menu') ?>" class="btn btn-secondary">Kembali</a>
      </form>
    </div>
  </div>
</div>