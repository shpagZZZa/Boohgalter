<?php

namespace App\Http\Controllers;

use App\Models\AdminCode;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::all();
        return view('admin.index', compact('admins'));
    }

    public function storeCode(Request $request)
    {
        $data = $this->codeValidate($request->all());
        AdminCode::create($data);
        return redirect()->action('AdminController@index');
    }

    private function codeValidate(array $data)
    {
        return Validator::make($data, [
            'code' => ['required', 'string', 'max:255'],
        ])->validate();
    }
}
