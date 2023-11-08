<div class="col-md-6">
    <label for="name" class="form-label">Usuário</label>
    <input type="name" class="form-control" id="name" name="name" value="{{ $user->name ?? '' }}">
</div>

<div class="col-md-6">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" @required(!isset($user->password))>
</div>

<div class="col-md-6">
    <label for="email" class="form-label">E-mail</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email ?? '' }}">
</div>


@can('type-user')
    <div class="col-md-6">
        <label for="email" class="form-label">Tipo</label>
        <select name="tipo" id="tipo" class="form-control">
            <option value="admin">--</option>
            <option value="admin">admin</option>
            <option value="admin">usuario</option>
        </select>
    </div>
@endcan
