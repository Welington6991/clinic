@include('header.index')
<div class="page-inner">
    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <form id="formUserAdd" action="{{ $type == 'new' ? route('userInsert') : route('userUpdate', ['id' => $data['id']]) }}"
                    method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="">User</label>
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{ isset($data['name']) ? $data['name'] : '' }}"
                        title="Name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input class="form-control" type="email" name="email" id="email" value="{{ isset($data['email']) ? $data['email'] : '' }}"
                        title="E-mail" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" id="password" value=""
                            {{ $type == 'new' ? 'required' : ''}} title="Password">
                    </div>
                    <button class="btn btn-primary" type="submit" title="Save">Save</button>
                    <a href="{{ route('users') }}" class="btn btn-danger" title="Cancel">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@include('footer.index')