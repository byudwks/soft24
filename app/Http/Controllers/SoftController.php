<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Software;
use App\Models\Coment;
use App\Models\Os;
use Parsedown;



class SoftController extends Controller
{

    public  function index () {
        return view('home');
    }

    public function detail(Software $Software) {

    $relatedSoftware = Software::where('id', '!=', $Software->id)->take(5)->inRandomOrder()->get();
    $newSoftware = Software::take(4)->latest()->get();

    return view('layouts.detailpage', [
        "Soft" => $Software,
        "relatedSoftware" => $relatedSoftware,
        "newSoftware" => $newSoftware,
        ]);
    }


}
