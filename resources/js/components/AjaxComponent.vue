<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button @click="update" class="btn btn-info" v-if="!is_refresh">Обновить - {{id}}</button>
                <span class="badge badge-primary mb-1" v-if="is_refresh">Обновление</span>
               <table class="table">
                   <tr>
                       <th>Наименование</th>
                       <th>URL</th>
                   </tr>
                   <tr v-for="url in urldata">
                        <td>{{url.title}}</td>
                        <td>{{url.text}}</td>
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
            console.log('fdfsdf');
            this.update()
        },
        methods:{
            update: function () {
                this.is_refresh = true;
                axios.get('/getjson').then((response)=>{
                    console.log(response);
                    this.urldata = response.data;
                    this.is_refresh = false;
                    this.id++
                });
            }
        }
    }
</script>
