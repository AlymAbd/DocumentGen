window.$ = window.jQuery = require('jquery');

$(document).ready(function(){
    var company = $('#input_company_name');
    var legal_name = $('#input_legal_name');
    var director = $('#input_director');
    var sign = $('#input_singature_type');
    var bin = $('#input_bin');
    var oop = $('#input_company_oop');
    var document_type = $('#input_document_type');
    var doc_id = $('#doc_id');
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
        var val_id = doc_id.val();

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
                console.log(val_doc_id);
            },
            error: function(){
                alert('Error AJAX');
            }
        })
    })

    $('#get_pdf').click(function(){
        let URL = '/contracts/print_pdf?id=';
        var id = doc_id.val();

        window.location.href = URL + id;

    })

    $('#refill_form').click(function(){
        val = $(this).attr('value');

        $('#form_inputs').addClass('loading');

        $.ajax({
            method: "GET",
            url: '/contracts/view',
            data: {
                id: val
            },
            success: function(data){
                console.log(data);
                data = data[0];
                company.val(data['company_name']);
                legal_name.val(data['legal_name']);
                director.val(data['director']);
                sign.val(data['signature']);
                bin.val(data['bin']);
                oop.val(data['legal_type']);
                document_type.val(data['document']);
                doc_id.val(data['id']);

                $('#form_inputs').toggleClass('loading');
            },
            error: function(){
                alert('сломался');
            }
        })
    })



})

