<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imanuel Fehse</title>
    <link rel="stylesheet" href="src/css/main.css">
    <link rel="stylesheet" href="src/css/engineering.css">
    <link rel="shortcut icon" href="src/images/logo_white.svg" type="image/x-icon">
    <link rel="shortcut icon" href="src/images/logo_white.svg" type="image/x-icon">
    <script src="https://www.w3schools.com/lib/w3.js"></script>
</head>

<body>
    <header>
        <?php include 'src/elements/header.html'; ?>
    </header>


    <!-- CONTENT OF THE PAGE -->
    <div class="content">
        <h1 class="tracking-in-contract">Engineering</h1>
        <p class="content engineering"></p>
    </div>

    <footer>
        <?php include 'src/elements/footer.html'; ?>
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- BUILD ENTRYS -->
    <script>
    var folder = "src/images/engineering/page";
    $.ajax({
        url: folder + "/files.txt",
        success: function (data) {
            var filenames_images = data.split("\n");
            var side = "left";

            for (var i = 0; i < filenames_images.length; i++) {
                (function (index) {
                    var imageUrl = folder + "/" + filenames_images[index].replace("\r", "");
                    var text_file_name = folder + "/" + filenames_images[index].replace("\r", "").replace(/\.(jpe?g|png|gif)$/, ".txt");

                    $.ajax({
                        url: text_file_name,
                        success: function (txtData) {
                            var Text = txtData.trim().split("\n");
                            
                            $(".engineering.content").append("<div class='engineering-card " + side + "'><div class='image-container'><img class='engineering-card-image' src='" + imageUrl + "' alt='" + Text[0] + "'></div><div class='description'><h2 class='engineering-card-title'>" + Text[1] + "</h2><p class='engineering-card-text'>" + Text[2] + "</p></div></div>");
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
    
    <script defer src="src/js/main.js"></script>
</body>
</html>