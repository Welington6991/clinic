@include('header.index')
<div class="page-inner">
    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <form id="formScheduleAdd" action="{{ $type == 'new' ? route('scheduleInsert', ['id' => $doctor->id]) : route('scheduleUpdate', ['id' => $data['id'], 'idDoctor' => $doctor->id]) }}"
                    method="post">
                    {{csrf_field()}}
                    <div class="page-title">
                        <h3 class="breadcrumb-header">Schedule - {{ $doctor->name }} </h3>
                    </div>

                    <div class="form-group">
                        <label for="date">Patient</label>
                        <select id="patient" name="patient" class="selectpicker form-control" data-live-search="true" title="Select patient" placeholder="Oi" title="Patients" required>
                            @foreach ($patients as $row)
                            <option value="{{ $row->id }}" id="{{ $row->id }}"
                                {{ isset($patient) ? $patient->id == $row->id ? 'selected' : null : null }}
                                required>{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="date">Date</label>
                        <input class="form-control" type="date" name="date" id="date" value="{{ isset($data['date']) ? $data['date'] : '' }}"
                            title="Date" required>
                    </div>

                    <div class="form-group">
                        <label for="hour">Hour</label>
                        <input class="form-control" type="time" name="hour" id="hour" value="{{ isset($data['hour']) ? $data['hour'] : '' }}"
                        min="07:00" max="18:00" title="Hour" required>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                    <a href="{{ route('scheduleListing', ['id' => $doctor->id]) }}" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@include('footer.index')