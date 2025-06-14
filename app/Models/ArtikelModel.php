<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = false; // Nonaktifkan automatic timestamps karena kolom updated_at tidak wajib
    protected $allowedFields = [
        'judul',
        'isi',
        'status',
        'slug',
        'gambar',
        'created_at',
        'id_kategori'
        // 'updated_at', // Hapus dari allowedFields jika tidak ingin diisi otomatis
    ];

    public function getArtikelDenganKategori()
    {
        return $this->db->table('artikel')
            ->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori =
artikel.id_kategori')
            ->get()
            ->getResultArray();
    }
}
