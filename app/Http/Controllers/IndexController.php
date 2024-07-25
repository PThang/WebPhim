<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Movie_Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Episode;
use App\Models\User;
use App\Models\Rating;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    //Tìm kiếm phim
    public function tim_kiem()
    {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $category = Category::orderBy('id', 'ASC')->where('status', 1)->get();
            $genre = Genre::orderBy('id', 'DESC')->get();
            $country = Country::orderBy('id', 'DESC')->get();
            $phimhot_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngay_cap_nhat', 'DESC')->take(4)->get();
            $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngay_cap_nhat', 'DESC')->take(4)->get();
            $movie = Movie::where('title', 'LIKE', '%' . $search . '%')->orderBy('ngay_cap_nhat', 'DESC')->paginate(16);
            return view('pages.timkiem', compact('category', 'genre', 'country', 'search', 'movie', 'phimhot_sidebar', 'phimhot_trailer'));
            // pages.timkiem là đường dẫn tới view timkiem.blade.php, compact() là để truyền các biến tới view timkiem.blade.php 
        } else {
            return redirect()->to('/');
        }

    }

    //Hiển thị toàn bộ phim ra trang chủ
    public function home()
    {
        // Những phim hiển thị ở slider đầu trang
        $phimhot = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngay_cap_nhat', 'DESC')->get();
        // Những phim sắp chiếu, hiển thị bên phải màn hình, ở trên
        $phimhot_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngay_cap_nhat', 'DESC')->take(4)->get();
        // Những phim top trending, hiển thị bên phải màn hình, ở dưới
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngay_cap_nhat', 'DESC')->take(4)->get();
        //Bắt đầu lấy các dữ liệu khác ra  
        $category = Category::orderBy('id', 'ASC')->where('status', 1)->take(6)->get(); //sắp xếp theo thứ tự ngược: phim nào thêm vào sau thì hiển thị lên trước
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $category_home = Category::with('movie')->orderBy('id', 'DESC')->where('status', 1)->get(); //Lấy hàm movie bên file Category.php
        $user = Auth::user();
        $user = Auth::user();
        $compactData = [
            'category',
            'genre',
            'country',
            'category_home',
            'phimhot',
            'phimhot_trailer',
            'phimhot_sidebar',
            'user'
        ];

        if ($user) {
            $bookmark = Bookmark::where('user_id', $user->id)->get();
            $compactData[] = 'bookmark';
        }

        return view('pages.home', compact($compactData));
        //gửi data của category, genre và country, lên view home để bên view (layout.blade.php) có thể dùng được
    }

    //Menu Danh Mục
    public function category($slug)
    {
        $category = Category::orderBy('id', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $cate_slug = Category::where('slug', $slug)->first();
        $phimhot_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngay_cap_nhat', 'DESC')->take(4)->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngay_cap_nhat', 'DESC')->take(4)->get();
        $movie = Movie::where('category_id', $cate_slug->id)->orderBy('ngay_cap_nhat', 'DESC')->paginate(16);
        return view('pages.category', compact('category', 'genre', 'country', 'cate_slug', 'movie', 'phimhot_sidebar', 'phimhot_trailer'));
    }
    //Menu Năm phát hành
    public function year($year)
    {
        $category = Category::orderBy('id', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $phimhot_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngay_cap_nhat', 'DESC')->take(4)->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngay_cap_nhat', 'DESC')->take(4)->get();
        $year = $year;
        $movie = Movie::where('year', $year)->orderBy('ngay_cap_nhat', 'DESC')->paginate(16);
        return view('pages.year', compact('category', 'genre', 'country', 'year', 'movie', 'phimhot_sidebar', 'phimhot_trailer'));
    }
    //Menu Từ Khóa Tìm Kiếm (Tags)
    public function tag($tag)
    {
        $category = Category::orderBy('id', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $phimhot_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngay_cap_nhat', 'DESC')->take(4)->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngay_cap_nhat', 'DESC')->take(4)->get();
        $tag = $tag;
        $movie = Movie::where('tags', 'LIKE', '%' . $tag . '%')->orderBy('ngay_cap_nhat', 'DESC')->paginate(16);
        return view('pages.tag', compact('category', 'genre', 'country', 'tag', 'movie', 'phimhot_sidebar', 'phimhot_trailer'));
    }

    //Menu Thể Loại
    public function genre($slug)
    {
        $category = Category::orderBy('id', 'ASC')->where('status', 1)->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $phimhot_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngay_cap_nhat', 'DESC')->take(4)->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngay_cap_nhat', 'DESC')->take(4)->get();

        $genre = Genre::orderBy('id', 'DESC')->get();
        $genre_slug = Genre::where('slug', $slug)->first();

        //Lọc ra trong 1 thể loại có những phim nào
        $movie_genre = Movie_Genre::where('genre_id', $genre_slug->id)->get();
        $many_genre = [];
        foreach ($movie_genre as $key => $item) {
            $many_genre[] = $item->movie_id;
        }
        // return response()->json($many_genre); //kiểm tra thử lấy dữ liệu ra đã đúng chưa

        $movie = Movie::whereIn('id', $many_genre)->where('status', 1)->orderBy('ngay_cap_nhat', 'DESC')->paginate(16);

        return view('pages.genre', compact('category', 'genre', 'country', 'genre_slug', 'movie', 'phimhot_sidebar', 'phimhot_trailer'));
    }

    //Menu Quốc Gia
    public function country($slug)
    {
        $category = Category::orderBy('id', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $country_slug = Country::where('slug', $slug)->first();
        $phimhot_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngay_cap_nhat', 'DESC')->take(4)->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngay_cap_nhat', 'DESC')->take(4)->get();
        $movie = Movie::where('country_id', $country_slug->id)->orderBy('ngay_cap_nhat', 'DESC')->paginate(16);
        return view('pages.country', compact('category', 'genre', 'country', 'country_slug', 'movie', 'phimhot_sidebar', 'phimhot_trailer'));
    }

    //Menu Chi Tiết Phim
    public function movie($slug)
    {
        $category = Category::orderBy('id', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $phimhot_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngay_cap_nhat', 'DESC')->take(4)->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngay_cap_nhat', 'DESC')->take(4)->get();
        $movie = Movie::with('category', 'genre', 'country', 'movie_genre')->where('slug', $slug)->where('status', 1)->first();
        $episode_tapdau = Episode::with('movie')->where('movie_id', $movie->id)->orderBy('episode', 'ASC')->take(1)->first(); //lấy ra 1 tập đầu tiên
        $episode = Episode::with('movie')->where('movie_id', $movie->id)->orderBy('episode', 'ASC')->get();
        $episode_uploaded = Episode::with('movie')->where('movie_id', $movie->id)->get();
        $episode_uploaded_count = $episode_uploaded->count(); //đếm xem đã upload lên bao nhiêu tập phim 
        $related = Movie::with('category', 'genre', 'country')->where('country_id', $movie->country->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug', [$slug])->get();
        //hiển thị slider các phim có liên quan (cùng country như phim đang chiếu)

        //Đánh giá phim:
        $rating = Rating::where('movie_id', $movie->id)->avg('rating'); //avg (average: tính trung bình)
        $rating = round($rating); //round (làm tròn số)
        $count_total = Rating::where('movie_id', $movie->id)->count(); //tổng số lượt đánh giá

        return view('pages.movie', compact('category', 'genre', 'country', 'movie', 'episode', 'episode_tapdau', 'episode_uploaded_count', 'related', 'phimhot_sidebar', 'phimhot_trailer', 'rating', 'count_total'));
    }

    public function add_rating(Request $request)
    {
        //chỉ cho 1 địa chỉ ip thực hiện rating 1 lần duy nhất
        $data = $request->all();
        $ip_address = $request->ip();
        $rating_count = Rating::where('movie_id', $data['movie_id'])->where('ip_address', $ip_address)->count();
        if ($rating_count > 0) {
            echo 'exist';
        } else {
            $rating = new Rating();
            $rating->movie_id = $data['movie_id'];
            $rating->rating = $data['index'];
            $rating->ip_address = $ip_address;
            $rating->save();
            echo 'done';
        }
    }

    //Menu chiếu phim để xem
    public function watch($slug, $tap)
    {
        $category = Category::orderBy('id', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $phimhot_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngay_cap_nhat', 'DESC')->take(4)->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngay_cap_nhat', 'DESC')->take(4)->get();
        $movie = Movie::with('category', 'genre', 'country', 'movie_genre', 'episode')->where('slug', $slug)->where('status', 1)->first();
        if (isset($tap)) {
            $tapphim = $tap;
            $tapphim = substr($tap, 4, 20); //cắt chuỗi, với mong muốn chỉ lấy số 1,2,3,15,16... trong chuỗi "tap-15" xuất hiện trong đường dẫn tại trang watch
            $episode = Episode::where('movie_id', $movie->id)->where('episode', $tapphim)->first();
        } else {
            $tapphim = 'phimle';
            $episode = Episode::where('movie_id', $movie->id)->where('episode', $tapphim)->first();
        }
        $related = Movie::with('category', 'genre', 'country')->where('category_id', $movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug', [$slug])->get();
        //hiển thị slider các phim có liên quan (cùng category như phim đang chiếu)

        $userId = Auth::id();
        $user = User::find($userId);

        return view('pages.watch', compact('tapphim', 'category', 'genre', 'country', 'movie', 'episode', 'phimhot_sidebar', 'phimhot_trailer', 'related', 'userId', 'user'));
    }

}