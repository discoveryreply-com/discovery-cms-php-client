<?php

namespace DiscoveryCms\PhpClient\SampleApp\Components;

class Trending
{
    public static function render(object $data) { ?>
        <div>
            Hello, I'm the Trending with headline: <?= $data->headline ?>
        </div>
<?php
    }
}