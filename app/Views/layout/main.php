<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'My Website' ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        /* Basic Reset & Body Styling */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f7f6; /* Light background */
            padding: 20px;
        }

        #container {
            max-width: 1200px;
            margin: 20px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            overflow: hidden; /* Clear floats */
        }

        /* Header Styling */
        header {
            background: linear-gradient(135deg, #2c3e50, #34495e); /* Darker gradient */
            color: #ecf0f1;
            padding: 30px 20px;
            text-align: center;
            border-bottom: 5px solid #1abc9c; /* Accent color */
        }

        header h1 {
            margin: 0;
            font-size: 2.8em;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.2);
        }

        /* Navigation Bar Styling */
        nav {
            background: #34495e; /* Slightly lighter than header */
            padding: 15px 20px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        nav a {
            color: #ecf0f1;
            text-decoration: none;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
            font-weight: 600;
            font-size: 1.1em;
        }

        nav a:hover,
        nav a.active {
            background-color: #1abc9c; /* Accent color on hover/active */
            color: #fff;
        }

        /* Wrapper and Section Styling */
        #wrapper {
            display: flex;
            flex-wrap: wrap; /* Allows wrapping on smaller screens */
            padding: 20px;
            gap: 20px; /* Space between main and sidebar */
        }

        #main {
            flex: 3; /* Takes up more space */
            min-width: 60%; /* Ensures it doesn't get too small */
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        #sidebar {
            flex: 1; /* Takes up less space */
            min-width: 300px; /* Minimum width for sidebar */
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        /* Widget Box Styling */
        .widget-box {
            background: #f9f9f9;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            margin-bottom: 20px;
            padding: 20px;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.05);
        }

        .widget-box .title {
            font-size: 1.4em;
            color: #34495e;
            margin-bottom: 15px;
            border-bottom: 2px solid #1abc9c;
            padding-bottom: 10px;
        }

        .widget-box ul {
            list-style: none;
            padding: 0;
        }

        .widget-box ul li {
            margin-bottom: 10px;
        }

        .widget-box ul li a {
            text-decoration: none;
            color: #2980b9;
            transition: color 0.3s ease;
        }

        .widget-box ul li a:hover {
            color: #1abc9c;
            text-decoration: underline;
        }

        .widget-box p {
            font-size: 0.95em;
            color: #555;
        }

        /* Footer Styling */
        footer {
            background: #34495e;
            color: #ecf0f1;
            text-align: center;
            padding: 20px;
            margin-top: 20px;
            border-top: 5px solid #1abc9c;
            border-radius: 0 0 8px 8px; /* Match container border-radius */
        }

        footer p {
            margin: 0;
            font-size: 0.9em;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            #wrapper {
                flex-direction: column; /* Stack main and sidebar vertically */
            }

            #main, #sidebar {
                min-width: 100%; /* Full width on small screens */
            }

            nav a {
                display: block;
                margin: 5px 0;
            }
        }
    </style>
</head>

<body>
    <div id="container">
        <header>
            <h1>WEB PORTAL BERITA</h1>
        </header>
        <nav>
            <a href="<?= base_url('/'); ?>" class="active">Home</a>
            <a href="<?= base_url('/artikel'); ?>">Artikel</a>
            <a href="<?= base_url('/about'); ?>">About</a>
            <a href="<?= base_url('/contact'); ?>">Kontak</a>
        </nav>
        <section id="wrapper">
            <section id="main"><?= $this->renderSection('content') ?>
            </section>
            <aside id="sidebar">
                <?= view_cell('App\\Cells\\ArtikelTerkini::render') ?>
                <div class="widget-box">
                    <h3 class="title">Widget Header</h3>
                    <ul>
                        <li><a href="#">Widget Link</a></li>
                        <li><a href="#">Widget Link</a></li>
                    </ul>
                </div>
                <div class="widget-box">
                    <h3 class="title">Widget Text</h3>
                    <p>Vestibulum lorem elit, iaculis in nisl volutpat, malesuada tincidunt arcu. Proin in leo fringilla, vestibulum mi porta, faucibus felis. Integer pharetra est nunc, nec pretium nunc pretium ac.</p>
                </div>
            </aside>
        </section>
        <footer>
            <p>&copy; 2025 - Universitas Pelita Bangsa (Indra Maha Resi)</p>
        </footer>
    </div>
</body>

</html>