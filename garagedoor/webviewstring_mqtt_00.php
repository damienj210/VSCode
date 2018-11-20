<!doctype html>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!--<script type="text/javascript" src="./jquery311.js"></script>  -->

    <script type="text/javascript" src="https://github.com/adafruit/io-issues/releases/download/mqttjs/mqtt.js"></script>
    <!-- <script type="text/javascript" src="./mqtt.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!--<script type="text/javascript" src="./jquery311.js"></script>  -->

    <script type="text/javascript" src="https://github.com/adafruit/io-issues/releases/download/mqttjs/mqtt.js"></script>
    <!-- <script type="text/javascript" src="./mqtt.js"></script> -->

    <script type="text/javascript">
        var suffix = 'GarageDoor';

        var url = 'wss://io.adafruit.com:443/mqtt/',
            username = 'damienj210',
            aio_key = '1cec76fcebf145c782bcfdd2c5c5046a',
            topic = username + '/feeds/' + suffix;


        var client = mqtt.connect(url, {
            username: username,
            password: aio_key
        });

        client.on('connect', function() {

            client.subscribe(topic);
            client.subscribe(username + '/errors');
            //client.subscribe(username + '/throttle');

        });

        client.on('error', function(e) {
            $('pre').append('ERROR: ' + e + '\n');
        });

        client.on('message', function(topic, payload) {
            $('pre').append('/feeds/' + suffix + '/ value: ' + payload + '\n');
            //window.AppInventor.setWebViewString(' ' + payload);

        });
    </script>
</head>
<?php include_once "adafruitio.php";



?>
<body>
    <h1>Adafruit IO MQTT Websocket Demo</h1>
    <button type="button" onclick="$feed->get()">Refresh</button>
    <pre></pre>
    
    
<?php



?>

</body>

</html>

<!--//wrapper to your AIO account
    //$aio = new AdaFruitIO(1cec76fcebf145c782bcfdd2c5c5046a);

    //obtain a wrapper for the feed called "Test":
    //$feed = $aio->getFeed("GarageDoor");
    //$feed->get();-->