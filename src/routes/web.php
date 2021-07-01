<?php
/**
 * -----------------------------------------------------------------
 * NOTE : There is two routes has a name (user & group),
 * any change in these two route's name may cause an issue
 * if not modified in all places that used in (e.g Chatify class,
 * Controllers, chatify javascript file...).
 * -----------------------------------------------------------------
 */

use Illuminate\Support\Facades\Route;

/*
* This is the main app route [Chatify Messenger]
*/
Route::get('/', [\Chatify\Http\Controllers\MessagesController::class],'index')->name(config('chatify.routes.prefix'));

/**
 *  Fetch info for specific id [user/group]
 */
Route::post('/idInfo', [\Chatify\Http\Controllers\MessagesController::class],'idFetchData');

/**
 * Send message route
 */
Route::post('/sendMessage',[\Chatify\Http\Controllers\MessagesController::class] ,'send')->name('send.message');

/**
 * Fetch messages
 */
Route::post('/fetchMessages', [\Chatify\Http\Controllers\MessagesController::class],'fetch')->name('fetch.messages');

/**
 * Download attachments route to create a downloadable links
 */
Route::get('/download/{fileName}',[\Chatify\Http\Controllers\MessagesController::class],'download')->name(config('chatify.attachments.download_route_name'));

/**
 * Authintication for pusher private channels
 */
Route::post('/chat/auth',[\Chatify\Http\Controllers\MessagesController::class],'pusherAuth')->name('pusher.auth');

/**
 * Make messages as seen
 */
Route::post('/makeSeen', [\Chatify\Http\Controllers\MessagesController::class],'seen')->name('messages.seen');

/**
 * Get contacts
 */
Route::post('/getContacts', [\Chatify\Http\Controllers\MessagesController::class],'getContacts')->name('contacts.get');

/**
 * Update contact item data
 */
Route::post('/updateContacts', [\Chatify\Http\Controllers\MessagesController::class],'updateContactItem')->name('contacts.update');


/**
 * Star in favorite list
 */
Route::post('/star', [\Chatify\Http\Controllers\MessagesController::class],'favorite')->name('star');

/**
 * get favorites list
 */
Route::post('/favorites', [\Chatify\Http\Controllers\MessagesController::class],'getFavorites')->name('favorites');

/**
 * Search in messenger
 */
Route::post('/search', [\Chatify\Http\Controllers\MessagesController::class],'search')->name('search');

/**
 * Get shared photos
 */
Route::post('/shared', [\Chatify\Http\Controllers\MessagesController::class],'sharedPhotos')->name('shared');

/**
 * Delete Conversation
 */
Route::post('/deleteConversation', [\Chatify\Http\Controllers\MessagesController::class],'deleteConversation')->name('conversation.delete');

/**
 * Delete Conversation
 */
Route::post('/updateSettings', [\Chatify\Http\Controllers\MessagesController::class],'updateSettings')->name('avatar.update');

/**
 * Set active status
 */
Route::post('/setActiveStatus', [\Chatify\Http\Controllers\MessagesController::class],'setActiveStatus')->name('activeStatus.set');






/*
* [Group] view by id
*/
Route::get('/group/{id}', [\Chatify\Http\Controllers\MessagesController::class],'index')->name('group');

/*
* user view by id.
* Note : If you added routes after the [User] which is the below one,
* it will considered as user id.
*
* e.g. - The commented routes below :
*/
// Route::get('/route', function(){ return 'Munaf'; }); // works as a route
Route::get('/{id}', [\Chatify\Http\Controllers\MessagesController::class],'index')->name('user');
// Route::get('/route', function(){ return 'Munaf'; }); // works as a user id
