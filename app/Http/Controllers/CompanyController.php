<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        $companies = Company::with('employees')->get();
        return response()->json($companies, 200);
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreCompanyRequest $request
     * @return JsonResponse
     */
    public function store(StoreCompanyRequest $request) : JsonResponse
    {
        $data = $request->validated();
        $company = Company::create($data);

        return response()->json($company, 201);
    }

    /**
     * Display the specified resource.
     * @param Company $company
     * @return JsonResponse
     */
    public function show(Company $company) : JsonResponse
    {
        $company->load('employees');
        return response()->json($company, 200);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateCompanyRequest $request
     * @param Company $company
     * @return JsonResponse
     */
    public function update(UpdateCompanyRequest $request, Company $company) : JsonResponse
    {
        $data = $request->validated();
        $company->update($data);

        return response()->json($company, 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param Company $company
     * @return Response
     */
    public function destroy(Company $company) : Response
    {
        $company->delete();
        return response()->noContent();
    }
}
