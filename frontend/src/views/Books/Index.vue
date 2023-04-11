<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Books
                    <RouterLink to="/books/create" class="btn btn-primary float-end"> Add Books </RouterLink>
                </h4>
            </div>
            <div class="card-body" v-if="this.books.length >0 ">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Isbn</th>
                            <th> Authors</th>
                            <th> Number Of Pages</th>
                            <th>Publisher</th>
                            <th>Country</th>
                            <th>Release Date</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(book,index) in this.books" :key="index">
                            <td> {{ book.id }} </td>
                            <td>{{ book.name }}</td>
                            <td>{{ book.isbn }}</td>
                            <td>{{ book.authors }}</td>
                            <td>{{ book.number_of_pages }}</td>
                            <td>{{ book.publisher }}</td>
                            <td>{{ book.country }}</td>
                            <td>{{ book.release_date }}</td>
                            <td width="200px">
                                <RouterLink :to="{path: '/book/'+book.id+'/edit'}" class="btn btn-success">Edit </RouterLink>&nbsp;
                                <button type="button" @click="deleteBook(book.id)" class="btn btn-danger "> Delete </button>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
            <div v-else>
                no books available
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

  export default {
    name:'books',
    data(){
        return {
            books:[]
        }
    },
    mounted(){
        this.getBooks() 
        // console.log('working');
    },
    methods:{
        getBooks(){
            axios.get('http://localhost:8000/api/v1/books').then(res => {
                 this.books = res.data.books
                 console.log(this.books)
            })
        },
        deleteBook(bookId){
            console.log(bookId)
            if(confirm('Are you sure, you want to delete this book?')){
                axios.delete(`http://localhost:8000/api/v1/books/${bookId}`).then(res => {
                    alert(res.data.message)
                    this.getBooks()
                }).catch(function (error) { 
                if (error.response) {
                    if(error.response.status == 401){
                        alert(error.response.data.message); //this is the error coming from the backend
                    
                    }
                }    
            })
            }
        }
    },
  }
</script>