

@foreach ($categories["categories"] as $key => $category)
    <a href= 'Category/{{$category["strCategory"]}}'> <h3> {{ $category["strCategory"] }} </h3></a>
    <img src={{$category['strCategoryThumb']  }} > 
    <br>

@endforeach