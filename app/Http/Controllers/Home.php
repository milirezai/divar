<?php
namespace App\Http\Controllers;

class Home extends Controller
{
       
    public function index()
    {
        return view("welcom",[]);
    }

    public function Damavand()
    {
        return "Welcome to the Damavand Framework "."<br>"."
            A framework based on MVC and object-oriented architecture that can make your work easy and enjoyable to use.";
    }

    public function create()
    {
        echo "create method in HomeController";
    }

    public function store()
    {
        echo "store method in HomeController";
    }

    public function edit($id)
    {
        echo "edit method in HomeController";
    }

    public function update($id)
    {
        echo "update method in HomeController";
    }

    public function destroy($id)
    {
        echo "destroy method in HomeController";
    }

}