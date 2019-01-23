@include('header.index')
<div class="page-inner">
    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <form id="formPatientAdd" action="{{ $type == 'new' ? route('patientInsert') : route('patientUpdate', ['id' => $data['id']]) }}"
                    method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="">Patient</label>
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
                        <label for="cpf">CPF</label>
                        <input class="form-control" type="text" name="cpf" id="cpf" value="{{ isset($data['cpf']) ? $data['cpf'] : '' }}"
                        title="CPF" required>
                    </div>

                    <div class="form-group">
                        <label for="phone1">Phone number 1</label>
                        <input class="form-control" type="text" name="phone1" id="phone1" value="{{ isset($data['phone1']) ? $data['phone1'] : '' }}"
                        title="Phone number" required>
                    </div>

                    <div class="form-group">
                        <label for="phone2">Phone number 2</label>
                        <input class="form-control" type="text" name="phone2" id="phone2" value="{{ isset($data['phone2']) ? $data['phone2'] : '' }}"
                        title="Phone number" required>
                    </div>
                    <button class="btn btn-primary" type="submit" title="Save">Save</button>
                    <a href="{{ route('patients') }}" class="btn btn-danger" title="Cancel">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@include('footer.index')