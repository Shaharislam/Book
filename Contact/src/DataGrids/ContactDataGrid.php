<?php

namespace Book\Contact\DataGrids;

use Webkul\Ui\DataGrid\DataGrid;
use DB;


class ContactDataGrid extends DataGrid
{
    protected $index = 'contact_id'; //the column that needs to be treated as index column

    protected $sortOrder = 'desc'; //asc or desc

    protected $itemsPerPage = 20;

    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('contact')
                ->addSelect('contact.id as contact_id', 'name', 'email', 'phone', 'message_title', 'message_body','created_at');


        $this->addFilter('contact_id', 'contact.id');

        $this->setQueryBuilder($queryBuilder);
    }

    public function addColumns()
    {
        $this->addColumn([
            'index' => 'contact_id',
            'label' => trans('contact_lang::app.datagrid.id'),
            'type' => 'number',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true
        ]);

        $this->addColumn([
            'index' => 'name',
            'label' => trans('contact_lang::app.datagrid.name'),
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => false
        ]);

        $this->addColumn([
            'index' => 'email',
            'label' => trans('contact_lang::app.datagrid.email'),
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => false
        ]);

        $this->addColumn([
            'index' => 'phone',
            'label' => trans('contact_lang::app.datagrid.phone'),
            'type' => 'string',
            'searchable' => true,
            'sortable' => false,
            'filterable' => false
        ]);
        
        $this->addColumn([
            'index' => 'message_body',
            'label' => trans('contact_lang::app.datagrid.message_body'),
            'type' => 'string',
            'searchable' => false,
            'sortable' => false,
            'filterable' => false,

            'closure' => true,

            'wrapper' => function ($value) {
                if (strlen($value->message_body) > 40)
                    return substr($value->message_body, 0,40).'...';
                else
                    return $value->message_body;
            }
        ]);

        $this->addColumn([
            'index' => 'created_at',
            'label' => trans('contact_lang::app.datagrid.date'),
            'type' => 'string',
            'searchable' => false,
            'sortable' => false,
            'filterable' => false,

            'closure' => true,
        ]);

        
    }

    public function prepareActions() {
        $this->addAction([
            'type' => 'Edit',
            'method' => 'GET', // use GET request only for redirect purposes
            'route' => 'admin.contact.index',
            'icon' => 'icon pencil-lg-icon',
            'title' => trans('contact_lang::app.agent.edit-help-title')
        ]);


        $this->addAction([
            'type' => 'View',
            'method' => 'GET', // use GET request only for redirect purposes
            'route' => 'admin.contact.index',
            'icon' => 'icon eye-icon',
            'title' => trans('contact_lang::app.contact.view')
        ]);


        $this->addAction([
            'type' => 'Delete',
            'method' => 'POST', // use GET request only for redirect purposes
            'route' => 'admin.contact.index',
            'icon' => 'icon trash-icon',
            'title' => trans('contact_lang::app.contact.delete')
        ]);
    }
}