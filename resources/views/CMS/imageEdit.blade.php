<div>
    <input id="image" type="file"
           name="image"
           class="form-control  @error('image') is-invalid @enderror"
           required>
    @error('image')
    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
    @enderror
</div>