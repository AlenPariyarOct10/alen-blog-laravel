<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend;
use App\Http\Controllers\Frontend;

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

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

$frontEndRoutes = array(
//    Path, view-path, viewName
    "/"=>array("frontend.welcome", "frontend.home"),


    "/gallery"=>array("frontend.gallery", "frontend.gallery"),

);

foreach ($frontEndRoutes as $key => $value) {
    Route::get($key, function () use ($value) {
        return view($value[0]);
    })->name($value[1]);
}

Route::get("/services",[\App\Http\Controllers\Frontend\UserServiceController::class, "index"])->name("frontend.services");
Route::get("/gallery",[\App\Http\Controllers\Frontend\GalleryController::class, "index"])->name("frontend.gallery.index");
Route::get("/blog",[\App\Http\Controllers\Frontend\BlogController::class, "index"])->name("frontend.blogs.index");
Route::get("/blog/{slug}",[\App\Http\Controllers\Frontend\BlogController::class, "show"])->name("frontend.blogs.show");
Route::get("/contact",[\App\Http\Controllers\Frontend\ContactFormController::class, "create"])->name("frontend.contact.create");
Route::put("/contact",[\App\Http\Controllers\Frontend\ContactFormController::class, "store"])->name("frontend.contact.store");
Route::get("/projects",[\App\Http\Controllers\Frontend\ProjectController::class, "index"])->name("frontend.projects.index");
Route::get("/projects/{id}",[\App\Http\Controllers\Frontend\ProjectController::class, "show"])->name("frontend.projects.show");

Route::get("/backend/login",function (){
    return view("backend.login");
})->name("login");

Route::post("/backend/user/verify",[Backend\UserController::class, 'verifyUser'])->name("backend.user.verify");




Route::middleware(['auth'])->group(function () {
    $backendRoutes = array(
        "/backend/"=>array("backend.index", "backend.index"),
    );
    foreach ($backendRoutes as $key => $value) {
        Route::get($key, function () use ($value) {
            return view($value[0]);
        })->name($value[1]);
    }

//Admin - Backend
    Route::get("/backend/services/",[\App\Http\Controllers\Backend\UserServiceController::class, "index"])->name("backend.services.index");
    Route::get("/backend/services/create",[\App\Http\Controllers\Backend\UserServiceController::class, "create"])->name("backend.services.create");
    Route::get("/backend/services/{id}/edit",[\App\Http\Controllers\Backend\UserServiceController::class, "edit"])->name("backend.services.edit");
    Route::post("/backend/services/",[\App\Http\Controllers\Backend\UserServiceController::class, "store"])->name("backend.services.store");
    Route::delete("/backend/services/{id}",[\App\Http\Controllers\Backend\UserServiceController::class, "destroy"])->name("backend.services.destroy");
    Route::put("/backend/services/{id}",[\App\Http\Controllers\Backend\UserServiceController::class, "update"])->name("backend.services.update");

    //Backend -> Blog
    Route::get("/backend/blogs/", [Backend\BlogController::class, 'index'])->name("backend.blogs.index");
    Route::get("/backend/blogs/create", [Backend\BlogController::class, 'create'])->name("backend.blogs.create");
    Route::post("/backend/blogs/upload", [Backend\BlogController::class, 'uploadimage'])->name("ckeditor.upload");
    Route::post("/backend/blogs/", [Backend\BlogController::class, 'store'])->name("backend.blogs.store");
    Route::get("/backend/blogs/checkTitle", [Backend\BlogController::class, 'checkTitle'])->name("backend.blogs.checkTitle");
    Route::get("/backend/blogs/{id}/edit", [Backend\BlogController::class, 'edit'])->name("backend.blogs.edit");
    Route::delete("/backend/blogs/{id}", [Backend\BlogController::class, 'destroy'])->name("backend.blogs.destroy");
    Route::put("/backend/blogs/{id}", [Backend\BlogController::class, 'update'])->name("backend.blogs.update");

    //Backend -> Projects
    Route::get("/backend/projects/", [Backend\ProjectController::class, 'index'])->name("backend.projects.index");
    Route::get("/backend/projects/create", [Backend\ProjectController::class, 'create'])->name("backend.projects.create");
    Route::post("/backend/projects/", [Backend\ProjectController::class, 'store'])->name("backend.projects.store");
    Route::get("/backend/projects/{id}/edit", [Backend\ProjectController::class, 'edit'])->name("backend.projects.edit");
    Route::delete("/backend/projects/{id}", [Backend\ProjectController::class, 'destroy'])->name("backend.projects.destroy");
    Route::put("/backend/projects/{id}", [Backend\ProjectController::class, 'update'])->name("backend.projects.update");


    //Backend -> ContactForm
    Route::get("/backend/contact/",[Backend\ContactFormController::class, 'index'])->name("backend.contact.index");

    //Backend -> About
    Route::get("/backend/about", [Backend\AboutController::class, 'index'])->name("backend.about.index");
    Route::get("/backend/about/create", [Backend\AboutController::class, 'create'])->name("backend.about.create");
    Route::post("/backend/about/", [Backend\AboutController::class, 'store'])->name("backend.about.store");
    Route::get("/backend/about/{id}/edit", [Backend\AboutController::class, 'edit'])->name("backend.about.edit");
    Route::put("/backend/about/{id}", [Backend\AboutController::class, 'update'])->name("backend.about.update");
    Route::delete("/backend/about/{id}", [Backend\AboutController::class, 'destroy'])->name("backend.about.destroy");

    //Backend -> Logout
    Route::get("/backend/logout", [Backend\UserController::class, "logout"])->name("backend.user.logout");


    //Backend -> Gallery
    Route::get("/backend/gallery/",[Backend\GalleryController::class, 'index'])->name("backend.gallery.index");
    Route::get("/backend/gallery/create",[Backend\GalleryController::class, 'create'])->name("backend.gallery.create");
    Route::post("/backend/gallery/",[Backend\GalleryController::class, 'store'])->name("backend.gallery.store");
    Route::get("/backend/gallery/{id}/edit",[Backend\GalleryController::class, 'edit'])->name("backend.gallery.edit");
    Route::delete("/backend/gallery/{id}",[Backend\GalleryController::class, 'destroy'])->name("backend.gallery.destroy");
    Route::put("/backend/gallery/{id}",[Backend\GalleryController::class, 'update'])->name("backend.gallery.update");

//    Backend -> setting
    Route::get("backend/setting", [Backend\UserController::class, "index"])->name("backend.setting.index");
    Route::get("backend/setting/edit", [Backend\UserController::class, "edit"])->name("backend.setting.edit");
    Route::get("backend/setting/changepassword", [Backend\UserController::class, "getChangepassword"])->name("backend.setting.changepassword");
    Route::put("backend/setting/changepassword", [Backend\UserController::class, "changePassword"])->name("backend.setting.updatepassword");
    Route::put("backend/setting", [Backend\UserController::class, "update"])->name("backend.setting.update");

    //    Backend -> options
    Route::get("backend/options", [Backend\OptionController::class, "index"])->name("backend.options.index");
    Route::get("backend/options/edit", [Backend\OptionController::class, "edit"])->name("backend.options.edit");
    Route::put("backend/options", [Backend\OptionController::class, "update"])->name("backend.options.update");
});

// Frontend -> About
Route::get("/about", [Frontend\AboutController::class, "index"])->name("frontend.about.index");


