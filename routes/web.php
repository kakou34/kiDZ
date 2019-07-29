<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//routes used to access main subpages from the navigation bar
//route to access the home page*

/** Routes for the Users side  */
Route::get('/', function () {
    return view('index');
});
//route to access "je regarde"
Route::get('watch', [
    'uses' => 'WatchController@loadPageWatch',
    'as' => 'loadPageWatch'
]);
//route to access "je lis"
Route::get('read', [
    'uses' => 'ReadController@fetchLists',
    'as' => 'readFetchLists'
]);
//route to show a page for a games category
Route::get('/games/{category_id}', 'PlayController@categoryPage')->name('play');
//route to show a page for a specific game
Route::get('gamePage/{game_id}', 'GameController@gamePage')->name('gamePage');
//route to access DIY
Route::get('diy', [
    'uses' => 'DiyController@fetchLists',
    'as' => 'diyFetchLists'
]);

//routes with parameters

//route to show detail page for a show from Je regarde
Route::get('/showPage/{show_id}', 'ShowController@showPage')
    ->name('showPage');



//route to show detail page for a video
Route::get('/diyVideoPage/{video_id}', 'VideoController@diyVideoPage')
    ->name('diyVideoPage');
Route::get('/episodeVideoPage/{video_id}', 'VideoController@episodeVideoPage')
    ->name('episodeVideoPage');


//route to show detailed page for articles
Route::get('articlePage/{articleID}', [
    'uses' => 'ArticleController@loadArticle',
    'as' => 'articlePage'
]);
//route to show a page for a games category
Route::get('/games/{category_id}', 'PlayController@categoryPage')->name('play');
//route to show a page for a specific game
Route::get('gamePage/{game_id}', 'GameController@gamePage')->name('gamePage');

//route to show a page for a subject
Route::get('/subject/{subject_id}', 'LearnController@subjectPage')->name('learn');
//route to show a page for a specific course
Route::get('coursePage/{course_id}', 'CourseController@coursePage')->name('coursePage');





