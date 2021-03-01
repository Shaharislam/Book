<?php

namespace Book\Contact\Providers;

use Konekt\Concord\BaseModuleServiceProvider;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        \Book\Contact\Models\Contact::class
    ];
}