<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roast Pork Cooking Time</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            background-color: #f1f5f9;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #f8f8f8;
            padding: 1rem;
            text-align: center;
        }

        .result {
            margin-top: 2rem;
            background-color: #ffffff;
            padding: 1rem;
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .result p {
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .result p.temperature {
            color: #6366f1;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <div class="header">
            <h1 class="text-3xl font-bold mb-4">Roast Pork Cooking Time Calculator</h1>
        </div>

        <form class="max-w-md bg-white p-4 rounded-md shadow-md" method="post">
            <div class="mb-4">
                <label class="block font-bold mb-2" for="weight">Weight of Roast Pork (in kg):</label>
                <input class="w-full px-3 py-2 border border-gray-300 rounded" type="number" step="0.001" name="weight" id="weight" required>
            </div>
            
            <div class="mb-4">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Calculate</button>
            </div>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $weight = $_POST["weight"];
            $initial_cooking_time = ($weight > 2) ? 40 : 50;
            $total_cooking_time = $initial_cooking_time + ($weight * 30);

            $formatted_cooking_time = gmdate("H:i", $total_cooking_time * 60);
            $optimal_temperature_celsius = 180;
            $optimal_temperature_fahrenheit = round(($optimal_temperature_celsius * 9 / 5) + 32);
            $crackling_temperature = 240;
            $crackling_time = ($weight > 2) ? 40 : 50;

            echo '<div class="result mt-4 bg-white p-4 rounded-md shadow-md">';
            echo "<p class='font-bold'>Cooking Time:</p>";
            echo "<p>$formatted_cooking_time</p>";
            echo "<p class='font-bold'>Optimal Temperature:</p>";
            echo "<p class='temperature'>$optimal_temperature_celsius °C / $optimal_temperature_fahrenheit °F</p>";
            echo "<p class='font-bold'>Crackling Temperature:</p>";
            echo "<p>$crackling_temperature °C / " . round(($crackling_temperature * 9 / 5) + 32) . "°F</p>";
            echo "<p class='font-bold'>Crackling Time:</p>";
            echo "<p>$crackling_time minutes</p>";
            echo "</div>";
        }
        ?>

        <div class="footer">
            <p>cyberwarfare.site</p>
        </div>
    </div>
</body>
</html>
