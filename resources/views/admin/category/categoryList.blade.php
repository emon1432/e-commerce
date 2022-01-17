@extends('admin.dashboardPart.mainBody')
@section('mainBody')



<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Data Table</h5>
        <p>DataTables is a plug-in for the jQuery Javascript library.</p>
    </div>
    <!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Basic Responsive DataTable</h6>
        <p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</p>

        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-15p">First name</th>
                        <th class="wd-15p">Last name</th>
                        <th class="wd-20p">Position</th>
                        <th class="wd-15p">Start date</th>
                        <th class="wd-10p">Salary</th>
                        <th class="wd-25p">E-mail</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger</td>
                        <td>Nixon</td>
                        <td>System Architect</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                        <td>t.nixon@datatables.net</td>
                    </tr>
                    <tr>
                        <td>Garrett</td>
                        <td>Winters</td>
                        <td>Accountant</td>
                        <td>2011/07/25</td>
                        <td>$170,750</td>
                        <td>g.winters@datatables.net</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        <!-- table-wrapper -->
    </div>
    <!-- card -->
</div>


@endsection