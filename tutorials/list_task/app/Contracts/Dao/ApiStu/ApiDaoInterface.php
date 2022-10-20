<?php
namespace App\Contracts\Dao\ApiStu;

use Illuminate\Http\Request;
use App\Models\ApiStudent;

/**
 * Interface of Data Access Object for Authentication
 */
interface ApiDaoInterface
{
   
    /**
     * To edit major
     * @param id
     * @return Object student saved post
     */
    public function edit($id);
    public function destroy($id);
}