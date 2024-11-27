<?php
$url = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";

$response = file_get_contents($url);

$result = json_decode($response, true);

// Extract records from the response
$records = $result['results'] ?? [];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University of Bahrain Students</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.*/css/pico.min.css">
</head>
<style>
    th {
        font-weight: bold;
        color: navy;
        background-color: skyblue;
    }
</style>

<body>
    <h6>ITCS333 - Assignment 2 - Asma Mohamed Alshams</h6>
    <div class="overflow-auto">
        <h1>UoB Students by Nationality</h1>
        <?php if (!empty($records)) { ?>
            <table class="striped">
                <thead>
                    <tr>
                        <th>Year</th>
                        <th>Semester</th>
                        <th>The Programs</th>
                        <th>Nationality</th>
                        <th>Colleges</th>
                        <th>Number of Students</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($records as $record): ?>
                        <tr>
                            <td><?= htmlspecialchars($record['year'] ?? ''); ?></td>
                            <td><?= htmlspecialchars($record['semester'] ?? ''); ?></td>
                            <td><?= htmlspecialchars($record['the_programs'] ?? ''); ?></td>
                            <td><?= htmlspecialchars($record['nationality'] ?? ''); ?></td>
                            <td><?= htmlspecialchars($record['colleges'] ?? ''); ?></td>
                            <td><?= htmlspecialchars($record['number_of_students'] ?? ''); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>No records are found.</p>
        <?php } ?>
    </div>
</body>

</html>