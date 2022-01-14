<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_num = isset($_GET['page']) ? (int) $_GET['page'] : 0;
        $per_page = 5;

        $params = [
            'state' => 'expired',
            'limit' => $per_page,
        ];
        $account_id = 0;
        $client = new \Recurly\Client(env('RECURLY_PRIVATE_API_KEY'));
        $account = $client->getAccount('code-'.$account_id);
        $subscriptions = $client->listAccountSubscriptions($account->getId(), ['limit' => 5]);

//         // Fast forward the list to the current page.
//         $start = $page_num * $per_page;
//         for ($n = 0; $n < $start; $n++) {
//             $subscriptions->next();
//         }
        // print_r($subscriptions->current());
        // exit();
//         // Populate $page_invoices with the current page.
//         $page_end = min($start + $per_page, $subscriptions->getCount());
//         $page_invoices = array();
//         for ($n = $start; $n < $page_end; $n++) {
//             $subscription = $subscriptions->current();
//             $page_invoices[$subscription->getId] = $subscription;
//             $subscriptions->next();
//         }

//         print_r($page_invoices);

//         //print_r($subscriptions->eachPage());
//         exit;

//         foreach ($subscriptions as $subscription) {
//         print_r($subscriptions);
//         exit;

//         }
        return view('recurly.subscriptions')->with('subscriptions', $subscriptions);
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
        //
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
