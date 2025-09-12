<?php

use App\Http\Controllers\BlogerController;
use App\Http\Controllers\FrontendCotroller;
use App\Http\Controllers\LogController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\KorisnikBackendController;
use App\Http\Controllers\SlajderBackendController;
use App\Http\Controllers\BlogBackendController;
use App\Http\Controllers\TretmanBackendController;
use App\Http\Controllers\TipTretmanaBackendController;
use App\Http\Controllers\SaradniciBackendController;
use App\Http\Controllers\KategorijaBackendControler;
use App\Http\Controllers\PodkategorijaBackendControler;
use Illuminate\Support\Facades\Route;

Route::get('/',[FrontendCotroller::class,'index'])->name('index');
Route::get('/tretmani/{id_tt}/{id_tretman}',[FrontendCotroller::class,'tretmani'])->name('tretmani');

Route::get('/tretmani/{id_tt}/{id_tretman}/{id_kategorija}',[FrontendCotroller::class,'kategorija'])->name('kategorija');
Route::get('/tretmani/{id_tt}/{id_tretman}/{id_kategorija}/{id_podkategorija}',[FrontendCotroller::class,'podkategorija'])->name('podkategorija');

Route::get('/kontakt', [FrontendCotroller::class, 'kontakt'])->name('kontakt');
Route::post('/kontakt', [FrontendCotroller::class, 'doKontakt'])->name('doKontakt');

// opisTretmanaKatPodkat
Route::get('/blog1',[FrontendCotroller::class,'blog1'])->name('blog1');
Route::get('/blog2',[FrontendCotroller::class,'blog2'])->name('blog2');
Route::get('/blog3',[FrontendCotroller::class,'blog3'])->name('blog3');
Route::get('/galerija',[FrontendCotroller::class,'galerija'])->name('galerija');
Route::get('/one_Blog/{id_blog}',[FrontendCotroller::class,'oneBlog'])->name('one_Blog');

Route::get('/adminPanel',[LogController::class,'logovanje'])->name('logovanje');
Route::post('/doLogovanje',[LogController::class,'doLogovanje'])->name('doLogovanje');

//ajax
Route::get('/searchBlog1',[FrontendCotroller::class,'searchBlog1'])->name('searchBlog1');
Route::get('/searchBlog2',[FrontendCotroller::class,'searchBlog2'])->name('searchBlog2');
Route::get('/searchBlog3',[FrontendCotroller::class,'searchBlog3'])->name('searchBlog3');


