<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body>
    <form action="ipaddr.php" method="post">
        <label for="ip">Netz ID</label><br>
        <input type="text" name="ip" id="ip"><br><br>
        <label for="subnetMask">Subnet Mask</label><br>
        <input type="text" name="subnetMask" id="subnetMask"><br><br>
        <input type="submit" value="Berechnen"><br><br> 
    </form>
    <?php
    if(isset($_POST["ip"]) && isset($_POST["subnetMask"])){
    function calculateIPRange($ip, $subnetMask) {
        // Convert IP and subnet mask to binary
        $ipBinary = ip2long($ip);
        $subnetMaskBinary = ip2long($subnetMask);
    
        // Calculate network address
        $networkAddress = $ipBinary & $subnetMaskBinary;
    
        // Calculate broadcast address
        $broadcastAddress = $networkAddress | (~$subnetMaskBinary);
    
        // Calculate usable IP range
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
    
    // Example usage
    $ip = $_POST["ip"];
    $subnetMask = $_POST["subnetMask"];
    
    $result = calculateIPRange($ip, $subnetMask);
    
    echo "IP Address:". $ip ."<br>";
    echo "Subnet Mask:". $subnetMask ."<br>";
    
    echo "Network Address: " . $result['Network Address'] . "<br>";
    echo "Broadcast Address: " . $result['Broadcast Address'] . "<br>";
    echo "Usable IP Range: " . $result['Usable IP Range']['Start'] . " - " . $result['Usable IP Range']['End'] . "<br>";
    }
    ?>
    
</body>
</html>