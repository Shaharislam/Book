<?php  

Route::group(['middleware' => ['admin']], function () {

    Route::get('admin/contact', 'Book\Contact\Http\Controllers\ContactController@index')
        ->defaults('_config', ['view' => 'contact_view::admin.index'])
        ->name('admin.contact.index');


});
	
?>