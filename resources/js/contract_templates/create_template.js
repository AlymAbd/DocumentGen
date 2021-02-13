const { method, indexOf } = require('lodash');

window.$ = window.jQuery = require('jquery');

Array.prototype.random = function () {
    return this[Math.floor((Math.random()*this.length))];
}

$(document).ready(function(){
    window.ist = null;
    let document_type = $('#input_document_type');
    let tags_bar = $('#tags_list_bar');
    let tags;
    let template_id = $('#template_id');
    let sem_colors = [
        'blue',
        'yellow',
        '',
        'primary',
        'red',
        'orange',
        'yellow',
        'olive',
        'green',
        'teal',
        'violet',
        'purple',
        'pink',
        'brown'
    ];

    function ajax_maker(url, query, method='GET'){
        return $.ajax({
            url: '/templates/create/' + url,
            method: method,
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            },
            data: query,
            error: function(){
                alert('AJAX request failed');
            }
        })
    }

    document_type.on('change', function(){
        contract_type = document_type.val();
        $('#doc_type').addClass('loading');

        query = {
            tag_type: contract_type
        }

        tags = ajax_maker('get_tags', query);

        tags.then(data =>
            fill_tags(data)
        );
        $('#doc_type').toggleClass('loading');
    })

    function fill_tags(rows){
        tags_bar.html('');
        
        rows.forEach(element => {
            _html = `<button class="ui inverted ` + sem_colors.random() + `
            button" data-value="`+ element['tag'] +`" value="` + element['id'] + `"
            onClick="insertKey(this)">` + element['mask'] + `</button>`;

            tags_bar.append(_html);
        });
    }


    $('#save_document').click(function(){
        $('#save_document').text("ЩА ВСЁ БУДЕТ");

        text_data = CKEDITOR.instances.wysiwygeditor.getData();
        temp_id = template_id.val();
        temp_due_data = $('#due_date').val();
        temp_type = document_type.val();
        temp_name = $('#input_document_name').val();

        query = {
            template_id: temp_id,
            template_text: text_data,
            template_due_date: temp_due_data,
            template_name: temp_name,
            template_type: temp_type
        }

        data = ajax_maker('save', query, 'POST');
    })

    window.insertKey = function(but){
        tag = " " + but.dataset["value"] + " ";
        CKEDITOR.instances.wysiwygeditor.insertText(tag);
    }

})
