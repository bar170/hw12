<?php

namespace App\Http\Controllers;

use App\DDD\DTO\CompanyDTO;
use App\DDD\VO\Company\DescriptionVO;
use App\DDD\VO\Company\IdVO;
use App\DDD\VO\Company\NameVO;
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
        return view('admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyService $companyService, Request $request)
    {
        $name = new NameVO($request['name']);
        $description = new DescriptionVO($request['description']);
        $company = $companyService->createCompany($name, $description);

        return view('admin.companies.show', compact('company'));
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyService $companyService, int $id)
    {
        $id = new IdVO($id);
        $company = $companyService->getCompany($id);

        return view('admin.companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyService $companyService, int $id)
    {
        $id = new IdVO($id);
        $company = $companyService->getCompany($id);
        return view('admin.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyService $companyService, Request $request)
    {
        $id = new IdVO($request['id']);
        $name = new NameVO($request['name']);
        $description = new DescriptionVO($request['description']);
        $companyDTO = new CompanyDTO($id, $name, $description);
        $company = $companyService->updateCompany($companyDTO);

        return view('admin.companies.edit', compact('company'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyService $companyService, string $id)
    {
        $id = new IdVO($id);
        $companyService->destroyCompany($id);
        $companies = $companyService->getRecentCompanies();
        return view('admin.companies.index', compact('companies'));
    }
}
