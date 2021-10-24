<?php

use App\Http\Controllers\AddCategoryToolController;
use App\Http\Controllers\AddCityController;
use App\Http\Controllers\AddCollegeController;
use App\Http\Controllers\AddCountryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CMSHomePageController;
use App\Http\Controllers\AddMemberController;
use App\Http\Controllers\AddRoleController;
use App\Http\Controllers\AddSpecialtyController;
use App\Http\Controllers\AddToolController;
use App\Http\Controllers\AddUniversityController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\TfasolController;
use App\Models\User;

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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::redirect('/', '/admin/dashboard', 301);
    //
    Route::get('/', function () {
        return redirect()->route('admin.cms.homePage');
    })->name('dashboard');
    //
    Route::group(['prefix' => 'cms'], function () {
        Route::group(['prefix' => 'homePage'], function () {
            Route::get('/', [CMSHomePageController::class, 'index'])->name('admin.cms.homePage');
            Route::get('create', [CMSHomePageController::class, 'create'])->name('admin.cms.homePage.create');
            Route::post('store', [CMSHomePageController::class, 'store'])->name('admin.cms.homePage.store');
            Route::get('edit/{CMSHomePage}', [CMSHomePageController::class, 'edit'])->name('admin.cms.homePage.edit');
            Route::post('update/{CMSHomePage}', [CMSHomePageController::class, 'update'])->name('admin.cms.homePage.update');
            Route::post('destroy/{CMSHomePage}', [CMSHomePageController::class, 'destroy'])->name('admin.cms.homePage.destroy');
            //
            Route::group(['prefix' => 'addMember'], function () {
                Route::get('/', [AddMemberController::class, 'index'])->name('admin.cms.homePage.addMember');
                Route::get('create', [AddMemberController::class, 'create'])->name('admin.cms.homePage.addMember.create');
                Route::post('store', [AddMemberController::class, 'store'])->name('admin.cms.homePage.addMember.store');
                Route::get('edit/{addMember}', [AddMemberController::class, 'edit'])->name('admin.cms.homePage.addMember.edit');
                Route::post('update/{addMember}', [AddMemberController::class, 'update'])->name('admin.cms.homePage.addMember.update');
                Route::post('destroy/{addMember}', [AddMemberController::class, 'destroy'])->name('admin.cms.homePage.addMember.destroy');
            });
            //
            Route::group(['prefix' => 'contact'], function () {
                Route::get('/', [ContactController::class, 'index'])->name('admin.cms.homePage.contact');
                Route::get('show/{id}', [ContactController::class, 'show'])->name('admin.cms.homePage.contact.show');
                Route::post('store', [ContactController::class, 'store'])->name('admin.cms.homePage.contact.store');
                Route::get('edit/{contact}', [ContactController::class, 'edit'])->name('admin.cms.homePage.contact.edit');
                Route::post('update/{contact}', [ContactController::class, 'update'])->name('admin.cms.homePage.contact.update');
                Route::post('destroy/{contact}', [ContactController::class, 'destroy'])->name('admin.cms.homePage.contact.destroy');
            });
            //
            Route::group(['prefix' => 'modal'], function () {
                Route::get('/', [ModalController::class, 'index'])->name('admin.cms.homePage.modal');
                Route::get('create', [ModalController::class, 'create'])->name('admin.cms.homePage.modal.create');
                Route::post('store', [ModalController::class, 'store'])->name('admin.cms.homePage.modal.store');
                Route::get('show/{id}', [ModalController::class, 'show'])->name('admin.cms.homePage.modal.show');
                Route::get('edit/{modal}', [ModalController::class, 'edit'])->name('admin.cms.homePage.modal.edit');
                Route::post('update/{modal}', [ModalController::class, 'update'])->name('admin.cms.homePage.modal.update');
                Route::post('destroy/{modal}', [ModalController::class, 'destroy'])->name('admin.cms.homePage.modal.destroy');
            });
            //
            Route::group(['prefix' => 'tfasol'], function () {
                Route::get('/', [TfasolController::class, 'index'])->name('admin.cms.homePage.tfasol');
                Route::get('create', [TfasolController::class, 'create'])->name('admin.cms.homePage.tfasol.create');
                Route::post('store', [TfasolController::class, 'store'])->name('admin.cms.homePage.tfasol.store');
                Route::get('show/{id}', [TfasolController::class, 'show'])->name('admin.cms.homePage.tfasol.show');
                Route::get('edit/{tfasol}', [TfasolController::class, 'edit'])->name('admin.cms.homePage.tfasol.edit');
                Route::post('update/{tfasol}', [TfasolController::class, 'update'])->name('admin.cms.homePage.tfasol.update');
                Route::post('destroy/{tfasol}', [TfasolController::class, 'destroy'])->name('admin.cms.homePage.tfasol.destroy');
            });
        });
        //
        Route::group(['prefix' => 'social'], function () {
            Route::get('/', [socialController::class, 'index'])->name('admin.cms.social');
            Route::get('create', [socialController::class, 'create'])->name('admin.cms.social.create');
            Route::post('store', [socialController::class, 'store'])->name('admin.cms.social.store');
            Route::get('edit/{social}', [socialController::class, 'edit'])->name('admin.cms.social.edit');
            Route::post('update/{social}', [socialController::class, 'update'])->name('admin.cms.social.update');
            Route::post('destroy/{social}', [socialController::class, 'destroy'])->name('admin.cms.social.destroy');
        });
    });
    //
    Route::group(['prefix' => 'helpForms'], function () {
        //
        Route::group(['prefix' => 'addRole'], function () {
            Route::get('/', [AddRoleController::class, 'index'])->name('admin.helpForms.addRole');
            Route::get('create', [AddRoleController::class, 'create'])->name('admin.helpForms.addRole.create');
            Route::post('store', [AddRoleController::class, 'store'])->name('admin.helpForms.addRole.store');
            Route::get('edit/{addRole}', [AddRoleController::class, 'edit'])->name('admin.helpForms.addRole.edit');
            Route::post('update/{addRole}', [AddRoleController::class, 'update'])->name('admin.helpForms.addRole.update');
            Route::post('destroy/{addRole}', [AddRoleController::class, 'destroy'])->name('admin.helpForms.addRole.destroy');
        });
        //
        Route::group(['prefix' => 'addCountry'], function () {
            Route::get('/', [AddCountryController::class, 'index'])->name('admin.helpForms.addCountry');
            Route::get('create', [AddCountryController::class, 'create'])->name('admin.helpForms.addCountry.create');
            Route::post('store', [AddCountryController::class, 'store'])->name('admin.helpForms.addCountry.store');
            Route::get('edit/{addCountry}', [AddCountryController::class, 'edit'])->name('admin.helpForms.addCountry.edit');
            Route::post('update/{addCountry}', [AddCountryController::class, 'update'])->name('admin.helpForms.addCountry.update');
            Route::post('destroy/{addCountry}', [AddCountryController::class, 'destroy'])->name('admin.helpForms.addCountry.destroy');
        });
        //
        Route::group(['prefix' => 'addCity'], function () {
            Route::get('/', [AddCityController::class, 'index'])->name('admin.helpForms.addCity');
            Route::get('create', [AddCityController::class, 'create'])->name('admin.helpForms.addCity.create');
            Route::post('store', [AddCityController::class, 'store'])->name('admin.helpForms.addCity.store');
            Route::get('edit/{addCity}', [AddCityController::class, 'edit'])->name('admin.helpForms.addCity.edit');
            Route::post('update/{addCity}', [AddCityController::class, 'update'])->name('admin.helpForms.addCity.update');
            Route::post('destroy/{addCity}', [AddCityController::class, 'destroy'])->name('admin.helpForms.addCity.destroy');
        });
        //
        Route::group(['prefix' => 'addCategoryTool'], function () { 
            Route::get('/', [AddCategoryToolController::class, 'index'])->name('admin.helpForms.addCategoryTool');
            Route::get('create', [AddCategoryToolController::class, 'create'])->name('admin.helpForms.addCategoryTool.create');
            Route::post('store', [AddCategoryToolController::class, 'store'])->name('admin.helpForms.addCategoryTool.store');
            Route::get('edit/{addCategoryTool}', [AddCategoryToolController::class, 'edit'])->name('admin.helpForms.addCategoryTool.edit');
            Route::post('update/{addCategoryTool}', [AddCategoryToolController::class, 'update'])->name('admin.helpForms.addCategoryTool.update');
            Route::post('destroy/{addCategoryTool}', [AddCategoryToolController::class, 'destroy'])->name('admin.helpForms.addCategoryTool.destroy');
        });
    });
    //
    Route::group(['prefix' => 'addUniversity'], function () {
        Route::get('/', [AddUniversityController::class, 'index'])->name('admin.addUniversity');
        Route::get('create', [AddUniversityController::class, 'create'])->name('admin.addUniversity.create');
        Route::post('store', [AddUniversityController::class, 'store'])->name('admin.addUniversity.store');
        Route::get('edit/{addUniversity}', [AddUniversityController::class, 'edit'])->name('admin.addUniversity.edit');
        Route::post('update/{addUniversity}', [AddUniversityController::class, 'update'])->name('admin.addUniversity.update');
        Route::post('destroy/{addUniversity}', [AddUniversityController::class, 'destroy'])->name('admin.addUniversity.destroy');
    });
    //
    Route::group(['prefix' => 'addCollege'], function () {
        Route::get('/', [AddCollegeController::class, 'index'])->name('admin.addCollege');
        Route::get('create', [AddCollegeController::class, 'create'])->name('admin.addCollege.create');
        Route::post('store', [AddCollegeController::class, 'store'])->name('admin.addCollege.store');
        Route::get('edit/{addCollege}', [AddCollegeController::class, 'edit'])->name('admin.addCollege.edit');
        Route::post('update/{addCollege}', [AddCollegeController::class, 'update'])->name('admin.addCollege.update');
        Route::post('destroy/{addCollege}', [AddCollegeController::class, 'destroy'])->name('admin.addCollege.destroy');
    });
    //
    Route::group(['prefix' => 'addSpecialty'], function () {
        Route::get('/', [AddSpecialtyController::class, 'index'])->name('admin.addSpecialty');
        Route::get('create', [AddSpecialtyController::class, 'create'])->name('admin.addSpecialty.create');
        Route::post('store', [AddSpecialtyController::class, 'store'])->name('admin.addSpecialty.store');
        Route::get('edit/{addSpecialty}', [AddSpecialtyController::class, 'edit'])->name('admin.addSpecialty.edit');
        Route::post('update/{addSpecialty}', [AddSpecialtyController::class, 'update'])->name('admin.addSpecialty.update');
        Route::post('destroy/{addSpecialty}', [AddSpecialtyController::class, 'destroy'])->name('admin.addSpecialty.destroy');
    });
    //
    Route::group(['prefix' => 'addSpecialty'], function () {
        Route::get('/', [AddSpecialtyController::class, 'index'])->name('admin.addSpecialty');
        Route::get('create', [AddSpecialtyController::class, 'create'])->name('admin.addSpecialty.create');
        Route::post('store', [AddSpecialtyController::class, 'store'])->name('admin.addSpecialty.store');
        Route::get('edit/{addSpecialty}', [AddSpecialtyController::class, 'edit'])->name('admin.addSpecialty.edit');
        Route::post('update/{addSpecialty}', [AddSpecialtyController::class, 'update'])->name('admin.addSpecialty.update');
        Route::post('destroy/{addSpecialty}', [AddSpecialtyController::class, 'destroy'])->name('admin.addSpecialty.destroy');
    });
    //
    Route::group(['prefix' => 'addTool'], function () {
        Route::get('/', [AddToolController::class, 'index'])->name('admin.addTool');
        Route::get('create', [AddToolController::class, 'create'])->name('admin.addTool.create');
        Route::post('store', [AddToolController::class, 'store'])->name('admin.addTool.store');
        Route::get('edit/{addTool}', [AddToolController::class, 'edit'])->name('admin.addTool.edit');
        Route::post('update/{addTool}', [AddToolController::class, 'update'])->name('admin.addTool.update');
        Route::post('destroy/{addTool}', [AddToolController::class, 'destroy'])->name('admin.addTool.destroy');
    });
});
//Route::resource('Category', CategoryController::class);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
/**
 * Single Links
 */
Route::get('/', [ViewController::class, 'home'])->name('home');
Route::get('our_team/{our_teams}', [ViewController::class, 'our_team'])->name('our_team');
/**
 * contact
 */
Route::get('create', [ViewController::class, 'create'])->name('create');
Route::post('store', [ViewController::class, 'store'])->name('store');
/**
 * On this page we will show the country, provinces, cities, and universities for their own
 */
Route::get('university/{university}', [ViewController::class, 'university'])->name('university');
//
Route::get('college/{college}', [ViewController::class, 'college'])->name('college');
//
Route::get('specialty/{specialty}', [ViewController::class, 'specialty'])->name('specialty');
