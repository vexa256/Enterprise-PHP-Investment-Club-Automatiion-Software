	<!--begin::Alert-->
	<div class="alert alert-primary">
	    <!--begin::Icon-->
	    <span class="svg-icon float-end svg-icon-2hx svg-icon-primary me-3"><i class="fas fa-3x fa-user"
	            aria-hidden="true"></i></span>
	    <!--end::Icon-->

	    <!--begin::Wrapper-->
	    <div class="d-flex flex-column">
	        <!--begin::Title-->
	        <h4 class="mb-1 text-dark">{{$Staff->StaffName}}</h4>
	        <!--end::Title-->
	        <!--begin::Content-->
	        <span>Attendace Report for the selected staff member </span>
	        <!--end::Content-->
	    </div>
	    <!--end::Wrapper-->
	</div>
	<!--end::Alert-->
	<!--begin::Card body-->
	<div class="card-body pt-3 bg-light shadow-lg table-responsive">


	    <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
	        <thead>
	            <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">

	                <th>Name </th>
	                <th>Department </th>
	                <th>Designation </th>
	                <th class="bg-primary text-light">Attendace Status</th>
	                <th class="bg-dark text-light">Time Promptness</th>
	                <th class="bg-danger text-light">Attendace Record</th>
	                <th>Trash</th>



	            </tr>
	        </thead>
	        <tbody>
	            @isset($Att)
	            @foreach ($Att as $data )
	            <tr>

	                <td>{{$data->Name}}</td>
	                <td>{{$data->Department}}</td>
	                <td>{{$data->Designation}}</td>
	                <td class="bg-primary text-light">{{$data->status}}</td>
	                <td class="bg-dark text-light">{{$data->time}}</td>
	                <td>{{date("F j, Y", strtotime($data->Record))}}</td>
	                <td></td>
	            </tr>
	            @endforeach
	            @endisset



	        </tbody>
	    </table>
	</div>




