<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Movie_Genre;
use App\Models\Episode;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use Carbon\Carbon; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; 


class MovieController extends Controller
{

    //Lấy dữ liệu ra, hiển thị ở trang "Liệt kê tất cả phim" của Admin
    public function index()
    {
        $list = Movie::with('category', 'genre', 'movie_genre', 'country')->withCount('episode')->orderBy('id', 'DESC')->get(); // xem đã có bao nhiêu tập đã upload


        $category = Category::pluck('title', 'id');
        $country = Country::pluck('title', 'id');

        //Tự động tạo file json với dữ liệu là các phim trên database
        $path = public_path() . "/json/"; //đường dẫn đến thư mục nơi lưu file json
        if (!is_dir($path)) {
            mkdir($path, 0777, true); //nếu thư mục lưu file json chưa có thì tạo 1 thư mục mới, 0777: toàn quyền thêm/sửa/xóa
        }
        File::put($path . 'movies.json', json_encode($list, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)); //json_encode($list):dùng $list lấy dữ liệu database ra rồi thì lấy toàn bộ dữ liệu này encode ra để tạo thành file json

        return view('admincp.movie.index', compact('list', 'category', 'country'));
    }


    //Hiển thị danh sách các danh mục, thể loại, và quốc gia trong form tạo mới phim
    public function create()
    {
        $category = Category::pluck('title', 'id'); //chỉ lấy ra title và id
        $genre = Genre::pluck('title', 'id');
        $list_genre = Genre::all(); //list này cho phép chọn 1 phim thuộc nhiều thể loại
        $country = Country::pluck('title', 'id');
        return view('admincp.movie.form', compact('category', 'genre', 'country', 'list_genre'));
    }

    //Tạo và lưu 1 phim mới:
    public function store(Request $request)
    {
        $data = $request->all();
        $movie = new Movie();
        $movie->title = $data['title'];
        $movie->name_eng = $data['name_eng'];
        $movie->season = $data['season'];
        $movie->description = $data['description'];
        $movie->trailer = $data['trailer'];
        $movie->sotap = $data['sotap'];
        $movie->tags = $data['tags'];
        $movie->thoi_luong = $data['thoi_luong'];
        $movie->resolution = $data['resolution'];
        $movie->phude = $data['phude'];
        $movie->slug = $data['slug'];
        $movie->year = $data['year'];
        $movie->status = $data['status'];
        $movie->phim_hot = $data['phim_hot'];
        $movie->ngay_tao = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->ngay_cap_nhat = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->category_id = $data['category_id'];
        $movie->thuocphim = $data['thuocphim'];
        $movie->country_id = $data['country_id'];

        //Một phim có nhiều thể loại:
        foreach ($data['genre'] as $key => $gen) {
            $movie->genre_id = $gen[0];
        }

        //Thêm hình ảnh:
        $get_image = $request->file('image');

        $path = 'uploads/movie/';

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName(); //hinhanh1.png (lấy ra tên của file ảnh)
            $name_image = current(explode('.', $get_name_image)); //tách tên ra dựa trên dâu chấm, tạo thành mảng sau đó current sẽ lẩy giá trị của index thứ 0 trong mảng này. Nếu dùng end sẽ lấy giá trị của index cuối cùng.
            $new_image = $name_image . rand(0, 999) . '.' . $get_image->getClientOriginalExtension(); //dùng hàm rand tạo 3 số ngẫu nhiên sau tên file ảnh, để tránh trường hợp trùng tên. Sau đó hàm extension sẽ lấy phần đuôi file ảnh ví dụ png để ghép vào.
            $get_image->move($path, $new_image); //Sao chép hình ảnh mới upload vào đường dẫn $path
            $movie->image = $new_image;
        }
        $movie->save();

        //Thêm nhiều thể loại cho phim (lưu dữ liệu vào bảng trung gian movie_genre)
        $movie->movie_genre()->attach($data['genre']);

