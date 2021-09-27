@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Departments</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('departments.departments.create') }}" class="btn btn-success" title="Create New Departments">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($departmentsObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Departments Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Dept Name</th>
                            <th>Dept I D</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($departmentsObjects as $departments)
                        <tr>
                            <td>{{ $departments->DeptName }}</td>
                            <td>{{ $departments->DeptID }}</td>

                            <td>

                                <form method="POST" action="{!! route('departments.departments.destroy', $departments->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('departments.departments.show', $departments->id ) }}" class="btn btn-info" title="Show Departments">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('departments.departments.edit', $departments->id ) }}" class="btn btn-primary" title="Edit Departments">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Departments" onclick="return confirm(&quot;Click Ok to delete Departments.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $departmentsObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection