<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\document_templates;

class ContractTemplatesController extends Controller {

    protected $doc_type = 'regular';

    public function index(Request $r)
    {
        return view('create_contract_sample');
    }

    public function save(Request $r)
    {
        $doc = new document_templates();
        $doc->type = $this->doc_type;
        $doc->text =$r->input('text');
        $doc->is_active =true;
        $doc->save();

        return response()->json(['data'=>'success', 'id' => $doc->id]);
    }

    public function edit(Request $r)
    {

    }

    public function remove(Request $r)
    {

    }

}
