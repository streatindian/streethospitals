<div class="col-md-12">
    <div class="form-group">
        @if (!isset($setting['company_logo']))
            <label for="company_logo" class="control-label">Company Logo</label>
            <input type="file" name="company_logo" class="form-control @error('company_logo') is-invalid @enderror"
                value="{{ isset($setting['company_logo']) ? $setting['company_logo'] : '' }}" data-toggle="tooltip"
                title="" data-original-title="Recommended dimensions: 150 x 34px">
            @error('company_logo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        @else
            <img src="{{ asset('uploads/setting/' . $setting['company_logo']) }}" height="90" width="150">
        @endif
    </div>
    <hr>
    <div class="form-group">
        @if (!isset($setting['company_logo_dark']))
            <label for="company_logo_dark" class="control-label">Company Logo Dark</label>
            <input type="file" name="company_logo_dark"
                class="form-control @error('company_logo_dark') is-invalid @enderror"
                value="{{ $setting['smtp_host'] }}" data-toggle="tooltip" title="Recommended dimensions: 150 x 34px">
            @error('company_logo_dark')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        @else
            <img src="{{ asset('uploads/setting/' . $setting['company_logo_dark']) }}" height="90" width="150">
        @endif
    </div>
    <hr>
    <div class="form-group favicon_upload">
        @if (!isset($setting['favicon']))
            <label for="favicon" class="control-label">Favicon</label>
            <input type="file" name="favicon" class="form-control @error('favicon') is-invalid @enderror">
            @error('favicon')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        @else
            <img src="{{ asset('uploads/setting/' . $setting['favicon']) }}" height="90" width="150">
        @endif
    </div>
    <hr>
    <div class="form-group" app-field-wrapper="settings[companyname]">
        <label for="settings[companyname]" class="control-label">Company Name</label>
        <input type="text" id="settings[companyname]" name="settings[companyname]" class="form-control"
            value="{{ isset($setting['companyname']) ? $setting['companyname'] : '' }}">
    </div>
    <hr>
    <div class="form-group" app-field-wrapper="settings[main_domain]">
        <label for="settings[main_domain]" class="control-label">Company Main Domain</label>
        <input type="text" id="settings[main_domain]" name="settings[main_domain]" class="form-control"
            value="{{ isset($setting['main_domain']) ? $setting['main_domain'] : '' }}">
    </div>
    <hr>
</div>
