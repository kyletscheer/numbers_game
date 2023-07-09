<?php
$csvFile = 'oneresultpemdasnumbers.csv';  // Replace with the path to your CSV file
$jsonFile = 'data.json';  // Replace with the desired path for the output JSON file

// Read the CSV file
if (($handle = fopen($csvFile, "r")) !== FALSE) {
    $digitCounts = [];
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $number = $data[0];
        $digitCount = strlen($number);

        if (!isset($digitCounts[$digitCount])) {
            $digitCounts[$digitCount] = [];
        }

        $digitCounts[$digitCount][] = $number;
    }
    fclose($handle);

    // Create JSON file
    $jsonData = json_encode($digitCounts, JSON_PRETTY_PRINT);
    file_put_contents($jsonFile, $jsonData);

    echo "JSON file created successfully!";
} else {
    echo "Error opening CSV file.";
}
