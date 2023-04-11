<template>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>Add Books</h4>
            </div>
        
            <div class="card-body">
                <ul class="alert alert-warning" v-if="Object.keys(this.errorList).length > 0">
                    <li class ="mb-0 ms-3" v-for="(error, index) in this.errorList" :key="index">
                        {{ error[0] }}
                    </li>
                </ul>
                <div class="mt-3">
                    <label for="name">Name</label>
                    <input type="text" v-model="model.book.name" class="form-control" />
                </div>

                <div class="mt-3">
                    <label for="name">Isbn</label>
                    <input type="text" v-model="model.book.isbn" class="form-control" />
                </div>

                <div class="mt-3">
                    <label for="name">Authors</label>
                    <input type="text" v-model="model.book.authors" class="form-control" />
                </div>

                <div class="mt-3">
                    <label for="name">Number Of Pages</label>
                    <input type="text" v-model="model.book.number_of_pages" class="form-control" />
                </div>

                <div class="mt-3">
                    <label for="name">Publisher</label>
                    <input type="text" v-model="model.book.publisher" class="form-control" />
                </div>

                <div class="mt-3">
                    <label for="name">Country</label>
                    <input type="text" v-model="model.book.country" class="form-control" />
                </div>

                <div class="mt-3">
                    <label for="name">Release Date</label>
                    <input type="text" v-model="model.book.release_date" class="form-control" />
                </div>

                <div class="mt-3">
                    <button type="button" @click="saveBook" class="btn btn-primary"> Store Book </button>
                </div>

            </div>
        </div>
    </div>
  </template>

<script>
import axios from 'axios';

export default{
    'name':'create-book',
    data(){
        return{
            errorList:'',
            model:{
                book:{
                    name:'',
                    isbn:'',
                    authors:'',
                    number_of_pages:'',
                    publisher:'',
                    country:'',
                    release_date:'',

                }
            }
        }
    },
   
    methods:{
        saveBook(){
            var errorfrombackend = this
            axios.post('http://localhost:8000/api/v1/books', this.model.book).then(res =>{
                    console.log(res)
                    alert(res.data.message) //the message is from the backend which shows success or fail;
                    this.model.book ={
                        name:'',
                    isbn:'',
                    authors:'',
                    number_of_pages:'',
                    publisher:'',
                    country:'',
                    release_date:'',
                    }
                    this.errorList= ''
            }).catch(function (error) { 
                    //functions to handle errors
                if (error.response) {

                    if(error.response.status == 401){
                        errorfrombackend.errorList = error.response.data.errors; //this is the error coming from the backend
                    
                    }

                    // console.log(error.response.data);
                    // console.log(error.response.status);
                    // console.log(error.response.headers);
                    } else if (error.request) {
                    console.log(error.request);
                    } else {
                    console.log('Error', error.message);
                    }
                    console.log(error.config);
                    
            })
        }
    }
}
</script>