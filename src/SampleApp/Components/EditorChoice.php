<?php

namespace DiscoveryCms\PhpClient\SampleApp\Components;

class EditorChoice
{
    public static function render(object $data) { ?>
        <div>
            Hello, I'm the Editor Choice with headline: <?= $data->headline ?>
        </div>
<?php
    }
}