<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button @click="update" class="btn btn-info" v-if="!is_refresh">Обновить</button>
                <span class="badge badge-primary mb-1" v-if="is_refresh">Обновление</span>
                    <input type="text" name="title" id="title">
                    <input type="text" name="discription" id="discription">
                    <input type="text" name="text" id="text">
                    <button @click="addData"  class="btn btn-info" >Добавить</button>
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
                id:0,
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
                // axios({
                //     method: 'post',
                //     url: '/addBilet',
                //     data: title=this.title,
                //     discription=this.discription,
                //     text=this.text
                //     config: { headers: {'Content-Type': 'multipart/form-data' }}
                // }).then((response)=>{
                //     console.log(response);
                // });
                axios.post('/addBilet').then(function (response) {
                    app.countries = response.data;
                    console.log(app.countries);
                });
            }
        }
    }
</script>
