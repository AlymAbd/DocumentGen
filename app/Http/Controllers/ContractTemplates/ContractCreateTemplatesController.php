<?php

namespace App\Http\Controllers\ContractTemplates;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TemplateTags;
use App\Models\Templates;
use App\Models\TemplateVersions;


class ContractCreateTemplatesController extends Controller
{
    public function index(Request $req)
    {
        return view('contract_templates/create_template');
    }

    public function getTags(Request $req)
    {
        $type = $req->input('tag_type');

        if($type){
            $tags = TemplateTags::select('id', 'tag', 'mask')
                                ->where('purpose', '=', $type)
                                ->orderBy('mask')
                                ->get();
        }else{
            $tags = null;
        }

        return response()->json($tags);
    }

    public function save(Request $req)
    {
        $temp_id = $req->input('template_id');
        $temp_text = $req->input('template_text');
        $due_date = $req->input('template_due_date');
        $temp_name = $req->input('template_name');
        $temp_type = $req->input('template_type');

        if($temp_id){
            $id = $this->edit($temp_id, $temp_text, $due_date, $temp_name, $temp_type);
        }else{
            $id = $this->create($temp_text, $due_date, $temp_name, $temp_type);
        }

        return response()->json(['data' => 'success', 'id' => $id]);
    }

    public function display(Request $req)
    {

    }

    public function makeDeleted(Request $req)
    {

    }

    protected function create($text, $date, $name, $type)
    {
        $doc = new Templates();
        $doc->type = $type;
        $doc->title = $name;
        $doc->is_active = true;
        $doc->due_date = ($date ? $date : '2099-12-31 23:59:59');
        $doc->save();

        $ver = new TemplateVersions();
        $ver->template_id = $doc->id;
        $ver->creator_id = auth()->user()->id;
    }

    protected function edit($id, $text, $date, $name, $type)
    {

    }
}