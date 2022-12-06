$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
let url;
// after full loading, then show loading 5 second to innerHTML
if (link == true) {
    $(window).on("load", function () {
        if (link_password == null || link_password == "") {
            submitLoading();
        } else {
            shortlink_password.html(`
                <input id="password-value" type="password" name="password" id="password" class="border rounded px-2 py-2"
                    placeholder="Masukkan password">
                <button id="submit-password" class="submit-password text-white font-bold px-4 py-2 rounded"
                    onclick="submitPassword()">Submit</button>
            `);
        }
    });
} else {
    shortlink_password.hide();
    shortlink_loading.hide();
    menuju_link_atas.hide();
    alert_password.hide();
}

function submitPassword() {
    const password_value = $("#password-value").val();
    const submit_password = $("#submit-password");

    $.ajax({
        url: "/shortlink/password",
        type: "POST",
        data: {
            password: password_value,
            shortlink: shortlink,
        },
        success: function (data) {
            if (data.success == true) {
                shortlink_password.remove();
                submitLoading();
            }
        },
        error: function (data) {
            alert_password.html(`
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Password Salah!</strong>
                    <span class="block sm:inline">Silahkan coba lagi.</span>
                </div>
            `);
            setTimeout(() => {
                alert_password.html("");
            }, 1000);
        }
    });
}

let urlpath = window.location.pathname.split("/")[1];
function submitLoading() {
    var interval = setInterval(function () {
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
            $.ajax({
                url: "/shortlink/redirect",
                type: "POST",
                data: {
                    shortlink: shortlink,
                },
                success: function (data) {
                    if (data.success == true) {
                        menuju_link.remove();
                        shortlink_loading.remove();
                        menuju_link_atas.html(`
                            <form action="/${urlpath}" method="POST">
                                <input type="hidden" name="_token" value="${$('meta[name="csrf-token"]').attr('content')}">
                                <input type="hidden" name="shortlink" value="${shortlink}">
                            <button type="submit" href="${data.data.link}" target="_blank" class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded">Menuju Link</button>
                            </form>
                        `);
                    }
                }
            });
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

function menujuLink() {

}