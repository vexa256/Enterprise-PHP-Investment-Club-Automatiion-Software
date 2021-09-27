<div class="text-inverse-dark fs-6 bg-dark py-5 pb-5 ps-4 mb-5">
    <span class="p3-3 me-3"> Notice Board
  </div><!--begin::Card body--><!--begin::Card body-->
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        {{ HeaderBtn($Toggle="New", $Class="btn-danger", $Label="New Notice", $Icon="fa-plus")}}


          <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
              <thead>
                  <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">

                      <th>Sender</th>
                      <th>Subject</th>
                      <th>Date Sent</th>
                      <th>Read</th>




                  </tr>
              </thead>
              <tbody>
                  @isset($Notices)
                  @foreach ($Notices as $data )
                  <tr>

                      <td>{{$data->Name}}</td>
                      <td>{{$data->Subject}}</td>
                      <td>{{ date('j F, Y', strtotime($data->created_at)) }}
                    </td>
                      <td>
                          <a href="#View{{$data->id}}" data-bs-toggle="modal" class="btn btn-danger">
                              <i class="fas fa-binoculars" aria-hidden="true"></i>
                          </a>
                      </td>

                  </tr>
                  @endforeach
                  @endisset



              </tbody>
          </table>
      </div>


@include('notice.New')
@include('notice.View')
