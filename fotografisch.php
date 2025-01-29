<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rebekka Schneider - Fotografisch</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #7FB5B5;
            margin: 0;
            padding: 0;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .header {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            background-color: #7FB5B5;
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

        .content h1 {
            font-size: 30px;
            color: #333;
            margin-top: 0;
            margin-bottom: 20px;
        }

        .gallery {
            column-count: 3;
            column-gap: 20px;
            padding: 20px;
        }

        .gallery a {
            display: inline-block;
            margin-bottom: 20px;
            width: 100%;
        }

        .gallery img {
            width: 100%;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            cursor: pointer;
            break-inside: avoid;
        }

        .gallery img:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .lightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #7FB5B5;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .lightbox img {
            max-width: 90%;
            max-height: 90%;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        .lightbox:target {
            display: flex;
        }

        .lightbox-close {
            position: absolute;
            top: 20px;
            right: 20px;
            color: white;
            font-size: 30px;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            setTimeout(() => {
                document.body.style.opacity = 1;
            }, 50);

            document.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', function (e) {
                    const href = this.getAttribute('href');
                    if (href && !href.startsWith('#')) {
                        e.preventDefault();
                        document.body.style.opacity = 0;
                        setTimeout(() => {
                            window.location.href = href;
                        }, 1000);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <div class="header">
        <a href="index.php" style="display: flex; align-items: center; text-decoration: none; color: inherit;">
            <img src="Logo_Rebekka-transp.png" alt="Rebekka Logo" class="logo-small">
            <h1>Rebekka Schneider</h1>
        </a>
    </div>

    <div class="content">
        <h1>fotografisch</h1>
        <div class="gallery">
            <?php
            $imageDir = "Fotos"; // Verzeichnis mit Bildern
            $images = glob("$imageDir/*.jpg"); // Alle JPG-Bilder abrufen

            foreach ($images as $index => $image) {
                $imageName = basename($image);
                echo "<a href=\"#lightbox$index\"><img src=\"$imageDir/$imageName\" alt=\"$imageName\"></a>";
            }
            ?>
        </div>

        <div id="lightboxContainer">
            <?php
            foreach ($images as $index => $image) {
                echo "
                <div id=\"lightbox$index\" class=\"lightbox\">
                    <a href=\"#\" class=\"lightbox-close\">&times;</a>
                    <img src=\"$image\" alt=\"$image\">
                </div>";
            }
            ?>
        </div>
    </div>
</body>
</html>
