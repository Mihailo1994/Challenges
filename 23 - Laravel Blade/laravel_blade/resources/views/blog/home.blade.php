@extends('blog.layouts.layout')

@section('image', 'home-bg.jpg')

@section('title', 'Home')

@section('heading')

    <p class="h1 text-capitalize text-white fw-bold">clean blog</p>
    <p class="text-white text-capitalize">a blog theme by start bootstrap</p>

@endsection

@section('content')

                <div class="p-4 border-bottom">
                    <p class="h3 fw-bold">Lorem, ipsum</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, expedita ducimus? Amet sunt dignissimos necessitatibus placeat.</p>
                    <p class="fst-italic fw-light mb-0">Posted by <span class="fw-bold">John Doe</span></p>
                </div>
                <div class="p-4 border-bottom">
                    <p class="h3 fw-bold">Lorem, ipsum 2</p>
                    <p class="fst-italic fw-light mb-0">Posted by <span class="fw-bold">John Doe</span> in another boring news</p>
                </div>
                <div class="p-4 border-bottom">
                    <p class="h3 fw-bold">Lorem, ipsum 3</p>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illo tempora non fugit magni veniam sed enim dicta saepe sunt blanditiis. Explicabo maxime consequuntur rem pariatur inventore totam beatae obcaecati porro.</p>
                    <p class="fst-italic fw-light mb-0">Posted by <span class="fw-bold">John Doe</span></p>
                </div>
                <div class="p-4 border-bottom">
                    <p class="h3 fw-bold">Lorem, ipsum 4</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <p class="fst-italic fw-light mb-0">Posted by <span class="fw-bold">John Doe</span></p>
                </div>
                <div class="p-4 d-flex justify-content-end">
                    <button class="btn btn-primary">Older posts -></button>
                </div>

@endsection

