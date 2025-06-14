<?= $this->include('template/admin_header'); ?>

<h2 class="page-title"><?= $title; ?></h2>

<form method="get" class="form-search d-flex align-items-center mb-4">
    <input type="text" name="q" value="<?= esc($q); ?>" placeholder="Cari judul artikel" class="form-control mr-2" style="max-width: 300px;">
    <select name="kategori_id" class="form-control mr-2" style="max-width: 200px;">
        <option value="">Semua Kategori</option>
        <?php foreach ($kategori as $k): ?>
            <option value="<?= $k['id_kategori']; ?>" <?= ($kategori_id == $k['id_kategori']) ? 'selected' : ''; ?>>
                <?= esc($k['nama_kategori']); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Cari" class="btn btn-primary">
</form>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Gambar</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($artikel): foreach ($artikel as $row): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td>
                        <b><?= esc($row['judul']); ?></b>
                        <p><small><?= esc(substr($row['isi'], 0, 50)); ?>...</small></p>
                    </td>
                    <td><?= esc($row['nama_kategori']); ?></td>
                    <td>
                        <?php if (!empty($row['gambar'])): ?>
                            <img src="<?= base_url('/gambar/' . $row['gambar']); ?>" alt="Gambar" style="max-height: 60px;">
                        <?php else: ?>
                            <span class="text-muted">Tidak ada gambar</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <span class="badge <?= $row['status'] == 'Aktif' ? 'badge-success' : 'badge-secondary'; ?>">
                            <?= esc($row['status']); ?>
                        </span>
                    </td>
                    <td>
                        <a class="btn btn-warning" href="<?= base_url('/admin/artikel/edit/' . $row['id']); ?>">Ubah</a>
                        <a class="btn btn-danger" onclick="return confirm('Yakin menghapus data?');"
                            href="<?= base_url('/admin/artikel/delete/' . $row['id']); ?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach;
        else: ?>
            <tr>
                <td colspan="6" class="text-center">Belum ada data.</td>
            </tr>
        <?php endif; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Gambar</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </tfoot>
</table>

<div class="pagination-wrapper">
    <?= $pager->only(['q', 'kategori_id'])->links(); ?>
</div>

<?= $this->include('template/admin_footer'); ?>