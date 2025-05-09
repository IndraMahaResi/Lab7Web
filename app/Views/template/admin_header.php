<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Admin Portal'; ?></title>
    <link rel="stylesheet" href="<?= base_url('/css/admin-style.css'); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff;
            margin: 0;
            padding: 0;
        }

        .header {
            padding: 30px;
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            color: #777;
        }

        .navbar {
            display: flex;
            background-color: #1f74cc;
            padding: 10px 0;
            justify-content: center;
        }

        .navbar a {
            color: #fff;
            padding: 14px 20px;
            text-decoration: none;
            font-weight: bold;
        }

        .navbar a:hover {
            background-color: #0e5aaa;
        }

        .container {
            padding: 20px;
        }

        footer {
            background: #222;
            color: #fff;
            text-align: center;
            padding: 15px 0;
            position: relative;
            bottom: 0;
            width: 100%;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="header">
    Admin Portal Berita
</div>

<div class="navbar">
    <a href="<?= base_url('/admin/artikel'); ?>">Dashboard</a>
    <a href="<?= base_url('/admin/artikel'); ?>">Artikel</a>
    <a href="<?= base_url('/admin/artikel/add'); ?>">Tambah Artikel</a>
</div>

<div class="container">