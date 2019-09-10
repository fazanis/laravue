<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
<!--                <button @click="getPosts" class="btn btn-info" v-if="!is_refresh">Обновить</button>-->
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
                       <td> <button class="btn btn-info" @click="getPosts">Активировать</button></td>
                   </tr>
                   </tbody>
               </table>
            </div>
        </div>

        <div v-show="loading">
            <span class="text-3xl font-bold">Loading...</span>
        </div>
    </div>
</template>

<script>
    export default {
        data: function(){
            return{
                posts:[],
                is_refresh: false,
                class: '',
                loading: false
            }
        },
        mounted() {
            // this.getPosts();
        },
        methods:{
            getPosts: function (offset=0) {
                this.loading = true;
                axios.get('/getposts',{
                    params:{
                        offset:offset
                    }
                }).then((response)=>{
                    console.log(response.data);
                    this.posts = this.posts.concat(response.data);
                })
                    .finally(response => this.loading = false)
            }
        },
        created() {
            this.getPosts();
            const eventHandler = () => {
                // const atTheBottom = false
                const scrollTop = document.documentElement.scrollTop;
                const viewportHeight = window.innerHeight;
                const totalHeight = document.documentElement.offsetHeight;
                const atTheBottom = scrollTop + viewportHeight == totalHeight;
                console.log(atTheBottom);
                if (atTheBottom)
                {
                    this.getPosts(this.posts.length);
                }

            }
            let delayedHandler = _.debounce(eventHandler, 400)
            document.addEventListener('scroll', delayedHandler)
        }
    }
</script>
