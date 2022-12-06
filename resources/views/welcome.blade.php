<x-guest-layout>
    <div id="create-alert" class="mb-4">
    </div>
    <div class="flex w-full rounded-md border mb-4">
        <div class="flex-shrink-0 p-2 border-r rounded-l-md bg-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
            </svg>
        </div>
        <input onkeyup="removeResult()" id="shortlink-url" type="url" class="flex-1 p-2 outline-0 border-0 bg-white"
            placeholder="HTTP, HTTPS or WWWW" />
        <button onclick="generate()" class="flex-shrink-0 p-2 bg-blue-500 text-white font-bold px-2 rounded-r-md">
            Convert
        </button>
    </div>

    <div class="flex w-full mb-2">
        <button onclick="openPassword()"
            class="flex-shrink-0 px-4 p-2 border rounded-md bg-slate-700 hover:bg-slate-900 text-white font-bold mr-4">
            Password
        </button>
        <div class="flex border w-full rounded-md">
            <div class="flex-shrink-0 p-2 border-r bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                </svg>
            </div>
            <input id="shortlink-password" type="text" class="flex-1 p-2 outline-0 border-0 rounded-r-md bg-gray-100"
                placeholder="" disabled />
        </div>
    </div>

    <div class="flex w-full mb-4">
        <label class="inline-flex relative items-center cursor-pointer mr-8">
            <input onchange="changeRandom()" id="shortlink-random" type="checkbox" value="" class="sr-only peer">
            <div
                class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
            </div>
            <span class="ml-2 text-md font-medium text-gray-900 dark:text-gray-300">Random Post</span>
        </label>
    </div>

    <div id="shortlink-result" class="flex w-full rounded-md border mb-4">
    </div>



    <div class="mb-14 mt-4">
        <img src="https://i0.wp.com/hdtv.co.id/wp-content/uploads/2021/09/banner-720-x-90.png" alt="Banner 720 x 90" />
    </div>

    <div class="p-4 w-full flex justify-center items-center mb-4">
        <div class="flex flex-col justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 mb-2">
                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                <path fill-rule="evenodd"
                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z"
                    clip-rule="evenodd" />
            </svg>
            <h1 class="text-2xl font-bold text-center">Encrypt</h1>
            <p class="text-center break-words p-4">Make your url unreadable and no one can bypass</p>
        </div>

        <div class="flex flex-col justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 mb-2">
                <path fill-rule="evenodd"
                    d="M12 1.5a5.25 5.25 0 00-5.25 5.25v3a3 3 0 00-3 3v6.75a3 3 0 003 3h10.5a3 3 0 003-3v-6.75a3 3 0 00-3-3v-3c0-2.9-2.35-5.25-5.25-5.25zm3.75 8.25v-3a3.75 3.75 0 10-7.5 0v3h7.5z"
                    clip-rule="evenodd" />
            </svg>
            <h1 class="text-2xl font-bold text-center">Password</h1>
            <p class="text-center break-words p-4">Set a password to protect your links from unauthorized access</p>
        </div>

        <div class="flex flex-col justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 mb-2">
                <path fill-rule="evenodd"
                    d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 00-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 00-2.282.819l-.922 1.597a1.875 1.875 0 00.432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 000 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 00-.432 2.385l.922 1.597a1.875 1.875 0 002.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 002.28-.819l.923-1.597a1.875 1.875 0 00-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 000-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 00-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 00-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 00-1.85-1.567h-1.843zM12 15.75a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z"
                    clip-rule="evenodd" />
            </svg>
            <h1 class="text-2xl font-bold text-center">Setting</h1>
            <p class="text-center break-words p-4">Easy to setting without need to know programming language</p>
        </div>
    </div>

    {{-- <div class="flex justify-between items-center mb-4 p-4">
        <h1 class="text-3xl font-bold text-center">Related Post</h1>
        <a href="https://hdtv.co.id" class="text-blue-500 text-lg hover:text-blue-600">See All</a>
    </div>
    <div class="overflow-x-auto">
        <div class="md:flex">
            @for ($i = 0; $i < 5; $i++)
                <div class="w-full p-4 md:p-2 rounded-md">
                    <div class="bg-white md:w-[250px] dark:bg-gray-800 rounded-lg shadow-lg p-4 border">
                        <div class="flex flex-col justify-center items-center">
                            <img src="https://i0.wp.com/www.transtv.co.id/layout/ttvnew/src/images/logo/LIVE-STREAMING-TV.jpg"
                                alt="1" class="rounded-md" />
                            <h1 class="text-2xl font-bold text-center mt-4">How to Watch Live Streaming TV Online</h1>
                            <a href="https://hdtv.co.id/how-to-watch-live-streaming-tv-online/"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-2 rounded">Read
                                More</a>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div> --}}

    <script>
        const shortlink_url = $('#shortlink-url');
        const shortlink_password = $('#shortlink-password');
        const shortlink_result = $('#shortlink-result');
        let shortlink_random = 0;
        const alert_message = $('#create-alert');
        // const shortlink_countdown = $('#shortlink-countdown');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function openPassword() {
            console.log('openPassword');
            console.log(shortlink_password.val());
            // if has disabled attribute, then remove it
            if (shortlink_password.attr('disabled')) {
                shortlink_password.removeAttr('disabled');
                shortlink_password.removeClass('bg-gray-100');
                shortlink_password.addClass('bg-white');
            } else {
                shortlink_password.val('');
                shortlink_password.attr('disabled', 'disabled');
                shortlink_password.removeClass('bg-white');
                shortlink_password.addClass('bg-gray-100');
            }
        }

        function generate() {
            if (shortlink_url.val() == '') {
                alert_message.html(`
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Please enter your URL</strong>
                </div>
                `);
                setTimeout(() => {
                    alert_message.html('');
                }, 2000);
                return;
            }

            $.ajax({
                url: '/shortlink/create',
                type: 'POST',
                data: {
                    url: shortlink_url.val(),
                    password: shortlink_password.val(),
                    random: shortlink_random,
                },
                success: function(data) {
                    console.log(data);
                    let slug = data.data.slug;
                    let url = window.location.origin + '/' + slug;

                    shortlink_result.html(`
                    <div class="flex-shrink-0 p-2 border-r rounded-l-md bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.666 3.888A2.25 2.25 0 0013.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 01-.75.75H9a.75.75 0 01-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 01-2.25 2.25H6.75A2.25 2.25 0 014.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 011.927-.184" />
                        </svg>
                    </div>
                    <input id="shortlink-url" type="url" class="flex-1 p-2 outline-0 border-0 bg-white"
                        placeholder="HTTP, HTTPS or WWWW" value="${url}" disabled />
                    `)
                },
                error: function(error) {
                    console.log(error);
                    alert_message.html(`
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Something went wrong!</strong>
                    </div>
                    `)
                    setTimeout(() => {
                        alert_message.html('');
                    }, 2000);
                }
            })

            console.log('url : ', shortlink_url.val());
            console.log('password : ', shortlink_password.val());
            console.log('random : ', shortlink_random);
        }

        function changeRandom() {
            shortlink_random = shortlink_random == 0 ? 1 : 0;
        }

        function removeResult() {
            shortlink_result.html('');
        }
    </script>

</x-guest-layout>
