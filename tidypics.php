<?php
/*
 * This script should be run inside a directory containing a bunch of non-sorted and badly named pics.
 *
 * It will:
 * - Create 1 directory per day of pictures (example: 2016-04-12) and move all pictures taken that day inside
 * - Rename all pictures using the time they were taken (example: 21-33-28.jpg) managing speedshots as well
 * - Create gifs with your speedshots (group of >= 5 shots taken in less than 1 sec)
 *
 * Requirements:
 * - Pictures should have their modification date corresponding to the date where they have been taken.
 * - ImageMagick should be installed
 */

date_default_timezone_set('Europe/Paris');

$path = $_SERVER['PWD'];

function rglob($pattern, $flags = 0) {
    $files = glob($pattern, $flags);
    foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR|GLOB_NOSORT) as $dir) {
        $files = array_merge($files, rglob($dir.'/'.basename($pattern), $flags));
    }
    return $files;
}

$glob = rglob("/{$path}/*");
sort($glob, SORT_NATURAL);

$array = [];
foreach ($glob as $file) {
    $mtime = filemtime($file);
    $date  = date("Y-m-d H:i:s", $mtime);
    if (array_key_exists($date, $array) == false) {
        $array[$date] = 0;
    }
    $array[$date]++;
}

$list = [];
foreach ($glob as $file) {
    if (!is_file($file)) {
        continue;
    }

    $mtime = filemtime($file);
    if (!array_key_exists($mtime, $list)) {
        $list[$mtime] = [];
    }

    $directory = date("Y-m-d", $mtime);
    if (!is_dir($directory)) {
        mkdir($directory);
    }

    $date = date("Y-m-d H:i:s", $mtime);
    $ext  = strtolower(pathinfo($file, PATHINFO_EXTENSION));

    if ($array[$date] == 1) {
        $newName        = date("H-i-s", $mtime).".".$ext;
        $newPath        = "{$directory}/{$newName}";
        echo "New name: {$newPath}\n";
        rename($file, $newPath);
        $list[$mtime][] = $newPath;
    } else {
        for ($count = 1; ($count <= $array[$date]); $count++) {
            $number  = str_repeat('0', strlen("{$array[$date]}") - strlen("{$count}")) . $count;
            $newName = date("H-i-s", $mtime)."_{$count}.".$ext;
            $newPath = "{$directory}/{$newName}";
            if (!is_file($newPath)) {
                echo "New name: {$newPath}\n";
                rename($file, $newPath);
                $list[$mtime][] = $newPath;
                break;
            }
        }
    }
}

ksort($list);

$groups = [];
$group  = null;
$old    = null;
foreach ($list as $mtime => $batch) {
    if (is_null($old)) {
        $group = $batch;
        $old   = $mtime;
        continue;
    }

    if ($mtime - $old <= 2) {
        $group = array_merge($group, $batch);
        $old   = $mtime;
        continue;
    }

    $groups[$mtime] = $group;
    $group          = $batch;
    $old            = $mtime;
}

if (!is_null($group)) {
    $groups[$old] = $group;
}

foreach ($groups as $mtime => $group) {
    if (($c = count($group)) >= 5) {
        $directory = date("Y-m-d/H-i-s", $mtime);
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $counter = 1;
        foreach ($group as $file) {
            $newName = str_repeat('0', strlen($c) - strlen($counter)).$counter++;
            $newPath = "{$directory}/{$newName}.jpg";
            echo "New name: {$newPath}\n";
            rename($file, $newPath);
        }

        $gifDate   = date("Y-m-d", $mtime);
        $gifTime   = date("H-i-s", $mtime);
        $gifSource = "{$directory}/*.jpg";
        $gifPath   = "{$gifDate}/{$gifTime}.gif";
        echo "Creating {$gifPath}...\n";
        exec("convert -resize 768x576 -delay 25 -loop 0 {$gifSource} {$gifPath}");
    }
}
