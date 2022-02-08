<?php

function applyFrame($sourceResource, $framePath) {
    $frame = imagecreatefrompng($framePath);
    $frame = resizePngImage($frame, imagesx($sourceResource), imagesy($sourceResource));
    $x = imagesx($sourceResource) / 2 - imagesx($frame) / 2;
    $y = imagesy($sourceResource) / 2 - imagesy($frame) / 2;
    imagecopy($sourceResource, $frame, $x, $y, 0, 0, imagesx($frame), imagesy($frame));
    return $sourceResource;
}

function resizeBeforeApplyFrame($sourceResource, $framePath) {
    $frame = imagecreatefrompng($framePath);
    $x = (imagesx($sourceResource) - imagesx($frame))/2;
    $resizedSource = imagecreatetruecolor( imagesx($frame), imagesy($frame));
    imagecopyresized($resizedSource, $sourceResource, 0, 0, $x, 0, imagesx($frame), imagesx($frame), imagesx($frame), imagesx($frame) );
    return $resizedSource;
    }