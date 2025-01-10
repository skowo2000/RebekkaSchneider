<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rebekka Schneider - Drawings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #A8D5BA;
            margin: 0;
            padding: 0;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .header {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            background-color: #A8D5BA;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            box-shadow: none;
        }

        .logo-small {
            width: 40px;
            height: auto;
            margin-right: 10px;
        }

        .header h1 {
            font-size: 20px;
            margin: 0;
            color: #333;
        }

        .content {
            margin-top: 80px;
            padding: 20px;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .gallery img {
            width: 100%;
            height: auto;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .gallery img:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            setTimeout(() => {
                document.body.style.opacity = 1;
            }, 50);
        });
    </script>
</head>
<body>
    <div class="header">
        <img src="Logo_Rebekka-transp.png" alt="Rebekka Logo" class="logo-small">
        <h1>Rebekka Schneider</h1>
    </div>

    <div class="content">
        <h1>Drawings</h1>
        <div class="gallery">
            <?php
                // Verzeichnis mit den Bildern
                $dir = 'Drawings/';
                $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];

                // Alle Dateien im Verzeichnis durchgehen
                if (is_dir($dir)) {
                    foreach (scandir($dir) as $file) {
                        $file_extension = pathinfo($file, PATHINFO_EXTENSION);
                        // Nur erlaubte Bildformate anzeigen
                        if (in_array(strtolower($file_extension), $allowed_extensions)) {
                            echo '<img src="'.$dir.$file.'" alt="Drawing Preview">';
                        }
                    }
                } else {
                    echo '<p>Das Verzeichnis "Drawings" wurde nicht gefunden.</p>';
                }
            ?>
        </div>
    </div>
</body>
</html>
