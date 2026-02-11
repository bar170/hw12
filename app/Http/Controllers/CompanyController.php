<?php

namespace App\Http\Controllers;

use App\DDD\Application\Company\DTO\CompanyCreateDTO;
use App\DDD\Application\Company\DTO\CompanyDTO;
use App\DDD\Application\Company\Service\CompanyServiceInterface;
use App\DDD\Domain\Company\VO\IdVO;
use App\DDD\Domain\Company\VO\NameVO;
use App\DDD\Domain\Company\VO\DescriptionVO;
use Illuminate\Http\Request;
use \App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
    */
    public function index(CompanyServiceInterface $companyService)
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
    public function store(CompanyServiceInterface $companyService, Request $request)
    {
        $name = new NameVO($request['name']);
        $description = new DescriptionVO($request['description']);
        $dto = new CompanyCreateDTO($name, $description);
        $company = $companyService->createCompany($dto);

        return view('admin.companies.show', compact('company'));
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyServiceInterface $companyService, int $id)
    {
        $id = new IdVO($id);
        $company = $companyService->getCompany($id);

        return view('admin.companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyServiceInterface $companyService, int $id)
    {
        $id = new IdVO($id);
        $company = $companyService->getCompany($id);
        return view('admin.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyServiceInterface $companyService, Request $request)
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
    public function destroy(CompanyServiceInterface $companyService, string $id)
    {
        $id = new IdVO($id);
        $companyService->destroyCompany($id);
        $companies = $companyService->getRecentCompanies();
        return view('admin.companies.index', compact('companies'));
    }
}
