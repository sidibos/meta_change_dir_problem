<?php

function changeDirectory($sourceDir, $targetDir)
{
    $rootDir = '/';
    $levelUp = '..';
    $sameDir = '.';

    if (
        $targetDir === $rootDir
        || $rootDir === $targetDir
    ) {
        return $rootDir;
    }

    $sourceDirData = explode('/', substr($sourceDir, 1));
    $targetDirData  = explode('/', $targetDir);

    for($i = 0; $i < count($targetDirData); $i++) {
        if (empty($sourceDirData)) {
            break;
        }
        $currElm = $targetDirData[$i];
        if (
            empty($currElm)
            || $currElm === $sameDir
        ) {
            continue;
        }
        array_pop($sourceDirData);

        if ($currElm !== $levelUp) {
            $sourceDirData[] = $currElm;
        } else {
            $sourceDirData[] = $currElm;
        }
    }
    return $rootDir . implode('/', $sourceDirData);
}

$sourceDir = '/x/y';
$targetDir = '../p/./../q/';

//$sourceDir = '/bar';
//$targetDir = '/baz';

echo changeDirectory($sourceDir, $targetDir);