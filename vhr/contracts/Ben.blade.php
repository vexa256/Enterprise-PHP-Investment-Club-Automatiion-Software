	<!--begin::Card body-->
	<div class="card-body pt-3 bg-light shadow-lg table-responsive">
	    {{ HeaderBtn($Toggle="NewBen", $Class="btn-danger", $Label="New Contractor Benefit Category", $Icon="fa-plus")}}

	    <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
	        <thead>
	            <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">

	                <th>Benefit </th>
	                <th>Description/Terms </th>
	                <th>Date Created </th>
	                <th>Delete</th>


	            </tr>
	        </thead>
	        <tbody>
	            @isset($Benefits)
	            @foreach ($Benefits as $data )
	            <tr>

	                <td>{{$data->Benefit}}</td>
	                <td>
	                    <a href="#BenDesc{{$data->id}}" data-bs-toggle="modal"   class="btn btn-dark  shadow-lg btn-sm "><i class="fas fa-binoculars" aria-hidden="true"></i></a>

	                </td>
	                <td>{{ date('j F, Y', strtotime($data->created_at))}}</td>
	                <td>

                        <a data-route="{{ route('DelConBen', ['id'=>$data->id]) }}" data-msg="You sure you want to delete this contractor benefit category"   class="btn btn-dark deleteConfirm shadow-lg btn-sm "><i
                            class="fas fa-trash" aria-hidden="true"></i></a>
                    </td>


	            </tr>
	            @endforeach
	            @endisset



	        </tbody>
	    </table>
	</div>


	@include('contracts.NewBen')
	@include('contracts.BenDesc')
