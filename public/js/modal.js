$(document).ready(() => {
    $(document).on("click", '.open-modal', function (e) {
        e.preventDefault();

        const { modal } = $(this).data();
        console.log(modal)
        $(`#${modal}`).removeClass("hidden");
    })

    $(document).on("click", '.close-modal', function (e) {
        e.preventDefault();

        const { modal } = $(this).data();
        $(`#${modal}`).addClass("hidden");
    });
})