<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{


    public function index(){
        // $data['members'] = [
        //     [
        //         'name' => 'agung',
        //         'email' => 'agung@gmail.com',
        //         'nohp' => '089356442675'
        //     ],
        //     [
        //         'name' => 'asep',
        //         'email' => 'ase@gmail.com',
        //         'nohp' => '0873574586'
        //     ],
        //     [
        //         'name' => 'yuli',
        //         'email' => 'yuli@gmail.com',
        //         'nohp' => '08475635635'
        //     ],
        //     ];
        //     return view('member', $data);
        $data['members'] = Member::all();

        return view('member', $data);
    }

    public function cari(Request $req){
        $where = array(
            'name' => $req->cari
        );
        $data['members'] = Member::where('name','like','%' . $req->cari . '%')->orwhere('email','like','%' . $req->cari . '%')->get(); 
        return view('member', $data);
    }

    public function add(){
        $data = [
            'name'=> '',
            'email'=>'', 
            'nohp'=>'',
            'action' =>  url('/member/add'),
            'tombol' => 'Tambah'
        ];
        return view('memberadd',$data);
    }

    public function tambah(Request $req){
        $data = [
            'name'=>$req->name,
            'email'=>$req->email,
            'nohp'=>$req->nohp
        ];
        Member::create($data);
        return redirect('/member');
    }

    function delete(Request $req){
        $delete = Member::where('id', $req->id)->delete();
        if ($delete) {
            return redirect('/member')->with('pesan','Member Berhasil Di Hapus');
        }else{
            return redirect('/member')->with('pesan','Member Tidak Bisa Di Hapus');
        }
    }

    function edit(Request $req){
        $edit = Member::find($req->id);
        $data = [
            'name' => $edit->name,
            'email' => $edit->email,
            'nohp' => $edit->nohp,
            'action' =>  url('/member/update').'/'.$edit->id,
            'tombol' => 'Update'
        ];

        return view('memberadd',$data);
    }
    function update(Request $req){
        $data = [
            'name'=>$req->name,
            'email'=>$req->email,
            'nohp'=>$req->nohp
        ];
        Member::where('id',$req->id)->update($data);
        return redirect('/member');
    }
}
