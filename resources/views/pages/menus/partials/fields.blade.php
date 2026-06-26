<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <x-gingerminds-core::form.inputs.basic
                    id="code"
                    type="text"
                    label="Code"
                    required="true"
                    :value="old('code', isset($menu) ? $menu->code : null)"
                />
            </div>
        </div>
    </div>
</div>
