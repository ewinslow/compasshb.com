<?php

namespace CompassHB\Www\Repositories\Transcoder;

interface TranscoderRepository
{
    public function saveAudio($url, $slug);
}
