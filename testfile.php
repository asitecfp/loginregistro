<?php

require 'vendor/autoload.php';

$ffmpeg = FFMpeg\FFMpeg::create();
$video = $ffmpeg->open('video.mp4');

$video
    ->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(3))
    ->save('frame.jpg');
$video
    ->save(new FFMpeg\Format\Video\X264(), 'export-x264.mp4')
    ->save(new FFMpeg\Format\Video\WMV(), 'export-wmv.wmv')
    ->save(new FFMpeg\Format\Video\WebM(), 'export-webm.webm');
    ?>