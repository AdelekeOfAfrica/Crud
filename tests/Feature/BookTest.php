<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Books;
use Illuminate\Foundation\Testing\WithFaker;

class BookTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    
    public function test_to_create_a_newbook_using_factory(){
        $book = Books::factory()->make();

        $response = $this->post('/api/v1/books',[
            'isbn'=>$book->isbn,
            'name'=>$book->name,
            'authors' =>$book->authors,
            'number_of_pages' => $book->number_of_pages,
            'publisher' => $book->publisher,
            'country' => $book->country,
            'release_date' =>$book->release_date
        ]);

        $response->assertStatus(200);
    }

    public function test_create_a_new_book_manually(){
        $book =[
            'isbn'=>'11223432-11234556',
            'name'=>'half of a yellow son',
            'authors' =>'me i dont know',
            'number_of_pages' => '500',
            'publisher' => 'maxmillian print',
            'country' => 'nigeria',
            'release_date' =>'10-10-10'
        ];
        $response = $this->post('/api/v1/books',$book);
        $response->assertStatus(200);
        $this->assertDatabaseHas('books',$book);
    }

    public function test_to_get_all_books(){
        $response = $this->get('api/v1/books');
        $response->assertStatus(200);
    }

    public function test_to_get_a_books(){
      
        // Arrange
        $book = Books::factory()->create();
        $url = 'api/v1/books/' . $book->id;
    
        
        $response = $this->get($url);

        $response->assertStatus(200);    
    }

    public function test_delete_a_book(){
        $book = Books::factory()->create();
        $response = $this->delete('/api/v1/books/' . $book->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('books', [
            'id' => $book->id,
        ]);
    }
}
