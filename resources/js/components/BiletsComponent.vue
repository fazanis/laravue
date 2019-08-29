<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button @click="update" class="btn btn-info" v-if="!is_refresh">Обновить</button>
                <span class="badge badge-primary mb-1" v-if="is_refresh">Обновление</span>
               <table class="table">
                   <tr>
                       <th>id</th>
                       <th>заголовок</th>
                       <th>Описание</th>
                   </tr>
                   <tr v-for="url in urldata">
                        <td>{{url.id}}</td>
                        <td>{{url.title}}</td>
                        <td>{{url.discription}}</td>
                   </tr>
               </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function(){
            return{
                urldata:[],
                is_refresh: false,
                id:0
            }
        },
        mounted() {
            this.update()
        },
        methods:{
            update: function () {
                this.is_refresh = true;
                axios.get('/getAjaxBilets').then((response)=>{
                    console.log(response);
                    this.urldata = response.data;
                    this.is_refresh = false;
                    this.id++
                });
            }
        }
    }
</script>
