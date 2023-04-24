<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BookManager extends Controller
{
    public function view()
    {
        $book = Books::simplePaginate(3);
        return view('BookView', ['book' => $book]);
    }

    function create()
    {
        return view('BookCreate');
    }

    function update(Books $book)
    {
        return view('BookUpdate', compact('book'));
    }

    public function search(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search) {
            $book = Books::where('Title', 'like', '%' . $search . '%')
                ->orWhere('Author', 'like', '%' . $search . '%')
                ->orWhere('Description', 'like', '%' . $search . '%')
                ->orWhere('Publication_Date', 'like', '%' . $search . '%')->simplePaginate(3);
            return view('BookView',['book'=> $book]);
        }
        else{
            $book = Books::simplePaginate(3);
            return view('BookView', ['book' => $book]);
        }
    }


    function createPost(Request $request)
    {
        $request->validate([

            'title' => 'required|max:15',
            'author' => 'required|max:15|regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/',
            'date' => 'required|before:today',
            'description' => 'required|max:15'
        ]);
        $data['Title'] = $request->title;
        $data['Author'] = $request->author;
        $data['Publication_Date'] = $request->date;
        $data['Description'] = $request->description;
        $books = Books::create($data);
        if (!$books) {
            return redirect(route('create'))->with('error', 'Creation Failed, Try Again');
        }
        return redirect(route('view'))->with('success', 'Creation Successful');

    }

    public function updatePut(Request $request, Books $book)
    {
        $request->validate([
            'title' => 'required|max:15',
            'author' => 'required|max:15|regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/',
            'description' => 'required|max:15',
            'date' => 'required|before:today'
        ]);

        // Update book model with new data
        $book->Title = $request->input('title');
        $book->Author = $request->input('author');
        $book->Publication_Date = $request->input('date');
        $book->Description = $request->input('description');
        // Save changes to the database
        $book->save();

        return redirect(route('view'))->with('success', 'Book has been updated');
    }


    function delete(Books $book)
    {

        $book->delete();

        return redirect(route('view'))->with('success', 'Book has been deleted');

    }

}
