@props(['blog', 'blogTitle'])

<div>
    <h3>Title : {{ $blogTitle }}</h3>
    <p>Written By {{ $blog->author->name }}</p>
    <h2>The best way to take care of the future is to take care of the present moment.</h2>
    <p>Written By <b>Thich Nhat Hanh</b></p>
</div>
