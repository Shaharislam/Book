<?php

namespace Book\Contact\Repositories;

use Illuminate\Container\Container as App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Webkul\Core\Eloquent\Repository;


class ContactRepository extends Repository
{

    public function __construct(App $app)
    {
        parent::__construct($app);
    }

  
    public function model()
    {
        return 'Book\Contact\Contracts\Contact';
    }


}