<!DOCTYPE html>
<html>
    <head>
        
        <title>
            
        </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <style>
            .clickable {
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <a href="/products">Produkte</a>
        </div>
        <div>
            <div class="container">
                <div id="unitTwo">
                    
                    <h2>All open Tasks</h2>
                    <ul>
                        <li v-for="task in tasks" v-if="!task.completed" v-text="task.description" v-on:click="completeTask(task)" class="clickable"></li>
                    </ul>
                    
                    <h2>All completed Tasks</h2>
                    <ul>
                        <li v-for="task in incomplete" v-text="task.description"></li>
                    </ul>
                    <input type="text" id="taskInput" v-model="inputField">
                    <button @click="taskClickEvent" :class="switchColor" title="Task hinzufügen">Submit Task</button>
                    <card cardtitle="Meine schöne Überschrift">Hier Ist mein Text</card>
                </div>
            </div>
        <div class="container" id="postSomething">
            <card v-for="post in allPosts" :cardtitle="post.inputTitle"> @{{ post.inputText }} </card>
            <label for="postInput">Hier Titel einfügen</label>
            <input type="text" id="postInput" v-model="postTitle" class="validate">
            <label for="input">Hier Text einfügen</label>
            <textarea class="materialize-textarea" name="postText" id="input" cols="30" rows="10" v-model="postText"></textarea>
            <button @click="postClickEvent" :class="buttonStyle">Send Message</button>
        </div>

        <footer>
                <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
                <script src="js/main.js"></script>
        </footer>
    </body>
</html>