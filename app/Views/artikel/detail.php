<?php echo view('template/header'); ?>
<article class="entry">
    <h2><?= $artikel['judul']; ?></h2>
    <p>Kategori: <?= isset($artikel['nama_kategori']) ? esc($artikel['nama_kategori']) : '-'; ?></p>
    <img src="<?= base_url('/gambar/' . $artikel['gambar']); ?>" alt="<?= $artikel['judul']; ?>">
    <p><?= $artikel['isi']; ?></p>
</article>

<?php echo view('template/footer'); ?>