<?php
// Khi dùng route (name) ở view, route này sẽ đi đến 1 function xác định ở 1 controller
// Sau khi xử lý data ở function xong, sẽ trả về 1 view để hiển thị lên trình duyệt

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManageUserController;

/*
|--------------------------------------------------------------------------
| Login - Logout Routes
|--------------------------------------------------------------------------
|
*/
Auth::routes(['verify' => true]);
Route::get('/log-in', [LoginController::class, 'log_in'])->name('log_in');
Route::post('/log-in', [LoginController::class, 'log_in_post'])->name('log_in');
Route::get('/log-out', [UserController::class, 'log_out'])->name('log_out');
Route::post('/password-reset', [UserController::class, 'password_reset'])->name('password_reset');
/*
|--------------------------------------------------------------------------
| Landing Page Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', [IndexController::class, 'home'])->name('homepage');

//Tìm kiếm phim
Route::get('/tim-kiem', [IndexController::class, 'tim_kiem'])->name('tim-kiem');
//Đánh giá phim
Route::post('/add-rating', [IndexController::class, 'add_rating'])->name('add-rating');
//Bookmark phim
Route::post('/add-bookmark', [BookmarkController::class, 'add_bookmark'])->name('add_bookmark');
Route::get('/show-bookmark', [BookmarkController::class, 'show_bookmark'])->name('show_bookmark');
Route::post('/delete-bookmark/{id}', [BookmarkController::class, 'delete_bookmark'])->name('delete_bookmark');

Route::get('/danh-muc/{slug}', [IndexController::class, 'category'])->name('category');
//{slug} là 1 tham số động, giá trị của nó sẽ được thay đôi và truyền vào đường dân
Route::get('/the-loai/{slug}', [IndexController::class, 'genre'])->name('genre');
Route::get('/quoc-gia/{slug}', [IndexController::class, 'country'])->name('country');
Route::get('/phim/{slug}', [IndexController::class, 'movie'])->name('movie');
Route::get('/xem-phim/{slug}/{tap}', [IndexController::class, 'watch']);
Route::get('/so-tap', [IndexController::class, 'episode'])->name('so-tap');
Route::get('/nam/{year}', [IndexController::class, 'year']);
Route::get('/tag/{tag}', [IndexController::class, 'tag']);

// Quản lý tài khoản
Route::get('/setting-info', [UserController::class, 'setting_info'])->name('setting_info');
Route::get('/edit-information', [UserController::class, 'edit_info'])->name('edit_information');
Route::post('/update-information/{id}', [UserController::class, 'update_info'])->name('update_information');

/*
|--------------------------------------------------------------------------
| Admin Page Routes
|--------------------------------------------------------------------------
|
*/

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::post('resorting', [CategoryController::class, 'resorting'])->name('resorting'); //dùng khi nắm kéo thả vị trí sắp xếp của các danh mục, thể loại,...
    Route::resource('manageUser', ManageUserController::class);
    Route::resource('category', CategoryController::class); //trong resource có chứa các phương thức get, post, put để gửi và lấy data
    Route::resource('genre', GenreController::class);
    Route::resource('country', CountryController::class);
    Route::resource('movie', MovieController::class);
    Route::resource('episode', EpisodeController::class); 
    Route::get('/add-episode/{id}', [EpisodeController::class, 'add_episode'])->name('add-episode'); //Thêm tập phim
    Route::get('select-movie', [EpisodeController::class, 'select_movie'])->name('select-movie'); //Chọn tên phim để cập nhật tập phim mới
    Route::get('/update-year-phim', [MovieController::class, 'update_year']); //Update năm phát hành
    Route::get('/update-season-phim', [MovieController::class, 'update_season']); //Update season phim
    Route::get('/update-topview-phim', [MovieController::class, 'update_topview']); //Update top view phim
    Route::post('/filter-topview-phim', [MovieController::class, 'filter_topview']);
    Route::get('/filter-topview-default', [MovieController::class, 'filter_default']);
    Route::get('/update-category', [MovieController::class, 'update_category_ajax'])->name('update_category_ajax'); // Thay đổi danh mục ajax
    Route::get('/update-country', [MovieController::class, 'update_country_ajax'])->name('update_country_ajax'); // Thay đổi quốc gia ajax
});
