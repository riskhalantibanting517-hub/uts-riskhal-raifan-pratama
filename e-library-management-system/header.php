<?php
// header.php -- include at the top of every page
// set $pageTitle before including if you want a custom title
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= isset($pageTitle) ? $pageTitle : 'Perpustakaan Riskhal' ?></title>

    <!-- bootstrap from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- global styles -->
    <link rel="stylesheet" href="/riskhal-raifan-pratama/css/all.css" />
    <link rel="stylesheet" href="/riskhal-raifan-pratama/css/theme.css" />
</head>
<body>
<?php include_once(__DIR__ . '/navbar.php'); ?>
<main class="container fade-in">
