<script src="{{ config('brandstudio.recaptcha.url') }}{{ config('brandstudio.recaptcha.public_key') }}"></script>
<script>
    grecaptcha.ready(function() {
        document.querySelectorAll('form').forEach((element) => {
            element.addEventListener('submit', function(e) {
                e.preventDefault();
                let form = e.target,
                    input = document.createElement('input');

                input.setAttribute('type', 'hidden');
                input.setAttribute('name', 'g-recaptcha-response');

                grecaptcha.execute("{{ config('brandstudio.recaptcha.public_key') }}", {action: {{ $action ?? 'undefined' }}}).then((token) => {
                    input.setAttribute('value', token);
                    form.appendChild(input);
                    form.submit();
                });
            });
        })
    });
</script>
