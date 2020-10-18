window.$ = window.jQuery = require('jquery');

$(document).ready(function(){
    var company = $('#input_company_name');
    var legal_name = $('#input_legal_name');
    var director = $('#input_director');
    var sign = $('#input_singature_type');
    var bin = $('#input_bin');
    var oop = $('#input_company_oop');
    var document_type = $('#input_document_type');
    let id;

    $('#save_document').click(function(){
        $('#form_inputs').addClass('loading');

        var val_company = company.val();
        var val_legal_name = legal_name.val();
        var val_director = director.val();
        var val_sign = sign.val();
        var val_bin = bin.val();
        var val_oop = oop.val();
        var val_doc_id = document_type.val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method:'POST',
            url: '/contracts/save',
            data: {
                company_name: val_company,
                company_legal_name: val_legal_name,
                company_director: val_director,
                director_sign: val_sign,
                company_bin: val_bin,
                company_oop: val_oop,
                document_id: val_doc_id
            },
            success: function(data){
                id = data['id'];
                $('#doc_id').val(id);
                $('#get_pdf').toggleClass('disabled');
                $('#form_inputs').toggleClass('loading');
            },
            error: function(){
                alert('Error AJAX');
            }
        })
    })

})

