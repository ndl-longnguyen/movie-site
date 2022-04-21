<?php

/**
 * Upload file to path
 * @param mixed $file
 * @param mixed $path
 * @return void
 */
function uploadFile($file, $path)
{
    $fileName = $file->getClientOriginalName();

    $file->move(public_path($path), $fileName);
}