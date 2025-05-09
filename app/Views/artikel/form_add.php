<?= $this->include('template/admin_header'); ?>

<h2 style="text-align: center; margin-top: 30px;"><?= $title; ?></h2>

<div style="display: flex; justify-content: center; margin-top: 20px;">
    <form action="" method="post" style="width: 100%; max-width: 600px;">
        <div style="margin-bottom: 15px;">
            <label for="judul" style="display: block; font-weight: bold; margin-bottom: 5px;">Judul Artikel</label>
            <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan judul artikel" required style="width: 100%; padding: 10px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="isi" style="display: block; font-weight: bold; margin-bottom: 5px;">Isi Artikel</label>
            <textarea name="isi" id="isi" cols="50" rows="10" class="form-control" placeholder="Tulis isi artikel..." required style="width: 100%; padding: 10px;"></textarea>
        </div>

        <div style="text-align: right;">
            <input type="submit" value="Kirim" class="btn btn-primary" style="padding: 10px 20px; font-weight: bold;">
        </div>
    </form>
</div>

<?= $this->include('template/admin_footer'); ?>