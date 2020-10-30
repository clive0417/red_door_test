/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  toggleCommentForm = function (e) {
  
    /*console.log('1',$(e.target));/*target and currentTget 抓到都是相同的東西 */
    /*console.log('2',$(e.currentTarget));*/
    $(e.target).closest('.comment-info').siblings('.comment-body').toggleClass('edit');

    /**/

  };
  deleteComment = function (e) {
    let result = confirm('delete Comment?');
    let action = $(e.currentTarget).data('action');
    let comment = $(e.currentTarget).closest('.media');
    let position =  $(e.currentTarget);
    //console.log(action) sction 位置有帶成功然而
    if (result) {
      $.post(action,{
        _method:'delete',
      }).done(function (data) {
        console.log("1");
        console.log(e.currentTarget);
        console.log(position);
        //e.currentTarget 抓不到值
        $(position).closest('.media').remove();
      })
    }

    
    /*$(e.currentTarget).closest('.comment-info').siblings('.comment-body').taggleClass('edit');無法執行*/
    /*console.log("e.currentTarget");*/

  };

  $('form.update-comment').submit(function (e) {
    e.preventDefault();// 阻止form 送出
    console.log("test-2");// 此console.log 無法顯示

    let comment =$(e.currentTarget).find('[name="comment"]').val();
    //let post_id=$(e.currentTarget).find('[name="post_id"]').val();
    //let name=$(e.currentTarget).find('[name="name"]').val();

    $.post($(e.currentTarget).attr('action'),{
      _method: 'put',
      comment:comment,

    }).done(function (data) {
      console.log("test-3");
      $(e.currentTarget).closest('.comment-body').toggleClass('edit');
      $(e.currentTarget).siblings('p').html(comment);


    });
  });

