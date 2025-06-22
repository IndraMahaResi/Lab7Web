<?php echo view('template/header'); ?>

<style>
    /* Styling for the main content section (container for the article) */
    .article-container {
        padding: 30px; /* Add some padding around the content */
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        margin-bottom: 20px; /* Space before footer */
        max-width: 900px; /* Limit width for better readability */
        margin-left: auto;
        margin-right: auto;
    }

    /* Article Entry Styling (similar to list but adapted for single view) */
    article.entry {
        margin-bottom: 0; /* No bottom margin needed for a single article */
        padding-bottom: 0;
        border-bottom: none; /* No border needed */
    }

    article.entry h2 {
        font-size: 2.8em; /* Larger title for single article */
        color: #2c3e50; /* Dark blue for article title */
        margin-bottom: 15px;
        line-height: 1.2;
        border-bottom: 2px solid #1abc9c; /* Accent line below title */
        padding-bottom: 10px;
        font-weight: 700;
    }

    article.entry p {
        font-size: 1.1em; /* Slightly larger text for readability */
        color: #555;
        line-height: 1.7; /* Increased line height for better readability */
        margin-bottom: 15px;
    }

    article.entry img {
        max-width: 100%; /* Ensure images are responsive */
        height: auto;
        border-radius: 8px; /* Slightly larger border-radius for images */
        margin: 25px 0; /* More space around the image */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Stronger shadow for main image */
        display: block; /* Ensures image takes its own line */
        margin-left: auto;
        margin-right: auto; /* Center the image */
    }

    article.entry p:first-of-type { /* Style for the category paragraph */
        font-size: 0.95em;
        color: #777;
        margin-bottom: 20px;
        font-style: italic;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .article-container {
            padding: 20px;
        }

        article.entry h2 {
            font-size: 2.2em;
        }

        article.entry p {
            font-size: 1em;
        }
    }
</style>

<section class="article-container">
    <article class="entry">
        <h2><?= $artikel['judul']; ?></h2>
        <p>Kategori: **<?= isset($artikel['nama_kategori']) ? esc($artikel['nama_kategori']) : '-'; ?>**</p>
        <img src="<?= base_url('/gambar/' . $artikel['gambar']); ?>" alt="<?= $artikel['judul']; ?>">
        <p><?= $artikel['isi']; ?></p>
    </article>
</section>

<?php echo view('template/footer'); ?>