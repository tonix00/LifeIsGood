window.onload = function() {
    $(document).ready(function() {
        $("[type=file]").on("change", function() {
            // Name of file and placeholder
            var file = this.files[0].name;
            var dflt = $(this).attr("placeholder");
            if ($(this).val() != "") {
                $("#upload").html(file + '<span class="form-file-button">UPLOAD</span>');
            } else {
                $("#upload").html(dflt + '<span class="form-file-button">UPLOAD</span>');
            }
        });
    });
}