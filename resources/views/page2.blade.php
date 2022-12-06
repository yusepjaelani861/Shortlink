<x-guest-layout>
    <div class="flex flex-col justify-center items-center h-[80vh]">
        <h1 class="text-3xl font-bold px-2 text-center">Is it true that your site's destination is {{ explode('/', $url)[2] }}?</h1>

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

        const data = {
            url: `{{ $url }}`,
        }

        const domain = data.url.split('/')[2];

        submitLoading()

        function submitLoading() {
            var interval = setInterval(function() {
                number--;
                shortlink_loading.html(`
        <div class="rounded-full flex items-center justify-center flex-col border" style="width:100px;height:100px;">
            <p class="text-2xl font-semibold">${number}</p>
            <p class="text-sm">Seconds</p>
        </div>
        `);

                menuju_link_atas.html(`
            <button id="menuju-link" class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded" onclick="menujuLink()" disabled>Please wait</button>
        `);
                if (number === 0) {
                    const menuju_link = $("#menuju-link");
                    menuju_link.remove();
                    shortlink_loading.remove();
                    menuju_link_atas.html(`
                    <a href="${data.url}" target="_blank" class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded">Menuju Link</a>
                    `);
                    clearInterval(interval);
                    // delete disabled menuju link
                    // menuju_link.removeAttr("disabled");
                    // menuju_link.text("Menuju Link");
                    // menuju_link.removeClass("bg-blue-500 hover:bg-blue-700");
                    // // menuju_link.addClass("bg-blue-700 hover:bg-blue-900");
                    // menuju_link.addClass("finish");
                    // menuju_link.attr("style", "background-color: #2b6cb0; hover: #2c5282;");
                }
            }, 1000);
        }
    </script>
</x-guest-layout>
