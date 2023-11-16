<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        button {
            background-color: #007BFF; 
            color: white;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 10px; 
            width: 150px; 
        }

        button:hover {
            background-color: #0056b3; 
        }
    </style>
    <title>Calculator for All</title>
</head>
<body>
    <h1>Willkommen bei Calculator for All</h1>
    <h3>Hier kannst du alle Rechnungen automatisch ausrechnen, welche in der 3AFI derzeit unterrichtet werden.</h3>
    <p>Im Laufe der Zeit werden noch weitere Updates veröffentlicht!</p>
    <br><br>
    <form action="mathe_overview.php" method="post">
        <button type="submit">Mathematik</button>
    </form>
    <br>
    <form action="elektrotechnik_overview.php" method="post">
        <button type="submit">Elektrotechnik</button>
    </form>
    <br>
    <form action="betp_overview.php" method="post">
        <button type="submit">Betriebstechnik</button>
    </form>
</body>
</html>
