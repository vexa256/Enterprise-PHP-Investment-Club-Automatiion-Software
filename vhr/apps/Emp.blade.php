	<!--begin::Alert-->
    <div class="alert alert-primary">
        <!--begin::Icon-->
        <span class="svg-icon float-end svg-icon-2hx svg-icon-primary me-3"><i class="fas fa-3x fa-user" aria-hidden="true"></i></span>
        <!--end::Icon-->

        <!--begin::Wrapper-->
        <div class="d-flex flex-column">
            <!--begin::Title-->
            <h4 class="mb-1 text-dark"> @if (isset($Staff->StaffName))

                {{$Staff->StaffName}}

                @else

                {{$Staff->ContractorName}}

                @endif
</h4>
            <!--end::Title-->
            <!--begin::Content-->
            <span>Use this interface to run/view performace apparaisals for selected staff member </span>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Alert-->
	<div class="card-body pt-3 bg-light shadow-lg table-responsive">
	    {{ HeaderBtn($Toggle="New", $Class="btn-danger", $Label="New Appraisal", $Icon="fa-plus")}}

	    <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
	        <thead>
	            <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">

	                <th> @if (isset($Staff->StaffName))

                   Staff Name

                        @else

             Contractor Name

                        @endif
                        </th>
                    <th class="bg-dark text-light">Title</th>
	                <th>Department </th>
	                <th>Designation </th>
	                <th>Month</th>
	                <th>Year</th>
	                <th class="bg-danger text-light">Score</th>
	                <th>KPI Analysis</th>
	                <th>Recommendations</th>
	                <th > Delete</th>


	            </tr>
	        </thead>
	        <tbody>
	            @isset($Appraisals)
	            @foreach ($Appraisals as $data )
	            <tr>

	                <td>{{$data->Name}}</td>
	                <td>{{$data->Title}}</td>
	                <td>{{$data->Department}}</td>
	                <td>{{$data->Designation}}</td>
	                <td>{{$data->Month}}</td>
	                <td>{{$data->Year}}</td>
	                <td class="bg-danger text-light">{{$data->Score}}</td>

                    <td> <a data-bs-toggle="modal" class="btn btn-dark btn-sm " href="#Kpi{{$data->id}}"><i class="fas fa-binoculars" aria-hidden="true"></i></a></td>

                    <td> <a data-bs-toggle="modal" class="btn btn-info btn-sm " href="#Rec{{$data->id}}"><i class="fas fa-binoculars" aria-hidden="true"></i></a></td>




	                <td> <a data-route="{{ route('DelAppr', ['id'=>$data->id]) }}"
                        data-msg="You sure you want to delete this appraisal report. This action is not reversible"
                        class="btn btn-danger btn-sm deleteConfirm" href="#"><i class="fas fa-trash"
                            aria-hidden="true"></i></a>

                </td>

	            </tr>
	            @endforeach
	            @endisset



	        </tbody>
	    </table>
	</div>

    @include('apps.New')
    @include('apps.Kpi')
    @include('apps.Rec')