//ADMIN
Route :: group(['middleware'=>'admin'],function (){
    Route::get('/logout',[LogController::class,'logout'])->name('logout');
    //prikaz sadrzaja iz baze
    Route::get('/adminPanel_korisnici',[KorisnikBackendController::class,'adminPanel_korisnici'])->name('adminPanel_korisnici');
    Route::get('/adminPanel_tretmani/{id_tt}',[TretmanBackendController::class,'adminPanel_tretmani'])->name('adminPanel_tretmani');
    Route::get('/adminPanel_tipTretman',[TipTretmanaBackendController::class,'adminPanel_tipTretman'])->name('adminPanel_tipTretman');

    Route::get('/adminPanel_kategorije',[KategorijaBackendControler::class,'adminPanel_kategorije'])->name('adminPanel_kategorije');
    Route::get('/adminPanel_podkategorije',[PodkategorijaBackendControler::class,'adminPanel_podkategorije'])->name('adminPanel_podkategorije');


    Route::get('/adminPanel_podaci',[BackendController::class,'adminPanel_podaci'])->name('adminPanel_podaci');
    Route::get('/adminPanel_slajder',[SlajderBackendController::class,'adminPanel_slajder'])->name('adminPanel_slajder');
    Route::get('/adminPanel_blog',[BlogBackendController::class,'adminPanel_blog'])->name('adminPanel_blog');
    Route::get('/adminPanel_saradnici',[SaradniciBackendController::class,'adminPanel_saradnici'])->name('adminPanel_saradnici');

    Route::get('adminPanel_pregled_blog/{id_blog}',[BlogBackendController::class,'adminPanel_pregled_blog'])->name('adminPanel_pregled_blog');
    Route::get('adminPanel_pregled_tretmani/{id_tt}/{id_tretman}',[TretmanBackendController::class,'adminPanel_pregled_tretmani'])->name('adminPanel_pregled_tretmani');

    //insert
    Route::get('/adminPanel_tretmani_insert',[TretmanBackendController::class,'adminPanel_tretmani_insert'])->name('adminPanel_tretmani_insert');
    Route::post('/adminPanel_tretmani_insert',[TretmanBackendController::class,'doAdminPanel_tretmani_insert'])->name('doAdminPanel_tretmani_insert');

    Route::get('/adminPanel_kategorije_insert',[KategorijaBackendControler::class,'adminPanel_kategorije_insert'])->name('adminPanel_kategorije_insert');
    Route::post('/adminPanel_kategorije_insert',[KategorijaBackendControler::class,'doAdminPanel_kategorije_insert'])->name('doAdminPanel_kategorije_insert');

    Route::get('/adminPanel_podkategorija_insert',[PodkategorijaBackendControler::class,'adminPanel_podkategorija_insert'])->name('adminPanel_podkategorija_insert');
    Route::post('/adminPanel_podkategorija_insert',[PodkategorijaBackendControler::class,'doAdminPanel_podkategorija_insert'])->name('doAdminPanel_podkategorija_insert');

    Route::get('/adminPanel_slajder_insert',[SlajderBackendController::class,'adminPanel_slajder_insert'])->name('adminPanel_slajder_insert');
    Route::post('/adminPanel_slajder_insert',[SlajderBackendController::class,'doAdminPanel_slajder_insert'])->name('doAdminPanel_slajder_insert');

    Route::get('/adminPanel_korisnik_insert',[KorisnikBackendController::class,'adminPanel_korisnik_insert'])->name('adminPanel_korisnik_insert');
    Route::post('/adminPanel_korisnik_insert',[KorisnikBackendController::class,'doAdminPanel_korisnik_insert'])->name('doAdminPanel_korisnik_insert');

    Route::get('/adminPanel_blog_insert',[BlogBackendController::class,'adminPanel_blog_insert'])->name('adminPanel_blog_insert');
    Route::post('/adminPanel_blog_insert',[BlogBackendController::class,'doAdminPanel_blog_insert'])->name('doAdminPanel_blog_insert');

    Route::get('/adminPanel_tipTretman_insert',[TipTretmanaBackendController::class,'adminPanel_tipTretman_insert'])->name('adminPanel_tipTretman_insert');
    Route::post('/adminPanel_tipTretman_insert',[TipTretmanaBackendController::class,'doAdminPanel_tipTretman_insert'])->name('doAdminPanel_tipTretman_insert');

    Route::get('/adminPanel_saradnici_insert',[SaradniciBackendController::class,'adminPanel_saradnici_insert'])->name('adminPanel_saradnici_insert');
    Route::post('/adminPanel_saradnici_insert',[SaradniciBackendController::class,'doAdminPanel_saradnici_insert'])->name('doAdminPanel_saradnici_insert');

    //ajax
    Route::get('/sortByDate_blog',[BlogBackendController::class,'sortByDate_blog'])->name('sortByDate_blog');
    Route::get('/searchTretmani/{id_tt}',[TretmanBackendController::class,'adminPanel_searchTretmani'])->name('searchTretmani');
    Route::get('/searchKategorije',[KategorijaBackendControler ::class,'adminPanel_searchKategorije'])->name('searchKategorije');
    Route::get('/searchPodkategorije',[PodkategorijaBackendControler ::class,'adminPanel_searchPodkategorije'])->name('searchPodkategorije');


    //update
    Route::get('/adminPanel_tretmani_update/{id_tretman}',[TretmanBackendController::class,'adminPanel_tretmani_update'])->name('adminPanel_tretmani_update');
    Route::put('/adminPanel_tretmani_update/{id_tretman}',[TretmanBackendController::class,'doAdminPanel_tretmani_update'])->name('doAdminPanel_tretmani_update');

    Route::get('/adminPanel_kategorija_update/{id_kategorija}',[KategorijaBackendControler::class,'adminPanel_kategorija_update'])->name('adminPanel_kategorija_update');
    Route::put('/adminPanel_kategorija_update/{id_kategorija}',[KategorijaBackendControler::class,'doAdminPanel_kategorija_update'])->name('doAdminPanel_kategorija_update');

    Route::get('/adminPanel_podkategorija_update/{id_podkategorija}',[PodkategorijaBackendControler::class,'adminPanel_podkategorija_update'])->name('adminPanel_podkategorija_update');
    Route::put('/adminPanel_podkategorija_update/{id_podkategorija}',[PodkategorijaBackendControler::class,'doAdminPanel_podkategorija_update'])->name('doAdminPanel_podkategorija_update');

    Route::get('/adminPanel_poodaci_update/{id}',[BackendController::class,'adminPanel_podaci_update'])->name('adminPanel_podaci_update');
    Route::put('/adminPanel_poodaci_update/{id}',[BackendController::class,'doAdminPanel_podaci_update'])->name('doAdminPanel_podaci_update');

    Route::get('/adminPanel_slajder_update/{id_slajder}',[SlajderBackendController::class,'adminPanel_slajder_update'])->name('adminPanel_slajder_update');
    Route::put('/adminPanel_slajder_update/{id_slajder}',[SlajderBackendController::class,'doAdminPanel_slajder_update'])->name('doAdminPanel_slajder_update');

    Route::get('/adminPanel_korisnici_update/{id_korisnik}',[KorisnikBackendController::class,'adminPanel_korisnici_update'])->name('adminPanel_korisnici_update');
    Route::put('/adminPanel_korisnici_update/{id_korisnik}',[KorisnikBackendController::class,'doAdminPanel_korisnici_update'])->name('doAdminPanel_korisnici_update');

    Route::get('/adminPanel_blog_update/{id_blog}',[BlogBackendController::class,'adminPanel_blog_update'])->name('adminPanel_blog_update');
    Route::put('/adminPanel_blog_update/{id_blog}',[BlogBackendController::class,'doAdminPanel_blog_update'])->name('doAdminPanel_blog_update');

    Route::get('/adminPanel_tipTretman_update/{id_tt}',[TipTretmanaBackendController::class,'adminPanel_tipTretman_update'])->name('adminPanel_tipTretman_update');
    Route::put('/adminPanel_tipTretman_update/{id_tt}',[TipTretmanaBackendController::class,'doAdminPanel_tipTretman_update'])->name('doAdminPanel_tipTretman_update');

    Route::get('/adminPanel_saradnici_update/{id_saradnici}',[SaradniciBackendController::class,'adminPanel_saradnici_update'])->name('adminPanel_saradnici_update');
    Route::put('/adminPanel_saradnici_update/{id_saradnici}',[SaradniciBackendController::class,'doAdminPanel_saradnici_update'])->name('doAdminPanel_saradnici_update');

    Route::get('/adminPanel_slajder_sort',[SlajderBackendController::class,'adminPanel_slajder_sort'])->name('adminPanel_slajder_sort');
    Route::post('/sort',[SlajderBackendController::class,'doAdminPanel_slajder_sort'])->name('sort');

    //delete
    Route::get('/adminPanel_korisnici_delete/{id_korisnik}',[KorisnikBackendController::class,'adminPanel_korisnici_delete'])->name('adminPanel_korisnici_delete');
    Route::get('/adminPanel_podaci_delete/{id}',[BackendController::class,'adminPanel_podaci_delete'])->name('adminPanel_podaci_delete');
    Route::get('/adminPanel_slajder_delete/{id_slajder}',[SlajderBackendController::class,'adminPanel_slajder_delete'])->name('adminPanel_slajder_delete');
    Route::get('/adminPanel_blog_delete/{id_blog}',[BlogBackendController::class,'adminPanel_blog_delete'])->name('adminPanel_blog_delete');
    Route::get('/adminPanel_tretmani_delete/{id_tt?}/{id_tretman}',[TretmanBackendController::class,'adminPanel_tretmani_delete'])->name('adminPanel_tretmani_delete');

    Route::get('/adminPanel_kategorija_delete/{id_kategorija}',[KategorijaBackendControler::class,'adminPanel_kategorija_delete'])->name('adminPanel_kategorija_delete');
    Route::get('/adminPanel_podkategorija_delete/{id_podkategorija}',[PodkategorijaBackendControler::class,'adminPanel_podkategorija_delete'])->name('adminPanel_podkategorija_delete');

    Route::get('/adminPanel_tipTretman_delete/{id_tt}',[TipTretmanaBackendController::class,'adminPanel_tipTretman_delete'])->name('adminPanel_tipTretman_delete');
    Route::get('/adminPanel_saradnici_delete/{id_saradnici}',[SaradniciBackendController::class,'adminPanel_saradnici_delete'])->name('adminPanel_saradnici_delete');
});

//BLOGER
Route::group(['middleware'=>'bloger'],function (){
    Route::get('/bloger',[BlogerController::class,'blog1'])->name('bloger');

    Route::get('/oneBlog/{id_blog}',[BlogerController::class,'oneBlog'])->name('oneBlog');
    Route::get('/all_blog',[BlogerController::class,'blog_blog'])->name('all_blog');

    Route::get('/blog_insert',[BlogerController::class,'blog_insert'])->name('blog_insert');
    Route::post('/blog_insert',[BlogerController::class,'doBlog_insert'])->name('doBlog_insert');

    Route::get('/blog_update/{id_blog}',[BlogerController::class,'blog_update'])->name('blog_update');
    Route::post('/blog_update/{id_blog}',[BlogerController::class,'doBlog_update'])->name('doBlog_update');

    Route::get('/blog_delete/{id_blog}',[BlogerController::class,'blog_delete'])->name('blog_delete');

    //ajax
    Route::post('/sortByDateBlog',[BlogerController::class,'sortByDateBlog'])->name('sortByDateBlog');
    Route::post('/searchBloger',[BlogerController::class,'searchBloger'])->name('searchBloger');
});

