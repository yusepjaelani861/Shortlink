<x-guest-layout>
    <h1 class="text-3xl font-bold px-2 text-center mb-4">{{ $post->title }}</h1>

    <div class="flex mb-4">
        <img src="https://picsum.photos/200/300" alt="Gambar Artikel" class="rounded-full w-10 h-10 mr-2">
        <div class="flex flex-col">
            <span class="font-bold">Yusep Jaelani</span>
            <span class="text-gray-500 text-sm">
                    {{ $post->custom_created_at }}
            </span>
        </div>
    </div>

    @if ($post->thumbnail != null)
    <div class="p-2">
        <img src="{{ $post->thumbnail }}"
            alt="Gambar Artikel" class="w-full mb-4">
    </div>
    @endif

    <div class="flex flex-col justify-center items-center mb-4">
        <div id="shortlink-password" class="mt-4 mb-4">
        </div>
        <div id="alert-password" class="mb-4">
        </div>
        <div id="shortlink-loading" class="mt-4 mb-4">
        </div>
        <div id="menuju-link-atas" class="flex justify-center items-center mt-4 mb-4">
        </div>
    </div>

    <div class="w-full mb-4 break-words p-2">{!! $post->content !!}</div>

    <script>
        // replace digitalpaanda.com to accfresno.com
        const img = document.querySelectorAll('img');
        img.forEach((item) => {
            item.src = item.src.replace('digitalpaanda.com', 'accfresno.com');
        });

        const a = document.querySelectorAll('a');
        a.forEach((item) => {
            item.href = item.href.replace('digitalpaanda.com', 'accfresno.com');
        })
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
