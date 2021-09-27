<!--begin::Card body-->
@include('docs.stats')
<div class="card-body pt-3 bg-light table-responsive">
    {{ HeaderBtn($Toggle="NewDoc", $Class="btn-danger", $Label="New Document", $Icon="fa-plus")}}


</div>
<div class="card-body shadow-lg pt-3 bg-light table-responsive">
    <div class="row">
        <div class="col-md-12">

            <table class="table  table-rounded table-bordered  border gy-3 gs-3">
                <thead>
                    <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">

                        <th>Designation</th>
                        <th>Staff Code</th>
                        <th>Department</th>
                        <th>Document</th>
                        <th>Description</th>
                        <th>View</th>
                        <th>Delete</th>


                    </tr>
                </thead>
                <tbody>
                    @isset($Docs)
                    @foreach ($Docs as $data )
                      <tr>

                        <td>{{$data->Designation}}</td>
                        <td>{{$data->StaffCode}}</td>
                        <td>{{$data->Department}}</td>
                        <td>{{$data->DocumentName}}</td>
                        <td><a   data-bs-toggle="modal" href="#DocDesc{{$data->id}}" class="btn btn-sm  btn-dark"> <i class="fas fa-binoculars" aria-hidden="true"></i> </a></td>

                <td>
                        <a data-doc="{{$data->DocumentName}}" data-source="{{ asset($data->DocURL) }}"  data-bs-toggle="modal" href="#PdfJS" class="btn btn-sm  PdfViewer btn-info"> <i class="fas fa-binoculars" aria-hidden="true"></i> </a>
                </td>

                    <td>
                        <a data-route="{{ route('DeleteDoc', ['id'=>$data->SID]) }}" data-msg="You sure you want to delete this external document. This action is  not reversible"  class="btn btn-danger btn-sm deleteConfirm btn-info"> <i class="fas fa-trash" aria-hidden="true"></i> </a>
                    </td>

                    </tr>
                    @endforeach
                    @endisset



                </tbody>
            </table>
        </div>


    </div>


  </div>
  <!--end::Card body-->

@include('docs.NewDoc')
@include('docs.Pdfjs')
@include('docs.ViewDesc')

