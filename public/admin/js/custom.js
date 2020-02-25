$('#file').change(function() {
    $('#uploadBtn').text('1 file selected');
    $('#fileName').text($('#file')[0].files[0].name);
});

