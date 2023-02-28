<form method="POST" action="{{ route('useres.update', Auth::user()) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" id="direccion" value="{{ old('direccion', $user->direccion) }}" class="form-control @error('direccion') is-invalid @enderror">
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>

