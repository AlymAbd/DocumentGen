window.$ = window.jQuery = require('jquery');

$(document).ready(function(){
    window.ist = null;

    $('#save_document').click(function(){
        var text_data = CKEDITOR.instances.wysiwygeditor.getData();

        $.ajax({
            method: "POST",
            url: "/contracts/templates/save",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                text: text_data
            },
            success: function(data){
                console.log(data);
            },
            error: function(){
                alert('Error');
            }
        })
    })

    window.insertKey = function(but){
        id = but.id;

        id_map = {
            insert_number: "{{DOCUMENT_NUMBER}}",
            insert_date: "{{DOCUMENT_DATE}}",
            insert_name: "{{COMPANY_NAME}}",
            insert_legal: "{{COMPANY_LEGAL}}",
            insert_director: "{{COMPANY_DIRECTOR}}",
            insert_signature: "{{SIGNATURE_BY}}",
            insert_bin: "{{COMPANY_BIN}}",
            insert_oop: "{{COMPANY_OOP}}"
        }

        CKEDITOR.instances.wysiwygeditor.insertText(id_map[id]);
    }
})
