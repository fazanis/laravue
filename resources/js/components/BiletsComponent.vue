<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button @click="update" class="btn btn-info" v-if="!is_refresh">Обновить</button>
                <span class="badge badge-primary mb-1" v-if="is_refresh">Обновление</span>
                    <input type="text" name="title" v-model="title">
                    <input type="text" name="discription" v-model="discription">
                    <input type="text" name="text" v-model="text">
                    <button @click="addData"  class="btn btn-info" >Добавить</button>
               <table class="table table">
                   <thead class="thead-inverse">
                   <tr>
                       <th>id</th>
                       <th>заголовок</th>
                       <th>Действие</th>
                   </tr>
                   </thead>
                   <tbody>
                   <tr v-for="url in urldata">
                        <td>{{url.id}}</td>
                        <td>{{url.title}}</td>
                       <td><a href="#" @click="remove(url.id)">Удалить</a> </td>
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
                urldata:[],
                is_refresh: false,
                id:'',
                title:'',
                discription: '',
                text: ''
            }
        },
        mounted() {
            this.update()
        },
        methods:{
            update: function () {
                this.is_refresh = true;
                axios.get('/getAjaxBilets').then((response)=>{
                    this.urldata = response.data;
                    this.is_refresh = false;
                    this.id++
                });
            },
            addData: function () {
                // alert(this.title);
                axios.post('/addBilet',{
                    title:this.title,
                    discription:this.discription,
                    text:this.text
                }).then((response)=>{
                    this.update();
                });
            },
            remove: function(id){
                axios.post('/bilet/remove',{
                    id:id
                }).then((response)=>{
                    console.log(response);
                    this.update();
                });
            }
        }
    }
</script>
