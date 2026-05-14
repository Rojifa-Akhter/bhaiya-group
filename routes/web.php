<?php
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Content;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Auth;

Auth::routes([
    'register' => false,
]);

// Route::get('/cc', function () {
//     Artisan::call('optimize:clear');
//     Artisan::call('cache:clear');
//     Artisan::call('config:clear');
//     Artisan::call('route:clear');
//     Artisan::call('view:clear');
//     return "✅ All caches cleared!";
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/contents/{type}', [App\Http\Controllers\ContentController::class, 'index'])->name('content.index');
    Route::get('/contents/{type}/create', [App\Http\Controllers\ContentController::class, 'create'])->name('content.create');
    Route::get('/contents/{type}/edit/{id}', [App\Http\Controllers\ContentController::class, 'edit'])->name('content.edit');
    Route::post('/contents/store', [App\Http\Controllers\ContentController::class, 'store'])->name('content.store');
    Route::post('/contents/update', [App\Http\Controllers\ContentController::class, 'update'])->name('content.update');
    Route::delete('/contents/destroy/{type}/{id}', [App\Http\Controllers\ContentController::class, 'destroy'])->name('content.destroy');

    Route::get('/contact-list', [HomeController::class, 'contactList']);
    Route::patch('/contacts/{id}/toggle', [HomeController::class, 'toggleRead'])->name('contacts.toggle-read');
    Route::delete('/contacts/{id}', [HomeController::class, 'destroy'])->name('contacts.destroy');
});

Route::get('/', [WebController::class, 'home'])->name('web.home');
Route::get('/details', [WebController::class, 'details'])->name('web.details');



// Route::get('/', function () {
//     return view('frontend.index');
// });
Route::get('/generate-sitemap', function () {

    $sitemap = Sitemap::create();

    // Static Pages
    $sitemap->add(Url::create('/'));
    $sitemap->add(Url::create('/blogs'));
    $sitemap->add(Url::create('/offers'));
    $sitemap->add(Url::create('/events'));
    $sitemap->add(Url::create('/company-profile'));
    $sitemap->add(Url::create('/why-invest'));
    $sitemap->add(Url::create('/contact'));

    // Blogs
    $blogs = Content::where('type', 'blogs')->where('status', 1)->get();
    foreach ($blogs as $blog) {
        $sitemap->add(
            Url::create("/blogs/{$blog->name}")
                ->setLastModificationDate($blog->updated_at)
        );
    }

    // Offers
    $offers = Content::where('type', 'offers')->where('status', 1)->get();
    foreach ($offers as $offer) {
        $sitemap->add(
            Url::create("/offers/{$offer->name}")
                ->setLastModificationDate($offer->updated_at)
        );
    }

    // Events
    $events = Content::where('type', 'events')->where('status', 1)->get();
    foreach ($events as $event) {
        $sitemap->add(
            Url::create("/events/{$event->name}")
                ->setLastModificationDate($event->updated_at)
        );
    }

    // Pages
    $pages = Content::where('type', 'pages')->where('status', 1)->get();
    foreach ($pages as $page) {
        $sitemap->add(
            Url::create("/pages/{$page->name}")
                ->setLastModificationDate($page->updated_at)
        );
    }

    $sitemap->writeToFile(public_path('sitemap.xml'));

    return "✅ Sitemap Generated Successfully!";
});
