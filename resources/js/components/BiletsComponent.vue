<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button @click="update" class="btn btn-info" v-if="!is_refresh">Обновить</button>
                <span class="badge badge-primary mb-1" v-if="is_refresh">Обновление</span>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Форма ввода
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <input type="text" name="title" v-model="title"><br>
                                <input type="text" name="discription" v-model="discription"><br>
                                <textarea type="text" name="text" v-model="text"></textarea><br>
                                <button @click="addData"  class="btn btn-info" >Добавить</button><br>
                            </div>
                        </div>
                    </div>

                </div>
               <table class="table table">
                   <thead class="thead-inverse">
                   <tr>
                       <th>id</th>
                       <th>заголовок</th>
                       <th>Описание</th>
                       <th>Действие</th>
                   </tr>
                   </thead>
                   <tbody>
                   <tr v-for="url in urldata">
                        <td>{{url.id}}</td>
                        <td>{{url.title}}</td>
                        <td>{{url.discription}}</td>
                       <td>
                           <button class="btn btn-primary" @click="edit(url.id)" >Редактировать</button>
                           <button class="btn btn-danger" @click="remove(url.id)">Удалить</button>
                       </td>
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
                    this.title = '';
                    this.discription = '';
                    this.text = '';
                });
            },
            remove: function(id){
                axios.post('/bilet/remove',{
                    id:id
                }).then((response)=>{
                    console.log(response);
                    this.update();
                });
            },
            edit: function(id){
                axios.get('/bilet/edit',{
                    id:id
                }).then((response)=>{
                    console.log(response)
                })
            }
        }
    }
</script>
