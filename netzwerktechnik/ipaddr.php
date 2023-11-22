<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>IP Adressen</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f1f1f1;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
    </style>
</head>

<body>
    <form class="main-form" action="ipaddr.php" method="post">
        <label class="main-label" for="ip">Netz ID</label><br>
        <input class="main-input" type="text" name="ip" id="ip" required class="text" placeholder="192.168.0.0"><br><br>
        <label class="main-label" for="subnetMask">Subnet Mask</label><br>
        <input class="main-input" type="text" name="subnetMask" id="subnetMask" required class="text" placeholder="255.255.255.0"><br><br>
        <input class="main-button" type="submit" value="Berechnen"><br><br>
        <?php
        if (isset($_POST["ip"]) && isset($_POST["subnetMask"])) {
            function calculateIPRange($ip, $subnetMask)
            {
                $ipBinary = ip2long($ip);
                $subnetMaskBinary = ip2long($subnetMask);

                $networkAddress = $ipBinary & $subnetMaskBinary;

                $broadcastAddress = $networkAddress | (~$subnetMaskBinary);

                $usableIPRangeStart = $networkAddress + 1;
                $usableIPRangeEnd = $broadcastAddress - 1;

                return [
                    'Network Address' => long2ip($networkAddress),
                    'Broadcast Address' => long2ip($broadcastAddress),
                    'Usable IP Range' => [
                        'Start' => long2ip($usableIPRangeStart),
                        'End' => long2ip($usableIPRangeEnd),
                    ],
                ];
            }

            $ip = $_POST["ip"];
            $subnetMask = $_POST["subnetMask"];

            $result = calculateIPRange($ip, $subnetMask);

            echo "<p>IP Address:</p>" . $ip . "<br>";
            echo "<p>Subnet Mask:</p>" . $subnetMask . "<br>";

            echo "<p>Network Address:</p> " . $result['Network Address'] . "<br>";
            echo "<p>Broadcast Address:</p> " . $result['Broadcast Address'] . "<br>";
            echo "<p>Usable IP Range:</p> " . $result['Usable IP Range']['Start'] . " - " . $result['Usable IP Range']['End'] . "<br>";
        }
        ?>
    </form>
</body>

</html>