@extends('admin.dashboardPart.mainBody')
@section('mainBody')


<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Subscriber</h5>
        <!-- <p>DataTables is a plug-in for the jQuery Javascript library.</p> -->
    </div>
    <!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Subscriber List</h6>
        <!-- <p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</p> -->

        <div class="table-wrapper">
            <a href="" class="btn btn-sm btn-danger" style="float: right; margin:10px;">Delete All</a>
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-15p" style="text-align: center;">ID</th>
                        <th class="wd-15p" style="text-align: center;">Email</th>
                        <th class="wd-15p" style="text-align: center;">Subscribing Time</th>
                        <th class="wd-20p" style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody style="text-align: center;">
                    @foreach($subscribers as $key => $subscriber)
                    <tr>
                        <td> <input type="checkbox"> {{$key+1}}</td>
                        <td>{{$subscriber->email}}</td>
                        <td>{{ Carbon\Carbon::parse($subscriber->created_at)->diffForHumans() }}</td>
                        <td>
                            <a href="{{url('/subscriber/delete/'.$subscriber->id)}}" class="btn btn-sm btn-danger" id="delete"> Delete </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- table-wrapper -->
    </div>
    <!-- card -->
</div>


@endsection