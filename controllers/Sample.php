<?php
namespace App\Modules\NamaModule\Controllers;
use App\Controllers\BaseController;


class Profile extends BaseController
{
    public function __construct(){
        $this->mod = new \App\Modules\NamaModule\Models\NamaModel();
    }

    public function index()
    {
        $array = [];
        echo $this->mod->testing();
        return view('index', $array);
    }

}
