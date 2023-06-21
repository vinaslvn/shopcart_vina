<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    function show(){
        $data['menus'] = Menu::all();
        return view('menu',$data);
    }
    function view(){
        $data['menus'] = Menu::all();
        return view('menu', $data);
    }
    function cart($id){
        $data['menus'] = Menu::find($id);
        $data['action'] = url('menu/view')."/".$data['menus']->id;
        return view('cart', $data);
    }

    function add(){
        $data=[
            'action'=>url('menu/create'),
            'tombol'=>'simpan',
            'menu'=>(object)[
                'id'=>'',
                'kategori'=>'',
                'varian_rasa'=>'',
                'harga'=>'',
                'foto'=>'',
            ],
         ];
         return view('formmenu',$data);
    }

    function create(Request $req){
        Menu::create([
            'id' => $req->id,
            'kategori' => $req->kategori,
            'varian_rasa' => $req->varian_rasa,
            'harga' => $req->harga,
            'foto'=> $req->file('foto')->store('foto'),
        ]);
        return redirect('menu');
    }
    function delete($id){
        $menu = Menu::where('id', $id)->first();
        $menu->delete();
        Storage::delete($menu->foto);
        return redirect('menu');
    }
    function edit($id){
        $data['menu']=Menu::find($id);
        $data['action']= url('menu/update').'/'.$data['menu']->id;
        // $data['tombol']='update';
        return view('formmenu',$data);
    }
    function update(Request $req){
        if($req->file('foto')){
            $menu = Menu::where('id',$req->id)->first();
            Storage::delete($menu->foto);

            $file = $req->file('foto')->store('foto');
        }else{
            $file = DB::raw('foto');
        }
        Menu::where('id',$req->id)->update([
            'id'=>$req->id,
            'kategori'=>$req->kategori,
            'varian_rasa'=>$req->varian_rasa,
            'harga'=>$req->harga,
            'foto'=>$file,
        ]);
        return redirect('menu');
    }
}
