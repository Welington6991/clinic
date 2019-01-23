@include('header.index')

<div class="page-inner">
    <div class="page-title">
        <h3 class="breadcrumb-header">Schedules</h3>
    </div>

    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12 table-responsive">
                <table class="tableListing table table-hover table-bordered display">
                    <thead>
                        <tr>
                            <th style="width: 5%;">#</th>
                            <th style="width: 60%;">Name</th>
                            <th style="width: 20%;">created at:</th>
                            <th style="width: 15%;">&nbsp</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                        <tr>
                            <td>
                                {{ $row->id }}
                            </td>
                            <td>
                                {{ $row->name }}
                            </td>
                            <td>
                                {{ date('d-m-Y', strtotime($row->created_at)) }}
                            </td>
                            <td>
                                <a href="{{ route('scheduleListing', ['id' => $row->id]) }}" title="Schedule">
                                    <i class="fa fa-list-ol buttonScheduleListing"></i>
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
