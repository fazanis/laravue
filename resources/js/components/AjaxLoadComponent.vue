<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button @click="getPosts" class="btn btn-info" v-if="!is_refresh">Обновить</button>
                <span class="badge badge-primary mb-1" v-if="is_refresh">Обновление</span>
               <table class="table table">
                   <thead class="thead-inverse">
                   <tr>
                       <th>id</th>
                       <th>заголовок</th>
                       <th>Описание</th>
                       <th>Статус</th>
                   </tr>
                   </thead>
                   <tbody>
                   <tr v-for="post in posts">
                       <td>{{post.id}}</td>
                       <td>{{post.title}}</td>
                       <td>{{post.text}}</td>
                       <td> <button> {{param}} </button></td>
                   </tr>
                   </tbody>
               </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function(){
            return{
                posts:[],
                is_refresh: false,
                name:'',
                class: ''
            }
        },
        mounted() {
            this.getPosts();
        },
        methods:{
            getPosts: function () {
                axios.get('/getposts').then((response)=>{
                    console.log(response.data);
                    this.posts = response.data;
                });
            }
        }
    }
</script>
