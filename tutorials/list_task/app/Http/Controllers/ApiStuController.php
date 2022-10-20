<?php

namespace App\Http\Controllers;

use App\Contracts\Services\ApiStu\ApiServiceInterface;
use Illuminate\Http\Request;
use App\Models\ApiStudent;

class ApiStuController extends Controller
{
    private $apiInterface;
    public function __construct(ApiServiceInterface $apiServiceInterface)
    {
        $this->apiInterface = $apiServiceInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['posts'] = ApiStudent::orderBy('id','desc')->paginate(8);
        return view('Apilayout.student',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $post =  ApiStudent::updateOrCreate([
            'id'=> $request-> post_id],
            [
            'StudentName' => $request->name,
            'Gender' => $request->gender,
            'Email' => $request->email,
        ]);
        return response()->json($post,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = ApiStudent::find($id);
        return response()->json($post,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $post = $this->apiInterface->edit($id);
        return response()->json($post,200);
    }
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->apiInterface->destroy($id);
        return Response()->json($post,200);
    }
}
