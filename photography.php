<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imanuel Fehse</title>
    <link rel="stylesheet" href="src/css/main.css">
    <link rel="stylesheet" href="src/css/gallery.css">
    <link rel="shortcut icon" href="src/images/logo_white.svg" type="image/x-icon">
    <link rel="shortcut icon" href="src/images/logo_white.svg" type="image/x-icon">
    <script src="https://www.w3schools.com/lib/w3.js"></script>
</head>

<body>
    <header>
        <?php include 'src/elements/header.html'; ?>
    </header>

    <!-- CONTENT OF THE PAGE -->
    <div class="content content-container">
        <h1 class="tracking-in-contract">Photography</h1>
        <img class='Photography-Logo' src='src/images/photography/Photography_Logo_white.svg' alt='Photography Logo'>
        <p class="content gallery">All images displayed here are subject to copyright.<br>&copy; 2024 Imanuel Fehse<br>&zwnj;</p>
        <?php
            $folder = "src/images/photography/page";
            $files = scandir($folder);
            foreach ($files as $file) {
                if (pathinfo($file, PATHINFO_EXTENSION) == "txt") {
                    $text = file($folder . "/" . $file);
                    $image = str_replace(".txt", ".jpg", $file);
                    echo "<div class='gallery-card'>
                        <div class='image-container'>
                        <img class='gallery-card-image' src='" . $folder . "/" . $image . "' alt='" . $text[0] . "'>
                        </div>
                        <div class='description'> <h2 class='gallery-card-title'>" . $text[1] . "</h2><p class='gallery-card-text'>" . $text[2] . "</p>
                        </div></div>";
                }
            }
        ?>
    </div>

    <footer>
        <?php include 'src/elements/footer.html'; ?>
    </footer>



    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- BUILD ENTRYS -->
    <!--
    <script>
        var folder = "src/images/photography/page";
        $.ajax({
            url: folder + "/files.txt",
            success: function (data) {
                var filenames_images = data.split("\n");

                for (var i = 0; i < filenames_images.length; i++) {
                    (function (index) {
                        var imageUrl = folder + "/" + filenames_images[index].replace("\r", "");
                        var text_file_name = folder + "/" + filenames_images[index].replace("\r", "").replace(/\.(jpe?g|png|gif)$/, ".txt");

                        $.ajax({
                            url: text_file_name,
                            success: function (txtData) {
                                var Text = txtData.trim().split("\n");
                                $(".gallery.content").append("<div class='gallery-card'><div class='image-container'><img class='gallery-card-image' src='" + imageUrl + "' alt='" + Text[0] + "'></div><div class='description'><h2 class='gallery-card-title'>" + Text[1] + "</h2><p class='gallery-card-text'>" + Text[2] + "</p></div></div>");
                            },
                            error: function (err) {
                                console.error("Error loading .txt file:", err);
                            }
                        });
                    })(i);
                }
            },
            error: function (err) {
                console.error("Error loading files.txt:", err);
            }
        });
    </script>
    -->
    <script defer src="src/js/main.js"></script>
</body>
</html>