<div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name ?? '') }}" required>
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email ?? '') }}" required>
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="password">{{ isset($user) ? 'Nueva Contraseña (dejar en blanco para mantener la actual)' : 'Contraseña' }}</label>
    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" {{ !isset($user) ? 'required' : '' }}>
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="password_confirmation">Confirmar Contraseña</label>
    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" {{ !isset($user) ? 'required' : '' }}>
</div>

<div class="form-group">
    <label for="role">Rol</label>
    <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" required>
        <option value="">Seleccione un rol</option>
        <option value="admin" {{ (old('role', $user->role ?? '') == 'admin') ? 'selected' : '' }}>Administrador</option>
        <option value="editor" {{ (old('role', $user->role ?? '') == 'editor') ? 'selected' : '' }}>Editor</option>
        <option value="user" {{ (old('role', $user->role ?? '') == 'user') ? 'selected' : '' }}>Usuario</option>
    </select>
    @error('role')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="box-footer mt20">
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
</div> 