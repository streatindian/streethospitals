<h4>SMTP Settings</h4>
<hr>
<div class="form-group">
    <label for="mail_engine">Mail Engine</label><br>
    <div class="radio radio-inline radio-primary">
        <input type="radio" name="settings[mail_engine]" id="phpmailer" value="phpmailer" @checked($setting['mail_engine'] == 'phpmailer')>
        <label for="phpmailer">PHPMailer</label>
    </div>

    <hr>
    <label for="email_protocol">Email Protocol</label><br>
    <div class="radio radio-inline radio-primary">
        <input type="radio" name="settings[email_protocol]" id="smtp" value="smtp" @checked($setting['email_protocol'] == 'smtp')>
        <label for="smtp">SMTP</label>
    </div>
</div>
<div class="smtp-fields">
    <div class="form-group mtop15">
        <label for="smtp_encryption">Email Encryption</label><br>
        <div class="dropdown bootstrap-select bs3" style="width: 100%;">
            <select name="settings[smtp_encryption]" class="select2" data-width="100%" tabindex="-98">
                <option value="" @selected($setting['smtp_encryption'] == '')>None</option>
                <option value="ssl" @selected($setting['smtp_encryption'] == 'ssl')>SSL</option>
                <option value="tls" @selected($setting['smtp_encryption'] == 'tls')>TLS</option>
            </select>
        </div>
    </div>
    <div class="form-group" app-field-wrapper="settings[smtp_host]"><label for="settings[smtp_host]"
            class="control-label">SMTP
            Host</label><input type="text" id="settings[smtp_host]" name="settings[smtp_host]" class="form-control"
            value="{{$setting['smtp_host']}}"></div>
    <div class="form-group" app-field-wrapper="settings[smtp_port]"><label for="settings[smtp_port]"
            class="control-label">SMTP
            Port</label><input type="text" id="settings[smtp_port]" name="settings[smtp_port]" class="form-control"
            value="{{$setting['smtp_port']}}"></div>
</div>
<div class="form-group" app-field-wrapper="settings[smtp_email]"><label for="settings[smtp_email]"
        class="control-label">Email</label><input type="text" id="settings[smtp_email]" name="settings[smtp_email]"
        class="form-control"  value="{{$setting['smtp_email']}}"></div>
<div class="smtp-fields">
    <i class="fa fa-question-circle pull-left" data-toggle="tooltip"
        data-title="Fill only if your email client use username for SMTP login."></i>
    <div class="form-group" app-field-wrapper="settings[smtp_username]">
        <label for="settings[smtp_username]" class="control-label">SMTP
            Username</label><input type="text" id="settings[smtp_username]" name="settings[smtp_username]"
            class="form-control"  value="{{$setting['smtp_username']}}">
    </div>
    <div class="form-group" app-field-wrapper="settings[smtp_password]">
        <label for="settings[smtp_password]" class="control-label">SMTP
            Password</label><input type="password" id="settings[smtp_password]" name="settings[smtp_password]"
            class="form-control" autocomplete="off"  value="{{$setting['smtp_password']}}">
    </div>
</div>
<div class="form-group" app-field-wrapper="settings[smtp_email_charset]">
    <label for="settings[smtp_email_charset]" class="control-label">Email
        Charset</label><input type="text" id="settings[smtp_email_charset]" name="settings[smtp_email_charset]"
        class="form-control"  value="{{$setting['smtp_email_charset']}}">
</div>
<div class="form-group" app-field-wrapper="settings[bcc_emails]"><label for="settings[bcc_emails]"
        class="control-label">BCC All Emails
        To</label><input type="text" id="settings[bcc_emails]" name="settings[bcc_emails]" class="form-control"
        value="{{$setting['bcc_emails']}}">
</div>
<div class="form-group" app-field-wrapper="settings[email_signature]">
    <label for="settings[email_signature]" class="control-label">Email
        Signature</label>
    <textarea id="settings[email_signature]" name="settings[email_signature]" class="form-control"
        data-entities-encode="true" rows="4">{{$setting['email_signature']}}</textarea>
</div>
<hr>
<div class="form-group d-none" app-field-wrapper="settings[email_header]"><label for="settings[email_header]"
        class="control-label">Predefined
        Header</label>
    <textarea id="settings[email_header]" name="settings[email_header]" class="form-control" rows="15"
        data-entities-encode="true">{{$setting['email_header']}}</textarea>
</div>
<div class="form-group  d-none" app-field-wrapper="settings[email_footer]"><label for="settings[email_footer]"
        class="control-label">Predefined
        Footer</label>
    <textarea id="settings[email_footer]" name="settings[email_footer]" class="form-control" rows="15"
        data-entities-encode="true">{{$setting['email_footer']}}</textarea>
</div>
<hr>
<h4>Send Test Email</h4>
<p class="text-muted">Send test email to make sure that your SMTP settings
    is set correctly.</p>
<div class="form-group">
    <div class="input-group">
        <input type="email" class="form-control" name="test_email" data-ays-ignore="true"
            placeholder="Email Address">
        <div class="input-group-btn">
            <button type="button" class="btn btn-default test_email p7">Test</button>
        </div>
    </div>
</div>
