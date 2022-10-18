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

    public function list(){
        return view('major-list');
    }

    public function store(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'major_only' => 'required|unique:majors,major'
        ]);
     
        if ($validator->fails()) {
            return redirect('/major')
                ->withInput()
                ->withErrors($validator);
        }

        $major = $this->majorInterface->saveMajor ($request);
        return view('major-list');
    }

    public function destroy($id)
    {
        $major_delete = $this->majorInterface->destroyMajor ($id);
        return redirect('/major/list');
    }

    public function edit($id)
    {
        $major_edit = $this->majorInterface->editMajor ($id);
        return $major_edit;
        
    }

    public function update(Request $request,$id)
    {
        $major_update = $this->majorInterface->updateMajor ($request,$id);
        return $major_update;
    }
}
