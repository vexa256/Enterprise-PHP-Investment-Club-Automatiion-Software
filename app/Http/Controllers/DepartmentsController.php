<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Departments;
use Illuminate\Http\Request;
use Exception;

class DepartmentsController extends Controller
{

    /**
     * Display a listing of the departments.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $departmentsObjects = Departments::paginate(25);

        return view('departments.index', compact('departmentsObjects'));
    }

    /**
     * Show the form for creating a new departments.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('departments.create');
    }

    /**
     * Store a new departments in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Departments::create($data);

            return redirect()->route('departments.departments.index')
                ->with('success_message', 'Departments was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified departments.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $departments = Departments::findOrFail($id);

        return view('departments.show', compact('departments'));
    }

    /**
     * Show the form for editing the specified departments.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $departments = Departments::findOrFail($id);
        

        return view('departments.edit', compact('departments'));
    }

    /**
     * Update the specified departments in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $departments = Departments::findOrFail($id);
            $departments->update($data);

            return redirect()->route('departments.departments.index')
                ->with('success_message', 'Departments was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified departments from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $departments = Departments::findOrFail($id);
            $departments->delete();

            return redirect()->route('departments.departments.index')
                ->with('success_message', 'Departments was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'DeptName' => 'required|string|min:1|max:255',
            'DeptID' => 'required|string|min:1|max:255',
            'Desc' => 'required', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
