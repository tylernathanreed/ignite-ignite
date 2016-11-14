<?php

namespace App\Http\Controllers\Tools;

use DB;
use Transformation;
use Illuminate\Http\Request;
use App\Ignite\Filesystem\CSV;
use App\Models\Budget\Transaction;
use App\Http\Controllers\Controller;

class BudgetUploadController extends Controller
{
    /**
     * Displays the Budget Upload Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showUploadForm()
    {
        // Display the Upload Form
        return view('tools.budget-upload.index');
    }

    /**
     * Uploads the Budget File.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        // Validate the Request
        $this->validate($request, [
            'upload_file' => 'required|file'
        ]);

        // Convert the File to a CSV
        $csv = CSV::fromUploadedFile($request->file('upload_file'));

        // Transform the CSV into Transactions
        $transactions = Transformation::matrix('budget')->untransform(Transaction::class, $csv->toCollection());

        // Remember the Transactions
        $request->session()->put('uploads.transactions', $transactions);

        // Redirect to the Confirmation Page
        return redirect()->route('tools.budget-upload.confirm')
                         ->withInput(compact('transactions'));
    }

    /**
     * Displays the Upload Confirmation Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showConfirmationForm()
    {
        // Display the Confirmation Form
        return view('tools.budget-upload.confirm');
    }

    /**
     * Saves the Uploaded Transactions
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        // Validate the Request
        $this->validate($request, [
            'account'                    => 'required|exists:accounts,id',
            'transactions'               => 'required',
            'transactions.*.charged_at'  => 'required|date',
            'transactions.*.paid_for'    => 'required',
            'transactions.*.paid_for.*'  => 'exists:payors,id',
            'transactions.*.description' => 'string|max:255',
            'transactions.*.amount'      => 'required|numeric'
        ]);

        // Determine the Transactions
        $transactions = $request->session()->get('uploads.transactions');

        // All or Nothing...
        DB::transaction(function() use ($request, $transactions)
        {
            // Update each Record
            foreach($transactions as $index => $transaction)
            {
                $transaction->charged_at = $request->transactions[$index]['charged_at'];
                $transaction->description = $request->transactions[$index]['description'];
                $transaction->amount = $request->transactions[$index]['amount'] * 100;

                $transaction->save();

                $transaction->payors()->sync($request->transactions[$index]['paid_for']);
            }
        });

        // Remove the Upload Data from the Session
        $request->session()->forget('uploads.transactions');

        // Return the Response
        return redirect()->route('tools.budget-upload.index');
    }
}
