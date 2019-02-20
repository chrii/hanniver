console.log('yes');
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
});

Vue.component('tl', {
    template: '<div><t v-for="task in tasks">{{ task.description }}</t></div>',

    data(){
        return {
            tasks: [
                { description: 'Go to the Market', completed: false },
                { description: 'Do something special', completed: false },
                { description: 'Do a Backflip', completed: true },
                { description: 'Do nothing', completed: false }
            ]
        };
    }
});


Vue.component('card', {
    props: ['cardtitle'], 
    template: `<div>
            <div class="row">
                <div class="col s12 m6">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">{{ cardtitle }}</span>
                            <p><slot></slot></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `
});


Vue.component('t', {

    template: '<li><slot></slot></li>'
});

new Vue({
    el: '#unitTwo',
    data: {
        message: 'Hallo',
        switchColor: 'btn waves-effect waves-light',
        tasks: [
            { description: 'Go to the Market', completed: false },
            { description: 'Do something special', completed: false },
            { description: 'Do a Backflip', completed: true },
            { description: 'Do nothing', completed: false }
        ],
        inputField: ''
    }, 
    methods: {
        taskClickEvent() {
            if(this.inputField.length !== 0) {
                console.log(this.inputField);
                var taskObj = {};
                taskObj['description'] = this.inputField;
                taskObj['completed'] = false;
                this.tasks.push(taskObj);
                this.inputField = '';
            }
        },
        completeTask(task){

            return task.completed = true;
            //console.log(task.completed);
        }
    },
    computed: {
        complete() {

        },
        incomplete() {
            var vaar = this.tasks.filter(task => task.completed);
            console.log( vaar ); 
            return vaar;
        }
    }
});

new Vue({
    el: '#postSomething',
    data: {
        allPosts: [],
        postTitle: '',
        postText: '',
        buttonStyle: 'btn waves-effect waves-light'
    },

    methods: {
        postClickEvent() {
            if(this.postTitle.length !== 0 || this.postText.length !== 0){
                var postObj = {}
                postObj['inputText'] = this.postText;
                postObj['inputTitle'] = this.postTitle;
                this.allPosts.push(postObj);
                this.postText = '';
                this.postTitle = '';
            }
        }
    }
});