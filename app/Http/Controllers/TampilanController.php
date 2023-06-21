<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
class TampilanController extends Controller
{
    function tampilan(){
        $data['menus'] = Menu::all();
        return view('tampilan',$data);
    }
}
