<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Student\StudentServiceInterface;
use Illuminate\Http\Request;
use App\Models\Studend;
use App\Models\Major;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{   
    private $studentInterface;
    
    public function __construct(StudentServiceInterface $studentServiceInterface)
    {
        $this->studentInterface = $studentServiceInterface;
    }

    public function index() {
        return view('student');
    }
    
    public function list() {
        return view('studentList');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'major_only' => 'required'
        ]);
    
        if ($validator->fails()) {
            return redirect('/major')
                ->withInput()
                ->withErrors($validator);
        }
        $student = $this->studentInterface->saveStudent($request);
        return redirect('/major');
    }
   
    
    public function destroy($id)
    {
        $student = $this->studentInterface->deleteById($id);
        return redirect('/student/list');
    }
    
    public function edit($id)
    {   
        $re = $this->studentInterface->editById($id);
        return $re;
    }

    public function update(Request $request,$result)
    {
        $update = $this->studentInterface->updateById($request,$result);
        return $update;
    }
   
}
?>