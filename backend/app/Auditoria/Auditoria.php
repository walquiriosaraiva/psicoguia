<?php

namespace App\AuditoriaTable;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface Logger
{

    public function log($message);

}
