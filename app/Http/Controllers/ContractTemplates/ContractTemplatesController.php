<?php

namespace App\Http\Controllers\ContractTemplates;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ContractTemplatesController extends Controller
{
    public function index(Request $req)
    {
        return view('contract_templates/index_template');
    }

    public function create(Request $req)
    {

    }

    public function display(Request $req)
    {

    }

    public function edit(Request $req)
    {

    }

    public function makeDeleted(Request $req)
    {

    }
}