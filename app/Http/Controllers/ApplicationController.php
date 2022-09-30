<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ApplicationRequest;
use App\Models\Application;
use SendEmail;

class ApplicationController extends Controller
{
    public function create(ApplicationRequest $request)
    {
		$application = Application::create(array(
        	'name' => $request->name,
        	'phone' => $request->phone,
        	'email' => $request->email,
        	'status_id' => 1,
        ));

        return $this->successMessage();
    }

    public function update()
    {

    }
}
