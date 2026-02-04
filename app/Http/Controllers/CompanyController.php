<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Services\Company\CompanyService;
use \App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
    */
    public function index(CompanyService $companyService)
    {
        $companies = $companyService->getRecentCompanies();
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyService $companyService, int $id)
    {
        $company = $companyService->getCompany($id);

        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
