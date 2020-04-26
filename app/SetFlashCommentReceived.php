<?php

namespace App;

class SetFlashCommentReceived {

    public function handle()
    {
        request()
            ->session()
            ->flash('success', 'We have received your comment. It will be visible once we approve it.');
    }
}