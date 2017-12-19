@extends('layouts/pagesMaster')

@section('title')
    Contact
@endsection

@section('content')
    {{Breadcrumbs::render('contact')}}
<div class="contact">
    <div class="container">

        <form>
            <div class="form-group">
                <label for="InputName">Your Name:</label>
                <input type="text" class="form-control" id="InputName" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="InputEmail">Your E-mail:</label>
                <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="Textarea">Your Input:</label>
                <textarea class="form-control" id="Textarea" rows="3"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-danger bg-danger">
                    <i class="fa fa-paper-plane" aria-hidden="true"></i>   Submit
                </button>
            </div>
        </form>
    </div>
    <div class="container">
        <div class="row-fluid">
            <div class="span8">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2477.90651532592!2d4.776108415864743!3d51.606601479651474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1snl!2snl!4v1512132029027" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>

            <div class="span4">
                <h2>Radius College</h2>
                <address>
                    Terheijdenseweg 350<br>
                    4826 AA Breda<br>
                    Netherlands<br>
                    076 573 3444<br>
                </address>
            </div>
        </div>
    </div>
</div>

@endsection