<?= $this->include('template/header'); ?>

<h1>Data Artikel (AJAX)</h1>

<div class="card mb-4">
    <div class="card-header">
        <h5 id="formTitle">Tambah Artikel Baru</h5>
    </div>
    <div class="card-body">
        <form id="artikelForm">
            <input type="hidden" id="artikelId" name="id">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
                <div class="invalid-feedback" id="judulError"></div>
            </div>
            <div class="mb-3">
                <label for="isi" class="form-label">Isi Artikel</label>
                <textarea class="form-control" id="isi" name="isi" rows="5" required></textarea>
                <div class="invalid-feedback" id="isiError"></div>
            </div>
            <button type="submit" class="btn btn-success" id="submitBtn">Simpan</button>
            <button type="button" class="btn btn-secondary d-none" id="cancelBtn">Batal</button>
        </form>
    </div>
</div>

<table class="table table-bordered table-data" id="artikelTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        </tbody>
</table>

<script src="<?= base_url('assets/js/jquery-3.7.1.min.js') ?>"></script>
<script>
    $(document).ready(function() {
        // Function to display a loading message while data is fetched
        function showLoadingMessage() {
            $('#artikelTable tbody').html('<tr><td colspan="5">Loading data...</td></tr>'); // 
        }

        // Fungsi untuk membersihkan form dan pesan error
        function clearForm() {
            $('#artikelForm')[0].reset();
            $('#artikelId').val('');
            $('#formTitle').text('Tambah Artikel Baru');
            $('#submitBtn').text('Simpan').removeClass('btn-warning').addClass('btn-success');
            $('#cancelBtn').addClass('d-none');
            // Bersihkan pesan error validasi
            $('#judul').removeClass('is-invalid');
            $('#judulError').text('');
            $('#isi').removeClass('is-invalid');
            $('#isiError').text('');
        }

        // Buat fungsi load data
        function loadData() {
            showLoadingMessage(); // Display loading message initially 
            // Lakukan request AJAX ke URL getData 
            $.ajax({
                url: "<?= base_url('ajax/getData') ?>", // 
                method: "GET", // 
                dataType: "json", // 
                success: function(data) { // 
                    // Tampilkan data yang diterima dari server 
                    var tableBody = ""; // 
                    if (data.length > 0) {
                        for (var i = 0; i < data.length; i++) { // 
                            var row = data[i]; // 
                            tableBody += '<tr>'; // 
                            tableBody += '<td>' + row.id + '</td>'; // 
                            tableBody += '<td>' + row.judul + '</td>'; // 
                            tableBody += '<td>' + row.isi.substring(0, 100) + '...</td>'; // Tampilkan sebagian isi
                            tableBody += '<td><span class="status">' + row.status + '</span></td>'; // 
                            tableBody += '<td>'; // 
                            // Tambahkan tombol Edit dan Delete
                            tableBody += '<button class="btn btn-sm btn-info btn-edit me-2" data-id="' + row.id + '" ' +
                                'data-judul="' + row.judul + '" data-isi="' + row.isi + '" data-status="' + row.status + '">Edit</button>';
                            tableBody += '<button class="btn btn-sm btn-danger btn-delete" data-id="' + row.id + '">Delete</button>'; // 
                            tableBody += '</td>'; // 
                            tableBody += '</tr>'; // 
                        }
                    } else {
                        tableBody = '<tr><td colspan="5" class="text-center">Tidak ada data artikel.</td></tr>';
                    }
                    $('#artikelTable tbody').html(tableBody); // 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#artikelTable tbody').html('<tr><td colspan="5" class="text-danger">Error memuat data: ' + textStatus + ' - ' + errorThrown + '</td></tr>');
                }
            });
        }

        loadData(); // Panggil fungsi loadData saat halaman pertama kali dimuat 

        // --- Event Listener untuk Hapus Data ---
        $(document).on('click', '.btn-delete', function(e) { // 
            e.preventDefault(); // 
            var id = $(this).data('id'); // 

            if (confirm('Apakah Anda yakin ingin menghapus artikel ini?')) { // 
                $.ajax({
                    url: "<?= base_url('ajax/delete/') ?>" + id, // 
                    method: "DELETE", // Menggunakan DELETE method untuk operasi hapus
                    success: function(response) { // 
                        if (response.status === 'OK') {
                            alert('Artikel berhasil dihapus!');
                            loadData(); // Reload data setelah hapus berhasil 
                        } else {
                            alert('Gagal menghapus artikel: ' + response.message);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) { // 
                        alert('Error deleting article: ' + textStatus + ' - ' + errorThrown); // 
                    }
                });
            }
        });

        // --- Event Listener untuk Submit Form (Tambah/Ubah Data) ---
        $('#artikelForm').on('submit', function(e) {
            e.preventDefault();

            var id = $('#artikelId').val();
            var url = id ? "<?= base_url('ajax/update/') ?>" + id : "<?= base_url('ajax/create') ?>";
            var method = id ? "POST" : "POST"; // Gunakan POST untuk kemudahan, meskipun UPDATE idealnya PUT

            // Reset validasi
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback').text('');

            $.ajax({
                url: url,
                method: method,
                data: $(this).serialize(), // Mengirimkan semua data form
                dataType: "json",
                success: function(response) {
                    if (response.status === 'OK') {
                        alert(response.message);
                        clearForm(); // Bersihkan form setelah berhasil
                        loadData(); // Muat ulang data
                    } else if (response.status === 'Validation Error') {
                        // Tampilkan pesan error validasi
                        for (var key in response.errors) {
                            $('#' + key).addClass('is-invalid');
                            $('#' + key + 'Error').text(response.errors[key]);
                        }
                    } else {
                        alert('Error: ' + response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Terjadi kesalahan AJAX: ' + textStatus + ' - ' + errorThrown);
                }
            });
        });

        // --- Event Listener untuk Tombol Edit ---
        $(document).on('click', '.btn-edit', function() {
            var id = $(this).data('id');
            var judul = $(this).data('judul');
            var isi = $(this).data('isi');
            var status = $(this).data('status');

            $('#artikelId').val(id);
            $('#judul').val(judul);
            $('#isi').val(isi);
            // Jika ada input status, set juga
            // $('#status').val(status);

            $('#formTitle').text('Ubah Artikel (ID: ' + id + ')');
            $('#submitBtn').text('Update').removeClass('btn-success').addClass('btn-warning');
            $('#cancelBtn').removeClass('d-none');
        });

        // --- Event Listener untuk Tombol Batal Edit ---
        $('#cancelBtn').on('click', function() {
            clearForm();
        });

    });
</script>

<?= $this->include('template/footer'); ?>