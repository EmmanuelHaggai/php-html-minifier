<?php
ob_start("minifier");

function minifier($code) {
    $search = array(
        // remove whitespaces after tags
        '/\>[^\S ]+/s',
        // remove whitespaces before tags
        '/[^\S ]+\</s',
        // remove multiple whitespaces
        '/(\s)+/s',
        // remove HTML comments
        '/<!--(.|\s)*?-->/'
    );
    $replace = array('>', '<', '\\1');
    $code = preg_replace($search, $replace, $code);
    return $code;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Minifier Demo</title>
    <!-- This comment should be removed -->
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 2rem;
        }
    </style>
</head>
<body>
    <h1>Hello, world!</h1>
    <p>This page is being minified in real time using PHP output buffering.</p>
</body>
</html>

<?php
ob_end_flush();
?>
