<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'WEB PORTAL BERITA'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

        /* --- Stylish Header Section --- */
        header {
           background: linear-gradient(135deg, #2c3e50, #34495e); /* Darker gradient */
            color: #ecf0f1;
            padding: 30px 20px;
            text-align: center;
            border-bottom: 5px solid #1abc9c; /* Accent color */
        }

        header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.05); /* Subtle overlay for texture */
            pointer-events: none;
            z-index: 1;
        }

        header h1 {
            margin: 0;
            font-size: 3.8em; /* Larger, more impactful title */
            font-weight: 700; /* Bold font */
            letter-spacing: 3px; /* Increased letter spacing */
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.4); /* Stronger text shadow */
            text-transform: uppercase; /* All caps for prominence */
            position: relative; /* To bring text above ::before */
            z-index: 2;
        }

        /* --- Stylish Navigation Bar --- */
        nav {
            background: #34495e; /* Dark background, matching header's secondary color */
            padding: 15px 20px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        nav a {
            color: #ecf0f1; /* Light text color for links */
            text-decoration: none;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
            font-weight: 600;
            font-size: 1.1em;
            display: inline-block; /* Ensures padding and margin work correctly */
        }

        nav a:hover,
        nav a.active { /* This is the style for the active link */
            background-color: #1abc9c; /* Accent color on hover/active */
            color: #fff;
        }

        /* --- Rest of the Layout (Original Styles) --- */

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
            font-size: 1em;
            color: #333;
        }

        #sidebar {
            flex: 1; /* Takes up less space */
            min-width: 300px; /* Minimum width for sidebar */
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        /* Widget Box Styling (Original) */
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
            color: #333; /* Default color */
            margin-bottom: 15px;
            border-bottom: 1px solid #ddd; /* Default border */
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
            color: #007bff; /* Default link color (similar to Bootstrap's) */
            transition: color 0.3s ease;
        }

        .widget-box ul li a:hover {
            color: #0056b3; /* Darker blue on hover */
            text-decoration: underline;
        }

        .widget-box p {
            font-size: 0.95em;
            color: #555;
        }

        /* Footer Styling (Original) */
        footer {
            background: #f0f0f0; /* Light gray background */
            color: #333; /* Dark text */
            text-align: center;
            padding: 20px;
            margin-top: 20px;
            border-top: 1px solid #ccc; /* Simple border */
            border-radius: 0 0 8px 8px;
        }

        footer p {
            margin: 0;
            font-size: 0.9em;
        }

        /* Responsive Adjustments (for nav links in original style) */
        @media (max-width: 768px) {
            #wrapper {
                flex-direction: column; /* Stack main and sidebar vertically */
            }

            #main, #sidebar {
                min-width: 100%; /* Full width on small screens */
            }

            nav a {
                display: block; /* Stack navigation links vertically */
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
            <?php
            // Get the current URL path
            $currentPath = service('uri')->getPath();

            // Define navigation links and their paths
            $navLinks = [
                'Home' => '/',
                'Artikel' => '/artikel',
                'About' => '/about',
                'Kontak' => '/contact',
            ];

            foreach ($navLinks as $text => $path) {
                // Determine if the current link is active
                $isActive = ($currentPath === $path || ($path === '/' && $currentPath === '')); // Handles base URL and empty path for home

                // Special handling for '/artikel' to also be active for '/artikel/some-slug'
                if ($path === '/artikel' && strpos($currentPath, '/artikel') === 0 && $currentPath !== '/') {
                    $isActive = true;
                }
            ?>
                <a href="<?= base_url($path); ?>" class="<?= $isActive ? 'active' : ''; ?>">
                    <?= $text; ?>
                </a>
            <?php } ?>
        </nav>
        <section id="wrapper">
            <section id="main">
              