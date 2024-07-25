<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function add_bookmark(Request $request)
    {
        $movieId = $request->input('movie_id');
        $user = Auth::user();
        $movie = Movie::findOrFail($movieId);

        // Kiểm tra xem movie đã được thêm vào bookmark chưa
        if ($user->bookmark->where('movie_id', $movieId) == 'true') {
            return redirect()->back()->with('error', 'Phim đã tồn tại trong Bookmark.');
        }
        // Lấy danh sách phim yêu thích của người dùng
        $bookmarkedMovies = $user->bookmark->pluck('movie');

        // Tạo bản ghi Bookmark mới và lưu vào cơ sở dữ liệu
        $add = new Bookmark();
        $add->user_id = $user->id;
        $add->movie_id = $movie->id;
        $add->save();
        return redirect()->back()
            ->with('success', 'Phim đã được thêm vào Bookmark.')
            ->with('bookmarkedMovies', $bookmarkedMovies);
    }
    public function show_bookmark()
    {
        $user = Auth::user();
        $bookmarkedMovies = $user->bookmark->pluck('movie');

        return view('pages.bookmark', compact('bookmarkedMovies'));
    }
    public function delete_bookmark($id)
    {
        $bookmark = Bookmark::where('movie_id', $id)->first();

        if (!$bookmark) {
            return redirect()->back()->with('error', 'Bookmark không tồn tại.');
        }

        $bookmark->delete();

        return redirect()->back()->with('success', 'Bookmark đã được xóa thành công.');
    }

}