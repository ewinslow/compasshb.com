<?php

namespace CompassHB\Video;

class NullProvider implements VideoInterface {
    
    public function recognizes($url) {
        return true;
    }

    public function getEmbedCode($url) {
        return '';
    }

    public function getThumbnail($url, $large = false) {
        return '';
    }

    public function getDownloadLink($url) {
        return '';
    }

}