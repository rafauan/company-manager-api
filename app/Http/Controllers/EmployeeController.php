<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        $employees = Employee::with('company')->get();
        return response()->json($employees, 200);
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreEmployeeRequest $request
     * @return JsonResponse
     */
    public function store(StoreEmployeeRequest $request) : JsonResponse
    {
        $data = $request->validated();
        $employee = Employee::create($data);

        return response()->json($employee, 201);
    }

    /**
     * Display the specified resource.
     * @param Employee $employee
     * @return JsonResponse
     */
    public function show(Employee $employee) : JsonResponse
    {
        $employee->load('company');
        return response()->json($employee, 200);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateEmployeeRequest $request
     * @param Employee $employee
     * @return JsonResponse
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee) : JsonResponse
    {
        $data = $request->validated();
        $employee->update($data);

        return response()->json($employee, 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param Employee $employee
     * @return Response
     */
    public function destroy(Employee $employee) : Response
    {
        $employee->delete();
        return response()->noContent();
    }
}
