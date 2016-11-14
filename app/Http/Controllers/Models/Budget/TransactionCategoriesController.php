<?php

namespace App\Http\Controllers\Models\Budget;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Budget\TransactionCategory;

class TransactionCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Determine the Transaction Categories
        $categories = TransactionCategory::all();

        // Display the Index View
        return view('models.budget.transaction-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Display the Create View
        return view('models.budget.transaction-categories.modals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validate the Request
        $this->validate($request, [
            'display_name' => 'required|string|max:50',
            'system_name'  => 'required|string|max:50,unique:transaction-categories'
        ]);

        // Create a new Transaction Category
        $category = TransactionCategory::create($request->only([
            'display_name', 'system_name'
        ]));

        // Return the Response
        return response()->json([
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransactionCategory  $category
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(TransactionCategory $category)
    {
        return view('models.budget.transaction-categories.modals.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransactionCategory    $category
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, TransactionCategory $category)
    {
        // Validate the Request
        $this->validate($request, [
            'display_name' => 'required',
            'system_name'  => 'required|unique:transaction-categories,system_name,' . $category->id,
        ]);

        // Update the TransactionCategory
        $category->fill($request->only([
            'display_name', 'system_name'
        ]))->save();

        // Return the Response
        return response()->json([
        ]);
    }

    /**
     * Display the Destruction Confirmation to the User.
     *
     * @param  \App\Models\TransactionCategory  $category
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(TransactionCategory $category)
    {
        return view('models.budget.transaction-categories.modals.delete', compact('category'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransactionCategory  $category
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(TransactionCategory $category)
    {
        // Delete the Transaction Category
        $category->delete();

        // Return the Response
        return response()->json([
        ]);
    }
}
