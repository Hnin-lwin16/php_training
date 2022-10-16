<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Major\MajorServiceInterface;
use Illuminate\Http\Request;
use App\Models\Major;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class MajorController extends Controller
{
    private $majorInterface;

    public function __construct(MajorServiceInterface $majorServiceInterface)
    {
        $this->majorInterface = $majorServiceInterface;
    }

    public function index()
    {
        return view('major');
    }

    public function store(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'major_only' => 'required'
        ]);
     
        if ($validator->fails()) {
            return redirect('/major')
                ->withInput()
                ->withErrors($validator);
        }

        $major = $this->majorInterface->saveMajor ($request);
        return view('student');
    }
}
