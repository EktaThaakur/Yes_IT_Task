<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sticky Footer Layout</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body,
        html {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .container {
            flex: 1;
            /* Pushes the footer down */
            padding: 20px;
        }

        header {
            background: #333;
            color: white;
            padding: 15px;
            text-align: center;
        }

        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 15px;
        }
    </style>
</head>

<body>

    <header>
        <h1>Header</h1>
    </header>

    <div class="container">
        <p>Content Area</p>
    </div>

    <footer>
        <p>Footer</p>
    </footer>

</body>

</html>
