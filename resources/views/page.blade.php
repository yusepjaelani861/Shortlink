<x-guest-layout>
    <div class="flex flex-col justify-center items-center h-[80vh]">
        <h1 class="text-3xl font-bold px-2 text-center">Welcome to {{ config('app.name') }}</h1>
        <p class="text-center">This is a simple landing page.</p>

        <div id="shortlink-password" class="mt-4 mb-4">
        </div>
        <div id="alert-password" class="mb-4">
        </div>
        <div id="shortlink-loading" class="mt-4 mb-4">
        </div>
        <div id="menuju-link-atas" class="flex justify-center items-center mt-4 mb-4">
        </div>
    </div>

    <script>
        const shortlink_password = $('#shortlink-password');
        const shortlink_loading = $('#shortlink-loading');
        const menuju_link_atas = $('#menuju-link-atas');
        const alert_password = $('#alert-password');
        var number = 6;
        @if (isset($link->password))
            let password_answer = '{{ $link->password }}';
        @else
            let password_answer = ''
        @endif
        @if (isset($link))
            const link = true;
            const shortlink = '{{ $link->slug }}';
            @if ($link->password != null)
                const link_password = true;
            @else
                const link_password = false;
            @endif
        @else
            const link = false;
            const link_password = false;
            const shortlink = '';
        @endif

        @if (isset($link->url))
            let original_url = '{{ $link->url }}';
        @else
            let original_url = '';
        @endif

        function convertDate(date) {
            // convert to 12 January 2021
            const dateConvert = new Date(date);
            const dateConvertMonth = dateConvert.toLocaleString("default", {
                month: "long",
            });
            const dateConvertDay = dateConvert.getDate();
            const dateConvertYear = dateConvert.getFullYear();
            const dateConvertFinal = `${dateConvertDay} ${dateConvertMonth} ${dateConvertYear}`;
            return dateConvertFinal;
        }
    </script>

    <script src="/js/helper.js" type="text/javascript"></script>
</x-guest-layout>
