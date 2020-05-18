# asprogrammer
personal site

### Frontend preparing

If you have the Windows host machine, and windqws user is not administrator,
needed to provide permissions to create symlink.

https://badcode.ru/kak-ispravit-oshibku-symlink-protocol-error-i-sozdat-symlink-vagrant/

This project does not use Vue.js, therefore it must be removed.

Open the `package.json` file and remove these strings

`"vue": "^2.5.17",` 

`"vue-template-compiler": "^2.6.10"`

Then update `yarn.lock` file

`$ yarn upgrade`

Open `resources/assets/js/app.js` and remove

`const files = require.context('./', true, /\.vue$/i);`

`files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));`

`window.Vue = require('vue');`
`Vue.component('example-component', require('./components/ExampleComponent.vue').default);`

`const app = new Vue({`

 `el: '#app',`
 
 `});`
 
 Then remove the `resources/assets/js/components` directory
 
 Fix undefined  `$ jQuery`
 Open `webpack.mix.js` file to add the strings
 
 `mix.webpackConfig({`
 `resolve: {`
 `alias: {`
 `jquery: "jquery/src/jquery"`
 `}`
 `}`
 `});`
 
 ### Add packages
 
 Laravel Install Summernote
 
 https://garrettseymour.com/blog/29
 
 Be carefull 
 
 `require('summernote/dist/summernote-bs4.css');`
 
 `require('summernote/dist/summernote-bs4.js');`
 
 fix errors npm install
 
 Перейдите в каталог проекта
 Удалите каталог node_modules: rm -rf node_modules
 Удалить файл package-lock.json: rm package-lock.json
 Очистить кеш: npm cache clean --force кеш npm cache clean --force
 Запустить npm install --verbose Если после выполнения вышеуказанных шагов все еще существует проблема, пожалуйста, сообщите нам вывод команды установки с помощью --verbose.
 
    
