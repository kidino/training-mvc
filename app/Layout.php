<?php 

namespace App; 

class Layout {
    function header() {
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        </head>
        <body>
        <div class="bg-dark">
        
            <h1 class="text-white">Brand</h1>
        
        </div>
        
        ';
    }

    function footer() {
        echo '
        <footer class="mt-5 border-top  bg-light ">

        <div class="container">
            <div class="row">
                <div class="col">
                    <ul>
                        <li>Home</li>
                        <li>About</li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    
    </footer>
    </body>
    </html>        ';
    }
}