        return redirect()->back();
    }

    public function show($id)
    {
        
    }

    //Mở ra form cho phép sửa dữ liệu, có hiển thị ra các dữ liệu đã có lưu từ trước
    public function edit($id)
    {
        $movie = Movie::find($id);
        $category = Category::pluck('title', 'id'); //chỉ lấy ra title và id
        $genre = Genre::pluck('title', 'id');
        $list_genre = Genre::all();
        $country = Country::pluck('title', 'id');
        $movie_genre = $movie->movie_genre;
        return view('admincp.movie.form', compact('category', 'country', 'movie', 'genre', 'list_genre', 'movie_genre'));
    }

    //Cập nhật phim
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $movie = Movie::find($id);
        $movie->title = $data['title'];
        $movie->name_eng = $data['name_eng'];
        $movie->season = $data['season'];
        $movie->description = $data['description'];
        $movie->trailer = $data['trailer'];
        $movie->sotap = $data['sotap'];
        $movie->tags = $data['tags'];
        $movie->thoi_luong = $data['thoi_luong'];
        $movie->resolution = $data['resolution'];
        $movie->phude = $data['phude'];
        $movie->slug = $data['slug'];
        $movie->year = $data['year'];
        $movie->status = $data['status'];
        $movie->phim_hot = $data['phim_hot'];
        $movie->ngay_cap_nhat = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->category_id = $data['category_id'];
        $movie->thuocphim = $data['thuocphim'];
        $movie->country_id = $data['country_id'];

        foreach ($data['genre'] as $key => $gen) {
            $movie->genre_id = $gen[0];
        }

        //Sửa hình ảnh
        $get_image = $request->file('image');

        $path = 'uploads/movie/';

        if ($get_image) {
            if (file_exists('uploads/movie/' . $movie->image)) {
                unlink('uploads/movie/' . $movie->image);
                $movie->image;
            } else {
                $get_name_image = $get_image->getClientOriginalName(); //lấy ra tên của file ảnh
                $name_image = current(explode('.', $get_name_image)); //tách tên ra dựa trên dâu chấm, tạo thành mảng sau đó current sẽ lẩy giá trị của index thứ 0 trong mảng này. Nếu dùng end sẽ lấy giá trị của index cuối cùng.
                $new_image = $name_image . rand(0, 999) . '.' . $get_image->getClientOriginalExtension(); //dùng hàm rand tạo 3 số ngẫu nhiên sau tên file ảnh, để tránh trường hợp trùng tên. Sau đó hàm extension sẽ lấy phần đuôi file ảnh ví dụ png để ghép vào.
                $get_image->move($path, $new_image); //Sao chép hình ảnh mới upload vào đường dẫn $path

                $movie->image = $new_image;
            }
        }
        $movie->save();
        $movie->movie_genre()->detach(); //xóa tất cả Thể loại cũ
        $movie->movie_genre()->sync($data['genre']); //cập nhật các Thể loại mới => không xảy ra tình trạng mất hoặc trùng Thể loại
        return redirect()->back();
    }

    //Năm phát hành
    public function update_year(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->year = $data['year'];
        $movie->save();
    }

    // Thay đổi danh mục phim ngay tại trang index, không cần bấm vào "Sửa"
    public function update_category_ajax(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['movie_id']);
        $movie->category_id = $data['category_id'];
        $movie->save();
    }
    // Thay đổi quốc gia phim ngay tại trang index, không cần bấm vào "Sửa"
    public function update_country_ajax(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['movie_id']);
        $movie->country_id = $data['country_id'];
        $movie->save();
    }

    //Season phim
    public function update_season(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->season = $data['season'];
        $movie->save();
    }

    //Top Views
    public function update_topview(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->topview = $data['topview'];
        $movie->save();
    }

    //Filter top views
    public function filter_topview(Request $request)
    {
        $data = $request->all();
        $movie = Movie::where('topview', $data['value'])->orderBy('ngay_cap_nhat', 'DESC')->take(3)->get();
        $output = '';
        foreach ($movie as $key => $mov) {
            if ($mov->resolution == 4) {
                $text = '4K';
            } else if ($mov->resolution == 3) {
                $text = 'UHD';
            } else if ($mov->resolution == 2) {
                $text = 'HD CAM';
            } else if ($mov->resolution == 1) {
                $text = '1080p';
            } else if ($mov->resolution == 0) {
                $text = '720p';
            } else {
                $text = 'Trailer';
            }
            $output .= '<div class="item">
                        <a href="' . url('phim/' . $mov->slug) . '" title=" ' . $mov->title . ' ">
                            <div class="item-link">
                                <img src=" ' . url('uploads/movie/' . $mov->image) . ' " class="lazy post-thumb" alt=" ' . $mov->title . ' " title=" ' . $mov->title . ' " />
                                <span class="is_trailer">' . $text . '</span>
                            </div>
                            <p class="title"> ' . $mov->title . ' </p>
                        </a>
                        <div class="viewsCount" style="color: #9d9d9d;"> </div>
                        <div style="float: left;">
                            <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                                <span style="width: 0%"></span>
                            </span>
                        </div>
                        </div>';
        }
        echo $output;
    }
    //Filter top views - default
    public function filter_default(Request $request)
    {
        $data = $request->all();
        $movie = Movie::where('topview', 0)->orderBy('ngay_cap_nhat', 'DESC')->take(3)->get();
        $output = '';
        foreach ($movie as $key => $mov) {
            if ($mov->resolution == 4) {
                $text = '4K';
            } else if ($mov->resolution == 3) {
                $text = 'UHD';
            } else if ($mov->resolution == 2) {
                $text = 'HD CAM';
            } else if ($mov->resolution == 1) {
                $text = '1080p';
            } else if ($mov->resolution == 1) {
                $text = '720p';
            } else {
                $text = 'Trailer';
            }
            $output .= '<div class="item post-37176">
                        <a href="' . url('phim/' . $mov->slug) . '" title=" ' . $mov->title . ' ">
                            <div class="item-link">
                                <img src=" ' . url('uploads/movie/' . $mov->image) . ' " class="lazy post-thumb" alt=" ' . $mov->title . ' " title=" ' . $mov->title . ' " />
                                <span class="is_trailer">' . $text . '</span>
                            </div>
                            <p class="title"> ' . $mov->title . ' </p>
                        </a>
                        <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                        <div style="float: left;">
                            <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                                <span style="width: 0%"></span>
                            </span>
                        </div>
                        </div>';
        }
        echo $output;
    }

    //Xóa phim
    public function destroy($id)
    {
        $movie = Movie::find($id);
        //Xóa ảnh:
        if (file_exists('uploads/movie/' . $movie->image)) {
            unlink('uploads/movie/' . $movie->image);
        }
        //Xóa các thể loại của phim đó (nằm trong bảng Movie_Genre)
        Movie_Genre::whereIn('movie_id', [$movie->id])->delete(); 

        //Xóa các tập phim của phim đó:
        Episode::whereIn('movie_id', [$movie->id])->delete();

        $movie->delete();
        return redirect()->back();
    }


}