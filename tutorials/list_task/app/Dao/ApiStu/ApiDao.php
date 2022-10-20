<?php
namespace App\Dao\ApiStu;

use App\Contracts\Dao\ApiStu\ApiDaoInterface;
use App\Models\ApiStudent;
use Illuminate\Http\Request;

/**
 * Data Access Object for Authentication
 */
class ApiDao implements ApiDaoInterface
{
    public function edit($id)
    {
        $where = array('id' => $id);
        $post  = Post::where($where)->first();
    }

    public function destroy($id)
    {
        $post = ApiStudent::where('id',$id)->delete();
    }
}
