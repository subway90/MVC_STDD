    <?php


    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Test Loader</title>
    </head>
    <style>
        * {
            background-color : #000000;
        }

        .container {
            display :flex;
            align-items : center;
            justify-content : center;
        }

        span {
            display : inline-block;
            transform-origin : 0% 7%;
            transform-style : preserve-3d;
            color : cyan;
            animation: Loader 2.6s infinite linear;
        }

        @keyframes Loader {
            35% {
                transform: rotateZ(360deg);
            }
            100% {
                transform: rotateZ(360deg);
            }
        }

        span:nth-child(odd) {
            color : hotpink;
        }
    </style>
    <body>
        <div class="container">
            <span>
                L
            </span>
            <span>
                O
            </span>
            <span>
                A
            </span>
            <span>
                D
            </span>
            <span>
                E
            </span>
            <span>
                R
            </span>
        </div>
    </body>
    </html>