<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservez votre séance</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            margin: 20px;
            line-height: 1.6;
            background-color: #f7f7f7;
            color: #333;
        }

        h1 {
            color: #333;
            font-size: 2em;
            text-align: center;
            margin-bottom: 20px;
        }

        .studio {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 30px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .studio img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            margin-bottom: 15px;
        }

        form {
            margin-top: 30px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form label {
            display: block;
            margin-bottom: 10px;
            font-size: 1.2em;
        }

        form input,
        form textarea {
            width: calc(100% - 16px);
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            font-size: 1em;
        }

        form input[type="submit"] {
            background-color: #4285f4;
            color: white;
            cursor: pointer;
            font-size: 1.2em;
            padding: 12px;
            border: none;
            border-radius: 5px;
        }

        form input[type="submit"]:hover {
            background-color: #357ae8;
        }
    </style>
</head>
<body>

<h1>Réservez votre séance</h1>

<div class="studio">
    <h2>Studio A</h2>
    <p>Description : [Description du Studio A]</p>
    <p>Capacité : [Capacité du Studio A]</p>

    <div class="button-container">
    <a href="/model/commander.php" class="reserve-button">Réservez votre séance</a>
</div>

    <hr>
</div>

<div class="studio">
    <h2>Studio B</h2>
    <p>Description : [Description du Studio B]</p>
    <p>Capacité : [Capacité du Studio B]</p>
    <div class="button-container">
    <a href="/model/commander.php" class="reserve-button">Réservez votre séance</a>
</div>

    
    </form>

    <hr>
</div>

</body>
</html>
