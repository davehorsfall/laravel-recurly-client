<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params = ['limit' => 200];
        $client = new \Recurly\Client(env('RECURLY_PRIVATE_API_KEY'));
        $account = $client->getAccount('code-'.$account_id);
        $invoices = $client->listAccountInvoices($account->getId(), $params);
        foreach ($invoices as $invoice) {
        // print_r($invoice);
        // exit;
        }
        return view('recurly.invoices')->with('invoices', $invoices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $params = ['limit' => 200];
        $account_id = 0;
        $client = new \Recurly\Client(env('RECURLY_PRIVATE_API_KEY'));
        $account = $client->getAccount('code-'.$account_id);
        $pdf = $client->getInvoicePdf($id, 'en-US');

        $data = $pdf->getData();

        header('Content-type: application/pdf');
        header("Cache-Control: no-cache");
        header("Pragma: no-cache");
        header("Content-length: " . strlen($data));
        
        header('Content-type: application/pdf');
        header('Accept-Language: en-US');
        header('Content-Disposition: attachment; filename="downloaded.pdf"');

        die($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
