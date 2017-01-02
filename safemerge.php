<?php

/*
 * merges a source directory of pictures with a target directory recursivly,
 * only adding missing pictures to the target directory.
 */

if ($argc !== 3) {
    die("This command takes only a source directory and a target directory.");
}

$source = $argv[1];

$iter = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($source, RecursiveDirectoryIterator::SKIP_DOTS),
    RecursiveIteratorIterator::SELF_FIRST,
    RecursiveIteratorIterator::CATCH_GET_CHILD // Ignore "Permission denied"
);

$paths = array();
foreach ($iter as $path => $dir) {
    if (!$dir->isDir()) {
        $paths[] = substr($path, strlen($source) + 1);
    }
}

$target = $argv[2];

foreach ($paths as $path) {
    $go = $source.'/'.$path;
    $file = $target.'/'.$path;
    if (!is_file($file)) {
        if (!is_dir(dirname($file))) {
            echo "Creating directory {$go}\n";
            mkdir(dirname($file), 0755, true);
        }

        echo "Copying {$go} to {$file}\n";
        copy($go, $file);
    }
}
