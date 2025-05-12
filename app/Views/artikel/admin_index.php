<?= $this->include('template/admin_header'); ?>
<form method="get" class="form-search">
    <input type="text" name="q" value="<?= $q; ?>" placeholder="Cari data">
    <input type="submit" value="Cari" class="btn btn-primary">
</form>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Status</th>
            <th>AKsi</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($artikel): foreach ($artikel as $row): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td>
                        <b><?= $row['judul']; ?></b>
                        <p><small><?= substr($row['isi'], 0, 50); ?></small></p>
                    </td>
                    <td><?= $row['status']; ?></td>
                    <td>
                        <a class="btn" href="<?= base_url('/admin/artikel/edit/' .
                                                    $row['id']); ?>">Ubah</a>
                        <a class="btn btn-danger" onclick="return confirm('Yakin menghapus data?');" href="<?= base_url('/admin/artikel/delete/' .
                                                                                                                $row['id']); ?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach;
        else: ?>
            <tr>
                <td colspan="4">Belum ada data.</td>
            </tr>
        <?php endif; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Status</th>
            <th>AKsi</th>
        </tr>
    </tfoot>
</table>
<div class="pagination-wrapper">
    <?= $pager->only(['q'])->links(); ?>
</div>

<style>
    .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination-wrapper a {
        margin: 0 5px;
        padding: 10px 15px;
        text-decoration: none;
        color: #fff;
        background-color: #007bff;
        border: 1px solid #007bff;
        border-radius: 50px;
        transition: all 0.3s ease;
        font-size: 14px;
    }

    .pagination-wrapper a:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .pagination-wrapper .active {
        font-weight: bold;
        color: #fff;
        background-color: #0056b3;
        border-color: #0056b3;
        padding: 10px 15px;
        border-radius: 50px;
    }

    .pagination-wrapper .disabled {
        color: #6c757d;
        background-color: #e9ecef;
        border-color: #ddd;
        padding: 10px 15px;
        border-radius: 50px;
        cursor: not-allowed;
    }

    .form-search {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .form-search input[type="text"] {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-right: 10px;
        width: 300px;
    }

    .form-search input[type="submit"] {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .form-search input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .table th, .table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    .table th {
        background-color: #f4f4f9;
        color: #333;
    }

    .table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .table tr:hover {
        background-color: #f1f1f1;
    }

    .btn {
        padding: 8px 12px;
        text-decoration: none;
        color: #fff;
        background-color: #007bff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .btn-danger {
        background-color: #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }
</style>
<?= view('template/admin_footer'); ?>