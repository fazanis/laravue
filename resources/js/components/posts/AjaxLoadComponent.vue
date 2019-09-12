<template>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
<!--                <button @click="getPosts" class="btn btn-info" v-if="!is_refresh">Обновить</button>-->
                <span class="badge badge-primary mb-1" v-if="is_refresh">Обновление</span>
                <scrollable @at-the-bottom="getPosts(posts.length)">
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
                       <td>
                           <button v-if="post.status==0" class="btn btn-info" @click="activate(post.id,post.status)">Активировать</button>
                           <button v-else class="btn btn-error" @click="activate(post.id,post.status)">Деактивировать</button>
                       </td>
                   </tr>
                   </tbody>
               </table>
                </scrollable>
            </div>
        </div>

        <div v-show="loading">
            <span class="text-3xl font-bold">Loading...</span>
        </div>
    </div>
</template>

<script>

    import Scrollable from './Scrolable.vue'

    export default {
        data: function(){
            return{
                posts:[],
                is_refresh: false,
                class: '',
                loading: false
            }
        },
        components: {Scrollable},
        mounted() {
            this.getPosts();
        },
        methods:{
            getPosts: function (offset=0) {
                this.loading = true;
                axios.get('/getposts',{
                    params:{
                        offset:offset
                    }
                }).then((response)=>{
                    // console.log(response.data);
                    this.posts = this.posts.concat(response.data);
                })
                    .finally(response => this.loading = false)
            },
            activate: function (id,status) {
                var param;
                if (status==1){param=0}else{param=1}
                axios.post('/activate',{
                    id:id,param:param
                }).then((response)=>{

                })
            }
        },
        created() {
            this.getPosts();
        }
    }
</script>
