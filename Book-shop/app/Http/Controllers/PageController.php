<?php

namespace App\Http\Controllers;
use App\Slides;
use App\Books;
use App\Authors;
use App\Categories;
use App\Cart;
use Session;
use App\User;
use Auth;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //

    public function getIndex(){
    	$slide = Slides::all();
    	$new_book = Books::paginate(12);
    	$all_book = Books::all();
    	return view('page.trangchu', compact('slide','new_book','all_book'));
    }

    public function getLoaiSP($type){
    	$all_sp_theoloai = Books::where('category_id',$type)->get();
    	$sp_theoloai = Books::where('category_id',$type)->paginate(12);
    	$theloai = Categories::where('id',$type)->first();
    	return view('page.loai_sanpham', compact('sp_theoloai','all_sp_theoloai','theloai'));
    }

    public function getChitiet($type){
    	$viewsach = Books::where('id',$type)->first();
    	$author = Authors::where('id',$type)->first();
    	return view('page.chitiet_sanpham', compact('viewsach','author'));
    }

    public function getLienhe(){
    	return view('page.lienhe');
    }

    public function getGioithieu(){
    	return view('page.gioithieu');
    }

    public function getAddtoCart(Request $req, $id){
        $book = Books::find($id);
        $oldCart = Session('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);

        $cart->add($book, $id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }
    public function getDelItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        }
        else {
            Session::forget('cart');
        }
        
        return redirect()->back();
    }
    public function getCheckout(){
        return view('page.dat_hang');
    }

    public function postCheckout(){

    }
    public function getLogin(){
        return view('page.login');
    }

    public function postLogin(Request $req){
        $this->validate($req,
            [
             'email'=>'required|email',
             'password'=>'required|min:6|max:20'
         ],
         [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Email sai!',
            'password.required'=>'Nhập mật khẩu!',
            'password.min'=>'Mật khẩu quá ngắn',
            'password.max'=>'Mật khẩu quá dài'
        ]
    );
        $credentials = array('email'=>$req->email, 'password'=>$req->password);
        if (Auth::attempt($credentials)) {
            return redirect()->route('trang-chu')->with(['flag'=>'success','thongbao'=>'Đăng Nhập Thành Công!']);
        }
        else {
            return redirect()->back()->with(['flag'=>'danger','thongbao'=>'Đăng Nhập Không Thành Công!']);
        }
    }

    public function getSigup(){
        return view('page.sigup');
    }

    public function postSigup(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'name'=>'required',
                're_password'=>'required|same:password'
            ],[
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email sai!',
                'email.unique'=>'Email đã có người sử dụng',
                'password.required'=>'Nhập mật khẩu!',
                're_password.same'=>'Mật khẩu nhập lại không đúng!',
                'password.min'=>'Mật khẩu quá ngắn'
            ]
        );

        $user = new User();
        $user->name = $req->name;
        $user->email= $req->email;
        $user->password = bcrypt($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->route('dangnhap')->with('thanhcong','Tạo Tài Khoản Thành Công! Đăng Nhập ngay!');
    }

    public function postLogout(){
        AuTh::logout();
        return redirect()->route('trang-chu');
    }

    public function getSearch(Request $req){
        // $author = Authors::all();
        // compact('author');
        // $theloai = Categories::where('category_name', 'like', str_replace(' ', '%',$req->key))->first();
        $book = Books::join('authors', 'books.author_id', '=', 'authors.id')
                        ->join('categories', 'books.category_id', '=', 'categories.id')
                        ->where('book_name', 'like', '%'.str_replace(' ', '%',$req->key).'%')
                        ->orWhere('authors.author_name','like', '%'.str_replace(' ', '%',$req->key).'%')
                        ->orWhere('categories.category_name','like', '%'.str_replace(' ', '%',$req->key).'%')
                        ->orWhere('description','like', '%'.str_replace(' ', '%',$req->key).'%' )
                        ->orWhere('publishing_house','like', '%'.str_replace(' ', '%',$req->key).'%')
                        ->paginate(12);
        return view('page.seach', compact('book'));
        // SELECT * FROM `authors` INNER JOIN `books` ON `books`.`author_id` = `authors`.`id` INNER JOIN `categories` ON `books`.`category_id` = `categories`.`id` WHERE `authors`.`author_name` LIKE "%2%";
    }

    public function admin(){
        $all_book = Books::join('authors', 'books.author_id', '=', 'authors.id')
                        ->join('categories', 'books.category_id', '=', 'categories.id')
                        ->get();
        $bookk = Books::join('authors', 'books.author_id', '=', 'authors.id')
                        ->join('categories', 'books.category_id', '=', 'categories.id')
                        ->paginate(12);
        return view('admin', compact(['all_book', 'bookk']));
    }

}
