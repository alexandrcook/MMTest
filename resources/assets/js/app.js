
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Popper = require('popper.js').default; // FIX

// window.Vue = require('vue');

// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */
//
// Vue.component('example', require('./components/Example.vue'));
//
// const app = new Vue({
//     el: '#app'
// });


//Ajax

//Comment

$(document).on('click', '#ajax-leave-comment', function (event) {
    event.preventDefault();
    var url,
        method,
        data,
        quarter_num,
        status,
        author,
        content,
        $this = $(this);

    url = $this.parent('form').attr('action');
    method = $this.parent('form').attr('method');
    data = $this.parent('form').serialize();
    author = $this.parent('form').find("input[name=author]").val();
    content = $this.parent('form').find("textarea[name=content]").val();

    $.ajax({
        type: method,
        url: url,
        data: data,
        success: function (data) {
            $('#response-text').text('').append(data);

            if(data.responseText == 'Success!'){

                var el = '<div class="media mb-4">'+
                            '<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">'+
                            '<div class="media-body">'+
                                '<h5 class="mt-0 d-inline">'+ author +'</h5> <span>(at '+ data.created_at +')</span>' +
                                '<p>'+ content +'</p>' +
                            '</div>'+
                        '</div>';
                $(el).prependTo('#post-comments');

                $this.parent('form').find("input[type=reset]").trigger('click');
            }
        },
        error: function (err) {
            console.log(err);
        }
    })
});