/** Routes for the Administration side */
Route::group([ 'middleware' => 'auth'], function () {
    //Routes that need authentication of an admin go here

    /** Routes for "Je regarde" module*/
    //route for displaying the admin page for je regarde from dashboard and cmssidebar
    Route::get('cmswatch', [
        'uses' => 'CmsWatchController@fetchLists',
        'as' => 'cmsWatch'
    ]);
    //route for adding a new show
    Route::post('cmswatch/storeShow', [
        'uses' => 'CmsWatchController@storeShow',
        'as' => 'storeShow'
    ]);
    //route for deleting a show
    Route::get('/deleteShow/{showID}', 'CmsWatchController@deleteShow')->name('deleteShow');

    //route for adding a new episode
    Route::post('cmswatch/storeEpisode', [
        'uses' => 'CmsWatchController@storeEpisode',
        'as' => 'storeEpisode'
    ]);
    //route for deleting episode
    Route::get('/deleteEpisode/{episode_id}', 'CmsWatchController@deleteEpisode')->name('deleteEpisode');
    //route for searching episodes per show
    Route::get('/searchEpisodes/{show_id}', 'CmsWatchController@searchEpisodes')->name('searchEpisodes');


    /** Routes used to handle the "Je lis" module */
    //route to show the admin page for je lis from dashboard and cmssidebar
    Route::get('cmsread', [
        'uses' => 'CmsReadController@loadPage',
        'as' => 'cmsRead'
    ]);

    //route to add a new article
    Route::post('cmsread/postArticle', [
        'uses' => 'CmsReadController@postArticle',
        'as' => 'postArticle'
    ]);
    //route to delete an article
    Route::get('/deleteArticle/{articleID}', 'CmsReadController@deleteArticle')->name('deleteArticle');
    //route to access edit Article page for a specific article
    Route::get('/editArticle/{articleID}', 'EditArticleController@loadEdition')->name('loadEditArticle');
    //route to save modifications made to an article
    Route::post('doEditArticle/{articleID}', [
        'uses' => 'EditArticleController@editArticle',
        'as' => 'doEditArticle'
    ]);

    //route to append image edition field
    Route::get('editImage', 'EditArticleController@editImage')->name('editImage');

    /** Routes used for the "j'apprends" module*/
    //route for displaying admin page for J'apprends from dashboard and cmssidebar
    Route::get('cmslearn', [
        'uses' => 'CmsLearnController@fetchLists',
        'as' => 'cmsLearn'
    ]);
    //route for adding a new subject
    Route::post('cmslearn/storeSubject', [
        'uses' => 'CmsLearnController@storeSubject',
        'as' => 'storeSubject'
    ]);
    //route for deleting a subject
    Route::get('/deleteSubject/{subjectID}', 'CmsLearnController@deleteSubject')
        ->name('deleteSubject');
    //route for creating a new course
    Route::post('cmslearn/storeCourse', [
        'uses' => 'CmsLearnController@storeCourse',
        'as' => 'storeCourse'
    ]);
    //route to search for courses by their subject
    Route::get('/searchCourses/{subject_id}', 'CmsLearnController@searchCourses')->name('searchCourses');
    //route to delete a course
    Route::get('/deleteCourse/{course_id}', 'CmsLearnController@deleteCourse')->name('deleteCourse');
    //route to load a page to edit a course
    Route::get('/editCourse/{courseID}', 'EditCourseController@loadEdition')->name('loadEditCourse');
    //course to save modifications made on a course
    Route::post('doEditCourse/{courseID}', [
        'uses' => 'EditCourseController@editCourse',
        'as' => 'doEditCourse'
    ]);
    //route to add a questiojn to a specific course
    Route::post('/addQuestion/{courseID}', [
        'uses' => 'EditCourseController@addQuestion',
        'as' => 'addQuestion'
    ]);
    //route to delete a question
    Route::get('/deleteQuestion/{question_id}', 'EditCourseController@deleteQuestion')->name('deleteQuestion');

    /** Routes used for the "Je joue" module */

    //route for displaying admin page for je joue from dashboard and cmssidebar
    Route::get('cmsplay', [
        'uses' => 'CmsPlayController@fetchLists',
        'as' => 'cmsPlay'
    ]);
    //route to add a new Game category
    Route::post('cmsplay/storeGameCategory', [
        'uses' => 'CmsPlayController@storeGameCategory',
        'as' => 'storeGameCategory'
    ]);
    //route to delete a game category
    Route::get('/deleteGameCategory/{categoryID}', 'CmsPlayController@deleteGameCategory')
        ->name('deleteGameCategory');
    //route to add a new game
    Route::post('cmsplay/storeGame', [
        'uses' => 'CmsPlayController@storeGame',
        'as' => 'storeGame'
    ]);
    //route to delete a game
    Route::get('/deleteGame/{game_id}', 'CmsPlayController@deleteGame')->name('deleteGame');
    //route to search a game per category
    Route::get('/searchGames/{category_id}', 'CmsPlayController@searchGames')->name('searchGames');

    /** Routes used for the administration of "DIY" module */
    //route to display the admin page for diy from dashboard and cmssidebar
    Route::get('cmsdiy', [
        'uses' => 'CmsDiyController@loadPage',
        'as' => 'cmsDiy'
    ]);


    //route to add a new diy video
    Route::post('cmsdiy/storeDiy', [
        'uses' => 'CmsDiyController@storeDiy',
        'as' => 'storeDiy'
    ]);

    //route to delete a diy video
    Route::get('/deleteDiy/{videoID}', 'CmsDiyController@deleteDiy')->name('deleteDiy');

    //route to display the admin page for Adding a new Admin
    Route::get('cmsadmins', [
        'uses' => 'AdminController@loadPage',
        'as' => 'cmsAdmins'
    ]);

    //route to add an admin
    Route::post('cmsdiy/storeAdmin', [
        'uses' => 'AdminController@storeAdmin',
        'as' => 'storeAdmin'
    ]);

    //route to delete an admin
    Route::get('/deleteAdmin/{id}', 'AdminController@deleteAdmin')->name('deleteAdmin');

});


// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');



//route to access the home page for admins
Route::get('/home', 'HomeController@index')->name('home');
