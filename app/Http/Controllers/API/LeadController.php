<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\NewLead;
use App\Mail\NewLeadMarkdown;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request)
    {

        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }
        $newLead = new Lead();
        $newLead->fill($data);
        $newLead->save();
        //Lead::create($data) altra opzione


        Mail::to('damianocasolari@gmail.com')->send(new NewLeadMarkdown($newLead));
        return response()->json(
            [
                'success' => true
            ]
        );
    }
}
