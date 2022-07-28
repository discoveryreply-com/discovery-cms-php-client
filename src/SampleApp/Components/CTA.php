<?php

namespace DiscoveryCms\PhpClient\SampleApp\Components;

class CTA
{
    public static function render(object $data) { ?>
        <div>
            Hello, I'm a CTA with headline: <?= $data->headline ?>
        </div>
<?php
    }
}