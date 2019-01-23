@include('header.index')
<div class="page-inner">
    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <form id="formDoctorAdd" action="{{ $type == 'new' ? route('doctorInsert') : route('doctorUpdate', ['id' => $data['id']]) }}"
                    method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="">Doctor</label>
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{ isset($data['name']) ? $data['name'] : '' }}"
                            title="Name" required>
                    </div>

                    <div class="form-group">
                        <label for="birthdate">Birthdate</label>
                        <input class="form-control" type="date" name="birthdate" id="birthdate" value="{{ isset($data['birthdate']) ? $data['birthdate'] : '' }}"
                        title="Birthdate" required>
                    </div>

                    <div class="form-group">
                        <label for="specialty">Specialty</label>
                        <input class="form-control" type="text" name="specialty" id="specialty" value="{{ isset($data['specialty']) ? $data['specialty'] : '' }}"
                        title="Specialty" required>
                    </div>

                    <div class="form-group">
                        <label for="crm">CRM</label>
                        <input class="form-control" type="text" name="crm" id="crm" value="{{ isset($data['crm']) ? $data['crm'] : '' }}"
                        title="CRM" required>
                    </div>

                    <div class="form-group">
                        <label for="phone1">Phone number 1</label>
                        <input class="form-control" type="text" name="phone1" id="phone1" value="{{ isset($data['phone1']) ? $data['phone1'] : '' }}"
                        title="Phone number" required>
                    </div>

                    <div class="form-group">
                        <label for="phone2">Phone number 2</label>
                        <input class="form-control" type="text" name="phone2" id="phone2" value="{{ isset($data['phone2']) ? $data['phone2'] : '' }}"
                        title="Phone number">
                    </div>
                    <button class="btn btn-primary" type="submit" title="Save">Save</button>
                    <a href="{{ route('doctors') }}" class="btn btn-danger" title="Cancel">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@include('footer.index')