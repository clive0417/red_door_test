/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

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
  //delete_post的function code
deletePost = function (id) {
    let result = confirm('Do you want to delete post?');
    console.log(result); //驗證result 帶入0,1 OK
    //部分文章無法刪除
    
    if (result) {
        let actionUrl ='/posts/'+id;//組合網址
        console.log(actionUrl);
        $.post(actionUrl,{_method:'delete'}).done(function() {
            console.log('test');
            location.href = '/posts/admin';//重新整理頁面   

        });

    };
};
    

deleteCategory = function (id) {
    let result = confirm('Do you want to delete Category?');
    //console.log(result); 驗證result 帶入0,1 OK
    
    if (result) {
        let actionUrl ='/categories/'+id;//組合網址
        //console.log(actionurl);位置驗證OK
        $.post(actionUrl,{_method:'delete'}).done(function() {
            //console.log('test');
            location.href = '/categories';//重新整理頁面 

        });

    };

    
};

deleteTag = function (id) {
        let result = confirm('Do you want to delete Tag?');
        console.log(result); //驗證result 帶入0,1 OK  
        if (result) {
            let actionUrl ='/tags/'+id;//組合網址
            //console.log(actionUrl);//位置驗證OK
            $.post(actionUrl,{_method:'delete'}).done(function() {
                console.log('test');
                location.href = '/tags';//重新整理頁面 
    
            });
    
        };
    
        
    };
    