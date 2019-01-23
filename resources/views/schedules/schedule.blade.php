@include('header.index')

<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Alert</h4>
            </div>

            <div class="modal-body">
                <p>Are you sure you want to delete this item?</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>

<div class="page-inner">
    <div class="page-title">
        <h3 class="breadcrumb-header">Schedule - {{ $doctor->name }} </h3>
        <a class="addTable btn btn-default" href="{{ route('scheduleFormAdd', ['id' => $doctor->id]) }}" title="Add">Add</a>
    </div>

    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12 table-responsive">
                <table class="tableListing table table-hover table-bordered display">
                    <thead>
                        <tr>
                            <th style="width: 5%;">#</th>
                            <th style="width: 40%;">Name</th>
                            <th style="width: 15%;">Date</th>
                            <th style="width: 10%;">Hour</th>
                            <th style="width: 15%;">created at:</th>
                            <th style="width: 15%;">&nbsp</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                        <tr>
                            <td>
                                {{ $row->idPatients }}
                            </td>
                            <td>
                                {{ $row->name }}
                            </td>
                            <td>
                                {{ date('d-m-Y', strtotime($row->date)) }}
                            </td>
                            <td>
                                {{ $row->hour }}
                            </td>
                            <td>
                                {{ date('d-m-Y', strtotime($row->created_at)) }}
                            </td>
                            <td>
                                <a href="{{ route('scheduleFormEdit', ['id' => $row->id]) }}" title="Edit">
                                    <i class="fa fa-pencil-square-o buttonEditListing"></i>
                                </a>
                                <a href="javascript:void(0)" onClick="deleteData({{$row->id}}, 'scheduleDelete');" title="Delete">
                                    <i class="fa fa-trash buttonDeleteListing"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('footer.index')
