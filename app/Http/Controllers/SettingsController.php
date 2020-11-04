<?php


namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SettingsController
{
    public function index()
    {
        return view("pages.settings");
    }

    public function update(Request $request)
    {
        $messages = [
            "required" => __('errors.required'),
            "email" => __("errors.email"),
            "min" => __("errors.min"),
            "max" => __("errors.max"),
            "unique" => __("errors.unique"),
        ];

        $attributes = [
            "first_name" => __('general.first_name'),
            "middle_name" => __('general.middle_name'),
            "last_name" => __('general.last_name'),
        ];

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|min:2|max:24',
            'middle_name' => 'max:24',
            'last_name' => 'required|min:2|max:24',
        ], $messages, $attributes);

        if ($validator->fails()) {

            return redirect()
                ->route("account")
                ->withErrors($validator->getMessageBag()->get('*'));
        }

        $validatedBody = $validator->validated();

        $user = Auth::user();
        $user->first_name = ucfirst($validatedBody['first_name']);
        $user->middle_name = $validatedBody['middle_name'] != '' ? $validatedBody['middle_name'] : null;
        $user->last_name = ucfirst($validatedBody['last_name']);
        if (!$user->save()) {
            dd(":(");
        }

        return redirect()->route("home");
    }
}
