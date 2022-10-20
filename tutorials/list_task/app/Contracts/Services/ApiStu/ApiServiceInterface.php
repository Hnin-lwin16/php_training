<?php
namespace App\Contracts\Services\ApiStu;

use Illuminate\Http\Request;
use App\Models\Student;

/**
 * Interface for api service
 */
interface ApiServiceInterface
{
      /**
     * To edit major
     * @param id
     * @return Object student saved post
     */
    public function edit($id);

    public function destroy($id);
}