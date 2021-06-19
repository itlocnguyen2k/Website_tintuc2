<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\TheLoai;

class UserController extends Controller
{
    //
    public function getDanhSach(){
        $user = User::all();
        return view('admin.user.danhsach',['user'=>$user]);
    }

    public function getThem(){
       return view('admin.user.them');
    }

    public function postThem(Request $request){
           $this->validate($request,
            [
                'name'=>'required|min:3',
                'email'=>'required|email|unique:user,email',
                'password'=>'required|min:3|max:32',
                'passwordAgain'=>'required|same:password'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên người dùng',
                'name.min'=>'Tên người dùng phải có ít nhất 3 ký tự',
                'email.required'=>'Bạn chưa nhập email',
                'email.email'=>'Mật khẩu nhập lại chưa khớp',
                'email.unique'=>'Email đã tồn tại',
                'password.required'=>'Bạn chưa nhập mật khẩu',
                'password.min'=>'Mật khẩu phải có it nhất 3 ký tư',
                'password.max'=>'Mật khẩu chỉ có tối đa 32 ký tự',
                'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
                'passwordAgain.same'=>'Passward chưa khớp'
                
            ]);
           $user = new User;
           $user->name = $request->name;
           $user->email = $request->email;
           $user->password = bcrypt($request->password);
           $user->quyen = $request->quyen;
           $user->save();
           return redirect('admin/user/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id){
       $user = User::find($id);
       return view('admin.user.sua',['user'=>$user]);
    }

    public function postSua(Request $request, $id){
        $this->validate($request,
            [
                'name'=>'required|min:3',
            ],
            [
                'name.required'=>'Bạn chưa nhập tên người dùng',
                'name.min'=>'Tên người dùng phải có ít nhất 3 ký tự',
                
            ]);
           $user = User::find($id);
           $user->name = $request->name;
           $user->quyen = $request->quyen;
           if($request->changePassword == "on"){
                $this->validate($request,
            [
                'password'=>'required|min:3|max:32',
                'passwordAgain'=>'required|same:password'
            ],
            [
                'password.required'=>'Bạn chưa nhập mật khẩu',
                'password.min'=>'Mật khẩu phải có it nhất 3 ký tư',
                'password.max'=>'Mật khẩu chỉ có tối đa 32 ký tự',
                'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
                'passwordAgain.same'=>'Passward chưa khớp'
                
            ]);
                $user->password = bcrypt($request->password);
           }
           $user->save();
           return redirect('admin/user/sua/'.$id)->with('thongbao','Bạn đã sửa thành công');
    }
    public function getXoa($id){
      $user = User::find($id);
      $user->delete();
      return redirect('admin/user/danhsach')->with('thongbao','Xóa người dùng thành công');
    }

    public function getDangnhapAdmin(){
        return view('admin.login');
    }

    public function postDangnhapAdmin(Request $request){
        $this->validate($request,
            [
                'email'=>'required',
                'password'=>'required|min:3|max:32'
            ],
            [
                'email.required'=>'Bạn chưa nhập Email',
                'password.required'=>'Bạn chưa nhập Passward',
                'passward.min'=>'Passward phải lớn hơn 3 ký tự',
                'password.max'=>'Passward không được quá 32 ký tự'
            ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            $id_user = Auth::id();
            $user_login= User::find($id_user);
            $theloai = TheLoai::all();
            return view('admin.theloai.danhsach',['theloai'=>$theloai,'user_login'=>$user_login]);
            
            
        }
        else
        {
            return redirect('admin/dangnhap')->with('thongbao','Đăng nhập không thành công');
        }
    }

    public function getDangXuatAdmin(){
        Auth::logout();
        return redirect('admin/dangnhap');
    }
}
