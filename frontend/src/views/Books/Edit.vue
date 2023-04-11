<template>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>Edit Book</h4>
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
                    <button type="button" @click="updateBook" class="btn btn-primary"> update Book </button>
                </div>

            </div>
        </div>
    </div>
  </template>

<script>
import axios from 'axios';

export default{
    'name':'edit-book',
    data(){
        return{
            bookId:'',
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
    mounted (){
        //console.log(this.$route.params.id)
        this.bookId = this.$route.params.id
        this.getBookData(this.$route.params.id)
    },
    methods:{
        getBookData(bookId){
            axios.get(`http://localhost:8000/api/v1/books/${bookId}`).then(res =>{
                console.log(res.data.book) //book details that is fetched from the  backend

                this.model.book.name = res.data.book.name
                this.model.book.isbn = res.data.book.isbn
                this.model.book.authors = res.data.book.authors
                this.model.book.number_of_pages = res.data.book.number_of_pages
                this.model.book.publisher = res.data.book.publisher
                this.model.book.country = res.data.book.country
                this.model.book.release_date= res.data.book.release_date
            }).catch(function (error) { 
                    //functions to check if book exist.
                if (error.response) {
                    if(error.response.status == 404){
                        alert(error.response.data.message); //this is the error coming from the backend
                    
                    }
                }    
            })
        },
        updateBook(){
            var errorfrombackend = this
            axios.put(`http://localhost:8000/api/v1/books/${this.bookId}`, this.model.book).then(res =>{
                    console.log(res)
                    alert(res.data.message) //the message is from the backend which shows success or fail;
                   
                    this.errorList= ''
            }).catch(function (error) { 
                    //functions to handle errors
                if (error.response) {

                    if(error.response.status == 401){
                        errorfrombackend.errorList = error.response.data.errors; //this is the error coming from the backend
                    
                    }

                    if(error.response.status == 500){
                        alert( error.response.data.errors); //this is the error coming from the backend
                    
                    }

                   
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