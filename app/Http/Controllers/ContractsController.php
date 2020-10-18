<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\documents;
use App\Models\document_templates;
use App\Http\Controllers\randomizer;
use TCPDF;

class ContractsController extends Controller {

    public const OOP = [
        1 => 'ИП',
        2 => 'ТОО',
        3 => 'АО',
        4 => 'ООО'
    ];

    public function index(Request $r)
    {
        $tmp = document_templates::select('id', 'type')->where('is_active', '=', True)->get();
        $docs = documents::where('is_deleted', '=', false)->get();

        return view('create_contract')->with(['docs' => $docs,
                                              'templates' => $tmp]);
    }

    public function view(Request $r)
    {

    }

    public function save(Request $r)
    {
        $company = $r->input('company_name');
        $legal_name = $r->input('company_legal_name');
        $director = $r->input('company_director');
        $sign = $r->input('director_sign');
        $bin = $r->input('company_bin');
        $oop = $r->input('company_oop');
        $code = new randomizer();

        $doc = new documents();
        $doc->company_name = $company;
        $doc->legal_name = $legal_name;
        $doc->director = $director;
        $doc->signature = $sign;
        $doc->bin = $bin;
        $doc->legal_type = $oop;
        $doc->number = $code->code();
        $doc->document = $r->input('document_id');
        $doc->save();

        return response()->json(['data'=>'success', 'id' => $doc->id]);
    }

    public function edit(Request $r)
    {

    }

    public function remove(Request $r)
    {

    }

    public function print_pdf(Request $r)
    {
        $doc = documents::where('is_deleted', '=', false)
                        ->where('id', '=', $r->input('id'))
                        ->with(['template:id,text'])
                    ->get()
                    ->toArray()[0];

        $temp = $doc['template']['text'];

        $map = [
            "{{DOCUMENT_NUMBER}}" => $doc['number'],
            "{{DOCUMENT_DATE}}" => substr($doc['created_at'],  0, 10),
            "{{COMPANY_NAME}}" => $doc['company_name'],
            "{{COMPANY_LEGAL}}" => $doc['legal_name'],
            "{{COMPANY_DIRECTOR}}" => $doc['director'],
            "{{SIGNATURE_BY}}" => $doc['signature'],
            "{{COMPANY_BIN}}" => $doc['bin'],
            "{{COMPANY_OOP}}" => self::OOP[$doc['legal_type']]
        ];

        foreach($map as $ma => $val){
            $temp = str_ireplace($ma, $val, $temp);
        }

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetFont('freesans', '', 12, '', true);
        $pdf->SetTitle('Договор поручения - '.$doc['number']);
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        $pdf->AddPage();
        $pdf->writeHTML($temp);
        $pdf->Output('hello_world.pdf');

        return $pdf;
    }

    public function pdf_convert()
    {

    }

}
