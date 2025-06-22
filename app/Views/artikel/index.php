<?= $this->include('template/header'); ?>

<style>
    /* Styling for the main content section */
    section {
        padding: 30px; /* Add some padding around the content */
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        margin-bottom: 20px; /* Space before footer */
    }

    section h2 {
        color: #2c3e50; /* Dark blue for main headings */
        font-size: 2.2em;
        margin-bottom: 25px;
        border-bottom: 2px solid #1abc9c; /* Accent line */
        padding-bottom: 10px;
        font-weight: 600;
    }

    /* Category Filter Styling */
    .filter-kategori {
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 10px; /* Space between label and dropdown */
    }

    .filter-kategori label {
        font-size: 1.1em;
        color: #34495e; /* Darker text for label */
        font-weight: 700;
    }

    .kategori-dropdown {
        padding: 10px 15px;
        border: 2px solid #ccc;
        border-radius: 8px;
        font-size: 1em;
        color: #555;
        background-color: #f8f8f8;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
        appearance: none; /* Remove default dropdown arrow */
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23333' width='18px' height='18px'%3E%3Cpath d='M7 10l5 5 5-5z'/%3E%3Cpath d='M0 0h24v24H0z' fill='none'/%3E%3C/svg%3E"); /* Custom arrow */
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 18px;
        cursor: pointer;
    }

    .kategori-dropdown:focus {
        border-color: #1abc9c; /* Accent color on focus */
        box-shadow: 0 0 0 3px rgba(26, 188, 156, 0.2); /* Soft shadow on focus */
        outline: none;
    }

    /* Horizontal Rule (hr) Styling */
    hr {
        border: none;
        border-top: 1px solid #eee;
        margin: 30px 0;
    }
    .divider {
        border: none;
        border-top: 1px dashed #e0e0e0; /* Dashed line for article separation */
        margin: 40px 0;
    }

    /* Article Entry Styling */
    .entry {
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid #f0f0f0; /* Light separator */
    }

    .entry:last-of-type {
        border-bottom: none; /* No border for the last article */
    }

    .entry h2 {
        font-size: 1.8em;
        margin-bottom: 10px;
        line-height: 1.3;
        border-bottom: none; /* Remove main section h2 border */
        padding-bottom: 0;
    }

    .entry h2 a {
        color: #2980b9; /* Blue for article titles */
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .entry h2 a:hover {
        color: #1abc9c; /* Accent color on hover */
        text-decoration: underline;
    }

    .entry img {
        max-width: 100%; /* Ensure images are responsive */
        height: auto;
        border-radius: 6px;
        margin: 15px 0;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .entry p {
        font-size: 1em;
        color: #555;
        margin-bottom: 15px;
    }

    .entry small {
        font-size: 0.9em;
        color: #777;
        font-style: italic;
    }

    /* No Articles Found Styling */
    .entry h3 {
        color: #e74c3c; /* Red for error/warning */
        text-align: center;
        margin-top: 30px;
        font-size: 1.5em;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        section {
            padding: 20px;
        }

        section h2 {
            font-size: 1.8em;
        }

        .filter-kategori {
            flex-direction: column; /* Stack label and dropdown */
            align-items: flex-start;
        }

        .kategori-dropdown {
            width: 100%; /* Full width dropdown */
        }

        .entry h2 {
            font-size: 1.5em;
        }
    }
</style>

<section>
    <h2><?= esc($title); ?></h2>

    <form method="get" action="<?= base_url('/artikel'); ?>" class="filter-kategori">
        <label for="kategori"><strong>Pilih Kategori:</strong></label>
        <select name="kategori" id="kategori" onchange="this.form.submit()" class="kategori-dropdown">
            <option value="">-- Semua Kategori --</option>
            <?php foreach ($kategoriList as $kategori): ?>
                <option value="<?= esc($kategori['slug_kategori']); ?>"
                    <?= ($kategoriDipilih === $kategori['slug_kategori']) ? 'selected' : ''; ?>>
                    <?= esc($kategori['nama_kategori']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>

    <hr>

    <?php if ($artikel): ?>
        <?php foreach ($artikel as $row): ?>
            <article class="entry">
                <h2>
                    <a href="<?= base_url('/artikel/' . esc($row['slug'])); ?>">
                        <?= esc($row['judul']); ?>
                    </a>
                </h2>
                <img src="<?= base_url('/gambar/' . esc($row['gambar'])); ?>" alt="<?= esc($row['judul']); ?>" width="300">
                <p><?= esc(substr(strip_tags($row['isi']), 0, 200)); ?>...</p>
                <small><em>Kategori: <?= esc($row['nama_kategori']); ?></em></small>
            </article>
            <hr class="divider" />
        <?php endforeach; ?>
    <?php else: ?>
        <article class="entry">
            <h3>Tidak ada artikel untuk kategori ini.</h3>
        </article>
    <?php endif; ?>
</section>

<?= $this->include('template/footer'); ?>