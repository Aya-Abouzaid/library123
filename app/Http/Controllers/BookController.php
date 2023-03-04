<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Reader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function getBooks()
    {
        $books = DB::table('books as b')->join('publishers as p', 'p.id', '=', 'b.publisher_id')->select('title', 'name', 'price', 'place', 'category', 'production_year')->get();
        return $books;
    }
    public function getFavoriteBooks($userId)
    {
        // SELECT * from books JOIN favorites on books.id = favorites.book_id JOIN publishers ON books.publisher_id = publishers.id where favorites.reader_id = 1;
        $favorites = DB::table('books')->join('favorites', 'books.id', '=', 'favorites.book_id')->join('publishers', 'publishers.id', '=', 'books.publisher_id')->select('title', 'name', 'price', 'place', 'category', 'production_year')->where('favorites.reader_id', $userId)->get();
        return $favorites;
    }
    public function getBookById($bookId)
    {
        $book = DB::table('books as b')->join('publishers as p', 'p.id', '=', 'b.publisher_id')->select('title', 'name', 'price', 'place', 'category', 'production_year')->where('b.id', $bookId)->get();

        return $book;
    }
    public function edit($id)
    {

        return $editProduct = Book::find($id);
    }

    public function update(Request $request, $id)
    {
        $product = Book::find($id);
        $product->update([
            'title' => request()->title,
            'production_year' => request()->production_year,
            'price' => request()->price,
            'category' => request()->category,
            'investigator' => request()->investigator,
            'writer' => request()->writer,
            'publisher_id' => request()->publisher_id
        ]);
        return $product;
    }


    public function getCategories()
    {
        $categories = Book::select('category')->get();
        return ($categories);
    }
    public function getCategoryById($catName)
    {
        $category = DB::table('books as b')->join('publishers as p', 'p.id', '=', 'b.publisher_id')->select('title', 'name', 'price', 'place', 'category', 'production_year')->where('category', $catName)->get();
        return ($category);
    }
    public function getInvestigators()
    {
        $investigators = Book::select('investigator')->get();
        return ($investigators);
    }
    public function getInvestigatorById($investName)
    {
        $investigator = DB::table('books as b')->join('publishers as p', 'p.id', '=', 'b.publisher_id')->select('title', 'name', 'price', 'place', 'category', 'production_year')->where('investigator', $investName)->get();
        return ($investigator);
    }
    public function search($title)
    {
        $search = DB::table('books as b')->join('publishers as p', 'p.id', '=', 'b.publisher_id')->select('title', 'name', 'price', 'place', 'category', 'production_year')->where('title', 'like', '%' . $title . '%')->get();
        return $search;
    }
}
